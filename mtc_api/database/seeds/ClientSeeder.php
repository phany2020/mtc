<?php

use Illuminate\Database\Seeder;
use App\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(\Faker\Generator $faker)
    {
        factory(Client::class, 20)->make()->each(function($client) use ($faker) {
            $user = App\User::all();
            $hotel = App\Hotel::all();

            $client->user_id = $faker->randomElement($user)->id;
            $client->hotel_id = $faker->randomElement($hotel)->id;
            $client->save();
        });
    }
}
