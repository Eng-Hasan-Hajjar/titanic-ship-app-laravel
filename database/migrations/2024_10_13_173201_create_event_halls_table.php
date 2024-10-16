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
        Schema::create('event_halls', function (Blueprint $table) {
            $table->id();
            $table->string('hall_name');  // اسم القاعة
            $table->integer('capacity');  // سعة القاعة
            $table->enum('availability', ['available', 'booked', 'closed_for_maintenance'])->default('available');  // حالة القاعة
            $table->decimal('price_per_hour', 8, 2);  // سعر القاعة بالساعة
            $table->string('operating_hours');  // ساعات العمل
            $table->boolean('is_open')->default(true);  // إذا كانت القاعة مفتوحة

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_halls');
    }
};
