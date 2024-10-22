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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // اسم الفيلم
            $table->string('genre'); // نوع الفيلم
            $table->integer('duration'); // مدة الفيلم بالدقائق
            $table->string('director')->nullable(); // المخرج
            $table->text('description')->nullable(); // وصف الفيلم

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
