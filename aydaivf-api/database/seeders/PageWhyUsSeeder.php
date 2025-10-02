<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageWhyUsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pages')->updateOrInsert(
            ['slug' => 'hakkimizda/neden-biz'],
            [
                'content' => json_encode([
                    'tr' => '
                        <section class="pt-7 md:pt-14">
                          <div class="w-full aspect-[16/7] max-h-[400px] overflow-hidden rounded-md">
                            <img src="https://api.aydaivf.com/uploads/elitebig_7bc1166778.jpg"
                                 alt="Neden Biz"
                                 style="width:100%;height:100%;object-fit:cover" />
                          </div>
                          <div class="container mx-auto px-4 py-8">
                            <h2 class="text-2xl font-semibold mb-4">Neden Biz?</h2>
                            <p>Ayda IVF olarak tecrübemiz, etik yaklaşımımız ve başarı oranlarımızla yanınızdayız.</p>
                          </div>
                        </section>
                    ',
                    'en' => '
                        <section class="pt-7 md:pt-14">
                          <div class="w-full aspect-[16/5] max-h-[400px] overflow-hidden rounded-md">
                            <img src="https://api.aydaivf.com/uploads/elitebig_7bc1166778.jpg"
                                 alt="Why Us"
                                 style="width:100%;height:100%;object-fit:cover" />
                          </div>
                          <div class="container mx-auto px-4 py-8">
                            <h2 class="text-2xl font-semibold mb-4">Why Us</h2>
                            <p>With our experience, ethics and strong success rates, we are here for you.</p>
                          </div>
                        </section>
                    ',
                ], JSON_UNESCAPED_UNICODE),

                'sections'  => null,
                'published' => true,
            ]
        );
    }
}
