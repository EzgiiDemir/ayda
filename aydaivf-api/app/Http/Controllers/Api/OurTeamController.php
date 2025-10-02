<?php
// app/Http/Controllers/Api/OurTeamController.php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\TeamMember;

class OurTeamController extends Controller
{
    private function pick($bag, string $lang) {
        if ($bag === null) return null;
        if (is_string($bag)) return $bag;
        if (is_array($bag))  return $bag[$lang] ?? $bag['tr'] ?? (reset($bag) ?: null);
        return null;
    }

    private function canonicalSlug(?string $slug, string $lang): string {
        $s = trim((string)$slug, "/");
        $aliases = [
            'tr' => [
                'hakkimizda/takimimiz' => 'our-team',
                'takimimiz'            => 'our-team',
            ],
            'en' => [
                'our-team'             => 'our-team',
                'about/team'           => 'our-team',
            ],
        ];
        return $aliases[$lang][$s] ?? 'our-team';
    }

    /** GET /api/our-team?lang=tr&slug=hakkimizda/takimimiz */
    public function show(Request $req)
    {
        $lang = in_array($req->query('lang'), ['tr','en'], true) ? $req->query('lang') : 'tr';
        $slug = $this->canonicalSlug($req->query('slug','our-team'), $lang);

        $page = Page::where('slug',$slug)->first();
        $title = $page ? ($this->pick($page->title, $lang) ?? 'Takımımız') : 'Takımımız';
        $intro = $page ? ($this->pick($page->content, $lang) ?? null) : null; // HTML
        $hero  = $page->hero_image ?? null;
        $seo   = $page ? [
            'metaTitle'       => $this->pick($page->meta_title ?? null, $lang),
            'metaDescription' => $this->pick($page->meta_description ?? null, $lang),
        ] : null;

        $sections = collect($page->sections ?? [])->map(fn($s)=>[
            'heading'=>$this->pick($s['heading']??null,$lang),
            'html'   =>$this->pick($s['html']??null,$lang),
        ])->values();

        $members = TeamMember::query()
            ->where('published', true)
            ->orderBy('position')
            ->get()
            ->map(function(TeamMember $m) use ($lang){
                $name = $this->pick($m->name, $lang) ?? '';
                $role = $this->pick($m->role, $lang);
                $bio  = $this->pick($m->bio,  $lang);
                return [
                    'slug'     => $m->slug,
                    'name'     => $name,
                    'role'     => $role,
                    'bio'      => $bio,     // HTML olabilir
                    'image'    => $m->image,
                    'position' => (int)$m->position,
                ];
            })->values();

        return response()->json([
            'slug'      => 'our-team',
            'locale'    => $lang,
            'title'     => $title,
            'intro'     => $intro,
            'heroImage' => $hero,
            'seo'       => $seo,
            'sections'  => $sections,
            'members'   => $members,
        ]);
    }
}
