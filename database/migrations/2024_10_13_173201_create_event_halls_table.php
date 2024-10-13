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
            $table->string('hall_name');  // اسم الصالة
            $table->integer('capacity');  // سعة الصالة
            $table->enum('availability', ['available', 'booked', 'closed_for_maintenance'])->default('available');  // حالة الصالة
            $table->json('features')->nullable();  // ميزات الصالة
            $table->decimal('price_per_hour', 8, 2);  // سعر الاستئجار في الساعة
            $table->string('operating_hours');  // ساعات العمل المتاحة
            $table->boolean('is_open')->default(true);  // ما إذا كانت الصالة مفتوحة
     
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
