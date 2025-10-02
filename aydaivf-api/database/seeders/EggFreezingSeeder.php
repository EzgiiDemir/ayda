<?php
// database/seeders/EggFreezingSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Treatment;

class EggFreezingSeeder extends Seeder
{
    public function run(): void
    {
        Treatment::updateOrCreate(
            ['slug' => 'egg-freezing'],
            [
                'title' => [
                    'tr' => 'Yumurta Dondurma',
                    'en' => 'Egg Freezing',
                ],
                'excerpt' => [
                    'tr' => 'Gelecekteki fertilite için olgun oositlerin vitrifikasyon ile saklanması.',
                    'en' => 'Preserving mature oocytes via vitrification for future fertility.',
                ],
                'content' => [
                    'tr' => '<p>AMH ve antral follikül değerlendirmesi sonrası kontrollü uyarım, OPU ve vitrifikasyon uygulanır.</p>',
                    'en' => '<p>After AMH and AFC assessment, controlled stimulation, OPU, and vitrification are performed.</p>',
                ],
                'sections' => [
                    [
                        'heading' => ['tr' => 'Kimlere Uygun?', 'en' => 'Who Is It For?'],
                        'html' => [
                            'tr' => '<ul><li>Fertiliteyi ertelemek isteyenler</li><li>Onkoloji tedavisi öncesi</li><li>Düşük over rezervi riski</li></ul>',
                            'en' => '<ul><li>Fertility preservation</li><li>Before oncology treatments</li><li>Risk of low ovarian reserve</li></ul>',
                        ],
                    ],
                    [
                        'heading' => ['tr' => 'Süreç Adımları', 'en' => 'Steps'],
                        'html' => [
                            'tr' => '<ol><li>Ön değerlendirme</li><li>Kontrollü over stimülasyonu</li><li>OPU</li><li>Vitrifikasyon ve saklama</li></ol>',
                            'en' => '<ol><li>Pre-assessment</li><li>Controlled ovarian stimulation</li><li>OPU</li><li>Vitrification and storage</li></ol>',
                        ],
                    ],
                    [
                        'heading' => ['tr' => 'Sık Sorular', 'en' => 'FAQ'],
                        'html' => [
                            'tr' => '<p>Dondurulan oositler çözdürme sonrası ICSI ile döllenir. Saklama süresi boyunca yıllık ücret geçerlidir.</p>',
                            'en' => '<p>Thawed oocytes are fertilized via ICSI. Annual storage fees apply while stored.</p>',
                        ],
                    ],
                ],
                'hero_image' => 'https://api.aydaivf.com/uploads/banner1_a97e8d6aa7.png',
                'meta_title' => ['tr' => 'Yumurta Dondurma', 'en' => 'Egg Freezing'],
                'meta_description' => [
                    'tr' => 'Yumurta dondurma süreç ve adaylar.',
                    'en' => 'Egg freezing process and candidates.',
                ],
                'position' => 50,
                'published' => true,
            ]
        );
    }
}
