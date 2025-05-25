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
        $tableNum = $request->query('tableNum'); // Get table number from URL

        if (!$tableNum) {
            return redirect('/')->with('error', 'Table number is missing.');
        }

        // Fetch ordered items using tableNum
        $orderedItems = DB::table('ordered_items')
            ->where('tableNum', $tableNum)
            ->get();

        if ($orderedItems->isEmpty()) {
            return redirect('/')->with('error', 'No orders found for this table.');
        }

        // Calculate subtotal
        $subtotal = $orderedItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        $serviceChargePercent = 6;
        $serviceCharge = ($serviceChargePercent / 100) * $subtotal;
        $discount = 0;
        $total = $subtotal + $serviceCharge - $discount;

        return view('payment.customerPayment.paymentPage', [
            'orderedItems' => $orderedItems,
            'subtotal' => $subtotal,
            'serviceCharge' => $serviceCharge,
            'discount' => $discount,
            'total' => $total,
            'tableNum' => $tableNum,
        ]);
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
