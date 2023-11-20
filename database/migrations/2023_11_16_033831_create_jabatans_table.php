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
        Schema::create('jabatan', function (Blueprint $table) {
            // $table->id();
            $table->string('kode')->primary();
            $table->string('nama');
            $table->integer('gaji_pokok');
            $table->integer('uang_makan');
            $table->integer('uang_transport');
            $table->integer('tunjangan_kesehatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jabatan');
    }
};
