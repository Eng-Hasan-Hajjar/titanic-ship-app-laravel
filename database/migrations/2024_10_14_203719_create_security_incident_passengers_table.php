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
        Schema::create('security_incident_passengers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('security_incident_id')->constrained('security_incidents')->onDelete('cascade');  // الربط بالحوادث الأمنية
            $table->foreignId('passenger_id')->constrained('passengers')->onDelete('cascade');  // الربط بالركاب
       
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('security_incident_passengers');
    }
};
