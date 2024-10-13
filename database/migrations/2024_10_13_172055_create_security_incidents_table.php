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
            $table->string('incident_type');  // نوع الحادثة
            $table->string('location');  // مكان الحادثة
            $table->text('description');  // وصف تفصيلي للحادثة
            $table->foreignId('reported_by')->constrained('passengers');  // علاقة مع الركاب أو الموظفين
            $table->json('passenger_ids')->nullable();  // الركاب المتورطون كـ JSON
            $table->foreignId('employee_id')->constrained('employees');  // الموظف المسؤول عن التعامل
            $table->enum('status', ['under_investigation', 'closed', 'in_progress'])->default('under_investigation');  // حالة الحادثة
            $table->timestamp('incident_time');  // وقت الحادثة
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
