<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShowTime extends Model
{
    use HasFactory;
    protected $fillable = [
        'cinema_id', 'show_time'
    ];

    // علاقة many-to-one مع السينما
    public function cinema()
    {
        return $this->belongsTo(Cinema::class);
    }
}
