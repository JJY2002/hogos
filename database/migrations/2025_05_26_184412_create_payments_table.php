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
            $table->unsignedInteger('table_number');
            $table->string('payment_method');
            $table->decimal('subtotal', 8, 2);
            $table->decimal('service_charge', 8, 2);
            $table->decimal('discount', 8, 2)->default(0.00);
            $table->decimal('total', 8, 2);
            $table->string('voucher_code')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
