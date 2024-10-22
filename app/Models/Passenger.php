<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',  'phone', 'work','nationality', 'current_location',  'gender', 'birthday',
        'check_in_time',  // إضافة حقل وقت تسجيل الدخول
        'check_out_time'  // إضافة حقل وقت تسجيل الخروج

    ];
    protected $dates = ['birthday', 'check_in_time', 'check_out_time'];


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

    public function movieReviews()
    {
        return $this->hasMany(MovieReview::class);
    }
    public function seatReservations()
    {
        return $this->hasMany(SeatReservation::class);
    }
}
