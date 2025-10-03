<?php
// database/seeders/WelcomeSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Welcome;

class WelcomeSeeder extends Seeder
{
    public function run(): void
    {
        Welcome::updateOrCreate(
            ['locale' => 'tr'],
            [
                'subtitle'  => 'Ayda-Tüp Bebek Web Sitesine',
                'title'     => 'Hoş Geldiniz',
                'content'   => <<<HTML
<div class="text-sm md:text-base text-ayda-gray-dark">
  <p style="line-height:15.0pt;margin-bottom:.0001pt;text-align:center;">
    <span style="color:#F46197;font-family:&quot;Arial&quot;,sans-serif;font-size:12.0pt;">
      <span style="text-transform:uppercase;">Ayda-Tüp Bebek Web Sitesine</span>
    </span>
  </p>
  <p style="line-height:34.5pt;margin-bottom:.0001pt;text-align:center;">
    <span style="color:#1C1717;font-family:&quot;Arial&quot;,sans-serif;font-size:27.0pt;"><strong>Hoş Geldiniz</strong></span>
  </p>
  <p style="line-height:19.5pt;text-align:justify;">
    <span style="color:#595959;font-family:&quot;Arial&quot;,sans-serif;font-size:12.0pt;">Kuzey Kıbrıs’ın başkenti Lefkoşa'nın merkezinde bulunan kliniğimiz; Elite hastanesi bünyesinde olup, sizleri hamileliğe ulaştırabilmek için yıllardır canla başla çalışıyor. Evlat sahibi olma arzusu ile kliğimize başvuran tüm bireylere;&nbsp;</span>
    <span style="color:#595959;font-family:&quot;Arial&quot;,sans-serif;font-size:12.5pt;"><strong>bilimin el verdiği derecede, birçok teknik ve yöntemle, en modern, yenilikçi ve son teknolojiye sahip altyapımızla</strong></span>
    <span style="color:#595959;font-family:&quot;Arial&quot;,sans-serif;font-size:12.0pt;">&nbsp;yardımcı olmak için buradayız.</span>
  </p>
  <p style="line-height:19.5pt;text-align:justify;">
    <span style="color:#595959;font-family:&quot;Arial&quot;,sans-serif;font-size:12.0pt;">Tüp bebekteki 8 senelik mesleki hayatıma ilk olarak Almanya’nın Wiesbaden şehrinde adım atmıştım. Benim için; tüp bebeğe ilk adım attığım günden bu yana&nbsp;</span>
    <span style="color:#595959;font-family:&quot;Arial&quot;,sans-serif;font-size:12.5pt;"><strong>etik kurallar çerçevesinde mesleğimi sürdürmem</strong></span>
    <span style="color:#595959;font-family:&quot;Arial&quot;,sans-serif;font-size:12.0pt;">&nbsp;her zaman her şeyin önünde olmuştur. Mesleğimin ne kadar kutsal ve anlamlı olduğunu ilk hastamın transferini yapıp onun gebelik sevincine ortak olduğum ilk günden anlamıştım.</span>
  </p>
  <p style="line-height:19.5pt;text-align:justify;">
    <span style="color:#595959;font-family:&quot;Arial&quot;,sans-serif;font-size:12.0pt;">Karşınızdaki insanın size güvenerek sizi tercih etmesi büyük bir sorumluluktur ve özveri ile çalışma gerektirir. Hasta ile birlikte anlamlı ve önemli bir yolculuğa&nbsp;</span>
    <span style="color:#595959;font-family:&quot;Arial&quot;,sans-serif;font-size:12.5pt;"><strong>birlikte</strong></span>
    <span style="color:#595959;font-family:&quot;Arial&quot;,sans-serif;font-size:12.0pt;">&nbsp;çıkarsınız. Birlikte güler birlikte ağlarsınız. Hastanız streslidir; en güzel ve en doğru teselliyi verecek kişi sizsinizdir. Hastanız kaygılıdır; onun yanında olan, onu anlayan kişi sizsinizdir. Hastanızın tüm bu süreçleri atlatıp gebelik testi günü gelmiştir; onunla birlikte bu büyük heyecana ortak olacak olan kişi yine sizsinizdir.&nbsp;</span>
    <span style="color:#595959;font-family:&quot;Arial&quot;,sans-serif;font-size:12.5pt;"><strong>Siz onun en büyük ve en önemli sırrına ve umuduna ortak olursunuz</strong></span>
    <span style="color:#595959;font-family:&quot;Arial&quot;,sans-serif;font-size:12.0pt;">. Bu yüzden&nbsp;</span>
    <span style="color:#595959;font-family:&quot;Arial&quot;,sans-serif;font-size:12.5pt;"><strong>hastanız ile samimi, doğru ve dürüst olmak</strong></span>
    <span style="color:#595959;font-family:&quot;Arial&quot;,sans-serif;font-size:12.0pt;">&nbsp;çok önemlidir.</span>
  </p>
  <p style="line-height:19.5pt;text-align:justify;">
    <span style="color:#595959;font-family:&quot;Arial&quot;,sans-serif;font-size:12.0pt;">Günün sonunda karşılıklı emeklerin güzel sonuçlarla sonuçlanması, hastalarımıza evlat bahşederek onlara sonsuz mutluluğu verebilmek, evlatlarına her baktıklarında size okudukları o dualar, teşekkürler paha biçilemez duygular. İnsan tüm bu duygulara ortak olunca, hastasının&nbsp;</span>
    <span style="color:#595959;font-family:&quot;Arial&quot;,sans-serif;font-size:12.5pt;"><strong>hamile kalabilmesi için gerekli en doğru yolu onlara çizer</strong></span>
    <span style="color:#595959;font-family:&quot;Arial&quot;,sans-serif;font-size:12.0pt;">&nbsp;ve karşılıklı anlayış ve emek ile başarıya ulaşmak için adımlar atılır. İşte yıllardır hastalarımın hep sorduğu ‘nasıl bu kadar başarılı ve pozitif olabiliyorsunuz’ sorusunun cevabı burada gizlidir.&nbsp;</span>
    <span style="color:#595959;font-family:&quot;Arial&quot;,sans-serif;font-size:12.5pt;"><strong>Bizler enerjimizi sizlerden alıyoruz ve sizlere geri veriyoruz.</strong></span>
  </p>
  <p style="line-height:19.5pt;text-align:justify;">
    <span style="color:#595959;font-family:&quot;Arial&quot;,sans-serif;font-size:12.0pt;">Bende bizi tercih eden her bir bireye bize inanıp güvendikleri ve bu yolda birlikte yürüdükleri için&nbsp;</span>
    <span style="color:#595959;font-family:&quot;Arial&quot;,sans-serif;font-size:12.5pt;"><strong>ne kadar teşekkür etsem azdır</strong></span>
    <span style="color:#595959;font-family:&quot;Arial&quot;,sans-serif;font-size:12.0pt;">. Eğer hala bizimle tanışmadıysanız ve tüp bebek yolculuğuna çıkmak istiyorsanız gelin bu adımı birlikte atalım. Sizleri de aile olmak için bir adım öteye taşıyalım.</span>
  </p>
  <p style="line-height:normal;margin:12.0pt 0cm 2.4pt;text-align:right;">
    <span style="color:#212529;font-family:&quot;Arial&quot;,sans-serif;font-size:18.0pt;"><strong>Tanyel FELEK, MS</strong></span>
  </p>
  <p style="line-height:normal;margin-bottom:.0001pt;text-align:right;">
    <span style="color:#F46197;font-family:&quot;Arial&quot;,sans-serif;font-size:12.0pt;">Ayda Tüp Bebek Takımı Direktörü &amp; Embriyoloji Laboratuvarı Sorumlusu</span>
  </p>
  <p>&nbsp;</p>
</div>
HTML,
                'image'     => 'https://api.aydaivf.com/uploads/1617890130_4018_org_74c04c13d4.png',
                'ceo_name'  => 'Tanyel FELEK, MS',
                'ceo_title' => 'Ayda Tüp Bebek Takımı Direktörü & Embriyoloji Laboratuvarı Sorumlusu',
            ]
        );
    }
}
