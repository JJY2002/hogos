<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    
    public function paymentIndex() {
        return view('payment.customerPayment.paymentPage'/*, compact('menus')*/);
    }

    public function receiptIndex() {
    return view('payment.customerPayment.paymentReceipt'/*, compact('menus')*/);
}
}
