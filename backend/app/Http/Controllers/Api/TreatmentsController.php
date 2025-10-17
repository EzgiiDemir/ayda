<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Treatment;
use Illuminate\Http\Request;

class TreatmentsController extends Controller
{
    // Public: Frontend için
    public function index(Request $request)
    {
        $locale = $request->get('locale', 'tr');
        $treatment = Treatment::where('locale', $locale)->first();

        if (!$treatment) {
            $treatment = Treatment::where('locale', 'tr')->first();
        }

        return response()->json([
            'success' => true,
            'data' => $treatment
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'locale' => 'required|string|size:2',
            'background_logo' => 'nullable|string',
            'treatments' => 'required|array',
            'treatments.*.id' => 'required|string',
            'treatments.*.href' => 'required|string',
            'treatments.*.label' => 'required|string',
            'treatments.*.order' => 'nullable|integer',
            'treatments.*.isActive' => 'boolean',
        ]);

        $treatment = Treatment::updateOrCreate(
            ['locale' => $validated['locale']],
            $validated
        );

        return response()->json([
            'success' => true,
            'message' => 'Treatments section güncellendi',
            'data' => $treatment
        ]);
    }
}
