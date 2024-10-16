<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventHallFeature extends Model
{
    use HasFactory;
    protected $fillable = ['event_hall_id', 'feature_name'];

    // علاقة مع القاعة
    public function eventHall()
    {
        return $this->belongsTo(EventHall::class);
    }
}
