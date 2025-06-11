<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{

    public function paymentIndex(Request $request)
    {
        $tableNum = $request->input('tableNum');
        $order_id = session('order_id');
        // Get the active order for the table
        $order = \App\Models\Order::with(['items.menu']) // Eager load menus through order_menus
        ->find($order_id);

        if (!$order) {
            return view('payment.customerPayment.paymentPage', [
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
        ->join('order_items', 'ordered_items.order_item_id', '=', 'order_items.id') // updated join condition
        ->select(
            'ordered_items.*',
            'order_items.price as item_price',
            'order_items.menu_name',
            'order_items.image'
        )
        ->where('ordered_items.tableNum', $tableNum)
        ->get();
        // Calculate subtotal using quantity * item price
        $subtotal = $orderedItems->sum(fn($item) => $item->quantity * $item->item_price);
        // Transform order_menus with menu info
        $orderedItems = $order->items->map(function ($item) {
            return (object) [
                'menu_name' => $item->menu->name,
                'image' => $item->menu->image,
                'item_price' => $item->menu->price,
                'quantity' => $item->quantity,
                'subtotal' => $item->quantity * $item->menu->price
            ];
        });

        // Calculate totals
        $subtotal = $orderedItems->sum(fn($item) => $item->subtotal);
        $serviceChargePercent = 6;
        $serviceCharge = round(($serviceChargePercent / 100) * $subtotal, 2);
        $discount = 0;
        $total = $subtotal + $serviceCharge - $discount;

        return view('payment.customerPayment.paymentPage', compact('orderedItems', 'subtotal', 'serviceCharge', 'discount', 'total', 'tableNum'));
        //return view('payment.customerPayment.paymentReceipt', compact('orderedItems', 'subtotal', 'serviceCharge', 'discount', 'total', 'tableNum'));
    }

    public function receiptIndex(Request $request)
{
    $tableNum = $request->input('tableNum');
    $paymentMethod = $request->input('payment_method');

    // Get ordered items for this table
    $orderedItems = DB::table('ordered_items')
        ->join('order_items', 'ordered_items.order_item_id', '=', 'order_items.id')
        ->select(
            'ordered_items.*',
            'order_items.menu_name',
            'order_items.price'
        )
        ->where('ordered_items.tableNum', $tableNum)
        ->get();

    $subtotal = $orderedItems->sum(fn($item) => $item->quantity * $item->price);
    $serviceCharge = round($subtotal * 0.06, 2);
    $total = $subtotal + $serviceCharge;

    return view('payment.customerPayment.paymentReceipt', compact(
        'orderedItems',
        'tableNum',
        'paymentMethod',
        'subtotal',
        'serviceCharge',
        'total'
    ));
    
}

    public function paymentReceipt(Request $request)
    {
        return view('payment.customerReceipt', [
            'tableNum' => $request->tableNum,
            'paymentMethod' => $request->paymentMethod,
            'subtotal' => $request->subtotal,
            'serviceCharge' => $request->serviceCharge,
            'total' => $request->total
        ]);
        return view('payment.customerPayment.paymentPage', compact(
            'orderedItems', 'subtotal', 'serviceCharge', 'discount', 'total', 'tableNum'
        ));
    }





    public function statusIndex() {
    return view('payment.customerPayment.orderStatus'/*, compact('menus')*/);
    }

    public function paymentListIndex() {
    return view('payment.adminPayment.adminPaymentList'/*, compact('menus')*/);
    }

    public function adminPaymentListIndex()
    {
        $orders = Order::all(); // Or ->paginate(10) if needed
        return view('payment.adminPayment.adminPaymentList', compact('orders'));
    }
}
