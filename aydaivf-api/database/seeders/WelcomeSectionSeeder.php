<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WelcomeSection;

class WelcomeSectionSeeder extends Seeder
{
    public function run()
    {
        WelcomeSection::truncate();

        WelcomeSection::create([
            'locale' => 'tr',
            'image' => 'https://api.aydaivf.com/uploads/1617890130_4018_org_74c04c13d4.png',
            'title' => 'Hoş Geldiniz',
            'subtitle' => 'Ayda-Tüp Bebek Web Sitesine',
            'content' => '<p>Kuzey Kıbrıs’ın başkenti Lefkoşa...</p>',
            'ceo_name' => 'Tanyel FELEK, MS',
            'ceo_title'=> 'Ayda Tüp Bebek Takımı Direktörü & Embriyoloji Laboratuvarı Sorumlusu'
        ]);

        WelcomeSection::create([
            'locale' => 'en',
            'image' => 'https://api.aydaivf.com/uploads/1617890130_4018_org_74c04c13d4.png',
            'title' => 'Welcome',
            'subtitle' => 'To Ayda IVF Website',
            'content' => '<p>Our clinic is located in the center of Nicosia...</p>',
            'ceo_name' => 'Tanyel FELEK, MS',
            'ceo_title'=> 'Director & Head of Embryology Laboratory'
        ]);
    }
}
