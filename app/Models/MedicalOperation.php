<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalOperation extends Model
{
    use HasFactory;
    protected $fillable = ['operation_type', 'location', 'description',  'status', 'operation_time'];


      // علاقة مع الراكب الذي أبلغ عن الحالة
      public function initiator()
      {
          return $this->belongsTo(Passenger::class, 'initiated_by');
      }

      // علاقة many-to-many مع المرضى الذين يتلقون الرعاية
      public function patients()
      {
          return $this->belongsToMany(Passenger::class, 'medical_operation_patient');
      }

      // علاقة many-to-many مع العاملين الطبيين المسؤولين
      public function medicalStaff()
      {
          return $this->belongsToMany(Employee::class, 'medical_operation_staff');
      }
}
