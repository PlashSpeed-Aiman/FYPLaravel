<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('invoice_payments', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_id');
            $table->string('payment_id');
            $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('no action');
            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('no action');
            $table->decimal('amount', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('invoice_payments');
    }

};
