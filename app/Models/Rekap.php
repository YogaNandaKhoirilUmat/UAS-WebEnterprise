<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekap extends Model
{
    /** @use HasFactory<\Database\Factories\RekapFactory> */
    use HasFactory;
    protected $table = 'rekaps';
    protected $primaryKey = 'id_rekap';  // Tentukan kolom primary key yang benar
    public $timestamps = true;  // Gunakan created_at dan updated_at
    protected $fillable = [
        'id_rekap',
        'nama_proyek',
        'tanggal',
        'keterangan',
        'kredit',
        'debit',
        'saldo',
        'image',
        'user_id'
    ];

}
