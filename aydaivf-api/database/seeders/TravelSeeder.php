<?php
// database/seeders/TravelSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;
use App\Models\TravelGuide;

class TravelSeeder extends Seeder
{
    public function run(): void
    {
        Page::updateOrCreate(
            ['slug' => 'travel'],
            [
                'title' => ['tr' => 'Seyahat', 'en' => 'Travel'],
                'content' => [
                    'tr' => '<p>Kıbrıs’a yolculuk, konaklama ve transfer hakkında pratik bilgiler.</p>',
                    'en' => '<p>Practical info on flights, accommodation, and transfers.</p>',
                ],
                'hero_image' => 'https://api.aydaivf.com/uploads/banner1_a97e8d6aa7.png',
                'meta_title' => ['tr' => 'Seyahat Bilgileri', 'en' => 'Travel Info'],
                'meta_description' => [
                    'tr' => 'Ulaşım, konaklama, vize ve transfer detayları.',
                    'en' => 'Transport, lodging, visa and transfers.',
                ],
                'published' => true,
            ]
        );

        $rows = [
            [
                'cat' => ['tr'=>'Ulaşım','en'=>'Transport'],
                'title'=> ['tr'=>'Ercan Havalimanı (ECN)','en'=>'Ercan Airport (ECN)'],
                'html'=> [
                    'tr'=>'<p>Kliniğimize araçla ~25 dk. İsteğe bağlı karşılama ve transfer ayarlanır.</p>',
                    'en'=>'<p>~25 min by car to the clinic. Meet-and-greet transfers available.</p>',
                ],
                'icon'=> null, 'link'=> null, 'pos'=>10
            ],
            [
                'cat' => ['tr'=>'Ulaşım','en'=>'Transport'],
                'title'=> ['tr'=>'Larnaka Havalimanı (LCA)','en'=>'Larnaca Airport (LCA)'],
                'html'=> [
                    'tr'=>'<p>Sınır kapısından geçiş gerektirir. Özel transfer önerilir.</p>',
                    'en'=>'<p>Requires checkpoint crossing. Private transfer recommended.</p>',
                ],
                'icon'=> null, 'link'=> null, 'pos'=>20
            ],
            [
                'cat' => ['tr'=>'Konaklama','en'=>'Accommodation'],
                'title'=> ['tr'=>'Otel Önerileri','en'=>'Hotel Options'],
                'html'=> [
                    'tr'=>'<ul><li>Merkeze yürüme mesafesinde 3–5★ seçenekler</li><li>Hasta indirimi için resepsiyonda “AYDA” kodu</li></ul>',
                    'en'=>'<ul><li>3–5★ within walking distance</li><li>Ask reception for “AYDA” patient rate</li></ul>',
                ],
                'icon'=> null, 'link'=> null, 'pos'=>30
            ],
            [
                'cat' => ['tr'=>'Vize ve Giriş','en'=>'Visa & Entry'],
                'title'=> ['tr'=>'Giriş Bilgileri','en'=>'Entry Info'],
                'html'=> [
                    'tr'=>'<p>Kimlik ve pasaport gereklilikleri vatandaşlığa göre değişir. Rezervasyon belgenizi yanınızda bulundurun.</p>',
                    'en'=>'<p>ID and passport rules vary by nationality. Carry your booking confirmation.</p>',
                ],
                'icon'=> null, 'link'=> null, 'pos'=>40
            ],
            [
                'cat' => ['tr'=>'İletişim','en'=>'Contact'],
                'title'=> ['tr'=>'Klinik Adresi','en'=>'Clinic Address'],
                'html'=> [
                    'tr'=>'<p>Adres ve konum bilgisi, karşılama talebi için danışma ile iletişime geçin.</p>',
                    'en'=>'<p>Contact reception for address, map and meet-and-greet.</p>',
                ],
                'icon'=> null, 'link'=> null, 'pos'=>50
            ],
        ];

        foreach ($rows as $r) {
            TravelGuide::updateOrCreate(
                ['title' => $r['title']],
                [
                    'category' => $r['cat'],
                    'html'     => $r['html'],
                    'icon'     => $r['icon'],
                    'link'     => $r['link'],
                    'position' => $r['pos'],
                    'published'=> true,
                ]
            );
        }
    }
}
