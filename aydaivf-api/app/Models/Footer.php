<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    protected $table = 'footers';

    protected $casts = [
        'socials'    => 'array',
        'quicklinks' => 'array',
    ];

    protected $fillable = [
        'address_icon','address_title','address_text',
        'contact_icon','contact_title','phone','email',
        'socials','quicklinks','copyright',
        'address_badge','footer_badge',
    ];
}
