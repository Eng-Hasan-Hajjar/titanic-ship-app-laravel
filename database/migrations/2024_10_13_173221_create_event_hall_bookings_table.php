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
        Schema::create('event_hall_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_hall_id')->constrained('event_halls')->onDelete('cascade');  // الربط بالقاعة
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');  // الربط بالعميل
            $table->string('event_type');  // نوع الحدث
            $table->dateTime('start_time');  // وقت بدء الحجز
            $table->dateTime('end_time');  // وقت انتهاء الحجز
            $table->decimal('total_price', 10, 2);  // السعر الكلي للحجز
            $table->enum('status', ['confirmed', 'cancelled', 'completed'])->default('confirmed');  // حالة الحجز

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_hall_bookings');
    }
};
