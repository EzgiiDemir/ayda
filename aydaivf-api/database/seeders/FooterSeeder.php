<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FooterSeeder extends Seeder {
    public function run(): void {
        DB::table('footers')->insert([
            [
                'locale' => 'tr',
                'address_title' => 'Adresimiz',
                'address_text' => 'Şehit Erdoğan Yıldız Cd. No:5 Kızılay, Lefkoşa Kuzey Kıbrıs (KKTC)',
                'address_icon' => '/uploads/map_white.svg',
                'address_image' => '/uploads/iso1.png',

                'contact_title' => 'İletişim',
                'phone' => '+90 548 825 28 21',
                'email' => 'info@aydaivf.com',
                'socials' => json_encode([
                    ['type' => 'facebook', 'url' => 'https://facebook.com/aydaivf'],
                    ['type' => 'instagram', 'url' => 'https://instagram.com/aydaivf'],
                    ['type' => 'youtube', 'url' => 'https://youtube.com/@aydaivf'],
                ]),

                'quicklinks_title' => 'Hızlı Erişim',
                'quicklinks' => json_encode([
                    ['label' => 'Anasayfa', 'href' => '/tr'],
                    ['label' => 'Tedaviler', 'href' => '/tr/treatments'],
                    ['label' => 'Seyahat', 'href' => '/tr/travel'],
                ]),

                'copyright' => '© 2025 Tüm hakları saklıdır',
                'logo' => '/uploads/footer_logo.png',
            ]
        ]);
    }
}
