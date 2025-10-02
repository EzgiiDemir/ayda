<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;
use App\Models\TeamMember;

class OurTeamSeeder extends Seeder
{
    public function run(): void
    {
        Page::updateOrCreate(
            ['slug' => 'our-team'],
            [
                'title' => ['tr'=>'Takımımız','en'=>'Our Team'],
                'content' => [
                    'tr'=>'<p>Alanında uzman kadromuzla yanınızdayız.</p>',
                    'en'=>'<p>Our expert team is here for you.</p>',
                ],
                'meta_title' => ['tr'=>'Ayda IVF Takım','en'=>'Ayda IVF Team'],
                'meta_description' => [
                    'tr'=>'Doktorlar, embriyologlar ve koordinasyon ekibi',
                    'en'=>'Doctors, embryologists and coordination team',
                ],
                'hero_image' => 'https://api.aydaivf.com/uploads/elitebig_7bc1166778.jpg',
                'sections' => [
                    [
                        'heading' => ['tr'=>'Tıbbi Kadro','en'=>'Medical Staff'],
                        'html'    => ['tr'=>'<p>Tedavinizi yürüten hekimlerimiz.</p>','en'=>'<p>Our physicians.</p>'],
                    ],
                    [
                        'heading' => ['tr'=>'Laboratuvar Ekibi','en'=>'Lab Team'],
                        'html'    => ['tr'=>'<p>Embriyoloji ve genetik laboratuvarı.</p>','en'=>'<p>Embryology and genetics.</p>'],
                    ],
                ],
            ]
        );

        $rows = [
            [
                'slug'=>'dr-ali-yilmaz',
                'name'=>['tr'=>'Op. Dr. Ali Yılmaz','en'=>'Ali Yilmaz, MD'],
                'role'=>['tr'=>'Kadın Hastalıkları ve Doğum','en'=>'Obstetrics and Gynecology'],
                'bio' =>['tr'=>'<p>ÜYTE ve IVF deneyimi.</p>','en'=>'<p>ART and IVF experience.</p>'],
                'image'=>'https://api.aydaivf.com/uploads/team1.jpg',
                'position'=>10,'published'=>true,
            ],
            [
                'slug'=>'zeynep-demir',
                'name'=>['tr'=>'Uzm. Embriyolog Zeynep Demir','en'=>'Embryologist Zeynep Demir'],
                'role'=>['tr'=>'Embriyolog','en'=>'Embryologist'],
                'bio' =>['tr'=>'<p>ICSI ve PGT laboratuvar sorumlusu.</p>','en'=>'<p>ICSI and PGT lead.</p>'],
                'image'=>'https://api.aydaivf.com/uploads/team2.jpg',
                'position'=>20,'published'=>true,
            ],
            [
                'slug'=>'derya-kaya',
                'name'=>['tr'=>'Derya Kaya','en'=>'Derya Kaya'],
                'role'=>['tr'=>'Hasta Koordinatörü','en'=>'Patient Coordinator'],
                'bio' =>['tr'=>'<p>Süreç planlama ve iletişim.</p>','en'=>'<p>Planning and comms.</p>'],
                'image'=>'https://api.aydaivf.com/uploads/team3.jpg',
                'position'=>30,'published'=>true,
            ],
        ];

        foreach ($rows as $r) {
            TeamMember::updateOrCreate(['slug'=>$r['slug']], $r);
        }
    }
}
