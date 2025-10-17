<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    protected $fillable = [
        'slug',
        'order',
        'is_active',
        'locale',
        'background_logo',
        'treatments',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'treatments' => 'array',

    ];
}
