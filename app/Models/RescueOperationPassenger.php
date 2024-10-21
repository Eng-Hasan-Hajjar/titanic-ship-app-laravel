<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RescueOperationPassenger extends Model
{
    use HasFactory;
    protected $table = 'rescue_operation_passengers';

    // تحديد الحقول التي يمكن تعبئتها
    protected $fillable = [
        'rescue_operation_id',
        'passenger_id',
    ];

    // علاقة مع جدول RescueOperation
    public function rescueOperation()
    {
        return $this->belongsTo(RescueOperation::class, 'rescue_operation_id');
    }

    // علاقة مع جدول Passenger
    public function passenger()
    {
        return $this->belongsTo(Passenger::class, 'passenger_id');
    }

}
