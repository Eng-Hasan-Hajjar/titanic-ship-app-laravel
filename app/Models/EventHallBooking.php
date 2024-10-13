<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventHallBooking extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_hall_id', 'customer_id', 'event_type', 'start_time', 'end_time', 'total_price', 'status'
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    public function eventHall()
    {
        return $this->belongsTo(EventHall::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
