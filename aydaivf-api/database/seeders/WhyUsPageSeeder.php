<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Page;

class WhyUsPageSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            $slugTr = 'neden-biz';
            $slugEn = 'why-us';

            $headerImage = 'https://api.aydaivf.com/uploads/elitebig_7bc1166778.jpg';

            // === Tüm TR içeriği (tam metin) ===
            $trHtml = <<<HTML
<div class="">

  <div class="flex flex-col gap-7 md:gap-10">
    <!-- Bölüm: Giriş ve "Bize biraz kendinizden bahseder misiniz?" -->
    <section class="flex flex-col gap-6">
      <p class="text-ayda-black text-sm md:text-base capitalize font-medium text-center justify-center mb-3 font-size:18px;">
      <strong>
              Neden biz’i sizlere daha iyi açıklayabilmek için Ayda Tüp Bebek Yöneticimiz Tanyel FELEK ile bilgilendirici ve keyifli bir röportaj yaptık. Aradığınız birçok soruya cevap bulacağınız röportajımıza muhakkak bir göz atın.
      </strong>
      </p>

      <h3 class="text-sm md:text-base text-ayda-pink-light capitalize font-medium text-center">
        Bize biraz kendinizden bahseder misiniz ?
      </h3>

      <div class="text-sm md:text-base text-ayda-gray-dark flex flex-col gap-1">
        <p>Tabiki. İsmim Tanyel Felek. Ayda Tüp bebeğin kurucusu aynı zamanda kliniğin Embriyoloji ve Androloji uzmanıyım. Üniversite eğitimime 2009 yılında Ankara’nın Gazi Üniversitesinde başlayıp üniversitemin son senesini yurtdışında öğrenim görme sınavını kazanarak Almanya’nın Mainz şehrindeki Johannes Gutenberg Üniversitesinde eğitim görmek için teklif aldım.</p>
        <p>Almanya’da okuduğum dönemde genetik bölümü asistanı olarak, zooloji genetik laboratuvarında salyangozlardaki protein varlığı üzerine çalışma yapmaya başladım ve bu çalışmamı bitirme tezim olarak sunarak Johannes Gutenberg Üniversitesin’de ki eğitimimi tamamladıktan hemen sonra Almanya’nın en büyük Tüp bebek merkezlerinden biri olan Kinderwunsch Zentrum Wiesbaden’den iş teklifi alarak 2012 yılında kliniğin embriyoloji ve androloji laboratuvarında çalışmaya başladım.</p>
        <p>2017 yılının başlarında hem ileri derecede Almanca dilimin olması hem de mesleğimde başarılı olmamın getirisi ile Avrupa’nın en iyi Klinik Embriyoloji yüksek lisans okulu olan Avusturya’nın Karl Franzens üniversitesine kabul alıyorum. Bu dönemde hem okuyup hemde çalışıyorum.</p>
        <p>2017 yılının sonlarında Kuzey Kıbrıs’taki Gynolife tüp bebek merkezini yöneticisi &amp; Kıbrıs'ın en tanınmış Jinekoloji uzmanı olan Dr. Münür Şago'nun iş teklifini kabul ederek Kuzey Kıbrıs'a taşınıyorum ve kliniğin laboratuvar sorumlusu olarak çalışmaya başlıyorum.</p>
        <p>2 sene boyunca hem işimi hem uzmanlığımı bir arada sürdürerek yoğun bir tempoya giriyorum. Bu süreçte bitirme tezim için tüp bebek hastalarımızdan izin alarak, hastalarımızın yumurtalarında bulunan Polarbody denilen kısmın kalitesinin embriyo gelişimi ve hamilelik üzerine etkisini inceleyek büyük bir tez çalışması yapıyorum.</p>
        <p>Tez çalışmamı 2019 yılında tamamlayarak Avusturaya’nın Viyana şehrinde düzenlenen, dünyanın en büyük Tüp bebek kongresi olan European Society of Human Reproduction and Embryology (ESHRE) de hocalarıma sunma imkanı bularak yaptığım özverili çalışma ile hocalarımın taktirini ve saygısını kazanıyorum.</p>
        <p>Böylelikle tüp bebek embriyoloji Uzmanlığımı Avusturya’nın Johannes Gutenberg üniversitesinde Klinik Embriyoloji Master bölümünden mezun olarak alıyorum. Yüksek lisans süresi boyunca; tüp bebeğin kitabını yazan, yüzlerce yayın ve çalışmaları bulunan ve embriyolojide Avrupa’da en popüler 2 isim olan; Thomas Ebner ve Markus Montag başta olmak üzere daha birçok değerli ve önemli hocalarımdan eğitim alabilme fırsatını yakalıyorum.</p>
        <p>2019 yılı başlarında Dr. Münür Şago ile birlikte; Kuzey Kıbrıs'ın özel hastaneler içerisinde en geniş donanıma sahip olması sebebi ile hastalarımıza daha kaliteli bir ortamda hizmet verebilmek adına Elite Hastanesi bünyesine taşınarak burada ekibimizi kurarak çalışmaya başlıyoruz.</p>
        <p>Kariyerim boyunca tüm bu fırsatları yakalayabildiğim için kendimi çok şanslı görüyorum. Aldığım yüksek eğitim, bilgi ve hep daha iyisini hedefleyen yapım sayesinde şu an her bir hastama faydalar sağlayabiliyorum ve bunu sağlayabildiğim için de kendimi çok mutlu hissediyorum.</p>
        <p>Kıbrıs’a 2017 senesinde geldim ve yaklaşık 5 senedir Dr. Münür Şago ile birlikte kendisi jinekoloji bende embriyoloji bölümünün sorumluluğunu alarak güçlerimizi birleştirerek çalışıyoruz ve birçok partnerin en büyük hayalini gerçekleştirmek için çalışıyoruz.</p>
      </div>
    </section>

    <!-- Bölüm: Ekip -->
    <section class="flex flex-col gap-4">
      <h3 class="text-ayda-pink-light text-sm md:text-base font-medium text-center capitalize">
        Tüp bebek takımınızda güçlü bir kadroya sahip olmakla biliniyorsunuz. Sizden başka Ayda Tüp Bebekte birlikte çalıştığınız hangi uzmanlar var ?
      </h3>
      <div class="text-sm md:text-base text-ayda-gray-dark flex flex-col gap-3">
        <p>Evet ekibim ve kliniğimizde bulunan uzmanlarımız gerçekten çok başarılı. Tüp bebek bir ekip işidir. Gebeliğin oluşabilmesi için tüm çalışanların doğru bilgiye sahip olmaları gerekli. Bu yönden çok sanslıyım. Kliniğimizde benim haricimde; Embriyoloji ve Androloji Laboratuvarında çalışan:</p>
        <ul class="list-disc ml-[30px]">
          <li>1 Embriyoloji Uzmanımız</li>
          <li>1 Androloğumuz</li>
        </ul>
        <p>Jinekoloji biriminde çalışan:</p>
        <ul class="list-disc ml-[30px]">
          <li>4 Doktorumuz</li>
          <li>1 Doçent Doktorumuz (aynı zamanda Tüp bebek jinekoloji uzmanı)</li>
          <li>1 Jinekoloji Doktorumuz (aynı zamanda Tüp bebek jinekoloji uzmanı)</li>
          <li>2 Jinekoloji ve Kadın doğum uzmanımız</li>
          <li>ve 1 Genetik Uzmanımız bulunmakta.</li>
        </ul>
        <p>Böylelikle K.K.T.C.’deki en büyük ve en bilgili Tüp bebek kadrosuna sahibiz diyebiliriz. Aynı zamanda hastalarımızın takibini yapan hemşirelerimizde çok yetenekli ve deneyimli. Yıllarca hastlarımız için en iyiyi hedefledik ve doğru bir kadroya sahip olabilmek için çabaladık. Şimdi bunun gerçek olduğunu görmek beni çok sevindiriyor.</p>
      </div>
    </section>

    <!-- Bölüm: İşleyiş -->
    <section class="flex flex-col gap-4">
      <h3 class="text-ayda-pink-light text-sm md:text-base font-medium text-center capitalize">
        Peki hasta kliniğe gelmeden ve geldikten sonra kendi içinizde işleyişi nasıl yürütüyorsunuz ?
      </h3>
      <div class="text-sm md:text-base text-ayda-gray-dark flex flex-col gap-3">
        <p>Genellikle hasta takibini yürüttüğüm Jinekoloji Doktor arkadaşımla birlikte her gün öylen veya gün içerisinde ortak olan uygun saatlerimizde toplantılar yapıyoruz.</p>
        <p>Hastanın başarılı bir tedavi görebilmesini sağlayabilmek adına Embriyoloji-Androloji ve Jinekoloji sırt sırta vererek çalışmalıdır. Böylelikle hasta size gelmeden önceki işlemlerinde ve geldikten sonraki işlemlerinde problemini uzmanlar olarak değerlendirirsiniz ve ona göre hastanıza doğru bir yol çizersiniz.</p>
        <p>Böylelikle hastalarımızın hiçbir detayını kaçırmadan ilgi ile kişiye özel tedavilerini yürüttüğümüzü söyleyebiliriz.</p>
      </div>
    </section>

    <!-- Bölüm: Neden Elite Hastanesi -->
    <section class="flex flex-col gap-4">
      <h3 class="text-ayda-pink-light text-sm md:text-base font-medium text-center capitalize">
        Neden Hastane bünyesi altında çalışmaya karar verdiniz? Neden ELİTE Hastanesi ?
      </h3>
      <div class="text-sm md:text-base text-ayda-gray-dark flex flex-col gap-3">
        <p>ELİTE Hastanesi bünyesinde çalışmaktan çok memnun ve gururluyum. Hastane yeni ve tertemiz. Hijyen kurallarına fazlası ile uyuyorlar. Hastane kapısından girerken rengarenk çiçekler ve bitkileri görünce içiniz mutluluk doluyor.</p>
        <p>Hastalarımın hem psikolojik hem de teknolojik olarak ihtiyacı olan her şey burada var her şey en detayına kadar düşünülmüş. Hastalarımdan çoğunlukla ihtiyaca göre kan testleri istiyoruz. Hemen hastanenin giriş katında istediğimiz her türlü kan testini rahatlıkla yapabilecekleri biyokimya laboratuvarı bulunmakta. Hastalarımız panikle çıkıp laboratuvar aramak zorunda kalmıyorlar. İstediğim her tektik 1-2 saat sonra mailime gönderiliyor.</p>
        <p>Tüp bebeğin mutfak kısmında çalıştığım için buradaki aletlerin yeni ve temiz olması çok önemli. Tüm bunlar yaptığınız işçiliğin kalitesini yani embriyoların kalitesini ve buna bağlı olarak başarı oranınızı arttırıyor. Aldığımız tüm en son teknolojik aletler takır takır çalışıyor ve buda yaptığınız işin hakkını veriyor. Özellikle laboratuvara aldığımız en son cihazımız Vitrolife markasının Embryoscope Plus inkübatörüne hayranım. Cihaz tam bir ileri teknoloji. Böylelikle insan bilimle kafa kafaya vererek çalıştığını hissediyor.</p>
        <p>Özellikle Covid-19 sürecinde hastane bünyesinde çalışmanın verdiği pozitif etkileride daha çok hissettik. K.K.T.C. Sağlık Bakanlığın da ortak kararı ile; her bir hastamızda; hem kendinin hem embriyolarının hem de bizlerin güvenliğini düşündüğümüzden, hastalarımızda en fazla 48 saatlik Covid-19 PCR testi olmadan işleme almıyoruz. K.K.T.C.’DE Covid-19 PCR testi yapan ve sonucu maksimum 3 saat içerisinde veren ender hastanelerdeniz. Böylelikle hiçbir hastamızın Covid-19 PCR Testini nerede yapacağım, nasıl yapacağım stresini çekmesine izin vermiyoruz. Hem hastalarımıza stres yaşatmıyoruz hem de her hastalarımızın embriyoları böylelikle temiz ve sağlıklı ortamlarda muhafaza edilmiş oluyor.</p>
        <p>Tüp bebek ilaçlarını hastalarımız hastanemizden temin edebiliyorlar ayrıca hemen yanımızda bulunan eczanemizden de istedikleri her türlü ilacı temin edebilmeleri mümkün.</p>
        <p>Yine bunun için de hastalarımızın rahatından ödün vermiyoruz. Çocuklu ailelerin vakit geçirebileceği tatami mikrobiyal minderden oluşan oyun alanı bile mevcut! Tüm bu özellikler ve daha fazlası sayesinde insanlar rahat ve güvende hissediyorlar.</p>
        <p>Onların rahat hissetmesi benim için çok önemli. Böylelikle bizlerde işimizi çok daha huzurlu ve hızlıca yapabiliyoruz. İşlerin bu şekilde yürümesi önemli, hata payımız sıfıra iniyor ve karşılıklı başarıyoruz.</p>
      </div>
    </section>

    <!-- Bölüm: Teknoloji -->
    <section class="flex flex-col gap-4">
      <h3 class="text-ayda-pink-light text-sm md:text-base font-medium text-center capitalize">
        Teknolojik olarak K.K.T.C.’deki diğer merkezlerde olmayıp sizde olan veya diğer merkezlerin yapmayıp sizin yaptığınız ne gibi teknolojiler mevcut ?
      </h3>
      <div class="text-sm md:text-base text-ayda-gray-dark flex flex-col gap-3">
        <p>Artık her klinik hastalarına yarar sağlayabilmek ve kendini daha iyi pazarlayabilmek için birçok teknolojiye sahip. Birçok kliniğin web sitesinde son teknoloji sistemler sadece bizde gibi yazılar mevcut, bu doğru değil.</p>
        <p>Embryoscope plus sistemi şu an dünya üzerinde 1 numara ve embriyoloji uzmanlarının en önde gelen tercihleri arasında. Birçok merkez bu sistemin sadece kendisinde olduğunu yazarak pazarlama politikası yapıyor bunu doğru bulmuyorum. Bu sisteme sahip K.K.T.C’de ki 3-4 ekipten biriyiz. Bu yüzden ben burada başkalarında olmayıp ta bizde olan bir şey söyleyemem nitekim diğer merkezleri tam olarak tanımıyorum.</p>
        <p>Konu neyin sizde olduğu değil, önemli olan var olan teknolojik alet ve sistemlerin doğru kullanımını bilmek, onların bakımını düzenli olarak yaptırmak ve onlardan doğru verimi alabilmektir. Bilgi en önemli şeydir. Bilginiz olmadan aslında hiçbir şeye sahip değilsinizdir.</p>
      </div>
    </section>

    <!-- Bölüm: Neden Ayda? -->
    <section class="flex flex-col gap-4">
      <h3 class="text-ayda-pink-light text-sm md:text-base font-medium text-center capitalize">
        Hastalar neden Ayda Tüp Bebeği tercih etmeli ?
      </h3>
      <div class="text-sm md:text-base text-ayda-gray-dark flex flex-col gap-3">
        <p>Tüp bebekte konu sadece başarılı olmak, ben en başarılıyım, en yüksek gebeliğe sahibim, son teknolojiyim gibi konuşmalar yapmak değildir. Bunun da ötesinde en önemlisi başarıya giderken izlediğiniz yoldur. Etik ve dürüst çalışmak çok önemlidir. Hastaya karşı doğru ve sabırlı olmanız gerekir.</p>
        <p>Bizler hastaların tıbbi ve bilimsel bir yardım almaları için bize geldiklerinin bilincinde olarak çalışıyoruz ve onlara bilimin el verdiği ölçüde yardım ediyoruz. Peri masalları ile insanları kandırmıyoruz. Sonuçta her şeyden önce infertilite diye adlandırdığımız bir hastalığı tedavi ediyoruz ve kişiye gerekli olan yöntemi ve teknolojiyi uyguluyoruz tabi ki sonunda da başarı kaçınılmaz oluyor. Bizler hastalarımıza ne gerekli ise onu sunuyoruz ne fazla ne de az. Olması gereken neyse onu uyguluyoruz ve başarılı olabilmek için bunu yapmak zorundayız. Diğer türlü başarıya ulaşmamız zor ve her iki tarafında istediği şey başarıya ulaşmak.</p>
        <p>Bazen hastalarımız geliyor, onlardan bazı tetikler istememiz gerekiyor. Hasta bazen başka merkezlerle de diyaloğa girerek klinikleri karşılaştırıyor. Bazı kişiler kendisinden en az şey isteyen, konuyu en basite indirgeyen yerleri tercih edebiliyor. Az maliyetli ve meşakkatsiz tedavi diye düşünürken bir bakıyor 2-3 başarısız denemeden geçtikten sonra maddi manevi sıkıntıya girerek (aldığı boşa giden ilaç dozlarında bahsetmiyorum bile) bizi arıyorlar. Bu durumlara denk geldiğimde çok üzülüyorum. Ben bunu Nasrettin hocanın Göle maya çalmak fıkrasına çok benzetiyorum. Ya tutarsa :)</p>
      </div>
    </section>

    <!-- Bölüm: Ek Hizmetler -->
    <section class="flex flex-col gap-4">
      <h3 class="text-ayda-pink-light text-sm md:text-base font-medium text-center capitalize">
        Ayda tüp bebek takımı olarak hastalariniza başka ne gibi yararlar sağlayabiliyorsunuz ?
      </h3>
      <div class="text-sm md:text-base text-ayda-gray-dark flex flex-col gap-3">
        <p>Ayda Tüp bebek takımı olarak hastalarımızın transport işlemlerini uygun ücretle yapan temiz ve lüks araçlarımız var. Araçlarımız ile hastalarımızı havaalanından alıp hoteline veya kliniğe getirebiliyoruz ayrıca uygun fiyatlı konaklama yapmak isteyen hastalarımıza eğer dilerseler kendi lojmanlarımızdan yer ayırtabiliyoruz.</p>
      </div>
    </section>
  </div>
