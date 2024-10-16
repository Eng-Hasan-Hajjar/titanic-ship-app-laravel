<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecurityIncidentPassenger extends Model
{
    use HasFactory;

    protected $fillable = ['security_incident_id', 'passenger_id'];

    // علاقة مع الحادث الأمني
    public function securityIncident()
    {
        return $this->belongsTo(SecurityIncident::class);
    }

    // علاقة مع الراكب
    public function passenger()
    {
        return $this->belongsTo(passenger::class);
    }
}
