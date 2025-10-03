<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;
use App\Models\Price;

class OurPricesSeeder extends Seeder
{
    public function run(): void
    {
        // ---- Sayfa ----
        $introTr = <<<HTML
<p>Aşağıda en sık kullanılan tedavi yöntemlerimizin fiyatları yer almaktadır. Fiyat listemiz sizlere tedavinizin maliyeti hakkında <strong>fikir vermesi amacı ile</strong> paylaşılmıştır. Hangi tedavi tipine ihtiyacınız olduğunu ve başarı şansınızı arttırmak için yaptırabileceğiniz ekstra yöntemler olup olmadığını öğrenebilmek için <strong>Ayda Tüp bebek ekibimiz ile irtibata</strong> geçebilirsiniz.</p>
HTML;

        $detailsTr = <<<HTML
<p>Sperm donasyonu işlemleri için kullanılan spermler Avrupa’nın en geniş sperm bağışçısı havuzuna sahip; Danimarka’da bulunan <strong>European Sperm Bankası</strong>'ndan ithal edilip, K.K.T.C. Sağlık Bakanlığı <strong>onayından geçmiş</strong> spermlerdir.</p>
<p>Yumurta bağışçısı işlemleri için kullanılan yumurtalar hastanemizde kendi takibimizde ilerlettiğimiz folikül takibi ile yine kendi topladığımız yumurtalar olup; alıcısına (sizlere) <strong>taze yumurta</strong> verilip sperm ile döllendirilmesi işlemi aynı gün gerçekleştirilmektedir. Yumurta bağışçıları K.K.T.C. <strong>Sağlık Bakanlığı kriterlerine, kan grubunuza</strong> ve sizin <strong>bağışçıda aradığınız kriterlere uygun</strong> olarak seçilmektedir.</p>
<p>MESA, TESE, MİKROTESE işlemleriniz, <strong>konuda uzman Üroloji Doktorlarımız</strong> tarafından yapılmaktadır. Sperm toplama ameliyatlarına girmeden önce mutlaka üroloji uzmanlarımızın sizin için öngördüğü tedavi sürecinden geçilmesi gerekmektedir.</p>
<p>Embriyolarınıza uygulanan genetik tarama hastanemiz bünyesinde olan genetik laboratuvarımızda yapılmaktadır. Böylelikle embriyo parçalarını taşımaktan doğabilecek <strong>risk ortadan kaldırılmış</strong> olup daha <strong>hızlı sonuçlar</strong> elde edebilmekteyiz.</p>
<p>Embriyolarınız hastanemizdeki embriyo saklama odalarında saklanılıyor olup düzenli bir şekilde <strong>kontrol ve bakımları</strong> yapılmaktadır.</p>
HTML;

        Page::updateOrCreate(
            ['slug' => 'our-prices'],
            [
                'title' => ['tr' => 'Fiyatlarımız', 'en' => 'Our Prices'],
                'content' => ['tr' => $introTr, 'en' => '<p>Coming soon.</p>'],
                'meta_title' => ['tr' => 'Ayda IVF Fiyatlar', 'en' => 'Ayda IVF Prices'],
                'meta_description' => [
                    'tr' => 'IVF, ICSI ve diğer tedavi fiyatları',
                    'en' => 'Prices for IVF, ICSI and other treatments',
                ],
                'hero_image' => 'https://api.aydaivf.com/uploads/elitebig_7bc1166778.jpg',
                'sections' => [
                    [
                        'heading' => ['tr' => 'Tüp Bebek Fiyatları', 'en' => 'IVF Prices'],
                        'html'    => ['tr' => '', 'en' => ''],
                    ],
                    [
                        'heading' => [
                            'tr' => 'İşlemlerimize Dair Bilmeniz Gereken Önemli Detaylar',
                            'en' => 'Important Details About Our Procedures',
                        ],
                        'html' => ['tr' => $detailsTr, 'en' => '<p>Coming soon.</p>'],
                    ],
                ],
            ]
        );

        // ---- Fiyat kalemleri (tam liste) ----
        $rows = [
            ['slug'=>'ivf-icsi','name'=>['tr'=>'Tüp bebek (IVF/ ICSI)','en'=>'IVF / ICSI'],'currency'=>'EUR','amount'=>3500,'note'=>['tr'=>null,'en'=>null],'unit'=>null,'position'=>10,'published'=>true],
            ['slug'=>'sperm-donasyonu','name'=>['tr'=>'Sperm Donasyonu','en'=>'Sperm Donation'],'currency'=>'EUR','amount'=>5500,'note'=>['tr'=>null,'en'=>null],'unit'=>null,'position'=>20,'published'=>true],
            ['slug'=>'yumurta-donasyonu','name'=>['tr'=>'Yumurta Donasyonu','en'=>'Egg Donation'],'currency'=>'EUR','amount'=>5500,'note'=>['tr'=>null,'en'=>null],'unit'=>null,'position'=>30,'published'=>true],
            ['slug'=>'embriyo-donasyonu','name'=>['tr'=>'Embriyo Donasyonu','en'=>'Embryo Donation'],'currency'=>'EUR','amount'=>6500,'note'=>['tr'=>null,'en'=>null],'unit'=>null,'position'=>40,'published'=>true],
            ['slug'=>'tese','name'=>['tr'=>'TESE','en'=>'TESE'],'currency'=>'EUR','amount'=>1500,'note'=>['tr'=>null,'en'=>null],'unit'=>null,'position'=>50,'published'=>true],
            ['slug'=>'mikrotese','name'=>['tr'=>'Miktrotese','en'=>'MicroTESE'],'currency'=>'EUR','amount'=>2000,'note'=>['tr'=>null,'en'=>null],'unit'=>null,'position'=>60,'published'=>true],
            ['slug'=>'ngs','name'=>['tr'=>'Embriyolara Kapsamlı Kromozom Taraması (NGS)','en'=>'Comprehensive Chromosome Screening (NGS)'],'currency'=>'EUR','amount'=>3500,'note'=>['tr'=>'İlk 5 embriyo','en'=>'First 5 embryos'],'unit'=>null,'position'=>70,'published'=>true],
            ['slug'=>'embriyo-saklama','name'=>['tr'=>'Embriyo Saklama','en'=>'Embryo Storage'],'currency'=>'EUR','amount'=>600,'note'=>['tr'=>'Yıllık','en'=>'Yearly'],'unit'=>null,'position'=>80,'published'=>true],
            ['slug'=>'akupunktur','name'=>['tr'=>'Akupunktur','en'=>'Acupuncture'],'currency'=>'EUR','amount'=>125,'note'=>['tr'=>'Tek seans','en'=>'Single session'],'unit'=>null,'position'=>90,'published'=>true],
        ];

        foreach ($rows as $r) {
            Price::updateOrCreate(['slug' => $r['slug']], $r);
        }
    }
}