</div>
HTML;

            // --- Duplicate temizliği (aynı slug'dan fazlaysa ilkini bırak) ---
            $this->dedupeBySlug($slugTr);
            $this->dedupeBySlug($slugEn);

            // --- TR sayfası ---
            Page::updateOrCreate(
                ['slug' => $slugTr],
                [
                    'title'     => ['tr' => 'Neden Biz?', 'en' => 'Why Us?'],
                    'content'   => ['tr' => $trHtml, 'en' => '<p>Coming soon.</p>'],
                    'sections'  => [
                        'tr' => ['headerImage' => $headerImage, 'contextTitle' => 'Neden Biz ? (context)'],
                        'en' => ['headerImage' => $headerImage, 'contextTitle' => 'Why Us? (context)'],
                    ],
                    'published' => true,
                ]
            );

            // --- EN sayfası ---
            Page::updateOrCreate(
                ['slug' => $slugEn],
                [
                    'title'     => ['tr' => 'Neden Biz?', 'en' => 'Why Us?'],
                    'content'   => ['tr' => $trHtml, 'en' => '<p>Coming soon.</p>'],
                    'sections'  => [
                        'tr' => ['headerImage' => $headerImage, 'contextTitle' => 'Neden Biz ? (context)'],
                        'en' => ['headerImage' => $headerImage, 'contextTitle' => 'Why Us? (context)'],
                    ],
                    'published' => true,
                ]
            );
        });
    }

    /**
     * Aynı slug'a sahip birden fazla kayıt varsa, ilk kaydı tutup kalanları siler.
     */
    private function dedupeBySlug(string $slug): void
    {
        $rows = Page::where('slug', $slug)->orderBy('id')->get(['id']);
        if ($rows->count() <= 1) {
            return;
        }
        $idsToDelete = $rows->pluck('id')->slice(1)->all(); // ilk kayıt kalsın
        Page::whereIn('id', $idsToDelete)->delete();
    }
}
