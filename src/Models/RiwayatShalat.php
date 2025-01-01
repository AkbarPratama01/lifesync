<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatShalat extends Model
{
    protected $table = 'prayer_times'; // Nama tabel
    protected $fillable = ['user_id', 'date', 'fajr', 'dhuhr', 'asr', 'maghrib', 'isha']; // Kolom yang bisa diisi

    // Menambahkan kolom created_at dan updated_at otomatis
    public $timestamps = true;
}