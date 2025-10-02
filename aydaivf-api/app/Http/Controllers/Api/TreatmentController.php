<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Treatment;

class TreatmentController extends Controller
{
    private function pick($bag, string $lang) {
        if ($bag === null) return null;
        if (is_string($bag)) return $bag;
        return $bag[$lang] ?? $bag['tr'] ?? (is_array($bag) ? (reset($bag) ?: null) : null);
    }

    private function canonicalSlug(?string $slug, string $lang): string {
        $s = trim((string)$slug, "/");
        $aliases = [
            'tr' => [
                'tedaviler/tupbebekivf'        => 'ivf-icsi',
                'tupbebekivf'                  => 'ivf-icsi',
                'tedaviler/yumurtadonasyonu'   => 'egg-donation',
                'yumurtadonasyonu'             => 'egg-donation',
                'tedaviler/spermdonasyonu'     => 'sperm-donation',
                'spermdonasyonu'               => 'sperm-donation',
                'tedaviler/embriyodonasyonu'   => 'embryo-donation',
                'embriyodonasyonu'             => 'embryo-donation',
                'tedaviler/yumurtadondurma' => 'egg-freezing',
                'yumurtadondurma'           => 'egg-freezing',
                'tedaviler/prp' => 'ovarian-endometrial-prp',
                'prp'           => 'ovarian-endometrial-prp',
                'tedaviler/akupunktur' => 'acupuncture',
                'akupunktur'           => 'acupuncture',
            ],
            'en' => [
                'treatments/ivf-icsi'          => 'ivf-icsi',
                'ivf-icsi'                     => 'ivf-icsi',
                'treatments/egg-donation'      => 'egg-donation',
                'egg-donation'                 => 'egg-donation',
                'treatments/sperm-donation'    => 'sperm-donation',
                'sperm-donation'               => 'sperm-donation',
                'treatments/embryo-donation'   => 'embryo-donation',
                'embryo-donation'              => 'embryo-donation',
                'treatments/egg-freezing'   => 'egg-freezing',
                'egg-freezing'              => 'egg-freezing',
                'treatments/ovarian-endometrial-prp' => 'ovarian-endometrial-prp',
                'ovarian-endometrial-prp'            => 'ovarian-endometrial-prp',
                'treatments/acupuncture' => 'acupuncture',
                'acupuncture'            => 'acupuncture',
            ],
        ];
        return $aliases[$lang][$s] ?? $s;
    }

    /** GET /api/treatments */
    public function index(Request $req) {
        $lang = in_array($req->query('lang'), ['tr','en'], true) ? $req->query('lang') : 'tr';
        $rows = Treatment::query()->where('published',true)->orderBy('position')->get();
        return response()->json($rows->map(fn($t)=>[
            'slug'=>$t->slug,
            'title'=>$this->pick($t->title,$lang),
            'excerpt'=>$this->pick($t->excerpt,$lang),
            'heroImage'=>$t->hero_image,
        ])->values());
    }

    /** GET /api/treatments/{slug}?lang=tr */
    public function show(Request $req, string $slug) {
        $lang = in_array($req->query('lang'), ['tr','en'], true) ? $req->query('lang') : 'tr';
        $slug = $this->canonicalSlug($slug, $lang);

        $t = Treatment::where('slug',$slug)->where('published',true)->firstOrFail();

        return response()->json([
            'slug'      => $t->slug,
            'locale'    => $lang,
            'title'     => $this->pick($t->title,$lang) ?? '',
            'intro'     => $this->pick($t->excerpt,$lang),
            'content'   => $this->pick($t->content,$lang), // HTML
            'heroImage' => $t->hero_image,
            'sections'  => collect($t->sections ?? [])->map(fn($s)=>[
                'heading'=>$this->pick($s['heading']??null,$lang),
                'html'   =>$this->pick($s['html']??null,$lang),
            ])->values(),
            'seo'       => [
                'metaTitle'       => $this->pick($t->meta_title,$lang),
                'metaDescription' => $this->pick($t->meta_description,$lang),
            ],
        ]);
    }
}
