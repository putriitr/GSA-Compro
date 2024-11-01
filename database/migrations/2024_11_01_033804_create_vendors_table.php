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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perusahaan');
            $table->string('alamat');
            $table->string('no_telepon');
            $table->string('nama_pic');
            $table->string('no_telepon_pic');
            $table->string('email')->unique();
            $table->string('akta')->nullable();
            $table->string('nib')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
