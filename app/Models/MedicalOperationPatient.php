<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalOperationPatient extends Model
{
    use HasFactory;
    protected $table = 'medical_operation_patients';

    // تحديد الحقول التي يمكن تعبئتها
    protected $fillable = [
        'medical_operation_id',
        'passenger_id',
    ];

    // علاقة مع جدول MedicalOperation
    public function medicalOperation()
    {
        return $this->belongsTo(MedicalOperation::class, 'medical_operation_id');
    }

    // علاقة مع جدول Passenger (المرضى)
    public function passenger()
    {
        return $this->belongsTo(Passenger::class, 'passenger_id');
    }
    
}
