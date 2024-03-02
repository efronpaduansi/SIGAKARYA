<?php

namespace App\Models;

use App\Models\Jabatan;
use App\Models\Pinjaman;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Karyawan extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'karyawan';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'nik';
    public $incrementing = false;

    protected $fillable = [
        'nik',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'tahun_masuk',
        'agama',
        'telepon',
        'email',
        'rekening',
        'nama_rekening',
        'alamat',
        'pendidikan_terakhir',
        'npwp',
        'status_pernikahan',
        'kode_jabatan',
        'picture_path',
    ];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'kode_jabatan', 'kode');
    }

    public function pinjaman()
    {
        return $this->hasMany(Pinjaman::class);
    }

}
