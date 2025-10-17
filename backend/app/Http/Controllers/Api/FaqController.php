<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        $faqs = Faq::where('is_active', true)
            ->orderBy('order')
            ->get()
            ->map(fn($faq) => [
                'id' => $faq->id,
                'order' => $faq->order,
            ]);

        return response()->json([
            'success' => true,
            'data' => [
                'faqs' => $faqs,
                'heroImage' => env('APP_URL', 'http://localhost:8000') . '/uploads/elitebig_7bc1166778.jpg',
            ],
        ]);
    }
}
