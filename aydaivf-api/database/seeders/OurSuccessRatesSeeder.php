<?php
// database/seeders/OurSuccessRatesSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;
use App\Models\SuccessRate;

class OurSuccessRatesSeeder extends Seeder
{
    public function run(): void
    {
        Page::updateOrCreate(
            ['slug'=>'our-success-rates'],
            [
                'title' => ['tr'=>'Başarı Oranlarımız','en'=>'Our Success Rates'],
                'content' => [
                    'tr'=>'<p>Merkezimizdeki güncel başarı oranlarına dair örnek veriler.</p>',
                    'en'=>'<p>Sample success rates for demonstration.</p>'
                ],
                'meta_title' => ['tr'=>'Başarı Oranları','en'=>'Success Rates'],
                'meta_description' => [
                    'tr'=>'IVF ve ilgili işlemlerde başarı oranları',
                    'en'=>'Success rates for IVF and related treatments'
                ],
                'hero_image' => 'https://api.aydaivf.com/uploads/elitebig_7bc1166778.jpg',
                'sections' => [
                    [
                        'heading' => ['tr'=>'Genel Bakış','en'=>'Overview'],
                        'html'    => ['tr'=>'<p>Oranlar dönemsel olarak güncellenir.</p>','en'=>'<p>Rates are updated periodically.</p>'],
                    ],
                ],
            ]
        );

        $rows = [
            // IVF
            ['slug'=>'ivf-overall','group_key'=>'ivf',
                'group_title'=>['tr'=>'IVF / ICSI','en'=>'IVF / ICSI'],
                'name'=>['tr'=>'Genel Klinik Gebelik Oranı','en'=>'Overall clinical pregnancy rate'],
                'rate'=>65.0,'unit'=>'%','position'=>10,'published'=>true],
            ['slug'=>'ivf-under-35','group_key'=>'ivf',
                'group_title'=>['tr'=>'IVF / ICSI','en'=>'IVF / ICSI'],
                'name'=>['tr'=>'<35 yaş','en'=>'Age <35'],'rate'=>68.0,'unit'=>'%','position'=>20,'published'=>true],
            ['slug'=>'ivf-35-39','group_key'=>'ivf',
                'group_title'=>['tr'=>'IVF / ICSI','en'=>'IVF / ICSI'],
                'name'=>['tr'=>'35–39 yaş','en'=>'Age 35–39'],'rate'=>58.0,'unit'=>'%','position'=>30,'published'=>true],

            // Donation
            ['slug'=>'donor-egg','group_key'=>'donation',
                'group_title'=>['tr'=>'Donasyon','en'=>'Donation'],
                'name'=>['tr'=>'Yumurta Donasyonu Başarı Oranı','en'=>'Egg donation success rate'],
                'rate'=>78.0,'unit'=>'%','position'=>10,'published'=>true],

            // Male factor ops
            ['slug'=>'tese-cycle','group_key'=>'male',
                'group_title'=>['tr'=>'Erkek Faktörü','en'=>'Male Factor'],
                'name'=>['tr'=>'TESE sonrası döllenme','en'=>'Fertilization after TESE'],
                'rate'=>52.0,'unit'=>'%','position'=>10,'published'=>true],
        ];

        foreach ($rows as $r) {
            SuccessRate::updateOrCreate(['slug'=>$r['slug']], $r);
        }
    }
}
