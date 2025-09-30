<?php

namespace App\Http\Controllers;

use App\Models\Treatment;
use Illuminate\Http\Request;

class TreatmentController extends Controller {
    private function pick(array|null $bag, string $lang) {
        if (!$bag) return null;
        return $bag[$lang] ?? $bag['tr'] ?? reset($bag);
    }

    public function index(Request $req) {
        $lang = $req->query('lang','tr');
        $data = Treatment::where('published',true)->orderBy('id','asc')->get()->map(
            fn($t) => ['slug'=>$t->slug,'name'=>$this->pick($t->title,$lang)]
        );
        return response()->json($data);
    }

    public function show(Request $req, string $slug) {
        $lang = $req->query('lang','tr');
        $t = Treatment::where('slug',$slug)->where('published',true)->firstOrFail();
        return response()->json([
            'slug'=>$t->slug,
            'title'=>$this->pick($t->title,$lang),
            'html'=>$this->pick($t->content,$lang),
        ]);
    }
}
