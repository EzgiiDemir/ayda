<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Menu;
use App\Models\MenuItem;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            // Menü kökü
            $main = Menu::firstOrCreate(['key' => 'main']);

            // Hakkımızda (parent)
            $about = MenuItem::updateOrCreate(
                ['menu_id' => $main->id, 'parent_id' => null, 'label_tr' => 'Hakkımızda'],
                ['label_en' => 'About Us', 'href' => null, 'order' => 1]
            );

            // Hakkımızda altları
            foreach ([
                         ['tr' => 'Neden Biz ?',  'en' => 'Why Us',     'href' => '/why-us',     'order' => 1],
                         ['tr' => 'Fiyatlarımız', 'en' => 'Our Prices', 'href' => '/our-prices', 'order' => 2],
                         ['tr' => 'Takımımız',    'en' => 'Our Team',   'href' => '/our-team',   'order' => 3],
                     ] as $c) {
                MenuItem::updateOrCreate(
                    ['menu_id' => $main->id, 'parent_id' => $about->id, 'href' => $c['href']],
                    ['label_tr' => $c['tr'], 'label_en' => $c['en'], 'order' => $c['order']]
                );
            }

            // Tedaviler (parent)
            $treatments = MenuItem::updateOrCreate(
                ['menu_id' => $main->id, 'parent_id' => null, 'label_tr' => 'Tedaviler'],
                ['label_en' => 'Treatments', 'href' => null, 'order' => 2]
            );

            // Tedaviler altları
            foreach ([
                         ['tr' => 'Tüp Bebek (IVF)',   'en' => 'IVF',          'href' => '/ivf-icsi',     'order' => 1],
                         ['tr' => 'Yumurta Donasyonu', 'en' => 'Egg Donation', 'href' => '/egg-donation', 'order' => 2],
                     ] as $c) {
                MenuItem::updateOrCreate(
                    ['menu_id' => $main->id, 'parent_id' => $treatments->id, 'href' => $c['href']],
                    ['label_tr' => $c['tr'], 'label_en' => $c['en'], 'order' => $c['order']]
                );
            }

            // Üst seviye tekil öğeler
            foreach ([
                         ['tr' => 'SSS',      'en' => 'FAQ',     'href' => '/faq',    'order' => 3],
                         ['tr' => 'Seyahat',  'en' => 'Travel',  'href' => '/travel', 'order' => 4],
                         ['tr' => 'İletişim', 'en' => 'Contact', 'href' => '/contact','order' => 5],
                     ] as $c) {
                MenuItem::updateOrCreate(
                    ['menu_id' => $main->id, 'parent_id' => null, 'href' => $c['href']],
                    ['label_tr' => $c['tr'], 'label_en' => $c['en'], 'order' => $c['order']]
                );
            }
        });
    }
}
