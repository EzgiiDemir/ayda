<?php
// app/Models/WhyUsItem.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyUsItem extends Model
{
    protected $fillable = [
        'slug','locale','title','text','image','aspect','max_height','position','published'
    ];
    protected $casts = [
        'title' => 'array',
        'text'  => 'array',
        'published' => 'boolean',
    ];
}
