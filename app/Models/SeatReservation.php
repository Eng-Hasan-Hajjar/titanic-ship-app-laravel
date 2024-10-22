<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeatReservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'show_time_id', 'passenger_id', 'seat_number', 'is_confirmed',
    ];

    public function showTime()
    {
        return $this->belongsTo(ShowTime::class);
    }

    public function passenger()
    {
        return $this->belongsTo(Passenger::class);
    }
}
