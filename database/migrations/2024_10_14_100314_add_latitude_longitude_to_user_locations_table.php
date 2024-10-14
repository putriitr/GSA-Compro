<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('user_locations', function (Blueprint $table) {
            $table->decimal('latitude', 10, 8)->nullable(); // Menyimpan nilai latitude
            $table->decimal('longitude', 11, 8)->nullable(); // Menyimpan nilai longitude
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_locations', function (Blueprint $table) {
            //
        });
    }
};
