<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Welcome;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
// Public: Frontend için
public function index(Request $request)
{
$locale = $request->get('locale', 'tr');
$welcome = Welcome::where('locale', $locale)->first();

if (!$welcome) {
$welcome = Welcome::where('locale', 'tr')->first();
}

return response()->json([
'success' => true,
'data' => $welcome
]);
}

// Admin: Güncelleme
public function update(Request $request)
{
$validated = $request->validate([
'locale' => 'required|string|size:2',
'image' => 'required|array',
'image.url' => 'required|string',
'image.alt' => 'nullable|string',
'image.width' => 'nullable|integer',
'image.height' => 'nullable|integer',
'gradient' => 'required|array',
'gradient.from' => 'required|string',
'gradient.via' => 'required|string',
'gradient.to' => 'required|string',
]);

$welcome = Welcome::updateOrCreate(
['locale' => $validated['locale']],
$validated
);

return response()->json([
'success' => true,
'message' => 'Welcome section güncellendi',
'data' => $welcome
]);
}
}
