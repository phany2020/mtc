<?php

use Illuminate\Database\Seeder;
use App\Site;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(\Faker\Generator $faker)
    {
        factory(Site::class, 100)->make()->each(function($site) use ($faker) {
            $cities = App\Citie::all();
            $tourism_type = App\TourismType::all();

            $site->citie_id = $faker->randomElement($cities)->id;
            $site->tourism_type_id = $faker->randomElement($tourism_type)->id;
            $site->save();
        });
    }
}
