<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RescueOperation extends Model
{
    use HasFactory;
    protected $fillable = ['operation_type', 'location', 'description',  'status', 'operation_time'];

 

    // علاقة many-to-many مع الركاب الذين يتم إنقاذهم
    public function passengers()
    {
        return $this->belongsToMany(Passenger::class, 'rescue_operation_passenger');
    }

    // علاقة many-to-many مع الموظفين المسؤولين عن عملية الإنقاذ
    public function rescuers()
    {
        return $this->belongsToMany(Employee::class, 'rescue_operation_rescuer');
    }
}
