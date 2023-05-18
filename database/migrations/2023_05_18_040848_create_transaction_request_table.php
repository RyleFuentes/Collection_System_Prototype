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
        Schema::create('transaction_request', function (Blueprint $table) {
            $table->id('transaction_id');
            $table->unsignedBigInteger('userID');
            $table->foreign('userID')->references('user_id')->on('user');
            $table->integer('Amount');
            $table->integer('Status')->default(0);
            $table->date('transaction_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_request');
    }
};
