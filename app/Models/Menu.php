<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price'];

    public function foodOrders()
    {
        return $this->hasMany(FoodOrder::class);
    }
}
