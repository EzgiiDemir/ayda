<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HeroController extends Controller {
    public function show(Request $req) {
        $lang = $req->query('lang', 'tr');
        $hero = DB::table('heroes')->where('locale', $lang)->first();
        return response()->json($hero);
    }
}
