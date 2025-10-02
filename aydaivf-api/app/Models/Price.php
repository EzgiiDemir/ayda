<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug','name','note','currency','amount','unit','position','published',
    ];

    protected $casts = [
        'name' => 'array',
        'note' => 'array',
        'published' => 'boolean',
    ];

    /** Yayında olanları pozisyona göre sırala */
    public function scopePublished($q) {
        return $q->where('published', true)->orderBy('position');
    }
}
