<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistributorsTable extends Migration
{
    public function up()
    {
        Schema::create('distributors', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perusahaan');
            $table->string('email')->unique();
            $table->string('no_telepon');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('distributors');
    }
}

