<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run()
    {
        $main = Menu::create(['key' => 'main']);

        $about = $main->items()->create([
            'label_tr' => 'Hakkımızda',
            'label_en' => 'About Us',
            'href' => null,
            'order' => 1,
        ]);

        $about->children()->createMany([
            ['label_tr' => 'Neden Biz ?', 'label_en' => 'Why Us', 'href' => '/why-us', 'order' => 1],
            ['label_tr' => 'Fiyatlarımız', 'label_en' => 'Our Prices', 'href' => '/our-prices', 'order' => 2],
            ['label_tr' => 'Takımımız', 'label_en' => 'Our Team', 'href' => '/our-team', 'order' => 3],
        ]);

        $main->items()->create([
            'label_tr' => 'Tedaviler',
            'label_en' => 'Treatments',
            'href' => null,
            'order' => 2,
        ])->children()->createMany([
            ['label_tr' => 'Tüp Bebek (IVF)', 'label_en' => 'IVF', 'href' => '/ivf-icsi', 'order' => 1],
            ['label_tr' => 'Yumurta Donasyonu', 'label_en' => 'Egg Donation', 'href' => '/egg-donation', 'order' => 2],
        ]);

        $main->items()->create(['label_tr' => 'SSS', 'label_en' => 'FAQ', 'href' => '/faq', 'order' => 3]);
        $main->items()->create(['label_tr' => 'Seyahat', 'label_en' => 'Travel', 'href' => '/travel', 'order' => 4]);
        $main->items()->create(['label_tr' => 'İletişim', 'label_en' => 'Contact', 'href' => '/contact', 'order' => 5]);
    }
}
