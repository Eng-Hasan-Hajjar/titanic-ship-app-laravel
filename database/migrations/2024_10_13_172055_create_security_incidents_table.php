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
        Schema::create('security_incidents', function (Blueprint $table) {
            $table->id();
            $table->string('incident_type');  // نوع الحادث
            $table->string('location');  // مكان الحادث
            $table->text('description');  // وصف الحادث
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');  // الربط بالموظف الذي يتعامل مع الحادث
            $table->enum('status', ['under_investigation', 'closed', 'in_progress'])->default('under_investigation');  // حالة الحادث
            $table->timestamp('incident_time');  // وقت وقوع الحادث
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('security_incidents');
    }
};
