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
        Schema::create('event_hall_features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_hall_id')->constrained('event_halls')->onDelete('cascade');  // الربط بالقاعة
            $table->string('feature_name');  // اسم الميزة مثل نظام صوتي، منصة

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_hall_features');
    }
};
