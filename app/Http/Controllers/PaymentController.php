<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Order;

class PaymentController extends Controller
{
    
    public function paymentIndex() {
        return view('payment.customerPayment.paymentPage'/*, compact('menus')*/);
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
