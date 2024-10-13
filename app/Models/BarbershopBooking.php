<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarbershopBooking extends Model
{
    use HasFactory;
    protected $fillable = [
        'barbershop_id', 'customer_id', 'start_time', 'end_time', 'status'
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    public function barbershop()
    {
        return $this->belongsTo(Barbershop::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
