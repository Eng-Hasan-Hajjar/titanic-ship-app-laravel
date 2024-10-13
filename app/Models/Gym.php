<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'capacity', 'equipment', 'opening_hours', 'is_open'
    ];

    protected $casts = [
        'equipment' => 'array',  // تحويل الحقل إلى مصفوفة
    ];

    // علاقة مع الحجوزات (سنقوم بإنشائها لاحقًا)
    public function bookings()
    {
        return $this->hasMany(GymBooking::class);
    }
}
