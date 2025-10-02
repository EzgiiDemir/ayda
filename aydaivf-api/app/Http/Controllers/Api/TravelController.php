<?php
// app/Http/Controllers/Api/TravelController.php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\TravelGuide;

class TravelController extends Controller
{
    private function pick(?array $bag, string $lang) {
        if (!$bag) return null;
        return $bag[$lang] ?? $bag['tr'] ?? (is_array($bag) ? reset($bag) : null);
    }

    public function index(Request $req)
    {
        $lang = $req->query('lang', 'tr');

        $page = Page::where('slug', 'travel')->first();

        $items = TravelGuide::query()
            ->where('published', true)
            ->orderBy('position')
            ->get()
            ->map(function (TravelGuide $t) use ($lang) {
                return [
                    'category' => $this->pick($t->category, $lang) ?? 'Genel',
                    'title'    => $this->pick($t->title, $lang) ?? '',
                    'html'     => $this->pick($t->html, $lang) ?? '',
                    'icon'     => $t->icon,
                    'link'     => $t->link,
                    'position' => $t->position,
                ];
            });

        $groups = $items->groupBy('category')->map(fn($g, $cat) => [
            'name' => $cat,
            'items'=> $g->values(),
        ])->values();

        return response()->json([
            'slug'      => 'travel',
            'locale'    => $lang,
            'title'     => $page ? ($this->pick($page->title, $lang) ?? 'Seyahat') : 'Seyahat',
            'intro'     => $page ? $this->pick($page->content, $lang) : null,
            'heroImage' => $page->hero_image ?? null,
            'seo'       => $page ? [
                'metaTitle'       => $this->pick($page->meta_title ?? null, $lang),
                'metaDescription' => $this->pick($page->meta_description ?? null, $lang),
            ] : null,
            'categories'=> $groups,
        ]);
    }
}
