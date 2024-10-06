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

        Schema::table('facebook_pages', function (Blueprint $table) {
            $table->string('location')->nullable();
        });

        Schema::table('instagram_accounts', function (Blueprint $table) {
            $table->string('location')->nullable();
        });

        Schema::table('you_tube_channels', function (Blueprint $table) {
            $table->string('location')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('facebook_pages', function (Blueprint $table) {
            $table->dropColumn('location');
        });

        Schema::table('instagram_accounts', function (Blueprint $table) {
            $table->dropColumn('location');
        });

        Schema::table('you_tube_channels', function (Blueprint $table) {
            $table->dropColumn('location');
        });
    }
};
