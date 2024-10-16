<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'seating_capacity', 'screen_size', 'current_movie', 'is_open'
    ];

    // علاقة one-to-many مع أوقات العروض
    public function showTimes()
    {
        return $this->hasMany(ShowTime::class);
    }
}
