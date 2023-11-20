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
        Schema::create('pinjaman', function (Blueprint $table) {
            // $table->id();
            $table->bigInteger('no_pinjaman')->primary();
            $table->bigInteger('nik_karyawan');
            $table->string('kode_jabatan');
            $table->date('tanggal_pinjam');
            $table->integer('jumlah');
            $table->integer('jangka_waktu');
            $table->integer('angsuran')->default(0);
            $table->enum('status', ['Disetujui', 'Ditolak', 'Menunggu Konfirmasi'])->default('Menunggu Konfirmasi');
            $table->timestamps();

            //relasi ke tabel karyawan dan jabatan
            $table->foreign('nik_karyawan')->references('nik')->on('karyawan')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('kode_jabatan')->references('kode')->on('jabatan')
            ->onUpdate('cascade')
            ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjaman');
    }
};
