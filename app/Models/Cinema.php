<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'seating_capacity', 'screen_size', 'current_movie', 'show_times', 'is_open'
    ];

    protected $casts = [
        'show_times' => 'array',  // تحويل الحقل إلى مصفوفة
    ];
}
