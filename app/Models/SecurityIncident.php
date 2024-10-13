<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecurityIncident extends Model
{
    use HasFactory;
    protected $fillable = [
        'incident_type', 'location', 'description', 'reported_by', 'passenger_ids', 'employee_id', 'status', 'incident_time'
    ];

    protected $casts = [
        'passenger_ids' => 'array',  // تحويل الحقل إلى مصفوفة
        'incident_time' => 'datetime',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function reportedBy()
    {
        return $this->belongsTo(Passenger::class, 'reported_by');
    }
}
