<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users'; // Nama tabel
    protected $fillable = ['name', 'username', 'email', 'password']; // Kolom yang bisa diisi
}