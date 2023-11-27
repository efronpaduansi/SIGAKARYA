<?php

namespace App\Models;
use App\Models\Karyawan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{
    use HasFactory;

    protected $table = 'timesheet';

    protected $fillable = [
        'nik_karyawan',
        'subjek',
        'jenis',
        'jumlah_hari',
        'dari_tgl',
        'sampai_tgl',
        'keterangan',
        'file_lampiran'
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'nik_karyawan', 'nik');
    }
}
