<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Primary key, auto-increment (this is your orderId)
            $table->integer('table');
            $table->date('date');
            $table->time('time');
            $table->string('name'); // Customer name
            $table->enum('orderType', ['Dine In', 'Takeaway']);
            $table->enum('paymentStatus', ['Pending', 'Completed', 'Cancelled']);
            $table->integer('itemQuantity');
            $table->enum('orderStatus', ['Fulfilled', 'Unfulfilled']);
            $table->decimal('totalPrice', 8, 2);
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
