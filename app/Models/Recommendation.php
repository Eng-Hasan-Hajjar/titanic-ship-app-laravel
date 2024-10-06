<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'product_id', 'recommendable_id', 'recommendable_type'];

    public function recommendable()
    {
        return $this->morphTo();
    }

    // You might want to add relationships with User and Product models
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
