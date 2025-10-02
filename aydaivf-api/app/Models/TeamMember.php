<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
protected $fillable = ['slug','name','role','bio','image','position','published'];

protected $casts = [
'name'      => 'array',
'role'      => 'array',
'bio'       => 'array',
'position'  => 'integer',
'published' => 'boolean',
];
}
