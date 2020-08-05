<?php

use Illuminate\Database\Seeder;
use App\Guide;

class GuideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(\Faker\Generator $faker)
    {
        factory(Guide::class, 20)->make()->each(function($guide) use ($faker) {
            $guide->save();
        });
    }
}
