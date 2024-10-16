<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecurityIncident extends Model
{
    use HasFactory;


    protected $fillable = ['incident_type', 'location', 'description',  'employee_id', 'status', 'incident_time'];



    // علاقة مع الموظف الذي يتعامل مع الحادث
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    // علاقة مع الركاب المتورطين في الحادث
    public function passengers()
    {
        return $this->belongsToMany(Passenger::class, 'security_incident_passengers');
    }
}
