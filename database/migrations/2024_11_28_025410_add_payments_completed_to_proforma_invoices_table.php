<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('proforma_invoices', function (Blueprint $table) {
            $table->integer('payments_completed')->default(0)->after('dp'); // Tambahkan kolom dengan nilai default 0
        });
    }

    public function down()
    {
        Schema::table('proforma_invoices', function (Blueprint $table) {
            $table->dropColumn('payments_completed');
        });
    }
};
