<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Price;

class OurPricesController extends Controller
{
    /** Dil anahtarından değeri seç (array|string|null destekler) */
    private function pick($bag, string $lang) {
        if ($bag === null) return null;
        if (is_string($bag)) return $bag;
        if (is_array($bag))  return $bag[$lang] ?? $bag['tr'] ?? (reset($bag) ?: null);
        return null;
    }

    /** Alias → kanonik slug */
    private function canonicalSlug(?string $slug, string $lang): string
    {
        $s = trim((string)$slug, "/");
        $aliases = [
            'tr' => [
                'hakkimizda/fiyatlar' => 'our-prices',
                'fiyatlar'            => 'our-prices',
            ],
            'en' => [
                'about/prices'        => 'our-prices',
                'our-prices'          => 'our-prices',
            ],
        ];
        return $aliases[$lang][$s] ?? 'our-prices';
    }

    /** GET /api/our-prices?lang=tr&slug=hakkimizda/fiyatlar */
    public function show(Request $req)
    {
        $lang = in_array($req->query('lang'), ['tr','en'], true) ? $req->query('lang') : 'tr';
        $slug = $this->canonicalSlug($req->query('slug', 'our-prices'), $lang);

        /** ---- PAGE ---- */
        $page = Page::where('slug', $slug)->first();
        $title = $page ? ($this->pick($page->title, $lang) ?? 'Fiyatlarımız') : 'Fiyatlarımız';
        $intro = $page ? ($this->pick($page->content, $lang) ?? null) : null; // HTML döner
        $hero  = $page->hero_image ?? null;
        $seo   = $page ? [
            'metaTitle'       => $this->pick($page->meta_title ?? null, $lang),
            'metaDescription' => $this->pick($page->meta_description ?? null, $lang),
        ] : null;

        $sections = collect($page->sections ?? [])
            ->map(function ($s) use ($lang) {
                return [
                    'heading' => $this->pick($s['heading'] ?? null, $lang),
                    'html'    => $this->pick($s['html'] ?? null, $lang), // HTML
                ];
            })->values();

        /** ---- ITEMS ---- */
        $items = Price::query()
            ->where('published', true)
            ->orderBy('position')
            ->get()
            ->map(function (Price $p) use ($lang) {
                $name = $this->pick(is_array($p->name) ? $p->name : json_decode((string)$p->name, true), $lang) ?? '';
                $note = $this->pick(is_array($p->note) ? $p->note : json_decode((string)$p->note, true), $lang);

                return [
                    'slug'     => $p->slug,
                    'name'     => $name,
                    'currency' => $p->currency ?? 'EUR',
                    'amount'   => is_numeric($p->amount) ? (float)$p->amount : 0,
                    'unit'     => $p->unit ?? null,
                    'note'     => $note,
                    'position' => (int) $p->position,
                ];
            })->values();

        /** ---- RESPONSE ---- */
        return response()->json([
            'slug'      => 'our-prices',
            'locale'    => $lang,
            'title'     => $title,
            'intro'     => $intro,     // HTML, strip edilmez
            'heroImage' => $hero,
            'seo'       => $seo,
            'sections'  => $sections,
            'items'     => $items,
        ]);
    }
}
