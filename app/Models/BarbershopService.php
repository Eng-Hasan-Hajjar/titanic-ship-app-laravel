<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarbershopService extends Model
{
    use HasFactory;
    protected $fillable = ['barbershop_id', 'service_name', 'price'];

    // علاقة مع محلات الحلاقة
    public function barbershop()
    {
        return $this->belongsTo(Barbershop::class);
    }
}
