<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;
use App\Models\Price;

class OurPricesSeeder extends Seeder
{
    public function run(): void
    {
        // Sayfa kaydı
        Page::updateOrCreate(
            ['slug' => 'our-prices'],
            [
                'title' => [
                    'tr' => 'Fiyatlarımız',
                    'en' => 'Our Prices',
                ],
                'content' => [
                    'tr' => '<p>Aşağıda en sık kullanılan tedavi yöntemlerimizin fiyatları yer almaktadır. Daha fazla bilgi için bizimle iletişime geçebilirsiniz.</p>',
                    'en' => '<p>Below you can find prices for our most common treatments. Please contact us for more details.</p>',
                ],
                'meta_title' => [
                    'tr' => 'Ayda IVF Fiyatlar',
                    'en' => 'Ayda IVF Prices',
                ],
                'meta_description' => [
                    'tr' => 'IVF, ICSI, IUI ve diğer tedavi fiyatları',
                    'en' => 'Prices for IVF, ICSI, IUI and other treatments',
                ],
                'hero_image' => 'https://api.aydaivf.com/uploads/banner1_a97e8d6aa7.png',
                'sections' => [
                    [
                        'heading' => [
                            'tr' => 'Tüp Bebek Fiyatları',
                            'en' => 'IVF Prices',
                        ],
                        'html' => [
                            'tr' => '<p>En güncel IVF paket fiyatlarımız aşağıda listelenmiştir.</p>',
                            'en' => '<p>Our latest IVF package prices are listed below.</p>',
                        ],
                    ],
                    [
                        'heading' => [
                            'tr' => 'İşlemlerimize Dair Bilmeniz Gereken Önemli Detaylar',
                            'en' => 'Important Details About Our Procedures',
                        ],
                        'html' => [
                            'tr' => join('', [
                                '<p>Sperm donasyonu işlemleri için kullanılan spermler Avrupa’nın en geniş sperm bağışçısı havuzuna sahip <strong>European Sperm Bankası</strong>’ndan ithal edilip, K.K.T.C. Sağlık Bakanlığı <strong>onayından geçmiş</strong> spermlerdir.</p>',
                                '<p>Yumurta bağışçısı işlemleri için kullanılan yumurtalar hastanemizde kendi takibimizde toplanmakta ve <strong>taze</strong> olarak kullanılmaktadır.</p>',
                                '<p>MESA, TESE, MikroTESE işlemleriniz uzman <strong>Üroloji Doktorlarımız</strong> tarafından yapılmaktadır.</p>',
                                '<p>Embriyolara uygulanan genetik tarama kendi genetik laboratuvarımızda yapılmaktadır. <strong>Riskler ortadan kaldırılmış</strong> ve <strong>daha hızlı sonuç</strong> alınabilmektedir.</p>',
                                '<p>Embriyolarınız hastanemizdeki embriyo saklama odalarında düzenli <strong>kontrol ve bakım</strong> altında saklanmaktadır.</p>',
                            ]),
                            'en' => join('', [
                                '<p>Sperm donation procedures use samples from <strong>European Sperm Bank</strong>, approved by the TRNC Ministry of Health.</p>',
                                '<p>Egg donations are tracked and retrieved in our own clinic, always <strong>fresh</strong>.</p>',
                                '<p>MESA, TESE, MicroTESE procedures are performed by our expert <strong>Urologists</strong>.</p>',
                                '<p>Embryo genetic screening is performed in our in-house genetics lab, eliminating transport <strong>risks</strong> and providing <strong>faster results</strong>.</p>',
                                '<p>Your embryos are stored in our embryo storage rooms under regular <strong>monitoring</strong>.</p>',
                            ]),
                        ],
                    ],
                ],
            ]
        );

        // Fiyat kalemleri
        $rows = [
            [
                'slug' => 'ivf-icsi',
                'name' => ['tr'=>'Tüp Bebek (IVF) - ICSI','en'=>'IVF - ICSI'],
                'note' => ['tr'=>'*İlaçlar hariç','en'=>'*Excludes medications'],
                'currency' => 'EUR',
                'amount' => 3500,
                'unit' => 'per cycle',
                'position' => 10,
                'published' => true,
            ],
            [
                'slug' => 'iui',
                'name' => ['tr'=>'Aşılama (IUI)','en'=>'IUI'],
                'note' => ['tr'=>null,'en'=>null],
                'currency' => 'EUR',
                'amount' => 500,
                'unit' => null,
                'position' => 20,
                'published' => true,
            ],
            [
                'slug' => 'embryo-freezing',
                'name' => ['tr'=>'Embriyo Dondurma','en'=>'Embryo Freezing'],
                'note' => ['tr'=>'1 yıl saklama dahil','en'=>'Includes 1 year storage'],
                'currency' => 'EUR',
                'amount' => 600,
                'unit' => null,
                'position' => 30,
                'published' => true,
            ],
        ];

        foreach ($rows as $r) {
            Price::updateOrCreate(['slug' => $r['slug']], $r);
        }
    }
}
