<?php
// database/seeders/AcupunctureSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Treatment;

class AcupunctureSeeder extends Seeder
{
    public function run(): void
    {
        Treatment::updateOrCreate(
            ['slug' => 'acupuncture'],
            [
                'title' => [
                    'tr' => 'Akupunktur',
                    'en' => 'Acupuncture',
                ],
                'excerpt' => [
                    'tr' => 'Üreme tedavilerinde destek amaçlı akupunktur uygulaması.',
                    'en' => 'Adjunct acupuncture within fertility treatments.',
                ],
                'content' => [
                    'tr' => '<p>Akupunktur; stres yönetimi, kan akımı ve rahim reseptivitesinin desteklenmesi amacıyla IVF süreçlerinde yardımcı yöntem olarak uygulanabilir.</p>',
                    'en' => '<p>Acupuncture may help stress control, blood flow, and endometrial receptivity as an adjunct during IVF.</p>',
                ],
                'sections' => [
                    [
                        'heading' => ['tr' => 'Endikasyonlar', 'en' => 'Indications'],
                        'html' => [
                            'tr' => '<ul><li>IVF/ICSI sürecinde destek</li><li>Embriyo transferi öncesi/sonrası rahatlama</li><li>Stres ve anksiyete yönetimi</li></ul>',
                            'en' => '<ul><li>Adjunct during IVF/ICSI</li><li>Relaxation pre/post embryo transfer</li><li>Stress and anxiety control</li></ul>',
                        ],
                    ],
                    [
                        'heading' => ['tr' => 'Uygulama', 'en' => 'Procedure'],
                        'html' => [
                            'tr' => '<ol><li>Kısa değerlendirme</li><li>Yaklaşık 20–30 dk seans</li><li>Planlanan seans sayısı kişiye özeldir</li></ol>',
                            'en' => '<ol><li>Brief assessment</li><li>~20–30 min session</li><li>Number of sessions individualized</li></ol>',
                        ],
                    ],
                    [
                        'heading' => ['tr' => 'Notlar', 'en' => 'Notes'],
                        'html' => [
                            'tr' => '<p>Etkinlik kişiye göre değişir. Klinik endikasyon ve doktor onayı ile uygulanır.</p>',
                            'en' => '<p>Efficacy varies by patient. Per clinician indication and approval.</p>',
                        ],
                    ],
                ],
                'hero_image' => 'https://api.aydaivf.com/uploads/banner1_a97e8d6aa7.png',
                'meta_title' => ['tr' => 'Akupunktur', 'en' => 'Acupuncture'],
                'meta_description' => [
                    'tr' => 'Akupunktur: endikasyonlar, uygulama ve notlar.',
                    'en' => 'Acupuncture: indications, procedure, notes.',
                ],
                'position' => 70,
                'published' => true,
            ]
        );
    }
}
