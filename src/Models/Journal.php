<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    protected $table = 'journals';

    protected $fillable = [
        'user_id',
        'date',
        'title',
        'content',
        'emotions',
        'achievements',
        'failures',
        'reflection',
        'plans',
    ];

    /**
     * Relasi ke pengguna.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}