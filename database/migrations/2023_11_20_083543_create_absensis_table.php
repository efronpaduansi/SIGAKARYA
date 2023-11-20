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
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nik_karyawan');
            $table->date('tanggal');
            $table->time('masuk');
            $table->time('pulang');
            $table->integer('telat')->nullable();
            $table->string('sk_masuk')->nullable();
            $table->string('sk_pulang')->nullable();
            $table->timestamps();

            //relasi tabel
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
        Schema::dropIfExists('absensi');
    }
};
