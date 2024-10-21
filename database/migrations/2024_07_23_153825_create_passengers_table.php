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
        Schema::create('passengers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->Integer('phone');
            $table->string('work');
            $table->string('nationality')->default('عربي سوري');
            $table->string('current_location')->default('حلب');
            $table->boolean('gender');
            $table->date('birthday');

            $table->timestamp('check_in_time')->nullable();  // وقت تسجيل الدخول
            $table->timestamp('check_out_time')->nullable();  // وقت تسجيل الخروج


            $table->timestamps();
            // تعيين ترتيب الحقول
            $table->index('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passengers');
    }
};
