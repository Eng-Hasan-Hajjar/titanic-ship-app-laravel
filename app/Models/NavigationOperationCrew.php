<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NavigationOperationCrew extends Model
{
    use HasFactory;
    protected $table = 'navigation_operation_crews';

    // تحديد الحقول التي يمكن تعبئتها
    protected $fillable = [
        'navigation_operation_id',
        'employee_id',
    ];

    // علاقة مع جدول NavigationOperation
    public function navigationOperation()
    {
        return $this->belongsTo(NavigationOperation::class, 'navigation_operation_id');
    }

    // علاقة مع جدول Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
