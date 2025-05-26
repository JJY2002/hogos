<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class OrderController extends Controller
{


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
