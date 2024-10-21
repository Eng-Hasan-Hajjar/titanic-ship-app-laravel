<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalOperationStaff extends Model
{
    use HasFactory;
    protected $table = 'medical_operation_staff';

    // تحديد الحقول التي يمكن تعبئتها
    protected $fillable = [
        'medical_operation_id',
        'employee_id',
    ];

    // علاقة مع جدول MedicalOperation
    public function medicalOperation()
    {
        return $this->belongsTo(MedicalOperation::class, 'medical_operation_id');
    }

    // علاقة مع جدول Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
