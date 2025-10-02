<?php
// database/seeders/IvfIcsiSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Treatment;

class IvfIcsiSeeder extends Seeder
{
    public function run(): void
    {
        Treatment::updateOrCreate(
            ['slug'=>'ivf-icsi'],
            [
                'title' => [
                    'tr'=>'Tüp Bebek (IVF/ICSI)',
                    'en'=>'In Vitro Fertilization (IVF/ICSI)'
                ],
                'excerpt' => [
                    'tr'=>'IVF/ICSI nedir, kimlere uygulanır ve süreç adımları.',
                    'en'=>'What IVF/ICSI is, who qualifies, and process steps.'
                ],
                'content' => [
                    'tr'=> '<p>IVF/ICSI tedavisi, yumurta ve spermin laboratuvar ortamında birleştirilmesi ile gerçekleşir. Aşamalar: <strong>hazırlık</strong>, <strong>yumurta toplama</strong>, <strong>laboratuvar</strong>, <strong>embriyo transferi</strong>.</p>',
                    'en'=> '<p>IVF/ICSI treatment combines egg and sperm in the lab. Stages: <strong>preparation</strong>, <strong>OPU</strong>, <strong>lab</strong>, <strong>transfer</strong>.</p>'
                ],
                'sections' => [
                    [
                        'heading'=> ['tr'=>'Kime Uygundur?','en'=>'Indications'],
                        'html'   => ['tr'=>'<ul><li>Erkek faktörü</li><li>Tüplerde tıkanıklık</li><li>Uzun süreli infertilite</li></ul>','en'=>'<ul><li>Male factor</li><li>Tubal factor</li><li>Long-term infertility</li></ul>']
                    ],
                    [
                        'heading'=> ['tr'=>'Süreç Zaman Çizelgesi','en'=>'Timeline'],
                        'html'   => ['tr'=>'<p>Ortalama 10–14 gün stimülasyon, ardından OPU ve 3–5. gün transfer.</p>','en'=>'<p>~10–14 days stimulation, then OPU and day 3–5 transfer.</p>']
                    ],
                ],
                'hero_image' => 'https://api.aydaivf.com/uploads/banner1_a97e8d6aa7.png',
                'meta_title' => ['tr'=>'IVF / ICSI','en'=>'IVF / ICSI'],
                'meta_description' => [
                    'tr'=>'IVF/ICSI tedavisi süreç ve endikasyonlar',
                    'en'=>'IVF/ICSI treatment, process and indications'
                ],
                'position'=>10,
                'published'=>true,
            ]
        );
    }
}
