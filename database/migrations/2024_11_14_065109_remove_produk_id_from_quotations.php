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
        // Menghapus Foreign Key jika ada
        Schema::table('quotations', function (Blueprint $table) {
            $table->dropForeign(['produk_id']); // Menghapus foreign key constraint
        });

        // Menghapus kolom produk_id
        Schema::table('quotations', function (Blueprint $table) {
            $table->dropColumn('produk_id'); // Menghapus kolom produk_id
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Menambahkan kembali foreign key dan kolom produk_id untuk rollback (jika diperlukan)
        Schema::table('quotations', function (Blueprint $table) {
            $table->foreignId('produk_id')->constrained('produk')->onDelete('cascade');
        });
    }
};
