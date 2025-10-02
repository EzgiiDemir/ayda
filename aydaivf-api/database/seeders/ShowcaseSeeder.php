<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShowcaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('showcases')->updateOrInsert(
            ['slug' => 'why-us', 'locale' => 'tr'],
            [
                'image'      => 'https://api.aydaivf.com/uploads/showcase_tr.png',
                'aspect'     => '16/7',     // tablo varsa
                'max_height' => 400,        // tablo varsa
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );

        DB::table('showcases')->updateOrInsert(
            ['slug' => 'why-us', 'locale' => 'en'],
            [
                'image'      => 'https://api.aydaivf.com/uploads/showcase_en.png',
                'aspect'     => '16/7',
                'max_height' => 400,
                'updated_at' => now(),
                'created_at' => now(),
            ]
        );
    }
}
