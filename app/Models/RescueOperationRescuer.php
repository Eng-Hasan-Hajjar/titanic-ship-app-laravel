<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RescueOperationRescuer extends Model
{
    use HasFactory;

    protected $table = 'rescue_operation_rescuers';

    // تحديد الحقول التي يمكن تعبئتها
    protected $fillable = [
        'rescue_operation_id',
        'employee_id',
        'is_rescuer',
    ];

    // علاقة مع جدول RescueOperation
    public function rescueOperation()
    {
        return $this->belongsTo(RescueOperation::class, 'rescue_operation_id');
    }

    // علاقة مع جدول Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

}
