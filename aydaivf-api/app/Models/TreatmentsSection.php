<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TreatmentsSection extends Model
{
    protected $fillable = [
        'locale','title','subtitle','description','treatments','background','cta_text','cta_link'
    ];

    protected $casts = [
        'treatments' => 'array',
    ];
}
