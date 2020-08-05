<?php

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
        $this->call(CitieSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(HotelSeeder::class);        
        $this->call(ClientSeeder::class);
        $this->call(ReceptionnistSeeder::class);
        $this->call(ApplicationSeeder::class);
        $this->call(GuideSeeder::class);
        $this->call(DonationSeeder::class);       
        $this->call(MessageSeeder::class);
        $this->call(NewsSeeder::class);        
        $this->call(SettingSeeder::class);
        $this->call(TourismTypeSeeder::class);
        $this->call(SiteSeeder::class);
        $this->call(NewsSitesSeeder::class);
        $this->call(ClientsTourismTypeSeeder::class);
        $this->call(GuidesTourismTypeSeeder::class);

    }
}
