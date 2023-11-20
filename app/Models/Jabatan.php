<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'jabatan';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'kode';
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kode',
        'nama',
        'gaji_pokok',
        'uang_makan',
        'uang_transport',
        'tunjangan_kesehatan',
    ];
}
