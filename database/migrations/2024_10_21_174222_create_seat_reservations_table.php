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
        Schema::create('seat_reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('show_time_id')->constrained('show_times')->onDelete('cascade');  // علاقة بوقت العرض
            $table->foreignId('passenger_id')->constrained('passengers')->onDelete('cascade');  // علاقة بالراكب
            $table->integer('seat_number');  // رقم المقعد المحجوز
            $table->boolean('is_confirmed')->default(false);  // حالة الحجز (مؤكد/غير مؤكد)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seat_reservations');
    }
};
