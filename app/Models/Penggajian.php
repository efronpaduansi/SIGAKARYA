<?php

namespace App\Models;

use App\Models\Karyawan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penggajian extends Model
{
    use HasFactory;

    protected $table = 'penggajian';

    protected $fillable = [
        'bulan',
        'nik_karyawan',
        'gaji_awal',
        'tunjangan_jabatan',
        'tunjangan_makan',
        'tunjangan_transport',
        'total_tunjangan',
        'tunjangan_bpjs',
        'potongan_bpjs',
        'pph',
        'pph_per_thn',
        'pph_per_bln',
        'gaji_netto'
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'nik_karyawan', 'nik');
    }

}
