<?php
// app/Http/Controllers/Api/TreatmentsSectionController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TreatmentsSection;
use Illuminate\Http\Request;

class TreatmentsSectionController extends Controller
{
    public function show(Request $req)
    {
        $lang = $req->query('lang', 'tr');

        $row = TreatmentsSection::where('locale', $lang)->first();
        if (!$row) {
            return response()->json(['message' => 'Not found'], 404);
        }

        return response()->json([
            'title'      => $row->title,
            'subtitle'   => $row->subtitle,
            'intro'      => $row->intro,
            'intro2'     => $row->intro2,
            'background' => $row->background,
            'ctaText'    => $row->cta_text,
            'ctaLink'    => $row->cta_link,
            'treatments' => collect($row->treatments ?: [])
                ->map(function ($t) {
                    return ['slug' => $t['slug'] ?? '', 'label' => $t['label'] ?? ''];
                })
                ->values(),
        ]);
    }
}
