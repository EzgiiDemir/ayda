<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Treatment;
use App\Models\Welcome;
use Illuminate\Http\Request;

class PageController extends Controller
{
    private function pick(?array $bag, string $lang) {
        if (!$bag) return null;
        return $bag[$lang] ?? $bag['tr'] ?? (is_array($bag) ? reset($bag) : null);
    }

    public function home(Request $req) { /* mevcut kodun */ }

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

    /** ========= FIXED: /hero endpoint -> HeroDTO ile aynı anahtarlar ========= */
    public function hero(Request $req)
    {
        $lang = $req->query('lang', 'tr');

        return response()->json([
            'locale'     => $lang,
            'title'      => $lang === 'tr' ? 'En Güzel Hediyeyi Verelim' : 'Let Us Give You the Most Beautiful Gift',
            'subtitle'   => $lang === 'tr' ? 'Gelin Size Sahifffp Olabileceğiniz' : 'Come and Have the Chance',
            // DİKKAT: Tam mutlak URL veriyoruz (API alan adı)
            'background' => 'https://api.aydaivf.com/uploads/banner1_a97e8d6aa7.png',
            'dots'       => 'https://api.aydaivf.com/uploads/dots.png',
            'workhours'  => $lang === 'tr' ? 'PTESİ - CUMA : 9:00 - 14:00' : 'MON - FRI : 9:00 - 14:00',
            'footerText' => 'Ayda IVF Center',
        ]);
    }

