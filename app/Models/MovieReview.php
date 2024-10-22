<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_id', 'passenger_id', 'rating', 'review',
    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function passenger()
    {
        return $this->belongsTo(Passenger::class);
    }
}
