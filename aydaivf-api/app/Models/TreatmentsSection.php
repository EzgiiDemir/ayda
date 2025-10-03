<?php
// app/Models/TreatmentsSection.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TreatmentsSection extends Model
{
    protected $table = 'treatments_sections';

    protected $fillable = [
        'locale', 'title', 'subtitle', 'intro', 'intro2', 'background',
        'cta_text', 'cta_link', 'treatments',
    ];

    protected $casts = [
        'treatments' => 'array',
    ];

    public $timestamps = true;
}
