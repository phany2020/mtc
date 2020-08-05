<?php

use Illuminate\Database\Seeder;
use App\ClientsTourismTypes;

class ClientsTourismTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(\Faker\Generator $faker)
    {
        factory(ClientsTourismTypes::class, 20)->make()->each(function($client_tourism_types) use ($faker) {
            $client = App\Client::all();
            $tourism_type = App\TourismType::all();

            $client_tourism_types->client_id = $faker->randomElement($client)->id;
            $client_tourism_types->tourism_type_id = $faker->randomElement($tourism_type)->id;
            $client_tourism_types->save();
        });
    }
}
