<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CleaningService extends Model
{
    use HasFactory;
    protected $fillable = [
        'area', 'cleaning_time', 'employee_id', 'status'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
