<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable = ['slug','title','content','sections','seo','published'];
    protected $casts = ['title'=>'array','content'=>'array','sections'=>'array','seo'=>'array','published'=>'bool'];
}
