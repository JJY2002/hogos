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

        // Get the order for the table number
        $order = DB::table('ordered_items')->where('tableNum', $tableNum)->first();

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
    ->join('order_items', 'ordered_items.id', '=', 'ordered_items.order_item_id')
    ->select(
        'ordered_items.*',
        'order_items.price as item_price',
        'order_items.menu_name',
        'order_items.image'
    )
    ->where('ordered_items.tableNum', $tableNum)  // filter by tableNum on ordered_items
    ->get();
        // Calculate subtotal using quantity * item price
        $subtotal = $orderedItems->sum(fn($item) => $item->quantity * $item->item_price);
        $serviceChargePercent = 6;
        $serviceCharge = ($serviceChargePercent / 100) * $subtotal;
        $discount = 0; // modify if you have discounts
        $total = $subtotal + $serviceCharge - $discount;

        return view('/payment/customerPayment/                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  paymentPage', compact('orderedItems', 'subtotal', 'serviceCharge', 'discount', 'total', 'tableNum'));
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
