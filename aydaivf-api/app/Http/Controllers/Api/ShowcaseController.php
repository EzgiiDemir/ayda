<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Showcase;
use Illuminate\Http\Request;

class ShowcaseController extends Controller
{
    public function index(Request $req)
    {
        $lang = $req->query('lang', 'tr');

        $items = Showcase::query()
            ->where('locale', $lang)
            ->where('published', true)
            ->orderBy('position')
            ->get(['image']);

        // 1 adet varsa obje, birden fazla ise dizi döndür (frontend’in iki şekli de destekli)
        if ($items->count() === 1) {
            return response()->json(['image' => $items->first()->image]);
        }
        return response()->json($items->map(function ($r) {
            return ['image' => $r->image];
        })->values());
    }
}
