<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Customer extends Model
{
    use HasFactory;

    // الحقول القابلة للتعبئة في النموذج
    protected $fillable = [
        'user_id',
        'phone',
        'work',
        'nationality',
        'current_location',
        'gender',
        'birthday',
        'check_in_time',  // إضافة حقل وقت تسجيل الدخول
        'check_out_time'  // إضافة حقل وقت تسجيل الخروج
    ];

    // الحقول التي يتم تحويلها إلى تواريخ
    protected $dates = ['birthday'];

    // علاقة الزبون بالمستخدم (User)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // علاقة الزبون بطلبات الطعام (FoodOrder)
    public function foodOrders()
    {
        return $this->hasMany(FoodOrder::class);
    }
}
