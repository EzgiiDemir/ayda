<?php
// app/Models/TravelGuide.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TravelGuide extends Model
{
    protected $fillable = ['category','title','html','icon','link','position','published'];
    protected $casts = [
        'category' => 'array',
        'title'    => 'array',
        'html'     => 'array',
        'published'=> 'boolean',
    ];
}
