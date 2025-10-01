<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FooterController extends Controller {
    public function index(Request $req) {
        $locale = $req->query('lang', 'tr');
        $footer = DB::table('footers')->where('locale', $locale)->first();

        if (!$footer) {
            return response()->json(['error' => 'Not found'], 404);
        }

        $footer->socials = json_decode($footer->socials, true);
        $footer->quicklinks = json_decode($footer->quicklinks, true);

        return response()->json($footer);
    }

}
