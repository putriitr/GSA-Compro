<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLocationsTable extends Migration
{
    public function up()
    {
        Schema::create('user_locations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable(); // Jika ada gambar yang tidak wajib
            $table->float('latitude', 10, 6); // 10 digit total dan 6 digit desimal
            $table->float('longitude', 10, 6); // 10 digit total dan 6 digit desimal
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_locations');
    }
}
