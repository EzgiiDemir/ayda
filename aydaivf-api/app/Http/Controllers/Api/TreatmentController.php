<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Treatment;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    private function pick(?array $bag, string $lang) {
        if (!$bag) return null;
        return $bag[$lang] ?? $bag['tr'] ?? (is_array($bag) ? reset($bag) : null);
    }

    public function index(Request $req) {
        $lang = $req->query('lang','tr');
        return Treatment::where('published',true)->orderBy('id')->get()->map(
            fn($t)=>['slug'=>$t->slug,'name'=>$this->pick($t->title,$lang)]
        );
    }

    public function show(Request $req, string $slug) {
        $lang = $req->query('lang','tr');
        $t = Treatment::where('slug',$slug)->where('published',true)->first();
        if (!$t) return response()->json(['message'=>'Not found'],404);

        return response()->json([
            'slug'=>$t->slug,
            'title'=>$this->pick($t->title,$lang),
            'html'=>$this->pick($t->content,$lang),
            'image'=>is_array($t->image) ? ($t->image[$lang]??$t->image['tr']??null) : $t->image,
        ]);
    }
}
