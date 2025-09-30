<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class PageController extends Controller
{
    public function home(Request $req): JsonResponse
    {
        $lang = $req->query('lang','tr');
        return response()->json([
            'heroTitle' => $lang === 'tr'
                ? "Gelin size sahip olabileceğiniz\nen güzel hediyeyi verelim"
                : "Let us give you the most beautiful gift",
            'intro' => $lang === 'tr'
                ? "Kuzey Kıbrıs Lefkoşa’nın merkezinde bulunan kliniğimiz..."
                : "Our clinic in the heart of Nicosia, Northern Cyprus...",
            'featured' => $lang === 'tr'
                ? [
                    ['slug' => 'tedaviler/tupbebekivf', 'name' => 'Tüp Bebek (IVF) - ICSI'],
                    ['slug' => 'tedaviler/yumurtadonasyonu', 'name' => 'Yumurta Donasyonu'],
                ]
                : [
                    ['slug' => 'treatments/ivf-icsi', 'name' => 'IVF - ICSI'],
                    ['slug' => 'treatments/egg-donation', 'name' => 'Egg Donation'],
                ],
        ]);
    }
}
