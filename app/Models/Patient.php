<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
  use HasUuids;

  protected $fillable = [
    'user_id',
    'medium_acquisition'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
