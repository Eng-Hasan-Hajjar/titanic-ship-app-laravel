<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GymBooking extends Model
{
    use HasFactory;
    protected $fillable = [
        'gym_id', 'customer_id', 'start_time', 'end_time', 'status'
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    public function gym()
    {
        return $this->belongsTo(Gym::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
