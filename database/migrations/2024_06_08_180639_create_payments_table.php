<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() :void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('payment_number')->unique();
            $table->string('client_id')->nullable();
            $table->decimal('amount', 10, 2);
            $table->date('payment_date');
            $table->string('payment_method', 50)->nullable();
            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('no action');

        });
    }

    public function down():void
    {
        Schema::dropIfExists('payments');
    }

};
