<?php
// app/Models/Page.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'slug',
        'title',            // json
        'content',          // json (HTML içerebilir)
        'sections',         // json [{heading, html}]
        'hero_image',       // string
        'meta_title',       // json
        'meta_description', // json
    ];

    protected $casts = [
        'title'            => 'array',
        'content'          => 'array',
        'sections'         => 'array',
        'meta_title'       => 'array',
        'meta_description' => 'array',
    ];
}
