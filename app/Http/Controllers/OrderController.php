<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class OrderController extends Controller
{
    public function initTableNo(Request $request)
    {
        if (session()->has('table_no')) {
            return redirect()->route('menu.menu');
        }

        $request->validate([
            'table_no' => 'required|integer|min:1|max:99',
        ]);

        session(['table_no' => $request->table_no]);
        Order::create([
            'table_no' => $request->table_no,
            'order_status' => 'Pending'
        ]);

        return redirect()->route('menu.menu');
    }

    public function getItemQuantity($menuId)
    {
        $tableNo = session('table_no'); // Or get the current user's table number somehow

        $order = Order::where('table_no', $tableNo)
            ->where('order_status', 'Pending')
            ->first();

        if (!$order) {
            return response()->json(['quantity' => 0]);
        }

        $orderMenu = $order->items()->where('menu_id', $menuId)->first();

        return response()->json([
            'quantity' => $orderMenu ? $orderMenu->quantity : 0,
        ]);
    }

    public function storeOrderItem(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $table_no = session('table_no');

        if (!$table_no) {
            return redirect()->back()->with('error', 'Table number not found in session.');
        }

        $order = DB::table('orders')
            ->where('table_no', $table_no)
            ->where('order_status', 'Pending')
            ->first();

        if (!$order) {
            return response()->json(['success' => false, 'message' => 'No active pending order found']);
        }

        // Check if the menu item already exists in order_menus
        $orderMenu = OrderMenu::where('order_id', $order->id)
            ->where('menu_id', $request->menu_id)
            ->first();

        if ($orderMenu) {
            // Update existing quantity
            $orderMenu->quantity = $request->quantity;
            $orderMenu->save();
        } else {
            // Create new order menu item
            OrderMenu::create([
                'order_id' => $order->id,
                'menu_id' => $request->menu_id,
                'quantity' => $request->quantity
            ]);
        }

        return response()->json(['success' => true]);
    }


    public function toCart(Request $request) {
        $table_no = session('table_no');

        $order = DB::table('orders')
            /*->where('table_no', $table_no)*/
            ->where('order_status', 'Pending')
            ->first();
        $order = Order::with(['items.menu']) // eager load both items and each item's menu
        ->where('order_status', 'Pending')
            ->first();

        return view('order.cart')->with('order', $order);
    }

    public function changeQuantity(Request $request) {
        $request->validate([
            'order_menu_id' => 'required|exists:menus,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $orderMenu = OrderMenu::where('id', $request->order_menu_id)
            ->first();
        $orderMenu->quantity = $request->quantity;
        $orderMenu->save();

        return redirect()->back()->with('success', 'Quantity updated successfully.');
    }

    public function updateOrder(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:orders,id',
            'table_no' => 'required',
            'orderType' => 'required|in:Dine in,Takeaway',
        ]);

        // Update the order type (add a new field if not yet in DB)
        $order = Order::findOrFail($validated['id']);
        $order->order_type = $validated['orderType']; // Make sure this column exists in DB
        $order->order_status = 'confirmed'; // Optionally change status
        $order->save();

        return redirect()->route('paymentPage', ['tableNum' => $order->table_no])
            ->with('success', 'Order confirmed!');
    }

    public function testFunction(Request $request)
    {
        $tableNum = $request->input('tableNum');

        // Get the order for the table number
        $order = DB::table('orders')->where('table_num', $tableNum)->first();

        if (!$order) {
            return view('paymentPage', [
                'orderedItems' => [],
                'subtotal' => 0,
                'serviceCharge' => 0,
                'discount' => 0,
                'total' => 0,
                'tableNum' => $tableNum,
                'message' => 'No active order found for this table'
            ]);
        }

        // Join ordered_items -> order_items -> products to get details
        $orderedItems = DB::table('ordered_items')
            ->join('order_items', 'ordered_items.ordered_item_id', '=', 'order_items.id')
            ->select(
                'ordered_items.*',
                'order_items.quantity',
                'order_items.price as item_price',
                'order_items.menu_name',
                'order_items.image'
            )
            ->where('order_items.order_id', $order->id)
            ->get();
        // Calculate subtotal using quantity * item price
        $subtotal = $orderedItems->sum(fn($item) => $item->quantity * $item->item_price);
        $serviceChargePercent = 6;
        $serviceCharge = ($serviceChargePercent / 100) * $subtotal;
        $discount = 0; // modify if you have discounts
        $total = $subtotal + $serviceCharge - $discount;

        return view('paymentPage', compact('orderedItems', 'subtotal', 'serviceCharge', 'discount', 'total', 'tableNum'));
    }


}
