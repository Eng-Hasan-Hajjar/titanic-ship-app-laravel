<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'capacity',
        'cuisine_type',
        'opening_hours',
        'is_open'
    ];

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

    public function foodOrders()
    {
        return $this->hasMany(FoodOrder::class);
    }
}
