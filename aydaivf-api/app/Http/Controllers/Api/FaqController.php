<?php
// app/Http/Controllers/Api/FaqController.php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\Page;

class FaqController extends Controller
{
    private function pick(?array $bag, string $lang) {
        if (!$bag) return null;
        return $bag[$lang] ?? $bag['tr'] ?? (is_array($bag) ? reset($bag) : null);
    }

    public function index(Request $req)
    {
        $lang = $req->query('lang', 'tr');

        $page = Page::where('slug', 'faq')->first();

        $items = Faq::query()
            ->where('published', true)
            ->orderBy('position')
            ->get()
            ->map(function (Faq $f) use ($lang) {
                return [
                    'category' => $this->pick($f->category, $lang) ?? 'Genel',
                    'question' => $this->pick($f->question, $lang) ?? '',
                    'answer'   => $this->pick($f->answer, $lang) ?? '',
                    'position' => $f->position,
                ];
            });

        // kategoriye grupla
        $groups = $items->groupBy('category')->map(function ($grp, $cat) {
            return [
                'name'  => $cat,
                'items' => $grp->values(),
            ];
        })->values();

        return response()->json([
            'slug'      => 'faq',
            'locale'    => $lang,
            'title'     => $page ? ($this->pick($page->title, $lang) ?? 'Sık Sorulan Sorular') : 'Sık Sorulan Sorular',
            'intro'     => $page ? $this->pick($page->content, $lang) : null, // HTML
            'heroImage' => $page->hero_image ?? null,
            'seo'       => $page ? [
                'metaTitle'       => $this->pick($page->meta_title ?? null, $lang),
                'metaDescription' => $this->pick($page->meta_description ?? null, $lang),
            ] : null,
            'categories'=> $groups,
        ]);
    }
}
