<?php
// app/Http/Controllers/Api/WhyUsController.php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\WhyUsItem;

class WhyUsController extends Controller
{
    private function pick(?array $bag, string $lang) {
        if (!$bag) return null;
        return $bag[$lang] ?? $bag['tr'] ?? (is_array($bag) ? reset($bag) : null);
    }
    private function canonicalSlug(?string $slug, string $lang): string {
        $s = trim((string)$slug, '/');
        $aliases = [
            'tr' => ['hakkimizda/neden-biz'=>'why-us','neden-biz'=>'why-us'],
            'en' => ['why-us'=>'why-us'],
        ];
        return $aliases[$lang][$s] ?? 'why-us';
    }

    public function __invoke(Request $req)
    {
        $lang = $req->query('lang','tr');
        $slug = $this->canonicalSlug($req->query('slug','why-us'), $lang);

        $page = Page::where('slug',$slug)->first();

        $items = WhyUsItem::query()
            ->where('published', true)
            ->orderBy('position')
            ->get()
            ->map(function(WhyUsItem $w) use ($lang) {
                return [
                    'slug'      => $w->slug,
                    'title'     => $this->pick($w->title, $lang),
                    'text'      => $this->pick($w->text,  $lang),
                    'image'     => $w->image,
                    'aspect'    => $w->aspect,
                    'maxHeight' => $w->max_height,
                    'position'  => $w->position,
                ];
            })->values();

        return response()->json([
            'slug'      => $slug,
            'locale'    => $lang,
            'title'     => $page ? ($this->pick($page->title,$lang) ?? 'Neden Biz') : 'Neden Biz',
            'intro'     => $page ? $this->pick($page->content,$lang) : null, // HTML
            'heroImage' => $page->hero_image ?? null,
            'seo'       => $page ? [
                'metaTitle'       => $this->pick($page->meta_title ?? null, $lang),
                'metaDescription' => $this->pick($page->meta_description ?? null, $lang),
            ] : null,
            'items'     => $items,
        ]);
    }
}
