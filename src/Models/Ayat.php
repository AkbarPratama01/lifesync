<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ayat extends Model
{
    // Nama tabel
    protected $table = 'ayat';

    // Kolom yang dapat diisi
    protected $fillable = [
        'surat_id',
        'nomor',
        'teks_arab',
        'transliterasi',
        'terjemahan',
    ];

    /**
     * Relasi dengan model Surat
     * Banyak ayat milik satu surat
     */
    public function surat()
    {
        return $this->belongsTo(Surat::class, 'surat_id', 'id');
    }
}