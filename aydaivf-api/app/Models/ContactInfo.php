<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    protected $fillable = [
        'address_title','address_text','workhours','phone','email','whatsapp_url','socials','map_url','map_embed'
    ];
    protected $casts = [
        'address_title'=>'array','address_text'=>'array','workhours'=>'array','socials'=>'array',
    ];
}
