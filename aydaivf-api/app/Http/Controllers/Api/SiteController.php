<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Footer;

class SiteController extends Controller
{
    /**
     * GET /api/footer?lang=tr|en
     * Frontend FooterDTO şemasına uygun JSON döner.
     */
    public function footer(Request $req)
    {
        // Dil paramı şimdilik depoda alan bazlı kullanılmıyor; yine de kabul ediyoruz.
        $lang = $req->query('lang', 'tr');

        $rec = Footer::query()->first(); // tek kayıt

        if ($rec) {
            return response()->json([
                'address_icon'      => $rec->address_icon ?? '',
                'address_title'     => (string)($rec->address_title ?? ''),
                'address_text'      => (string)($rec->address_text ?? ''),
                'contact_icon'      => $rec->contact_icon ?? '',
                'contact_title'     => (string)($rec->contact_title ?? ''),
                'phone'             => (string)($rec->phone ?? ''),
                'email'             => (string)($rec->email ?? ''),
                'socials'           => array_map(function ($s) {
                    return [
                        'platform' => $s['platform'] ?? '',
                        'url'      => $s['url'] ?? '#',
                    ];
                }, is_array($rec->socials) ? $rec->socials : []),
                'quicklinks'        => array_map(function ($q) {
                    return [
                        'label' => $q['label'] ?? '',
                        'href'  => $q['href'] ?? '#',
                    ];
                }, is_array($rec->quicklinks) ? $rec->quicklinks : []),
                'address_badge'     => $rec->address_badge ?? null, // /uploads veya tam URL
                'footer_badge'      => $rec->footer_badge ?? null,  // data: veya URL
                'footer_badge_href' => $rec->footer_badge_href ?? null, // modelde yoksa nullable
                'copyright'         => (string)($rec->copyright ?? ''),
            ]);
        }

        // DB boşsa zarif bir varsayılan (200)
        return response()->json([
            'address_icon'      => '/uploads/map_white.svg',
            'address_title'     => $lang === 'tr' ? 'Adresimiz' : 'Address',
            'address_text'      => '—',
            'contact_icon'      => '/uploads/phone_white.svg',
            'contact_title'     => $lang === 'tr' ? 'İletişim' : 'Contact',
            'phone'             => '',
            'email'             => '',
            'socials'           => [
                ['platform' => 'instagram', 'url' => '#'],
                ['platform' => 'facebook',  'url' => '#'],
            ],
            'quicklinks'        => [
                ['label' => $lang === 'tr' ? 'Anasayfa' : 'Home',   'href' => $lang === 'tr' ? '/tr' : '/en'],
                ['label' => $lang === 'tr' ? 'İletişim' : 'Contact','href' => $lang === 'tr' ? '/tr/iletisim' : '/en/contact'],
            ],
            'address_badge'     => null,
            'footer_badge'      => null,
            'footer_badge_href' => null,
            'copyright'         => '© 2025',
        ]);
    }
}
