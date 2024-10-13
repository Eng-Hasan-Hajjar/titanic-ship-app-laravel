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
        Schema::create('barbershop_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barbershop_id')->constrained('barbershops')->onDelete('cascade');  // علاقة مع صالونات الحلاقة
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');  // علاقة مع العملاء
            $table->timestamp('start_time');  // وقت بدء الحجز
            $table->timestamp('end_time');  // وقت انتهاء الحجز
            $table->enum('status', ['confirmed', 'cancelled', 'completed'])->default('confirmed');  // حالة الحجز
     
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barbershop_bookings');
    }
};
