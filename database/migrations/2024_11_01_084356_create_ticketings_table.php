<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketingsTable extends Migration
{
    public function up()
    {
        Schema::create('ticketings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi ke tabel users
            $table->string('service_type'); // Jenis layanan
            $table->text('description'); // Keterangan pengajuan
            $table->string('document')->nullable(); // Untuk menyimpan nama file dokumen
            $table->enum('status', ['open', 'in_progress', 'closed'])->default('open'); // Status ticketing
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ticketings');
    }
}
