<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Welcome extends Model
{
protected $fillable = [
'locale',
'image',
'gradient',
];

protected $casts = [
'image' => 'array',
'gradient' => 'array',
];
}
