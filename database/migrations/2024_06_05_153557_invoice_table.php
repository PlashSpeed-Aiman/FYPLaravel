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
        // Create the invoice table
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('client_id')->nullable();
            $table->string('invoice_number')->unique();
            $table->date('invoice_date');
            $table->decimal('amount', 10, 2);
            $table->string('status');
            $table->timestamps();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('no action');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('invoices');
    }
};
