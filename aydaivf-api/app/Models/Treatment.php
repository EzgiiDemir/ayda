<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;
    protected $fillable = ['slug','title','content','meta','published'];
    protected $casts = ['title'=>'array','content'=>'array','meta'=>'array','published'=>'bool'];
}
