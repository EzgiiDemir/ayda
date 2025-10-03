<?php
// app/Http/Controllers/Api/CmsWelcomeController.php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Welcome;
use Illuminate\Http\Request;

class CmsWelcomeController extends Controller
{
    public function show(Request $request)
    {
        $lang = $request->query('lang', 'tr');
        $data = Welcome::where('locale', $lang)->first();

        if (!$data) {
            return response()->json([
                'locale'    => $lang,
                'subtitle'  => null,
                'title'     => null,
                'html'      => null,
                'image'     => null,
                'ceoName'   => null,
                'ceoTitle'  => null,
            ], 200);
        }

        return response()->json([
            'locale'    => $data->locale,
            'subtitle'  => $data->subtitle,
            'title'     => $data->title,
            'html'      => $data->content,   // frontend dangerouslySetInnerHTML ile basacak
            'image'     => $data->image,
            'ceoName'   => $data->ceo_name,
            'ceoTitle'  => $data->ceo_title,
        ]);
    }
}
