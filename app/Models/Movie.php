<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'genre', 'duration', 'director', 'description',
    ];

    public function cinemas()
    {
        return $this->hasMany(Cinema::class, 'current_movie_id');
    }

    public function showTimes()
    {
        return $this->hasMany(ShowTime::class);
    }

    public function reviews()
    {
        return $this->hasMany(MovieReview::class);
    }
}
