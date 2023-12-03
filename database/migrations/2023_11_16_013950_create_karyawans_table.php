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
        Schema::create('karyawan', function (Blueprint $table) {
            // $table->id();
            $table->bigInteger('nik')->primary();
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['Pria', 'Wanita', 'Lainnya']);
            $table->date('tahun_masuk');
            $table->enum('agama', ['Islam', 'Kristen', 'Hindu', 'Budha', 'Lainnya']);
            $table->string('telepon');
            $table->string('rekening');
            $table->string('nama_rekening');
            $table->string('alamat');
            $table->string('pendidikan_terakhir');
            $table->string('npwp');
            $table->enum('status_pernikahan', ['Kawin', 'Belum Kawin'])->default('Belum Kawin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawan');
    }
};
