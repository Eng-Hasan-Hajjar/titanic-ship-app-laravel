<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barbershop extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'capacity', 'opening_hours', 'is_open'];

    // علاقة مع الخدمات
    public function services()
    {
        return $this->hasMany(BarbershopService::class);
    }

    // علاقة مع الحجوزات
    public function bookings()
    {
        return $this->hasMany(BarbershopBooking::class);
    }
}
