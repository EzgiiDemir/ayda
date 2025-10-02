<?php
// app/Http/Controllers/Api/ContactController.php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\ContactInfo;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    private function pick(?array $bag, string $lang) {
        if (!$bag) return null;
        return $bag[$lang] ?? $bag['tr'] ?? (is_array($bag) ? reset($bag) : null);
    }
    private function canonicalSlug(?string $slug, string $lang): string {
        $s = trim((string)$slug, "/");
        $aliases = [
            'tr' => ['iletisim'=>'contact','hakkimizda/iletisim'=>'contact'],
            'en' => ['contact'=>'contact'],
        ];
        return $aliases[$lang][$s] ?? $s;
    }

    public function show(Request $req)
    {
        $lang = $req->query('lang','tr');
        $slug = $this->canonicalSlug($req->query('slug','contact'), $lang);

        $page = Page::where('slug',$slug)->first();
        $ci   = ContactInfo::first();

        return response()->json([
            'slug'      => $slug,
            'locale'    => $lang,
            'title'     => $page ? ($this->pick($page->title,$lang) ?? 'İletişim') : 'İletişim',
            'intro'     => $page ? $this->pick($page->content,$lang) : null,
            'heroImage' => $page->hero_image ?? null,
            'seo'       => $page ? [
                'metaTitle'       => $this->pick($page->meta_title ?? null, $lang),
                'metaDescription' => $this->pick($page->meta_description ?? null, $lang),
            ] : null,
            'address'   => [
                'title' => $this->pick($ci?->address_title ?? null,$lang) ?? 'Adres',
                'text'  => $this->pick($ci?->address_text ?? null,$lang) ?? '',
                'mapUrl'=> $ci?->map_url,
                'mapEmbed' => $ci?->map_embed,
            ],
            'contact'   => [
                'phone'   => $ci?->phone,
                'email'   => $ci?->email,
                'whatsapp'=> $ci?->whatsapp_url,
            ],
            'workhours' => $this->pick($ci?->workhours ?? null,$lang),
            'socials'   => $ci?->socials ?? [],
            'form'      => [
                'fields' => [
                    ['name'=>'name','label'=>$lang==='tr'?'Ad Soyad':'Full Name','type'=>'text','required'=>true],
                    ['name'=>'email','label'=>'Email','type'=>'email','required'=>true],
                    ['name'=>'phone','label'=>$lang==='tr'?'Telefon':'Phone','type'=>'tel','required'=>false],
                    ['name'=>'subject','label'=>$lang==='tr'?'Konu':'Subject','type'=>'text','required'=>false],
                    ['name'=>'message','label'=>$lang==='tr'?'Mesaj':'Message','type'=>'textarea','required'=>true],
                ]
            ],
        ]);
    }

    public function submit(Request $req)
    {
        $lang = $req->query('lang','tr');
        $data = $req->validate([
            'name'    => 'required|string|max:160',
            'email'   => 'required|email|max:160',
            'phone'   => 'nullable|string|max:60',
            'subject' => 'nullable|string|max:160',
            'message' => 'required|string|max:5000',
        ]);

        $msg = ContactMessage::create([
            ...$data,
            'locale'    => $lang,
            'ip'        => $req->ip(),
            'user_agent'=> (string)$req->userAgent(),
        ]);

        return response()->json(['ok'=>true,'id'=>$msg->id], 201);
    }
}
