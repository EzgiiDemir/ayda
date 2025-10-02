<?php
// app/Models/Faq.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = ['category','question','answer','position','published'];
    protected $casts = [
        'category' => 'array',
        'question' => 'array',
        'answer'   => 'array',
        'published'=> 'boolean',
    ];
}
