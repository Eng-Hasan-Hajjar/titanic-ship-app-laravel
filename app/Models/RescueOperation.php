<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RescueOperation extends Model
{
    use HasFactory;
    protected $fillable = [
        'operation_type', 'location', 'description', 'initiated_by', 'passenger_ids', 'rescuer_ids', 'status', 'operation_time'
    ];

    protected $casts = [
        'passenger_ids' => 'array',  // تحويل الحقل إلى مصفوفة
        'rescuer_ids' => 'array',  // تحويل الحقل إلى مصفوفة
        'operation_time' => 'datetime',
    ];

    public function initiatedBy()
    {
        return $this->belongsTo(Passenger::class, 'initiated_by');
    }

    public function rescuers()
    {
        return $this->hasMany(Employee::class, 'rescuer_ids');
    }
}
