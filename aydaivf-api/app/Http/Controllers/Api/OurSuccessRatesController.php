<?php
// app/Http/Controllers/Api/OurSuccessRatesController.php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\SuccessRate;

class OurSuccessRatesController extends Controller
{
    private function pick($bag, string $lang) {
        if ($bag === null) return null;
        if (is_string($bag)) return $bag;
        if (is_array($bag))  return $bag[$lang] ?? $bag['tr'] ?? (reset($bag) ?: null);
        return null;
    }

    private function canonicalSlug(?string $slug, string $lang): string {
        $s = trim((string)$slug, "/");
        $aliases = [
            'tr' => [
                'hakkimizda/basari-oranlari' => 'our-success-rates',
                'basari-oranlari'            => 'our-success-rates',
            ],
            'en' => [
                'our-success-rates'          => 'our-success-rates',
                'about/success-rates'        => 'our-success-rates',
            ],
        ];
        return $aliases[$lang][$s] ?? 'our-success-rates';
    }

    /** GET /api/our-success-rates?lang=tr&slug=hakkimizda/basari-oranlari */
    public function show(Request $req)
    {
        $lang = in_array($req->query('lang'), ['tr','en'], true) ? $req->query('lang') : 'tr';
        $slug = $this->canonicalSlug($req->query('slug','our-success-rates'), $lang);

        $page = Page::where('slug', $slug)->first();
        $title = $page ? ($this->pick($page->title, $lang) ?? 'Başarı Oranlarımız') : 'Başarı Oranlarımız';
        $intro = $page ? ($this->pick($page->content, $lang) ?? null) : null; // HTML
        $hero  = $page->hero_image ?? null;
        $seo   = $page ? [
            'metaTitle'       => $this->pick($page->meta_title ?? null, $lang),
            'metaDescription' => $this->pick($page->meta_description ?? null, $lang),
        ] : null;

        $sections = collect($page->sections ?? [])->map(fn($s)=>[
            'heading'=>$this->pick($s['heading']??null,$lang),
            'html'   =>$this->pick($s['html']??null,$lang),
        ])->values();

        $rows = SuccessRate::query()
            ->where('published', true)
            ->orderBy('group_key')->orderBy('position')
            ->get();

        $groups = $rows->groupBy('group_key')->map(function($col) use ($lang){
            $first = $col->first();
            return [
                'key'     => $first->group_key,
                'heading' => $this->pick($first->group_title, $lang),
                'items'   => $col->map(function(SuccessRate $r) use ($lang){
                    return [
                        'slug'     => $r->slug,
                        'name'     => $this->pick($r->name, $lang) ?? '',
                        'rate'     => $r->rate !== null ? (float)$r->rate : null,
                        'unit'     => $r->unit ?? '%',
                        'note'     => $this->pick($r->note, $lang),
                        'position' => (int)$r->position,
                    ];
                })->values(),
            ];
        })->values();

        return response()->json([
            'slug'      => 'our-success-rates',
            'locale'    => $lang,
            'title'     => $title,
            'intro'     => $intro,
            'heroImage' => $hero,
            'seo'       => $seo,
            'sections'  => $sections,
            'groups'    => $groups,
        ]);
    }
}
