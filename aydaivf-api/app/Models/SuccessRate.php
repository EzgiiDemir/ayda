<?php
// app/Models/SuccessRate.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuccessRate extends Model
{
    protected $fillable = [
        'slug','name','group_key','group_title','rate','unit','note','position','published'
    ];
    protected $casts = [
        'name'=>'array','group_title'=>'array','note'=>'array',
        'rate'=>'decimal:2','position'=>'integer','published'=>'boolean'
    ];
}
