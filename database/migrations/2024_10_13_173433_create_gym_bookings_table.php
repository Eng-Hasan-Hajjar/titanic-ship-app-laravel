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
        Schema::create('gym_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gym_id')->constrained('gyms')->onDelete('cascade');  // الربط بالصالة الرياضية
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');  // الربط بالعميل
            $table->dateTime('start_time');  // وقت بدء الحجز
            $table->dateTime('end_time');  // وقت انتهاء الحجز
            $table->enum('status', ['confirmed', 'cancelled', 'completed'])->default('confirmed');  // حالة الحجز

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gym_bookings');
    }
};
