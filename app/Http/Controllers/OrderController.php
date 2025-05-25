<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class OrderController extends Controller
{


    public function showOrder($orderId)
    {
        // Fetch ordered items for the specific order
        $orderedItems = DB::table('ordered_items')
            ->where('order_item_id', $orderId)
            ->get();
    
        // Calculate subtotal
        $subtotal = $orderedItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });
    
        // Define charges
        $serviceChargePercent = 6;
        $serviceCharge = ($serviceChargePercent / 100) * $subtotal;
        $discount = 0; // You can modify this if you apply voucher logic
        $total = $subtotal + $serviceCharge - $discount;
    
        return view('orders.show', [
            'orderId' => $orderId,
            'orderedItems' => $orderedItems, // <--- this must match Blade variable
            'subtotal' => $subtotal,
            'serviceChargePercent' => $serviceChargePercent,
            'serviceCharge' => $serviceCharge,
            'discount' => $discount,
            'total' => $total,
        ]);
    }


}
