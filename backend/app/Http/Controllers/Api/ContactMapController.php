<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ContactMap;
use Illuminate\Http\Request;

class ContactMapController extends Controller
{
// Public: Frontend için
public function index(Request $request)
{
$locale = $request->get('locale', 'tr');
$contactMap = ContactMap::where('locale', $locale)->first();

if (!$contactMap) {
$contactMap = ContactMap::where('locale', 'tr')->first();
}

return response()->json([
'success' => true,
'data' => $contactMap
]);
}

// Admin: Güncelleme
public function update(Request $request)
{
$validated = $request->validate([
'locale' => 'required|string|size:2',
'show_iframe' => 'boolean',
'map_url' => 'nullable|string',
'image' => 'nullable|string',
]);

$contactMap = ContactMap::updateOrCreate(
['locale' => $validated['locale']],
$validated
);

return response()->json([
'success' => true,
'message' => 'Contact Map section güncellendi',
'data' => $contactMap
]);
}
}
