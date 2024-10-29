<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAfterSalesServicesTable extends Migration
{
    public function up()
    {
        Schema::create('after_sales_services', function (Blueprint $table) {
            $table->id(); // Kolom ID
            $table->string('judul'); // Judul layanan
            $table->text('deskripsi'); // Deskripsi layanan
            $table->string('image')->nullable(); // Kolom untuk menyimpan path gambar (nullable)
            $table->timestamps(); // Kolom untuk created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('after_sales_services');
    }
}

