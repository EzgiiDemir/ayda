<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowcaseController extends Controller
{
    public function index(Request $req)
    {
        $locale = $req->query('lang', 'tr');
        $showcase = DB::table('showcases')->where('locale', $locale)->first();

        if (!$showcase) {
            return response()->json(['error' => 'Not found'], 404);
        }

        return response()->json([
            'image' => $showcase->image,
        ]);
    }
}
