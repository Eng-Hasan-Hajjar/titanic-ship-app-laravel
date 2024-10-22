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
        Schema::create('movie_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('movie_id')->constrained('movies')->onDelete('cascade');  // علاقة بالفيلم
            $table->foreignId('passenger_id')->constrained('passengers')->onDelete('cascade');  // علاقة بالراكب
            $table->integer('rating');  // التقييم من 1 إلى 5
            $table->text('review')->nullable();  // مراجعة نصية
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_reviews');
    }
};
