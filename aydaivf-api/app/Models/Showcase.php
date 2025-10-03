<?php
// app/Models/Showcase.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Showcase extends Model
{
    protected $fillable = [
        'locale', 'image', 'position', 'published',
    ];
}
