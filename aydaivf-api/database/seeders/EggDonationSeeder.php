<?php
// database/seeders/EggDonationSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Treatment;

class EggDonationSeeder extends Seeder
{
    public function run(): void
    {
        Treatment::updateOrCreate(
            ['slug' => 'egg-donation'],
            [
                'title' => [
                    'tr' => 'Yumurta Donasyonu',
                    'en' => 'Egg Donation',
                ],
                'excerpt' => [
                    'tr' => 'Yumurta bağışçısından alınan oositlerin alıcıya ait sperm ile döllendirilmesi ve embriyo transferi.',
                    'en' => 'Fertilization of donor oocytes with recipient partner’s sperm and embryo transfer.',
                ],
                'content' => [
                    'tr' => '<p>Uygun donör seçimi, senkronizasyon, oosit toplama, döllenme ve transfer adımlarını içerir. Donörler KKTC Sağlık Bakanlığı kriterlerine uygundur.</p>',
                    'en' => '<p>Includes donor matching, synchronization, oocyte retrieval, fertilization and transfer. Donors comply with Ministry of Health criteria.</p>',
                ],
                'sections' => [
                    [
                        'heading' => ['tr' => 'Kimlere Uygun?', 'en' => 'Who Is It For?'],
                        'html' => [
                            'tr' => '<ul><li>Yetersiz yumurta rezervi</li><li>Genetik taşıyıcılık</li><li>Tekrarlayan IVF başarısızlığı</li></ul>',
                            'en' => '<ul><li>Diminished ovarian reserve</li><li>Genetic carrier status</li><li>Repeated IVF failure</li></ul>',
                        ],
                    ],
                    [
                        'heading' => ['tr' => 'Süreç Adımları', 'en' => 'Steps'],
                        'html' => [
                            'tr' => '<ol><li>Donör eşleştirme</li><li>Hazırlık ve senkronizasyon</li><li>Oosit toplama ve ICSI</li><li>Embriyo transferi</li></ol>',
                            'en' => '<ol><li>Donor matching</li><li>Preparation and sync</li><li>OPU and ICSI</li><li>Embryo transfer</li></ol>',
                        ],
                    ],
                    [
                        'heading' => ['tr' => 'Notlar', 'en' => 'Notes'],
                        'html' => [
                            'tr' => '<p>Genetik tarama (NGS) ve embriyo saklama seçenekleri mevcuttur.</p>',
                            'en' => '<p>NGS and embryo storage options are available.</p>',
                        ],
                    ],
                ],
                'hero_image' => 'https://api.aydaivf.com/uploads/banner1_a97e8d6aa7.png',
                'meta_title' => ['tr' => 'Yumurta Donasyonu', 'en' => 'Egg Donation'],
                'meta_description' => [
                    'tr' => 'Yumurta donasyonu süreç, endikasyonlar ve adımlar.',
                    'en' => 'Egg donation process, indications and steps.',
                ],
                'position' => 20,
                'published' => true,
            ]
        );
    }
}
