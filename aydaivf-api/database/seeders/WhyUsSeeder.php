<?php
// database/seeders/WhyUsSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;
use App\Models\WhyUsItem;
use Illuminate\Support\Str;

class WhyUsSeeder extends Seeder
{
    public function run(): void
    {
        // Sayfa kaydı
        Page::updateOrCreate(
            ['slug' => 'why-us'],
            [
                'title' => ['tr'=>'Neden Biz','en'=>'Why Us'],
                'content' => [
                    'tr' => '<p>Ekibimizi, altyapımızı ve başarı odaklı yaklaşımımızı tanıyın.</p>',
                    'en' => '<p>Learn about our team, facility, and success-focused approach.</p>',
                ],
                'hero_image' => 'https://api.aydaivf.com/uploads/banner1_a97e8d6aa7.png',
                'meta_title' => ['tr'=>'Neden Biz','en'=>'Why Us'],
                'meta_description' => [
                    'tr'=>'Ayda IVF neden tercih edilmeli? Güçlü ekibimiz, laboratuvarımız ve deneyimimiz.',
                    'en'=>'Why choose Ayda IVF? Our team, lab, and experience.',
                ],
                'sections' => null,
                'published' => true,
            ]
        );

        // Grid öğeleri
        $items = [
            [
                'tr' => ['title'=>'Deneyimli Ekip','text'=>'<p>Alanında uzman hekim ve embriyolog kadrosu.</p>'],
                'en' => ['title'=>'Experienced Team','text'=>'<p>Specialist doctors and embryologists.</p>'],
                'image'=>'/uploads/why/why1.jpg','aspect'=>'4/3','max'=>360,
            ],
            [
                'tr' => ['title'=>'Güçlü Laboratuvar','text'=>'<p>Güncel teknoloji ve kalite standartları.</p>'],
                'en' => ['title'=>'Advanced Lab','text'=>'<p>Modern technology and QA standards.</p>'],
                'image'=>'/uploads/why/why2.jpg','aspect'=>'1/1','max'=>360,
            ],
            [
                'tr' => ['title'=>'Yüksek Başarı','text'=>'<p>Kanıta dayalı tedavi protokolleri.</p>'],
                'en' => ['title'=>'High Success','text'=>'<p>Evidence-based protocols.</p>'],
                'image'=>'/uploads/why/why3.jpg','aspect'=>'16/9','max'=>360,
            ],
            [
                'tr' => ['title'=>'Şeffaf Fiyat','text'=>'<p>Net ve anlaşılır ücretlendirme.</p>'],
                'en' => ['title'=>'Transparent Pricing','text'=>'<p>Clear and honest fees.</p>'],
                'image'=>'/uploads/why/why4.jpg','aspect'=>'3/4','max'=>360,
            ],
            [
                'tr' => ['title'=>'Kişiye Özel Plan','text'=>'<p>Her hasta için kişiselleştirilmiş yaklaşım.</p>'],
                'en' => ['title'=>'Personalized Plan','text'=>'<p>Care tailored to you.</p>'],
                'image'=>'/uploads/why/why5.jpg','aspect'=>'16/10','max'=>360,
            ],
            [
                'tr' => ['title'=>'Tam Entegrasyon','text'=>'<p>Genetik ve üroloji süreçleri aynı çatı altında.</p>'],
                'en' => ['title'=>'Full Integration','text'=>'<p>Genetics and urology in-house.</p>'],
                'image'=>'/uploads/why/why6.jpg','aspect'=>'21/9','max'=>320,
            ],
        ];

        foreach ($items as $i => $it) {
            WhyUsItem::updateOrCreate(
                ['slug' => 'why-'.($i+1)],
                [
                    'locale' => 'tr',
                    'title'  => ['tr'=>$it['tr']['title'], 'en'=>$it['en']['title']],
                    'text'   => ['tr'=>$it['tr']['text'],  'en'=>$it['en']['text']],
                    'image'  => $it['image'],
                    'aspect' => $it['aspect'],
                    'max_height' => $it['max'],
                    'position'   => $i+1,
                    'published'  => true,
                ]
            );
        }
    }
}
