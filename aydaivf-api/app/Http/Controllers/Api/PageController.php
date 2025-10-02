<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Treatment;
use Illuminate\Http\Request;

class PageController extends Controller
{
    private function pick(?array $bag, string $lang) {
        if (!$bag) return null;
        return $bag[$lang] ?? $bag['tr'] ?? (is_array($bag) ? reset($bag) : null);
    }

    public function home(Request $req) { /* (senin mevcut kodun) */ }

    public function show(Request $req, string $slug) {
        $lang = $req->query('lang','tr');
        $page = Page::where('slug',$slug)->where('published',true)->first();
        if (!$page) return response()->json(['message'=>'Not found'],404);

        return response()->json([
            'slug'     => $page->slug,
            'title'    => $this->pick($page->title,$lang),
            'html'     => $this->pick($page->content,$lang),
            'sections' => $this->pick($page->sections,$lang) ?? [],
        ]);
    }


    public function slugs() {
        $pages = Page::where('published',true)->pluck('slug')->toArray();
        $treat = Treatment::where('published',true)->pluck('slug')->toArray();
        $pages = array_values(array_filter($pages, fn($s)=>$s!=='home'));
        return response()->json(array_values(array_unique(array_merge($pages,$treat))));
    }
    public function hero(Request $req)
    {
        $lang = $req->query('lang', 'tr');

        return response()->json([
            'slides' => [
                [
                    'backgrounds' => [
                        '/images/dots.png',
                        'https://api.aydaivf.com/uploads/banner1_a97e8d6aa7.png',
                    ],
                    'title' => $lang === 'tr' ? 'En Güzel Hediyeyi Verelim' : 'Let Us Give You the Most Beautiful Gift',
                    'subtitle' => $lang === 'tr' ? 'Gelin Size Sahip Olabileceğiniz' : 'Come and Have the Chance',
                ],
            ],
            'workHours' => $lang === 'tr' ? 'PTESİ - CUMA : 9:00 - 14:00' : 'MON - FRI : 9:00 - 14:00',
            'footer' => 'Ayda IVF Center',
        ]);
    }

    public function welcome(Request $req)
    {
        $lang = $req->query('lang', 'tr');

        $data = [
            'tr' => [
                'image' => 'https://api.aydaivf.com/uploads/1617890130_4018_org_74c04c13d4.png',
                'title' => 'Hoş Geldiniz',
                'subtitle' => 'Ayda-Tüp Bebek Web Sitesine',
                'content' => '
                <p>Kuzey Kıbrıs’ın başkenti Lefkoşa\'nın merkezinde bulunan kliniğimiz; Elite hastanesi bünyesinde olup...</p>
                <p><strong>Tanyel FELEK, MS</strong><br/>Ayda Tüp Bebek Takımı Direktörü & Embriyoloji Laboratuvarı Sorumlusu</p>
            ',
            ],
            'en' => [
                'image' => 'https://api.aydaivf.com/uploads/1617890130_4018_org_74c04c13d4.png',
                'title' => 'Welcome',
                'subtitle' => 'Ayda IVF Website',
                'content' => '
                <p>Our clinic, located in the center of Nicosia, the capital of Northern Cyprus, has been working tirelessly...</p>
                <p><strong>Tanyel FELEK, MS</strong><br/>Director of Ayda IVF Team & Embryology Laboratory Supervisor</p>
            ',
            ],
        ];

        return response()->json($data[$lang] ?? $data['tr']);
    }

}
