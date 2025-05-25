<?php

namespace App\Http\Controllers;

use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        // Fetch all orders, or paginate if many
        $orders = Order::all();

        // Pass orders to the view
        return view('orders.index', compact('orders'));
    }
}
