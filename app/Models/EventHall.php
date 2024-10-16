<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventHall extends Model
{
    use HasFactory;

    protected $fillable = ['hall_name', 'capacity', 'availability', 'price_per_hour', 'operating_hours', 'is_open'];

    // علاقة مع ميزات القاعة
    public function features()
    {
        return $this->hasMany(EventHallFeature::class);
    }

    // علاقة مع الحجوزات
    public function bookings()
    {
        return $this->hasMany(EventHallBooking::class);
    }
}
