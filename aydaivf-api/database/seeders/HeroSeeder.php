<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HeroSeeder extends Seeder
{
    public function run()
    {
        DB::table('heroes')->insert([
            [
                'locale' => 'tr',
                'title' => 'En Güzel Hediyeyi Verelim',
                'subtitle' => 'Gelin Size Sahip Olabileceğiniz',
                'background' => 'https://api.aydaivf.com/uploads/banner1_a97e8d6aa7.png',
                'dots' => '/images/dots.png',
                'workhours' => 'PTESİ - CUMA : 9:00 - 14:00',
                'footerText' => 'Ayda IVF Center',
            ],
            [
                'locale' => 'en',
                'title' => 'Let Us Give You the Most Beautiful Gift',
                'subtitle' => 'Come and Own',
                'background' => 'https://api.aydaivf.com/uploads/banner1_a97e8d6aa7.png',
                'dots' => '/images/dots.png',
                'workhours' => 'MON - FRI : 9:00 - 14:00',
                'footerText' => 'Ayda IVF Center',
            ]
        ]);
    }
}
