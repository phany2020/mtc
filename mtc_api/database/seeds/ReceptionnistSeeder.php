<?php

use Illuminate\Database\Seeder;
use App\Receptionnist;

class ReceptionnistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(\Faker\Generator $faker)
    {
        factory(Receptionnist::class, 20)->make()->each(function($receptionnist) use ($faker) {
            $user = App\User::all();

            $receptionnist->user_id = $faker->randomElement($user)->id;
            $receptionnist->save();
        });
    }
}
