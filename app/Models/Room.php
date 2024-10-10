<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_number',
        'room_type',
        'is_occupied',
        'price',
        'capacity',
        'description'
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

}
