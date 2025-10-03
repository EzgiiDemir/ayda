<?php
// database/seeders/TreatmentsSectionSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TreatmentsSection;

class TreatmentsSectionSeeder extends Seeder
{
    public function run(): void
    {
        // TR
        TreatmentsSection::updateOrCreate(
            ['locale' => 'tr'],
            [
                'title'      => 'Tedavi Yöntemlerimiz',
                'subtitle'   => 'En Sık Tercih Edilen',
                'intro'      => 'Ayda Tüp Bebek Ekibini ziyaret etmeden önce tedaviniz hakkında daha detaylı bilgiye ulaşabilmeniz için sizlere özel olarak, her bir detayı özenle düşünerek hazırlamış olduğumuz tedavi yöntemlerimize mutlaka bir göz atınız. Burada size uygun tedavinizi daha yakından inceleme fırsatına ve detaylı bilgi edinebilme şansına sahip olacaksınız.',
                'intro2'     => 'Tedavilerimizi inceledikten sonra merak ettiğiniz tüm sorularınız için bir telefon kadar uzağınızda olduğumuzu unutmayınız. Sizlerle tanışmak ve sağlıklı bir bebek kucağınıza almanız için sizlere profesyonel yardımda bulunmayı dört gözle bekliyoruz.',
                'background' => 'https://api.aydaivf.com/uploads/logoonly.svg',
                'cta_text'   => 'Bizimle İletişime Geçin',
                'cta_link'   => '/tr/iletisim',
                'treatments' => [
                    ['slug' => 'ivf-icsi',                 'label' => 'Tüp Bebek (IVF) - ICSI'],
                    ['slug' => 'egg-donation',            'label' => 'Yumurta Donasyonu'],
                    ['slug' => 'sperm-donation',          'label' => 'Sperm Donasyonu'],
                    ['slug' => 'embryo-donation',         'label' => 'Embriyo Donasyonu'],
                    ['slug' => 'ovarian-endometrial-prp', 'label' => 'Ovarian ve Endometrial PRP'],
                    ['slug' => 'embryo-genetic-ngs',      'label' => 'Embriyo Genetik Tarama (NGS, Tek Gen)'],
                    ['slug' => 'gender-selection-pgd',    'label' => 'Cinsiyet Seçimi (PGD)'],
                    ['slug' => 'egg-freezing',            'label' => 'Yumurta Dondurma'],
                    ['slug' => 'surrogacy',               'label' => 'Taşıyıcı Annelik'],
                    ['slug' => 'embryo-genetic-pgd',      'label' => 'Embriyo Genetik Tarama (PGD)'],
                ],
            ]
        );

        // EN
        TreatmentsSection::updateOrCreate(
            ['locale' => 'en'],
            [
                'title'      => 'Our Treatments',
                'subtitle'   => 'Most Preferred',
                'intro'      => 'Before visiting the Ayda IVF Team, please take a close look at our treatment methods that we have carefully prepared for you. Here you will have the chance to review your suitable treatment in detail and get more information.',
                'intro2'     => 'After reviewing our treatments, remember that we are only a phone call away for all your questions. We look forward to meeting you and providing professional support so that you can hold a healthy baby.',
                'background' => 'https://api.aydaivf.com/uploads/logoonly.svg',
                'cta_text'   => 'Contact Us',
                'cta_link'   => '/en/contact',
                'treatments' => [
                    ['slug' => 'ivf-icsi',                 'label' => 'IVF - ICSI'],
                    ['slug' => 'egg-donation',            'label' => 'Egg Donation'],
                    ['slug' => 'sperm-donation',          'label' => 'Sperm Donation'],
                    ['slug' => 'embryo-donation',         'label' => 'Embryo Donation'],
                    ['slug' => 'ovarian-endometrial-prp', 'label' => 'Ovarian & Endometrial PRP'],
                    ['slug' => 'embryo-genetic-ngs',      'label' => 'Embryo Genetic Screening (NGS, Single Gene)'],
                    ['slug' => 'gender-selection-pgd',    'label' => 'Gender Selection (PGD)'],
                    ['slug' => 'egg-freezing',            'label' => 'Egg Freezing'],
                    ['slug' => 'surrogacy',               'label' => 'Surrogacy'],
                    ['slug' => 'embryo-genetic-pgd',      'label' => 'Embryo Genetic Screening (PGD)'],
                ],
            ]
        );
    }
}
