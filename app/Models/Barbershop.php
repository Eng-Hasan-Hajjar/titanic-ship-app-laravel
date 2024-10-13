<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barbershop extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'capacity', 'services', 'opening_hours', 'is_open'
    ];

    protected $casts = [
        'services' => 'array',  // تحويل الحقل إلى مصفوفة
    ];

    // علاقة مع الحجوزات (سنقوم بإنشائها لاحقًا)
    public function bookings()
    {
        return $this->hasMany(BarbershopBooking::class);
    }
}
