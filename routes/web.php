<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\JabatanController;
use App\Http\Controllers\Admin\KaryawanController;
use App\Http\Controllers\Admin\PinjamanController;
use App\Http\Controllers\Admin\UserController;


/** Authentication */
Route::middleware(['guest'])->group(function () {
    Route::get('/', [LoginController::class, 'create'])->name('login');
    Route::post('/', [LoginController::class, 'store'])->name('login.store');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::controller(KaryawanController::class)->group(function(){
        Route::get('/karyawan', 'index')->name('karyawan.index');
        Route::get('/karyawan/tambah', 'create')->name('karyawan.create');
        Route::post('/karyawan/tambah', 'store')->name('karyawan.store');
        Route::get('/karyawan/{nik}', 'show')->name('karyawan.show');
        Route::get('/karyawan/cetak/{nik}', 'exportPdf')->name('karyawan.exportPdf');
        Route::get('/karyawan/edit/{nik}', 'edit')->name('karyawan.edit');
        Route::put('/karyawan/edit/{nik}', 'update')->name('karyawan.update');
        Route::delete('/karyawan/{nik}', 'destroy')->name('karyawan.destroy');
        Route::post('/karyawan/profile-change', 'profileChange')->name('karyawan.profileChange');
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
        Route::get('/absensi', 'index')->name('data.absensi.index');
        Route::get('/absensi/today', 'absensiHariIni')->name('data.absensi.hariIni');
        Route::delete('/absensi/{id}', 'destroy')->name('absensi.destroy');
    });

    Route::controller(\App\Http\Controllers\Admin\PenggajianController::class)->group(function (){
        Route::get('/penggajian','create')->name('penggajian.index');
        Route::get('/penggajian/create','create')->name('penggajian.create');
        Route::get('/penggajian/create/form', 'formGaji')->name('penggajian.formGaji');
        Route::post('/penggajian/create/form', 'store')->name('penggajian.store');
        Route::get('/penggajian/cetak', 'cetakGaji')->name('penggajian.cetakGaji');
        Route::get('/penggajian/cetak-pdf/{nik}', 'cetakPDF')->name('penggajian.cetakPDF');
        Route::get('penggajian/rekap-gaji', 'rekapGaji')->name('penggajian.rekap');
    });

    Route::controller(UserController::class)->group(function (){
        Route::get('/users', 'index')->name('users.index');
        Route::post('/users', 'store')->name('users.store');
        Route::delete('users/{id}', 'destroy')->name('users.destroy');
    });

});

// Route only for karyawan
Route::middleware(['auth'])->group(function (){
   Route::controller(\App\Http\Controllers\AbsensiRecordController::class)->group(function (){
      Route::get('/absensi-karyawan', 'index')->name('absensi.index');
      Route::post('/absensi-karyawan', 'store');
   });

   Route::controller(\App\Http\Controllers\TimesheetRecordController::class)->group(function(){
      Route::get('/timesheet', 'index')->name('timesheet.index');
      Route::post('/timesheet', 'store')->name('timesheet.store');
      Route::get('/timesheet/{id}', 'show')->name('timesheet.show');
      Route::post('/timesheet/doRejected/{id}', 'doRejected')->name('timesheet.doRejected');
      Route::post('/timesheet/doAccepted/{id}', 'doAccepted')->name('timesheet.doAccepted');

   });

});

Route::middleware(['auth'])->group(function (){
   Route::controller(\App\Http\Controllers\ProfileController::class)->group(function (){
     Route::get('/profile', 'index')->name('profile.index');
     Route::put('/profile/change-image/{id}', 'profileImgUpdate')->name('profile.profileImgUpdate');
     Route::put('/profile/{id}', 'passwordUpdate')->name('profile.passwordUpdate');
   });
});
