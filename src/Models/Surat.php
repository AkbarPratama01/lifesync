<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    // Nama tabel
    protected $table = 'surat';

    // Kolom yang dapat diisi
    protected $fillable = [
        'nomor',
        'nama',
        'asma',
        'arti',
        'type',
        'urut',
        'rukuk',
        'keterangan',
        'audio',
    ];

    /**
     * Relasi dengan model Ayat
     * Satu surat memiliki banyak ayat
     */
    public function ayat()
    {
        return $this->hasMany(Ayat::class, 'surat_id', 'id');
    }
}