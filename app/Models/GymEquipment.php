<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GymEquipment extends Model
{
    use HasFactory;
    protected $fillable = ['gym_id', 'equipment_name', 'condition'];

    // علاقة مع الصالة الرياضية
    public function gym()
    {
        return $this->belongsTo(Gym::class);
    }
}
