<?php

namespace App\Models;

use App\Models\Jabatan;
use App\Models\Karyawan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pinjaman extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pinjaman';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'no_pinjaman';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_pinjaman',
        'nik_karyawan',
        'kode_jabatan',
        'tanggal_pinjam',
        'jumlah',
        'jangka_waktu',
        'angsuran',
        'status'
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'nik_karyawan', 'nik');
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'kode_jabatan', 'kode');
    }

}
