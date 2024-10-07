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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('room_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('total_price', 10, 2);
            $table->enum('status', ['confirmed', 'cancelled', 'checked_in', 'checked_out']);
            $table->timestamps();

            $table->index('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers');

            $table->index('room_id');
            $table->foreign('room_id')->references('id')->on('rooms');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
