<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventHall extends Model
{
    use HasFactory;
    protected $fillable = [
        'hall_name', 'capacity', 'availability', 'features', 'price_per_hour', 'operating_hours', 'is_open'
    ];

    protected $casts = [
        'features' => 'array',  // تحويل الحقل إلى مصفوفة
    ];

    // علاقة مع الحجوزات
    public function bookings()
    {
        return $this->hasMany(EventHallBooking::class);
    }
}
