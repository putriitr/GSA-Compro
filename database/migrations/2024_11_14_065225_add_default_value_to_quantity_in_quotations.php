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
        // Mengubah kolom 'quantity' untuk memberikan nilai default
        Schema::table('quotations', function (Blueprint $table) {
            $table->integer('quantity')->default(1)->change(); // Menambahkan default value 1
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Mengembalikan kolom 'quantity' ke pengaturan semula tanpa nilai default
        Schema::table('quotations', function (Blueprint $table) {
            $table->integer('quantity')->change(); // Menghapus nilai default
        });
    }
};
