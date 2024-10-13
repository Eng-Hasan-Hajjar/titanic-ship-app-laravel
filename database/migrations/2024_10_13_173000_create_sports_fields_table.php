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
        Schema::create('sports_fields', function (Blueprint $table) {
            $table->id();
            $table->string('field_name');  // اسم الملعب
            $table->string('field_type');  // نوع الملعب (تنس، كرة قدم...)
            $table->integer('capacity');  // سعة الملعب
            $table->enum('availability', ['available', 'closed_for_maintenance', 'occupied'])->default('available');  // حالة الملعب
            $table->string('operating_hours');  // ساعات العمل المتاحة
            $table->boolean('is_open')->default(true);  // ما إذا كان الملعب مفتوحًا
      
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sports_fields');
    }
};
