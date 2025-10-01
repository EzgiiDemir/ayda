<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WelcomeSection extends Model
{
    protected $fillable = [
        'locale','image','title','subtitle','content','ceo_name','ceo_title'
    ];
}
