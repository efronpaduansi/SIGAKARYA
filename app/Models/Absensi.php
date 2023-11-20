<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Karyawan;

class Absensi extends Model
{
    use HasFactory;
    protected $table = 'absensi';
    protected $primaryKey = 'id';

    protected $fillable  = [
        'nik_karyawan',
        'tanggal',
        'masuk',
        'pulang',
        'telat',
        'sk_masuk',
        'sk_pulang'
    ];

    public function belongsTo()
    {
        return $this->belongsTo(Karyawan::class, 'nik_karyawan', 'nik');
    }

}
