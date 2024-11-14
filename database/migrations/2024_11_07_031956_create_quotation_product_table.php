<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('quotation_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quotation_id')->constrained('quotations')->onDelete('cascade');
            $table->foreignId('produk_id')->constrained('produk')->onDelete('cascade');
            $table->integer('quantity')->default(1); 
            $table->string('equipment_name');
            $table->string('merk_type');
            $table->decimal('unit_price', 15, 2);
            $table->decimal('total_price', 15, 2);
            $table->timestamps();
            $table->integer('quantity')->default(1)->change();
        });
    }

    public function down()
    {
        Schema::table('quotation_products', function (Blueprint $table) {
            $table->integer('quantity')->nullable()->change();
        });
    }
};
