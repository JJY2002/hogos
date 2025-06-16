<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    // Allow mass assignment for these fields
    protected $fillable = [
        'table_number',
        'payment_method',
        'subtotal',
        'service_charge',
        'discount',
        'total',
        'voucher_code',
    ];

    // Define relationship to Order model (if applicable)
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}