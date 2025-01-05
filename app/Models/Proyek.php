<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    /** @use HasFactory<\Database\Factories\ProyekFactory> */
    use HasFactory;
    protected $table = 'proyeks';
    protected $fillable =
    [
        'nama_proyek',
        'deskripsi',
        'tanggal_mulai',
        'tanggal_selesai',
        'status_proyek',
        'lokasi',
        'image',
        'created_at',
        'updated_at',
        'user_id',
    ];
}
