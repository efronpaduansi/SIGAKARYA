<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Karyawan;
use App\Models\User;

class Absensi extends Model
{
    use HasFactory;
    protected $table = 'absensi';
    protected $primaryKey = 'id';

    protected $fillable  = [
        'nik_karyawan',
        'user_id',
        'tanggal',
        'keterangan',
        'telat',
        'sk_masuk',
        'sk_pulang'
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'nik_karyawan', 'nik');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
