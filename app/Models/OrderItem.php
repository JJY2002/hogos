<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    public function order()
{
    return $this->belongsTo(Order::class);
}

protected $fillable = [
    'menu_name', 'quantity', 'price', 'image', 'order_id'
];

}
