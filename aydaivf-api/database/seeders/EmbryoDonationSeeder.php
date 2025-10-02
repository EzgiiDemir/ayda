<?php
// database/seeders/EmbryoDonationSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Treatment;

class EmbryoDonationSeeder extends Seeder
{
    public function run(): void
    {
        Treatment::updateOrCreate(
            ['slug' => 'embryo-donation'],
            [
                'title' => [
                    'tr' => 'Embriyo Donasyonu',
                    'en' => 'Embryo Donation',
                ],
                'excerpt' => [
                    'tr' => 'Donör yumurta ve donör sperm ile oluşturulan embriyoların transferi.',
                    'en' => 'Transfer of embryos created with donor eggs and donor sperm.',
                ],
                'content' => [
                    'tr' => '<p>Uygun donör eşleştirmesi sonrası laboratuvarda döllenme gerçekleştirilir. Hazırlık, embriyo seçimi ve transfer süreçlerini içerir.</p>',
                    'en' => '<p>After suitable donor matching, fertilization occurs in the lab. Includes preparation, embryo selection, and transfer.</p>',
                ],
                'sections' => [
                    [
                        'heading' => ['tr' => 'Kimlere Uygun?', 'en' => 'Who Is It For?'],
                        'html' => [
                            'tr' => '<ul><li>Hem yumurta hem sperm faktörü olan çiftler</li><li>Yüksek genetik risk</li><li>Tekrarlayan tedavi başarısızlıkları</li></ul>',
                            'en' => '<ul><li>Couples with both egg and sperm factors</li><li>High genetic risk</li><li>Repeated treatment failures</li></ul>',
                        ],
                    ],
                    [
                        'heading' => ['tr' => 'Süreç Adımları', 'en' => 'Steps'],
                        'html' => [
                            'tr' => '<ol><li>Donör seçimi</li><li>Laboratuvarda döllenme</li><li>Embriyo kültürü ve seçimi</li><li>Transfer</li></ol>',
                            'en' => '<ol><li>Donor selection</li><li>Lab fertilization</li><li>Embryo culture and selection</li><li>Transfer</li></ol>',
                        ],
                    ],
                    [
                        'heading' => ['tr' => 'Ek Hizmetler', 'en' => 'Extras'],
                        'html' => [
                            'tr' => '<p>PGT/NGS tarama ve embriyo saklama seçenekleri mevcuttur.</p>',
                            'en' => '<p>PGT/NGS screening and embryo storage are available.</p>',
                        ],
                    ],
                ],
                'hero_image' => 'https://api.aydaivf.com/uploads/banner1_a97e8d6aa7.png',
                'meta_title' => ['tr' => 'Embriyo Donasyonu', 'en' => 'Embryo Donation'],
                'meta_description' => [
                    'tr' => 'Embriyo donasyonu süreç, adaylar ve adımlar.',
                    'en' => 'Embryo donation process, candidates and steps.',
                ],
                'position' => 40,
                'published' => true,
            ]
        );
    }
}
