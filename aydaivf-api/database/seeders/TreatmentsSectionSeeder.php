<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TreatmentsSectionSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('treatments_sections')->insert([
            [
                'locale' => 'tr',
                'title' => 'Tedavi Yöntemlerimiz',
                'subtitle' => 'En Sık Tercih Edilen',
                'intro' => 'Ayda Tüp Bebek Ekibini ziyaret etmeden önce ...',
                'intro2' => 'Tedavilerimizi inceledikten sonra ...',
                'background' => 'https://api.aydaivf.com/uploads/logoonly.svg',
                'ctaText' => 'Bizimle İletişime Geçin',
                'ctaLink' => '/tr/iletisim',
                'treatments' => json_encode([
                    ['slug'=>'ivf-icsi','label'=>'Tüp Bebek (IVF) - ICSI'],
                    ['slug'=>'egg-donation','label'=>'Yumurta Donasyonu'],
                    ['slug'=>'sperm-donation','label'=>'Sperm Donasyonu'],
                    ['slug'=>'embryo-donation','label'=>'Embriyo Donasyonu'],
                ]),
            ],
            [
                'locale' => 'en',
                'title' => 'Our Treatments',
                'subtitle' => 'Most Preferred',
                'intro' => 'Before visiting Ayda IVF Team ...',
                'intro2' => 'After reviewing our treatments ...',
                'background' => 'https://api.aydaivf.com/uploads/logoonly.svg',
                'ctaText' => 'Contact Us',
                'ctaLink' => '/en/contact',
                'treatments' => json_encode([
                    ['slug'=>'ivf-icsi','label'=>'IVF - ICSI'],
                    ['slug'=>'egg-donation','label'=>'Egg Donation'],
                    ['slug'=>'sperm-donation','label'=>'Sperm Donation'],
                    ['slug'=>'embryo-donation','label'=>'Embryo Donation'],
                ]),
            ],
        ]);
    }
}
