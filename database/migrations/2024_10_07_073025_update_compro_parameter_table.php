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
        Schema::table('compro_parameter', function (Blueprint $table) {
            // Adding two WhatsApp numbers
            $table->string('whatsapp_1')->nullable();
            $table->string('whatsapp_2')->nullable();

            // Adding three vision statements
            $table->text('visimisi_1')->nullable();
            $table->text('visimisi_2')->nullable();
            $table->text('visimisi_3')->nullable();

            // Adding a website field
            $table->string('website')->nullable();

            // Adding NIB (Nomor Induk Berusaha) field
            $table->string('nomor_induk_berusaha')->nullable();

            // Adding Surat Keterangan (SK) field
            $table->string('surat_keterangan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('compro_parameter', function (Blueprint $table) {
            // Dropping the columns added in the up() method
            $table->dropColumn([
                'whatsapp_1',
                'whatsapp_2',
                'visimisi_1',
                'visimisi_2',
                'visimisi_3',
                'website',
                'nomor_induk_berusaha',
                'surat_keterangan',
            ]);
        });
    }
};
