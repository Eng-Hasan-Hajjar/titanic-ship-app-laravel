<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class FacebookPage extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'url', 'description', 'followers_count', 'category_id' , 'location','image'  ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function recommendations()
    {
        return MorphMany(Recommendation::class, 'recommendable');
    }
        // Define a query scope for filtering by category
        public function scopeCategory($query, $categoryId)
        {
            return $query->where('category_id', $categoryId);
        }

        // Define a query scope for filtering by minimum followers
        public function scopeMinFollowers($query, $minFollowers)
        {
            return $query->where('followers_count', '>=', $minFollowers);
        }

        // Define a query scope for filtering by maximum followers
        public function scopeMaxFollowers($query, $maxFollowers)
        {
            return $query->where('followers_count', '<=', $maxFollowers);
        }
}
