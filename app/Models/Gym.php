<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'capacity', 'opening_hours', 'is_open'];

    // علاقة مع المعدات الرياضية
    public function equipment()
    {
        return $this->hasMany(GymEquipment::class);
    }

    // علاقة مع الحجوزات
    public function bookings()
    {
        return $this->hasMany(GymBooking::class);
    }
}
