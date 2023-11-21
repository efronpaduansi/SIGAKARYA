<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\JabatanController;
use App\Http\Controllers\Admin\KaryawanController;
use App\Http\Controllers\Admin\PinjamanController;


/** Authentication */
Route::middleware(['guest'])->group(function () {
    Route::get('/', [LoginController::class, 'create'])->name('login');
    Route::post('/', [LoginController::class, 'store'])->name('login.store');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('adminpanel.pages.dashboard');
    });

    Route::controller(KaryawanController::class)->group(function(){
        Route::get('/karyawan', 'index')->name('karyawan.index');
        Route::get('/karyawan/tambah', 'create')->name('karyawan.create');
        Route::post('/karyawan/tambah', 'store')->name('karyawan.store');
        Route::get('/karyawan/{nik}', 'show')->name('karyawan.show');
        Route::get('/karyawan/cetak/{nik}', 'exportPdf')->name('karyawan.exportPdf');
        Route::get('/karyawan/edit/{nik}', 'edit')->name('karyawan.edit');
        Route::put('/karyawan/edit/{nik}', 'update')->name('karyawan.update');
        Route::delete('/karyawan/{nik}', 'destroy')->name('karyawan.destroy');
    });

    Route::controller(JabatanController::class)->group(function(){
        Route::get('/jabatan', 'index')->name('jabatan.index');
        Route::post('/jabatan', 'store')->name('jabatan.store');
        Route::put('/jabatan/{id}', 'update')->name('jabatan.update');
        Route::delete('/jabatan/{id}', 'destroy')->name('jabatan.destroy');
    });

    Route::controller(PinjamanController::class)->group(function(){
        Route::get('/pinjaman', 'index')->name('pinjaman.index');
        Route::get('/pinjaman/tambah', 'create')->name('pinjaman.create');
        Route::post('/pinjaman', 'store')->name('pinjaman.store');
        Route::get('/pinjaman/detail', 'detail')->name('pinjaman.detail');
        Route::put('/pinjaman/detail/{no}', 'updateJumlahAngsuran')->name('pinjaman.updateJumlahAngsuran');
        Route::get('/pinjaman/setujui/{no}', 'setujui')->name('pinjaman.setujui');
        Route::get('/pinjaman/tolak/{no}', 'tolak')->name('pinjaman.tolak');
        Route::delete('/pinjaman/{no}', 'destroy')->name('pinjaman.destroy');
    });

    Route::controller(\App\Http\Controllers\Admin\AbsensiController::class)->group(function (){
        Route::get('/absensi', 'index')->name('absensi.index');
    });
});

Route::middleware(['auth'])->group(function (){
   Route::controller(\App\Http\Controllers\AbsensiRecordController::class)->group(function (){
      Route::get('/absensi-karyawan', 'index');
      Route::post('/absensi-karyawan', 'store');
   });
});
