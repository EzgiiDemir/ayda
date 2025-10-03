<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        Menu::query()->updateOrCreate(
            ['key' => 'main'],
            [
                'slug'         => 'main',
                'brand'        => 'Ayda IVF Center',
                'brand_logo'   => '/uploads/ayda_logo_9e8994bffd.png',
                'whatsapp_url' => 'https://wa.me/+905488252821',
                'colors'       => [
                    'hoverPink'   => 'hover:bg-ayda-pink-dark',
                    'dropdownBg'  => 'bg-gray-200',
                    'phoneHoverBg'=> 'hover:bg-ayda-blue',
                ],
                'items' => [
                    [
                        'href' => '#',
                        'label' => ['tr'=>'Hakkımızda','en'=>'About'],
                        'children' => [
                            ['href'=>'why-us',            'label'=>['tr'=>'Neden Biz ?','en'=>'Why Us?']],
                            ['href'=>'our-prices',        'label'=>['tr'=>'Fiyatlarımız','en'=>'Our Prices']],
                            ['href'=>'our-team',          'label'=>['tr'=>'Takımımız','en'=>'Our Team']],
                            ['href'=>'our-success-rates', 'label'=>['tr'=>'Başarı Oranlarımız','en'=>'Success Rates']],
                        ],
                    ],
                    [
                        'href' => '#',
                        'label' => ['tr'=>'Tedaviler','en'=>'Treatments'],
                        'children' => [
                            ['href'=>'ivf-icsi',              'label'=>['tr'=>'Tüp Bebek (IVF) - ICSI','en'=>'IVF - ICSI']],
                            ['href'=>'egg-donation',          'label'=>['tr'=>'Yumurta Donasyonu','en'=>'Egg Donation']],
                            ['href'=>'sperm-donation',        'label'=>['tr'=>'Sperm Donasyonu','en'=>'Sperm Donation']],
                            ['href'=>'embryo-donation',       'label'=>['tr'=>'Embriyo Donasyonu','en'=>'Embryo Donation']],
                            ['href'=>'egg-freezing',          'label'=>['tr'=>'Yumurta Dondurma','en'=>'Egg Freezing']],
                            ['href'=>'ovarian-endometrial-prp','label'=>['tr'=>'Ovarian ve Endometrial PRP','en'=>'Ovarian & Endometrial PRP']],
                            ['href'=>'acupuncture',           'label'=>['tr'=>'Akupunktur','en'=>'Acupuncture']],
                        ],
                    ],
                    ['href'=>'faq',     'label'=>['tr'=>'SSS','en'=>'FAQ']],
                    ['href'=>'travel',  'label'=>['tr'=>'Seyahat','en'=>'Travel']],
                    ['href'=>'contact', 'label'=>['tr'=>'İletişim','en'=>'Contact']],
                ],
            ]
        );
    }
}
