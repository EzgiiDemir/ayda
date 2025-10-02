<?php
// database/seeders/FaqSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;
use App\Models\Page;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        // Sayfa meta
        Page::updateOrCreate(
            ['slug' => 'faq'],
            [
                'title' => ['tr' => 'Sık Sorulan Sorular', 'en' => 'Frequently Asked Questions'],
                'content' => [
                    'tr' => '<p>Merak ettikleriniz için kısa yanıtlar.</p>',
                    'en' => '<p>Short answers to common questions.</p>',
                ],
                'hero_image' => 'https://api.aydaivf.com/uploads/banner1_a97e8d6aa7.png',
                'meta_title' => ['tr' => 'SSS', 'en' => 'FAQ'],
                'meta_description' => [
                    'tr' => 'Tedavilere dair sık sorulan sorular',
                    'en' => 'FAQs about treatments',
                ],
                'published' => true,
            ]
        );

        $rows = [
            [
                'cat' => ['tr'=>'Genel','en'=>'General'],
                'q'   => ['tr'=>'İlk muayenede neler yapılır?','en'=>'What happens at the first visit?'],
                'a'   => ['tr'=>'<p>Öykü, muayene ve temel test planı oluşturulur.</p>','en'=>'<p>History, exam and baseline tests are planned.</p>'],
                'pos' => 10,
            ],
            [
                'cat' => ['tr'=>'IVF Süreci','en'=>'IVF Process'],
                'q'   => ['tr'=>'Tedavi ne kadar sürer?','en'=>'How long does IVF take?'],
                'a'   => ['tr'=>'<p>Çoğunlukla 2–3 hafta arası.</p>','en'=>'<p>Typically 2–3 weeks.</p>'],
                'pos' => 20,
            ],
            [
                'cat' => ['tr'=>'Donasyon','en'=>'Donation'],
                'q'   => ['tr'=>'Donör seçimi nasıl yapılır?','en'=>'How is donor selected?'],
                'a'   => ['tr'=>'<p>Tıbbi kriterler ve tercihlerinize göre eşleştirme yapılır.</p>','en'=>'<p>Matched by medical criteria and your preferences.</p>'],
                'pos' => 30,
            ],
        ];

        foreach ($rows as $r) {
            Faq::updateOrCreate(
                ['question' => $r['q']],
                [
                    'category' => $r['cat'],
                    'answer'   => $r['a'],
                    'position' => $r['pos'],
                    'published'=> true,
                ]
            );
        }
    }
}
