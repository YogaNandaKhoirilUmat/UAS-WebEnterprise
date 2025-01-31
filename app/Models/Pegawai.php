<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    /** @use HasFactory<\Database\Factories\PegawaiFactory> */
    use HasFactory;

    protected $table = 'pegawais';
    protected $fillable = [
        'id_pegawai',
        'nama_pegawai',
        'jabatan',
        'alamat',
        'no_hp',
        'user_id',
    ];
}
