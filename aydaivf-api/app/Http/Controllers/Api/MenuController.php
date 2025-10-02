<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function main(Request $req)
    {
        $lang = $req->query('lang','tr');

        $brandLogo = 'https://api.aydaivf.com/uploads/ayda_logo_9e8994bffd.png';
        $colors = [
            'hoverPink'    => 'oklch(71.8% 0.202 349.761)',
            'dropdownBg'   => 'oklch(96.8% 0.007 247.896)',
            'phoneHoverBg' => 'oklch(82.8% 0.111 230.318)',
        ];
        $whatsappUrl = 'https://wa.me/+905488252821';

        if ($lang === 'en') {
            return response()->json([
                'brand'       => 'Ayda IVF',
                'brandLogo'   => $brandLogo,
                'whatsappUrl' => $whatsappUrl,
                'colors'      => $colors,
                'items'       => [
                    ['href'=>'/en/about','label'=>'About','children'=>[
                        ['href'=>'/en/about/why-us','label'=>'Why Us'],
                        ['href'=>'/en/about/prices','label'=>'Prices'],
                        ['href'=>'/en/about/team','label'=>'Our Team'],
                        ['href'=>'/en/about/success-rates','label'=>'Success Rates'],
                    ]],
                    ['href'=>'/en/treatments','label'=>'Treatments','children'=>[
                        ['href'=>'/en/treatments/ivf-icsi','label'=>'IVF - ICSI'],
                        ['href'=>'/en/treatments/egg-donation','label'=>'Egg Donation'],
                        ['href'=>'/en/treatments/sperm-donation','label'=>'Sperm Donation'],
                        ['href'=>'/en/treatments/embryo-donation','label'=>'Embryo Donation'],
                        ['href'=>'/en/treatments/egg-freezing','label'=>'Egg Freezing'],
                        ['href'=>'/en/treatments/prp','label'=>'Ovarian and Endometrial PRP'],
                        ['href'=>'/en/treatments/acupuncture','label'=>'Acupuncture'],
                    ]],
                    ['href'=>'/en/faq','label'=>'FAQ'],
                    ['href'=>'/en/travel','label'=>'Travel'],
                    ['href'=>'/en/contact','label'=>'Contact'],
                ],
            ]);
        }

        return response()->json([
            'brand'       => 'Ayda IVF',
            'brandLogo'   => $brandLogo,
            'whatsappUrl' => $whatsappUrl,
            'colors'      => $colors,
            'items'       => [
                ['href'=>'/tr/hakkimizda','label'=>'Hakkımızda','children'=>[
                    ['href'=>'/tr/hakkimizda/neden-biz','label'=>'Neden Biz?'],
                    ['href'=>'/tr/hakkimizda/fiyatlar','label'=>'Fiyatlarımız'],
                    ['href'=>'/tr/hakkimizda/takimimiz','label'=>'Takımımız'],
                    ['href'=>'/tr/hakkimizda/basari-oranlari','label'=>'Başarı Oranlarımız'],
                ]],
                ['href'=>'/tr/tedaviler','label'=>'Tedaviler','children'=>[
                    ['href'=>'/tr/tedaviler/tupbebekivf','label'=>'Tüp Bebek (IVF) - ICSI'],
                    ['href'=>'/tr/tedaviler/yumurtadonasyonu','label'=>'Yumurta Donasyonu'],
                    ['href'=>'/tr/tedaviler/spermdonasyonu','label'=>'Sperm Donasyonu'],
                    ['href'=>'/tr/tedaviler/embriyodonasyonu','label'=>'Embriyo Donasyonu'],
                    ['href'=>'/tr/tedaviler/yumurtadondurma','label'=>'Yumurta Dondurma'],
                    ['href'=>'/tr/tedaviler/prp','label'=>'Ovarian ve Endometrial PRP'],
                    ['href'=>'/tr/tedaviler/akupunktur','label'=>'Akupunktur'],
                ]],
                ['href'=>'/tr/sss','label'=>'SSS'],
                ['href'=>'/tr/seyahat','label'=>'Seyahat'],
                ['href'=>'/tr/iletisim','label'=>'İletişim'],
            ],
        ]);
    }

    public function show(string $key)
    {
        return response()->json(['message'=>'not implemented'], 404);
    }
}
