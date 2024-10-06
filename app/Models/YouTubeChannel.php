<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YouTubeChannel extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'url', 'description', 'subscribers_count', 'category_id', 'location','image' ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function recommendations()
    {
        return morphMany(Recommendation::class, 'recommendable');
    }
}
