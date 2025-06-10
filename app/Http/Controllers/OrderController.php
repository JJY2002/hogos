<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class OrderController extends Controller
{
    public function index(Request $request) {
        $admin = session('admin');

        if (!$admin) {
            return redirect('/');
        }

        $orders = Order::where('order_status', 'confirmed')
            ->orderBy('updated_at', 'asc') // Use orderBy, not sortBy
            ->with('items.menu') // Eager load to prevent N+1
            ->get();
        return view('order.index')->with('orders', $orders);
    }

    public function orderGrid()
    {
        $orders = Order::where('order_status', 'confirmed')
            ->orderBy('updated_at', 'asc') // Use orderBy, not sortBy
            ->with('items.menu') // Eager load to prevent N+1
            ->get();
        return view('partial.order-grid', compact('orders'));
    }

    public function initTableNo(Request $request)
    {
        if (session()->has('table_no')) {
            return redirect()->route('menu.menu');
        }

        $request->validate([
            'table_no' => 'required|integer|min:1|max:99',
        ]);

        session(['table_no' => $request->table_no]);
        $order = Order::create([
            'table_no' => $request->table_no,
            'order_status' => 'Pending'
        ]);

        session(['order_id' => $order->id]);
        session()->forget('admin');
        return redirect()->route('menu.menu');
    }

    public function getItemQuantity($menuId)
    {
        $tableNo = session('table_no'); // Or get the current user's table number somehow
        $order_id = session('order_id');
        $order = Order::find($order_id);

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
        $order_id = session('order_id');

        if (!$table_no) {
            return redirect()->back()->with('error', 'Table number not found in session.');
        }

        $order = Order::find($order_id);

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
        $order_id = session('order_id');

        // Ensure table number is available
        if (!$table_no) {
            return redirect()->back()->with('error', 'Table number not found in session.');
        }

        // Retrieve the pending order for this table with related items and their menu
        $order = Order::with(['items.menu']) // eager load order_menus and menus
        ->find($order_id);

        return view('order.cart', compact('order'));
    }


    public function changeQuantity(Request $request) {
        $request->validate([
            'order_menu_id' => 'required|exists:order_menus,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $orderMenu = OrderMenu::find($request->order_menu_id);
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

    public function manageOrder(Request $request)
    {
        $admin = session('admin');

        if (!$admin) {
            return redirect('/');
        }

        $orders = Order::all()->sortByDesc('id');
        return view('order.manage')->with('orders', $orders);
    }

    public function edit($id)
    {
        $order = Order::with(['items.menu'])->findOrFail($id);
        $menus = Menu::all(); // for dropdown or adding new items
        return view('order.edit', compact('order', 'menus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'table_no' => 'required|integer|min:1|max:99',
            'order_status' => 'required|string',
            'items' => 'required|array',
            'items.*.id' => 'required|exists:order_menus,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        foreach ($request->items as $item) {
            $orderMenu = OrderMenu::find($item['id']);
            $orderMenu->quantity = $item['quantity'];
            $orderMenu->save();
        }

        $order = Order::find($id);
        $order->order_status = $request->order_status;
        $order->table_no = $request->table_no;
        $order->save();

        return redirect()->route('order.edit', $id)->with('success', 'Order updated successfully.');
    }

    public function create()
    {
        $menus = Menu::all();
        return view('order.create', compact('menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'table_no' => 'required|integer|min:1',
            'order_status' => 'required|in:Pending,Confirmed,Canceled',
            'items_json' => 'required|json',
        ]);

        $order = Order::create([
            'table_no' => $request->table_no,
            'order_status' => $request->order_status,
        ]);

        $items = json_decode($request->items_json, true);
        foreach ($items as $item) {
            OrderMenu::create([
                'order_id' => $order->id,
                'menu_id' => $item['id'],
                'quantity' => $item['quantity'],
            ]);
        }

        return redirect()->route('order.index')->with('success', 'Order created successfully.');
    }
}
