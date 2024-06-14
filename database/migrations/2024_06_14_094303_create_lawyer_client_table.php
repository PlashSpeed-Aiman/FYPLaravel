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
        Schema::create('lawyer_client', function (Blueprint $table) {
            $table->id();
            $table->string('lawyer_id');
            $table->string('client_id');
            $table->foreign('lawyer_id')->references('id')->on('lawyers')->onDelete('no action');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('no action');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lawyer_client');
    }
};
