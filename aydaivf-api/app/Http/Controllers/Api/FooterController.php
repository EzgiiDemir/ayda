<?php
// app/Http/Controllers/Api/FooterController.php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FooterSetting;

class FooterController extends Controller
{
    private function pick($val, string $lang) {
        if (is_array($val)) return $val[$lang] ?? $val['tr'] ?? reset($val);
        return $val;
    }

    public function show(Request $req)
    {
        // Çok dillilik gerekmiyorsa tek kayıt:
        $f = Footer::firstOrFail();

        return response()->json([
            'address_icon'  => $f->address_icon,
            'address_title' => $f->address_title,
            'address_text'  => $f->address_text,
            'contact_icon'  => $f->contact_icon,
            'contact_title' => $f->contact_title,
            'phone'         => $f->phone,
            'email'         => $f->email,
            'socials'       => $f->socials ?? [],
            'quicklinks'    => $f->quicklinks ?? [],
            'copyright'     => $f->copyright,
            'address_badge' => $f->address_badge, // ISO görseli (URL)
            'footer_badge'  => $f->footer_badge,  // URL veya data:image/png;base64,...
        ]);
    }}
