<?php

use Illuminate\Database\Seeder;
use App\Hotel;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(\Faker\Generator $faker)
    {
        factory(Hotel::class, 100)->make()->each(function($hotel) use ($faker) {
            $hotel->save();
        });
    }
}
