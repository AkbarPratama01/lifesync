<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
  protected $table = 'goals';

  protected $fillable = [
    'user_id',
    'text',
    'year',
    'is_completed',
  ];

  /**
   * Relasi ke pengguna.
   */
  public function user()
  {
      return $this->belongsTo(User::class, 'user_id');
  }
}