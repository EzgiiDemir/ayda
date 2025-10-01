<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShowcaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('showcases')->insert([
            [
                'locale' => 'tr',
                'image' => 'https://api.aydaivf.com/uploads/showcase_tr.png',
            ],
            [
                'locale' => 'en',
                'image' => 'https://api.aydaivf.com/uploads/showcase_en.png',
            ],
        ]);
    }
}
