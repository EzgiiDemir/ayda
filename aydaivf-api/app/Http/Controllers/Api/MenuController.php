<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function main(Request $req)
    {
        $lang = $req->query('lang','tr');

        // İhtiyaç olursa DB’den okuyacak hâle getirebilirsin.
        // Şimdilik sabit JSON (TR/EN).
        if ($lang === 'en') {
            return response()->json([
                'brand' => 'Ayda IVF',
                'items' => [
                    ['href' => '/en', 'label' => 'Home'],
                    ['href' => '/en/about', 'label' => 'About'],
                    ['href' => '/en/travel', 'label' => 'Travel'],
                    ['href' => '/en/faq', 'label' => 'FAQ'],
                    ['href' => '/en/contact', 'label' => 'Contact'],
                ],
                'treatments' => [
                    ['href' => '/en/treatments/ivf-icsi', 'label' => 'IVF - ICSI'],
                    ['href' => '/en/treatments/egg-donation', 'label' => 'Egg Donation'],
                ],
            ]);
        }

        return response()->json([
            'brand' => 'Ayda IVF',
            'items' => [
                ['href' => '/tr', 'label' => 'Anasayfa'],
                ['href' => '/tr/hakkimizda', 'label' => 'Hakkımızda'],
                ['href' => '/tr/seyahat', 'label' => 'Seyahat'],
                ['href' => '/tr/sss', 'label' => 'SSS'],
                ['href' => '/tr/iletisim', 'label' => 'İletişim'],
            ],
            'treatments' => [
                ['href' => '/tr/tedaviler/tupbebekivf', 'label' => 'Tüp Bebek (IVF) - ICSI'],
                ['href' => '/tr/tedaviler/yumurtadonasyonu', 'label' => 'Yumurta Donasyonu'],
            ],
        ]);
    }
}
