<?php
// app/Models/Welcome.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Welcome extends Model
{
    protected $fillable = [
        'locale','subtitle','title','content','image','ceo_name','ceo_title'
    ];
    protected $casts = [];
}
