<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceService extends Model
{
    use HasFactory;
    protected $fillable = [
        'maintenance_type', 'description', 'start_time', 'end_time', 'employee_id', 'status'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
