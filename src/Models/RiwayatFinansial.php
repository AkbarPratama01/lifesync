<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatFinansial extends Model
{
    protected $table = 'financial_records'; // Nama tabel
    protected $fillable = ['user_id', 'date', 'description', 'category', 'type', 'nominal']; // Kolom yang bisa diisi

    // Menambahkan kolom created_at dan updated_at otomatis
    public $timestamps = true;
}