<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'role',
        'email',
        'phone_number',
        'hire_date',
        'salary'
    ];

  // علاقة الزبون بالمستخدم (User)
  public function user(): BelongsTo
  {
      return $this->belongsTo(User::class);
  }

      // علاقة many-to-many مع عمليات الإنقاذ
      public function rescueOperations()
      {
          return $this->belongsToMany(RescueOperation::class, 'rescue_operation_rescuer');
      }
        // علاقة many-to-many مع عمليات الملاحة
    public function navigationOperations()
    {
        return $this->belongsToMany(NavigationOperation::class, 'navigation_operation_crew');
    }

    // علاقة many-to-many مع العمليات الطبية
    public function medicalOperations()
    {
        return $this->belongsToMany(MedicalOperation::class, 'medical_operation_staff');
    }
}
