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
        Schema::create('penggajian', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nik_karyawan');
            $table->integer('gaji_awal');
            $table->integer('tunjangan_jabatan')->default(0);
            $table->integer('tunjangan_makan')->default(0);
            $table->integer('tunjangan_transport')->default(0);
            $table->integer('total_tunjangan')->default(0);
            $table->integer('tunjangan_bpjs')->default(0);
            $table->integer('potongan_bpjs')->default(0);
            $table->integer('pph')->default(0);
            $table->integer('pph_per_thn')->default(0);
            $table->integer('pph_per_bln')->default(0);
            $table->integer('gaji_netto')->default(0);
            
            $table->timestamps();

            //relasi ke tabel karyawan dan jabatan
            $table->foreign('nik_karyawan')->references('nik')->on('karyawan')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penggajian');
    }
};
