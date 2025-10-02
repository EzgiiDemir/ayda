<?php
// database/seeders/SpermDonationSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Treatment;

class SpermDonationSeeder extends Seeder
{
    public function run(): void
    {
        Treatment::updateOrCreate(
            ['slug' => 'sperm-donation'],
            [
                'title' => [
                    'tr' => 'Sperm Donasyonu',
                    'en' => 'Sperm Donation',
                ],
                'excerpt' => [
                    'tr' => 'Donör spermi ile döllenme ve embriyo transferi süreci.',
                    'en' => 'Fertilization with donor sperm and embryo transfer.',
                ],
                'content' => [
                    'tr' => '<p>Uygun donör seçimi, hazırlık, laboratuvar döllenmesi (IVF/ICSI) ve transfer adımlarını içerir. Donör örnekleri yetkili bankalardan temin edilir.</p>',
                    'en' => '<p>Includes donor selection, preparation, IVF/ICSI fertilization, and transfer. Donor samples are sourced from accredited banks.</p>',
                ],
                'sections' => [
                    [
                        'heading' => ['tr' => 'Kimlere Uygun?', 'en' => 'Who Is It For?'],
                        'html' => [
                            'tr' => '<ul><li>Şiddetli erkek faktörü</li><li>Genetik taşıyıcılık riski</li><li>Bekar/çift talebi</li></ul>',
                            'en' => '<ul><li>Severe male factor</li><li>Genetic carrier risk</li><li>Single/couple request</li></ul>',
                        ],
                    ],
                    [
                        'heading' => ['tr' => 'Süreç Adımları', 'en' => 'Steps'],
                        'html' => [
                            'tr' => '<ol><li>Donör profili seçimi</li><li>Hazırlık ve senkronizasyon</li><li>IVF/ICSI</li><li>Embriyo transferi</li></ol>',
                            'en' => '<ol><li>Donor profile selection</li><li>Preparation & sync</li><li>IVF/ICSI</li><li>Embryo transfer</li></ol>',
                        ],
                    ],
                    [
                        'heading' => ['tr' => 'Ek Opsiyonlar', 'en' => 'Options'],
                        'html' => [
                            'tr' => '<p>NGS tarama ve embriyo saklama hizmetleri mevcuttur.</p>',
                            'en' => '<p>NGS screening and embryo storage available.</p>',
                        ],
                    ],
                ],
                'hero_image' => 'https://api.aydaivf.com/uploads/banner1_a97e8d6aa7.png',
                'meta_title' => ['tr' => 'Sperm Donasyonu', 'en' => 'Sperm Donation'],
                'meta_description' => [
                    'tr' => 'Sperm donasyonu süreç ve adımlar.',
                    'en' => 'Sperm donation process and steps.',
                ],
                'position' => 30,
                'published' => true,
            ]
        );
    }
}
