<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    // Nama tabel
    protected $table = 'bookmarks';

    // Kolom yang dapat diisi
    protected $fillable = [
        'user_id',
        'surat_id',
    ];

    /**
     * Relasi dengan model User
     * Satu bookmark dimiliki oleh satu user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi dengan model Surat
     * Satu bookmark terkait dengan satu surat
     */
    public function surat()
    {
        return $this->belongsTo(Surat::class);
    }
}