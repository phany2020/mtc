<?php

use Illuminate\Database\Seeder;
use App\TourismType;

class TourismTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(\Faker\Generator $faker)
    {
        factory(TourismType::class, 20)->make()->each(function($tourismtype) use ($faker) {
            $tourismtype->save();
        });
    }
}
