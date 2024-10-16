<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'phone',
        'work',

        'nationality',
        'current_location',
        'gender',
        'birthday',

    ];
    protected $dates = ['birthday'];


       // علاقة many-to-many مع عمليات الإنقاذ
       public function rescueOperations()
       {
           return $this->belongsToMany(RescueOperation::class, 'rescue_operation_passenger');
       }
        // علاقة many-to-many مع العمليات الطبية
    public function medicalOperations()
    {
        return $this->belongsToMany(MedicalOperation::class, 'medical_operation_patient');
    }
}
