<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\Treatment;
use Illuminate\Database\Seeder;
class CmsSeeder extends Seeder {
    public function run(): void {
        Page::updateOrCreate(['slug'=>'home'], [
            'title'=>['tr'=>'Gelin size sahip olabileceğiniz\nen güzel hediyeyi verelim','en'=>'Let us give you the most beautiful gift'],
            'content'=>['tr'=>'Kuzey Kıbrıs Lefkoşa’nın merkezinde bulunan kliniğimiz...','en'=>'Our clinic in the heart of Nicosia, Northern Cyprus...'],
        ]);

        Page::updateOrCreate(['slug'=>'hakkimizda'], [
            'title'=>['tr'=>'Hakkımızda','en'=>'About Us'],
            'content'=>['tr'=>'<p>Ayda IVF hakkında...</p>','en'=>'<p>About Ayda IVF...</p>'],
        ]);

        Page::updateOrCreate(['slug'=>'seyahat'], [
            'title'=>['tr'=>'Seyahat','en'=>'Travel'],
            'content'=>['tr'=>'<p>Transfer ve konaklama...</p>','en'=>'<p>Transfers & stay...</p>'],
        ]);

        Page::updateOrCreate(['slug'=>'sss'], [
            'title'=>['tr'=>'Sık Sorulan Sorular','en'=>'FAQ'],
            'content'=>['tr'=>'<p>...</p>','en'=>'<p>...</p>'],
        ]);

        Page::updateOrCreate(['slug'=>'iletisim'], [
            'title'=>['tr'=>'İletişim','en'=>'Contact'],
            'content'=>['tr'=>'<p>Adres ve telefon...</p>','en'=>'<p>Address and phone...</p>'],
        ]);

        Treatment::updateOrCreate(['slug'=>'tedaviler/tupbebekivf'], [
            'title'=>['tr'=>'Tüp Bebek (IVF) - ICSI','en'=>'IVF - ICSI'],
            'content'=>['tr'=>'<p>Detay...</p>','en'=>'<p>Detail...</p>'],
            'image'=>'/images/ivf.jpg',
        ]);

        Treatment::updateOrCreate(['slug'=>'tedaviler/yumurtadonasyonu'], [
            'title'=>['tr'=>'Yumurta Donasyonu','en'=>'Egg Donation'],
            'content'=>['tr'=>'<p>Detay...</p>','en'=>'<p>Detail...</p>'],
            'image'=>'/images/egg.jpg',
        ]);
    }
}
