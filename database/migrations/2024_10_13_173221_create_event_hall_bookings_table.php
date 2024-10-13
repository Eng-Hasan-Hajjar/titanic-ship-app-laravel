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
            $table->foreignId('event_hall_id')->constrained('event_halls')->onDelete('cascade');  // علاقة مع الصالات
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');  // علاقة مع العملاء
            $table->string('event_type');  // نوع المناسبة
            $table->timestamp('start_time');  // وقت بدء الحجز
            $table->timestamp('end_time');  // وقت انتهاء الحجز
            $table->decimal('total_price', 10, 2);  // السعر الإجمالي
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
