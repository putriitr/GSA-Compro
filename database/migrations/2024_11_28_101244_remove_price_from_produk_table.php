<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('produk', function (Blueprint $table) {
            $table->dropColumn('price'); // Remove the price column
        });
    }

    public function down()
    {
        Schema::table('produk', function (Blueprint $table) {
            $table->decimal('price', 8, 2)->nullable(); // Re-add the price column if rolling back
        });
    }
};
