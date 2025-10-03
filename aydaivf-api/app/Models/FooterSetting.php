<?php
// app/Models/FooterSetting.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FooterSetting extends Model
{
    protected $table = 'footer_settings';
    protected $guarded = [];
    protected $casts = [
        'address_title' => 'array',
        'address_text' => 'array',
        'contact_title' => 'array',
        'socials' => 'array',
        'quicklinks' => 'array',
        'copyright' => 'array',
    ];
}
