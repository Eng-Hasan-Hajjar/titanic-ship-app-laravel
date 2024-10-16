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
        Schema::create('rescue_operations', function (Blueprint $table) {
            $table->id();
            $table->string('operation_type');  // نوع عملية الإنقاذ
            $table->string('location');  // مكان الحادثة أو الإنقاذ
            $table->text('description');  // وصف تفصيلي للحادثة
            $table->enum('status', ['in_progress', 'completed', 'pending'])->default('in_progress');  // حالة الإنقاذ
            $table->timestamp('operation_time');  // وقت بداية الإنقاذ

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rescue_operations');
    }
};
