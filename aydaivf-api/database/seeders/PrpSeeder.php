<?php
// database/seeders/PrpSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Treatment;

class PrpSeeder extends Seeder
{
    public function run(): void
    {
        Treatment::updateOrCreate(
            ['slug' => 'ovarian-endometrial-prp'],
            [
                'title' => [
                    'tr' => 'PRP (Over/Endometrium)',
                    'en' => 'PRP (Ovarian/Endometrial)',
                ],
                'excerpt' => [
                    'tr' => 'Kişinin kendi kanından elde edilen trombositten zengin plazmanın over veya endometriuma uygulanması.',
                    'en' => 'Autologous platelet-rich plasma applied to ovary or endometrium.',
                ],
                'content' => [
                    'tr' => '<p>PRP, doku yenilenmesini destekleyen büyüme faktörleri içerir. İnce endometrium ve zayıf over rezervi durumlarında destek tedavisi olarak kullanılabilir.</p>',
                    'en' => '<p>PRP contains growth factors that may aid tissue regeneration. Used as adjunct in thin endometrium or diminished ovarian reserve.</p>',
                ],
                'sections' => [
                    [
                        'heading' => ['tr' => 'Endikasyonlar', 'en' => 'Indications'],
                        'html' => [
                            'tr' => '<ul><li>İnce endometrium</li><li>Düşük over rezervi</li><li>Tekrarlayan implantasyon başarısızlığı</li></ul>',
                            'en' => '<ul><li>Thin endometrium</li><li>Diminished ovarian reserve</li><li>Repeated implantation failure</li></ul>',
                        ],
                    ],
                    [
                        'heading' => ['tr' => 'Uygulama', 'en' => 'Procedure'],
                        'html' => [
                            'tr' => '<ol><li>Kan alımı ve PRP hazırlığı</li><li>Ultrason eşliğinde intraovaryen veya intrauterin uygulama</li><li>Takip ve değerlendirme</li></ol>',
                            'en' => '<ol><li>Blood draw and PRP prep</li><li>Ultrasound-guided intra-ovarian or intra-uterine application</li><li>Follow-up</li></ol>',
                        ],
                    ],
                    [
                        'heading' => ['tr' => 'Notlar', 'en' => 'Notes'],
                        'html' => [
                            'tr' => '<p>Tedavi etkinliği kişiye göre değişir. Doktor onayı ve uygunluk değerlendirmesi gereklidir.</p>',
                            'en' => '<p>Efficacy varies by patient. Requires clinician approval and eligibility assessment.</p>',
                        ],
                    ],
                ],
                'hero_image' => 'https://api.aydaivf.com/uploads/banner1_a97e8d6aa7.png',
                'meta_title' => ['tr' => 'PRP Tedavisi', 'en' => 'PRP Treatment'],
                'meta_description' => [
                    'tr' => 'Over ve endometrium için PRP uygulaması, endikasyonlar ve süreç.',
                    'en' => 'PRP for ovary and endometrium, indications and procedure.',
                ],
                'position' => 60,
                'published' => true,
            ]
        );
    }
}
