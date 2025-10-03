<?php

namespace Database\Seeders;

use App\Models\ContactInfo;
use App\Models\SuccessRate;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CmsSeeder::class);
        $this->call(HeroSeeder::class);
        $this->call(WhyUsPageSeeder::class);
        $this->call(CmsSeeder::class);
        $this->call(FooterSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(TreatmentsSectionSeeder::class);
        $this->call(\Database\Seeders\WelcomeSeeder::class);
        $this->call(OurPricesSeeder::class);
        $this->call(OurTeamSeeder::class);
        $this->call(OurSuccessRatesSeeder::class);
        $this->call(IvfIcsiSeeder::class);
        $this->call(EggDonationSeeder::class);
        $this->call(SpermDonationSeeder::class);
        $this->call(EmbryoDonationSeeder::class);
        $this->call(EggFreezingSeeder::class);
        $this->call(PrpSeeder::class);
        $this->call(AcupunctureSeeder::class);
        $this->call(FaqSeeder::class);
        $this->call([
            ShowcaseSeeder::class,
        ]);
        $this->call([
            ContactSeeder::class,
        ]);
    }
}
