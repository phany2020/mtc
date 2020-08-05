<?php

use Illuminate\Database\Seeder;
use App\GuidesTourismTypes;

class GuidesTourismTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(\Faker\Generator $faker)
    {
        factory(GuidesTourismTypes::class, 20)->make()->each(function($guides_tourism_types) use ($faker) {
            $guide = App\Guide::all();
            $tourism_type = App\TourismType::all();

            $guides_tourism_types->guide_id = $faker->randomElement($guide)->id;
            $guides_tourism_types->tourism_type_id = $faker->randomElement($tourism_type)->id;
            $guides_tourism_types->save();
        });
    }
}
