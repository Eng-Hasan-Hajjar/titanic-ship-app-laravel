<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NavigationOperation extends Model
{
    use HasFactory;
    protected $fillable = [
        'route_name', 'start_location', 'end_location', 'current_position',
        'weather_conditions', 'navigation_status', 'start_time', 'estimated_arrival'
    ];

    // علاقة many-to-many مع الطاقم المسؤول عن الملاحة
    public function crew()
    {
        return $this->belongsToMany(Employee::class, 'navigation_operation_crew');
    }
}
