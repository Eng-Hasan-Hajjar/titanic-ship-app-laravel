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
         // إنشاء جدول وسيط بين العمليات الطبية والمرضى (many-to-many)
        Schema::create('medical_operation_patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medical_operation_id')->constrained('medical_operations')->onDelete('cascade');
            $table->foreignId('passenger_id')->constrained('passengers')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_operation_patients');
    }
};
