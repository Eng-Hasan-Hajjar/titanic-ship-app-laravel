<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function facebookPages()
    {
        return $this->hasMany(FacebookPage::class);
    }

    public function instagramAccounts()
    {
        return $this->hasMany(InstagramAccount::class);
    }

    public function youtubeChannels()
    {
        return $this->hasMany(YouTubeChannel::class);
    }
    
}
