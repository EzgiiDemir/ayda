<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function show($key)
    {
        $lang = request('lang', 'tr');
        $menu = Menu::where('key', $key)->with(['items.children'])->firstOrFail();

        $mapItem = function($item) use ($lang, &$mapItem) {
            return [
                'label' => $item->{'label_'.$lang},
                'href' => $item->href,
                'children' => $item->children->map($mapItem)->toArray()
            ];
        };

        return response()->json([
            'items' => $menu->items->map($mapItem)->toArray()
        ]);
    }
}
