<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'key','slug','brand','brand_logo','whatsapp_url','colors','items',
    ];
    protected $casts = [
        'colors' => 'array',
        'items'  => 'array',
    ];
}
