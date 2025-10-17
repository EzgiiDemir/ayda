<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    // Public: Frontend için
    public function index(Request $request)
    {
        $locale = $request->get('locale', 'tr');
        $hero = Hero::where('locale', $locale)->first();

        if (!$hero) {
            $hero = Hero::where('locale', 'tr')->first();
        }

        return response()->json([
            'success' => true,
            'data' => [
                'slides'          => $hero->slides ?? [],
                'rightText'       => $hero->right_text ?? null,
                'bottomText'      => $hero->bottom_text ?? null,
                'dotsPattern'     => $hero->dots_pattern ?? null,
                'autoPlay'        => (bool) $hero->auto_play,
                'autoPlayInterval'=> $hero->auto_play_interval,
                'showIndicators'  => (bool) $hero->show_indicators,
                'showControls'    => (bool) $hero->show_controls,
                'showCounter'     => (bool) $hero->show_counter,
                'mobileHeight'    => $hero->mobile_height,
                'desktopHeight'   => $hero->desktop_height,
                'meta'            => $hero->meta,
            ]
        ]);

    }

    // Admin: Güncelleme
    public function update(Request $request)
    {
        $validated = $request->validate([
            'locale' => 'required|string|size:2',
            'slides' => 'required|array',
            'slides.*.image' => 'required|array',
            'slides.*.image.url' => 'required|string',
            'slides.*.image.alt' => 'nullable|string',
            'dots_pattern' => 'nullable|string',
            'auto_play' => 'boolean',
            'auto_play_interval' => 'integer|min:1000',
            'show_indicators' => 'boolean',
        ]);

        $hero = Hero::updateOrCreate(
            ['locale' => $validated['locale']],
            $validated
        );

        return response()->json([
            'success' => true,
            'message' => 'Hero section güncellendi',
            'data' => $hero
        ]);
    }
}


