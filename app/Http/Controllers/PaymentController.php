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

        return view('payment.customerPayment.paymentPage', compact(
            'orderedItems', 'subtotal', 'serviceCharge', 'discount', 'total', 'tableNum'
        ));
    }


    public function receiptIndex() {
    return view('payment.customerPayment.paymentReceipt'/*, compact('menus')*/);
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
