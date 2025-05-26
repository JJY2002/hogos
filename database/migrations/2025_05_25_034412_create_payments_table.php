<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            // Foreign key to ordered_items table
            $table->foreignId('ordered_id')->constrained('ordered_items')->onDelete('cascade');

            // Enumerations for order type and status
            $table->string('name');
            $table->string('payment_method');
            $table->enum('orderType', ['Dine In', 'Takeaway']);
            $table->enum('paymentStatus', ['Pending', 'Completed', 'Cancelled']);
            $table->enum('orderStatus', ['Fulfilled', 'Unfulfilled']);
            $table->decimal('service_charge', 8, 2)->default(0);
            $table->decimal('tax', 8, 2)->default(0);
            $table->decimal('discount', 8, 2)->default(0);
            $table->decimal('total_amount', 8, 2);
            $table->integer('itemQuantity');
            $table->decimal('totalPrice', 8, 2);

            $table->timestamps(); // created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
