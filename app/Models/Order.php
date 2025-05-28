<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    //
    public function items(): HasMany
    {
        return $this->hasMany(OrderMenu::class, 'order_id');
    }
    protected $fillable = ['table_no', 'order_status', 'order_type', 'created_at', 'updated_at'];
}
