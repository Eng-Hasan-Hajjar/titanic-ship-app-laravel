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
        Schema::create('cinemas', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // اسم السينما
            $table->integer('seating_capacity');  // سعة المقاعد
            $table->string('screen_size');  // حجم الشاشة
            $table->string('current_movie')->nullable();  // الفيلم الحالي
            $table->boolean('is_open')->default(true);  // حالة السينما (مفتوحة/مغلقة)
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cinemas');
    }
};
