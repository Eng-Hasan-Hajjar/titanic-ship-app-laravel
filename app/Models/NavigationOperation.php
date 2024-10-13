<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NavigationOperation extends Model
{
    use HasFactory;
    protected $fillable = [
        'route_name', 'start_location', 'end_location', 'current_position', 'crew_in_charge', 'weather_conditions', 'navigation_status', 'start_time', 'estimated_arrival'
    ];

    protected $casts = [
        'crew_in_charge' => 'array',  // تحويل الحقل إلى مصفوفة
        'start_time' => 'datetime',
        'estimated_arrival' => 'datetime',
    ];

    public function crewInCharge()
    {
        return $this->hasMany(Employee::class, 'crew_in_charge');
    }
}
