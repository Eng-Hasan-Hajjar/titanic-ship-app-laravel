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
        Schema::create('cleaning_services', function (Blueprint $table) {
            $table->id();
            $table->string('area');  // المنطقة التي تم تنظيفها
            $table->timestamp('cleaning_time');  // وقت التنظيف
            $table->foreignId('employee_id')->constrained('employees');  // علاقة مع جدول الموظفين
            $table->enum('status', ['pending', 'completed'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cleaning_services');
    }
};
