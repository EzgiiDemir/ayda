<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WelcomeSection;

class WelcomeController extends Controller
{
    public function get(Request $req)
    {
        $lang = $req->query('lang','tr');
        $section = WelcomeSection::where('locale', $lang)->first();
        return response()->json($section ?? []);
    }
}
