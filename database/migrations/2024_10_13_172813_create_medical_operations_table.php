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
        Schema::create('medical_operations', function (Blueprint $table) {
            $table->id();
            $table->string('operation_type');  // نوع العملية الطبية
            $table->string('location');  // مكان العملية الطبية
            $table->text('description');  // وصف تفصيلي للحالة الطبية
            $table->enum('status', ['in_progress', 'completed', 'pending'])->default('in_progress');  // حالة العملية الطبية
            $table->timestamp('operation_time');  // وقت بداية العملية الطبية

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_operations');
    }
};
