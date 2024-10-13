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
        Schema::create('barbershops', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // اسم الصالون
            $table->integer('capacity');  // سعة الصالون
            $table->json('services')->nullable();  // الخدمات المقدمة
            $table->string('opening_hours');  // ساعات العمل
            $table->boolean('is_open')->default(true);  // ما إذا كان الصالون مفتوحاً
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barbershops');
    }
};
