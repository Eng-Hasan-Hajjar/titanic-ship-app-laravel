<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SportsField extends Model
{
    use HasFactory;
    protected $fillable = [
        'field_name', 'field_type', 'capacity', 'availability', 'operating_hours', 'is_open'
    ];

}
