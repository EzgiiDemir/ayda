<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TreatmentsSection;
use Illuminate\Http\Request;

class TreatmentsSectionController extends Controller
{
    public function index(Request $req)
    {
        $locale = $req->query('lang', 'tr');
        $section = DB::table('treatments_sections')->where('locale', $locale)->first();

        if (!$section) {
            return response()->json(['error' => 'Not found'], 404);
        }

        return response()->json([
            'title' => $section->title,
            'subtitle' => $section->subtitle,
            'intro' => $section->intro,
            'intro2' => $section->intro2,
            'background' => $section->background, // ✅ arka plan
            'ctaText' => $section->ctaText,
            'ctaLink' => $section->ctaLink,
            'treatments' => json_decode($section->treatments, true),
        ]);
    }
    public function show(Request $req)
    {
        $lang = $req->query('lang','tr');
        $section = TreatmentsSection::where('locale',$lang)->first();

        if(!$section){
            return response()->json([
                'error'=>'not_found'
            ],404);
        }

        return response()->json($section);
    }
}
