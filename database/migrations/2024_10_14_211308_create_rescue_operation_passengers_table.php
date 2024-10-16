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
         // إنشاء جدول وسيط بين عمليات الإنقاذ والركاب (many-to-many)
        Schema::create('rescue_operation_passengers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rescue_operation_id')->constrained('rescue_operations')->onDelete('cascade');
            $table->foreignId('passenger_id')->constrained('passengers')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rescue_operation_passengers');
    }
};