    /** ========= /welcome endpoint -> frontend’in WelcomeSection’ı ile uyumlu ========= */
    public function welcome(Request $req)
    {
        $lang = $req->query('lang', 'tr');

        // Tercihen DB’den oku (Seeder’ı zaten yazdın)
        $w = Welcome::where('locale',$lang)->first()
            ?? Welcome::where('locale','tr')->first();

        if (!$w) {
            // Fallback sabit içerik (tam metin)
            $fallback = [
                'image'     => 'https://api.aydaivf.com/uploads/1617890130_4018_org_74c04c13d4.png',
                'title'     => $lang==='tr' ? 'Hoş Geldiniz' : 'Welcome',
                'subtitle'  => $lang==='tr' ? 'Ayda-Tüp Bebek Web Sitesine' : 'Ayda IVF Website',
                'content'   => $lang==='tr'
                    ? <<<HTML
<p>Kuzey Kıbrıs’ın başkenti Lefkoşa'nın merkezinde bulunan kliniğimiz; Elite hastanesi bünyesinde olup, sizleri hamileliğe ulaştırabilmek için yıllardır canla başla çalışıyor. Evlat sahibi olma arzusu ile kliğimize başvuran tüm bireylere; <strong>bilimin el verdiği derecede, birçok teknik ve yöntemle, en modern, yenilikçi ve son teknolojiye sahip altyapımızla</strong> yardımcı olmak için buradayız.</p>
<p>Tüp bebekteki 8 senelik mesleki hayatıma ilk olarak Almanya’nın Wiesbaden şehrinde adım atmıştım. Benim için; tüp bebeğe ilk adım attığım günden bu yana <strong>etik kurallar çerçevesinde mesleğimi sürdürmem</strong> her zaman her şeyin önünde olmuştur. Mesleğimin ne kadar kutsal ve anlamlı olduğunu ilk hastamın transferini yapıp onun gebelik sevincine ortak olduğum ilk günden anlamıştım.</p>
<p>... (tam metnin geri kalanı) ...</p>
<p style="text-align:right"><strong>Tanyel FELEK, MS</strong><br/>Ayda Tüp Bebek Takımı Direktörü &amp; Embriyoloji Laboratuvarı Sorumlusu</p>
HTML
                    : <<<HTML
<p>Our clinic, located in the center of Nicosia, the capital of Northern Cyprus, has been working tirelessly...</p>
<p style="text-align:right"><strong>Tanyel FELEK, MS</strong><br/>Director of Ayda IVF Team &amp; Embryology Laboratory Supervisor</p>
HTML,
                'ceo_name'  => 'Tanyel FELEK, MS',
                'ceo_title' => $lang==='tr'
                    ? 'Ayda Tüp Bebek Takımı Direktörü & Embriyoloji Laboratuvarı Sorumlusu'
                    : 'Director of Ayda IVF Team & Embryology Laboratory Supervisor',
            ];
            return response()->json($fallback);
        }

        return response()->json([
            'image'     => $w->image,
            'title'     => $w->title,
            'subtitle'  => $w->subtitle,
            'content'   => $w->content,
            'ceo_name'  => $w->ceo_name,
            'ceo_title' => $w->ceo_title,
        ]);
    }
    public function treatmentsSection(\Illuminate\Http\Request $req)
    {
        $lang = $req->query('lang','tr');

        $title    = $lang==='tr' ? 'Tedavi Yöntemlerimiz' : 'Our Treatment Methods';
        $subtitle = $lang==='tr' ? 'En Sık Tercih Edilen' : 'Most Preferred';
        $intro    = $lang==='tr'
            ? 'Ayda Tüp Bebek Ekibini ziyaret etmeden önce tedaviniz hakkında daha detaylı bilgiye ulaşabilmeniz için sizlere özel olarak, her bir detayı özenle düşünerek hazırlamış olduğumuz tedavi yöntemlerimize mutlaka bir göz atınız. Burada size uygun tedavinizi daha yakından inceleme fırsatına ve detaylı bilgi edinebilme şansına sahip olacaksınız.'
            : 'Before visiting the Ayda IVF Team, please review our carefully prepared treatment methods to get detailed information.';
        $intro2   = $lang==='tr'
            ? 'Tedavilerimizi inceledikten sonra merak ettiğiniz tüm sorularınız için bir telefon kadar uzağınızda olduğumuzu unutmayınız. Sizlerle tanışmak ve sağlıklı bir bebek kucağınıza almanız için sizlere profesyonel yardımda bulunmayı dört gözle bekliyoruz.'
            : 'After reviewing our treatments, remember we are just a call away for your questions.';

        $tr = [
            'ivf-icsi'                    => 'Tüp Bebek (IVF) - ICSI',
            'egg-donation'                => 'Yumurta Donasyonu',
            'sperm-donation'              => 'Sperm Donasyonu',
            'embryo-donation'             => 'Embriyo Donasyonu',
            'ovarian-endometrial-prp'     => 'Ovarian ve Endometrial PRP',
            'embryo-genetic-screening-ngs'=> 'Embriyo Genetik Tarama (NGS, Tek Gen)',
            'gender-selection-pgd'        => 'Cinsiyet Seçimi (PGD)',
            'egg-freezing'                => 'Yumurta Dondurma',
            'surrogacy'                   => 'Taşıyıcı Annelik',
            'embryo-genetic-screening-pgd'=> 'Embriyo Genetik Tarama (PGD)',
        ];
        $en = [
            'ivf-icsi'                    => 'IVF - ICSI',
            'egg-donation'                => 'Egg Donation',
            'sperm-donation'              => 'Sperm Donation',
            'embryo-donation'             => 'Embryo Donation',
            'ovarian-endometrial-prp'     => 'Ovarian & Endometrial PRP',
            'embryo-genetic-screening-ngs'=> 'Embryo Genetic Screening (NGS, Single Gene)',
            'gender-selection-pgd'        => 'Gender Selection (PGD)',
            'egg-freezing'                => 'Egg Freezing',
            'surrogacy'                   => 'Surrogacy',
            'embryo-genetic-screening-pgd'=> 'Embryo Genetic Screening (PGD)',
        ];
        $labels = $lang==='tr' ? $tr : $en;

        $items = [];
        foreach ($labels as $slug => $label) {
            $items[] = ['slug'=>$slug, 'label'=>$label];
        }

        return response()->json([
            'title'       => $title,
            'subtitle'    => $subtitle,
            'intro'       => $intro,
            'intro2'      => $intro2,
            // Mutlak URL veriyoruz (frontend abs ile karışmasın)
            'background'  => 'https://api.aydaivf.com/uploads/logoonly.svg',
            'ctaText'     => $lang==='tr' ? 'Bizimle İletişime Geçin' : 'Contact Us',
            'ctaLink'     => "/$lang/iletisim",
            'treatments'  => $items,
        ]);
    }

}
