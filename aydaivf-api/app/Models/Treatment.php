<?php
// app/Models/Treatment.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    protected $fillable = [
        'slug','title','excerpt','content','sections','hero_image',
        'meta_title','meta_description','position','published'
    ];
    protected $casts = [
        'title'=>'array','excerpt'=>'array','content'=>'array','sections'=>'array',
        'meta_title'=>'array','meta_description'=>'array',
        'position'=>'integer','published'=>'boolean'
    ];
}
