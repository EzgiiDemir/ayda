<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;
use App\Models\ContactInfo;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        Page::updateOrCreate(
            ['slug' => 'contact'],
            [
                'title' => ['tr'=>'İletişim','en'=>'Contact'],
                'content' => [
                    'tr'=>'<p>Randevu ve sorularınız için bize yazın.</p>',
                    'en'=>'<p>Write to us for appointments and questions.</p>',
                ],
                'hero_image' => 'https://api.aydaivf.com/uploads/banner1_a97e8d6aa7.png',
                'meta_title' => ['tr'=>'İletişim','en'=>'Contact'],
                'meta_description' => [
                    'tr'=>'Adres, telefon, çalışma saatleri ve iletişim formu.',
                    'en'=>'Address, phone, workhours and contact form.',
                ],
                'published' => true,
            ]
        );

        ContactInfo::updateOrCreate(
            ['id'=>1],
            [
                'address_title' => ['tr'=>'Adres','en'=>'Address'],
                'address_text'  => ['tr'=>'Ayda IVF Center, Lefkoşa, K.K.T.C.','en'=>'Ayda IVF Center, Nicosia, TRNC'],
                'workhours'     => ['tr'=>'PTESİ - CUMA : 9:00 - 14:00','en'=>'MON - FRI : 9:00 - 14:00'],
                'phone'         => '+90 000 000 00 00',
                'email'         => 'info@aydaivf.com',
                'whatsapp_url'  => 'https://wa.me/900000000000',
                'socials'       => [
                    ['platform'=>'instagram','url'=>'https://instagram.com/aydaivf','icon'=>'/icons/ig.svg'],
                    ['platform'=>'facebook','url'=>'https://facebook.com/aydaivf','icon'=>'/icons/fb.svg'],
                ],
                'map_url'       => 'https://maps.google.com/?q=Ayda+IVF+Center',
                'map_embed'     => '<iframe src="https://maps.google.com/maps?q=Ayda%20IVF%20Center&t=&z=14&ie=UTF8&iwloc=&output=embed" width="100%" height="300" style="border:0" loading="lazy"></iframe>',
            ]
        );
    }
}
