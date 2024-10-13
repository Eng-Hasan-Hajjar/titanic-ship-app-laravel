<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalOperation extends Model
{
    use HasFactory;
    protected $fillable = [
        'operation_type', 'location', 'description', 'initiated_by', 'patient_ids', 'medical_staff_ids', 'status', 'operation_time'
    ];

    protected $casts = [
        'patient_ids' => 'array',  // تحويل الحقل إلى مصفوفة
        'medical_staff_ids' => 'array',  // تحويل الحقل إلى مصفوفة
        'operation_time' => 'datetime',
    ];

    public function initiatedBy()
    {
        return $this->belongsTo(Passenger::class, 'initiated_by');
    }

    public function medicalStaff()
    {
        return $this->hasMany(Employee::class, 'medical_staff_ids');
    }
}
