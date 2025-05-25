<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    protected $fillable = [
        'table',        // add this line
        'date',
        'time',
        'name',
        'orderType',
        'paymentStatus',
        'itemQuantity',
        'orderStatus',
        'totalPrice',
    ];

}
