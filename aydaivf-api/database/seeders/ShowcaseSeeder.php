<?php
// database/seeders/ShowcaseSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Showcase;

class ShowcaseSeeder extends Seeder
{
    public function run(): void
    {
        // TR
        Showcase::updateOrCreate(
            ['locale' => 'tr', 'position' => 1],
            [
                // Örnek: API’nin uploads yolunu kullan (tam URL de verebilirsin)
                'image'     => '/uploads/showcase_tr.png', // yoksa kendi dosyanı koy
                'published' => true,
            ]
        );

        // EN
        Showcase::updateOrCreate(
            ['locale' => 'en', 'position' => 1],
            [
                'image'     => '/uploads/showcase_en.png',
                'published' => true,
            ]
        );
    }
}
