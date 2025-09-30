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

    public function home(Request $req) {
        $lang = $req->query('lang','tr');
        $p = Page::where('slug','home')->first();
        $featured = Treatment::where('published',true)->orderBy('id')->take(6)->get()->map(function($t) use ($lang){
            return ['slug'=>$t->slug,'name'=>$this->pick($t->title,$lang) ?? ''];
        })->values();

        return response()->json([
            'heroTitle' => $p ? ($this->pick($p->title,$lang) ?? '') : '',
            'intro'     => $p ? (strip_tags((string)($this->pick($p->content,$lang) ?? ''))) : '',
            'featured'  => $featured,
        ]);
    }

    public function show(Request $req, string $slug) {
        $lang = $req->query('lang','tr');
        $page = Page::where('slug',$slug)->where('published',true)->first();
        if (!$page) return response()->json(['message'=>'Not found'],404);

        return response()->json([
            'slug'     => $page->slug,
            'title'    => $this->pick($page->title,$lang),
            'html'     => $this->pick($page->content,$lang),
            'sections' => $this->pick($page->sections,$lang),
        ]);
    }

    public function slugs() {
        $pages = Page::where('published',true)->pluck('slug')->toArray();
        $treat = Treatment::where('published',true)->pluck('slug')->toArray();
        $pages = array_values(array_filter($pages, fn($s)=>$s!=='home'));
        return response()->json(array_values(array_unique(array_merge($pages,$treat))));
    }
}
