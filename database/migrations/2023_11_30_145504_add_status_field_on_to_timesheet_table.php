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
        Schema::table('timesheet', function (Blueprint $table) {
            $table->enum('status', ['Menunggu Konfirmasi','Disetujui', 'Ditolak'])->default('Menunggu Konfirmasi')->after('file_lampiran');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('timesheet', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
