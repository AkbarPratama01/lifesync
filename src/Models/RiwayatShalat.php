<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatShalat extends Model
{
    protected $table = 'prayer_times'; // Nama tabel
    protected $fillable = ['user_id', 'date', 'fajr', 'dhuhr', 'asr', 'maghrib', 'isha']; // Kolom yang bisa diisi

    // Menambahkan kolom created_at dan updated_at otomatis
    public $timestamps = true;

    public static function updateShalatRecord($userId, $date, $shalat, $checked)
    {
        // Cari data shalat untuk user dan tanggal ini
        $riwayat = self::where('user_id', $userId)->where('date', $date)->first();

        if ($riwayat) {
            // Update hanya kolom shalat yang diubah
            $riwayat->update([$shalat => $checked]);
        } else {
            // Jika belum ada, buat entri baru dengan default "Tidak"
            self::create([
                'user_id' => $userId,
                'date' => $date,
                'fajr' => ($shalat == "fajr") ? $checked : "Tidak",
                'dhuhr' => ($shalat == "dhuhr") ? $checked : "Tidak",
                'asr' => ($shalat == "asr") ? $checked : "Tidak",
                'maghrib' => ($shalat == "maghrib") ? $checked : "Tidak",
                'isha' => ($shalat == "isha") ? $checked : "Tidak",
            ]);
        }
    }

}