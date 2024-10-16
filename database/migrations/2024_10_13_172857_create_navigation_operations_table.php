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
        Schema::create('navigation_operations', function (Blueprint $table) {
            $table->id();
            $table->string('route_name');  // اسم مسار الرحلة
            $table->string('start_location');  // الموقع الذي تبدأ منه الرحلة
            $table->string('end_location');  // الوجهة النهائية للرحلة
            $table->string('current_position');  // الموقع الحالي للباخرة
            $table->string('weather_conditions')->nullable();  // الظروف الجوية
            $table->enum('navigation_status', ['in_progress', 'completed', 'delayed'])->default('in_progress');  // حالة الملاحة
            $table->timestamp('start_time');  // وقت بدء الرحلة
            $table->timestamp('estimated_arrival')->nullable();  // وقت الوصول المقدر

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('navigation_operations');
    }
};
