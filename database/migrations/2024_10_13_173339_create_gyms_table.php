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
        Schema::create('gyms', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // اسم الجيم
            $table->integer('capacity');  // سعة الجيم
            $table->json('equipment')->nullable();  // المعدات المتاحة
            $table->string('opening_hours');  // ساعات العمل
            $table->boolean('is_open')->default(true);  // ما إذا كان الجيم مفتوحاً
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gyms');
    }
};
