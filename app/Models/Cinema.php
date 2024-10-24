<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'seating_capacity', 'screen_size', 'current_movie_id', 'is_open',
    ];

    public function currentMovie()
    {
        return $this->belongsTo(Movie::class, 'current_movie_id');
    }

    public function showTimes()
    {
        return $this->hasMany(ShowTime::class);
    }
}
