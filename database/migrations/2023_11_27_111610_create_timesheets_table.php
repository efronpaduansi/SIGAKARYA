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
        Schema::create('timesheet', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nik_karyawan');
            $table->string('subjek');
            $table->string('jenis');
            $table->integer('jumlah_hari');
            $table->date('dari_tgl');
            $table->date('sampai_tgl');
            $table->text('keterangan');
            $table->string('file_lampiran')->nullable();
            $table->timestamps();

            $table->foreign('nik_karyawan')->references('nik')
            ->on('karyawan')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timesheet');
    }
};
