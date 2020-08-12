<?php

use Illuminate\Database\Seeder;
use App\Application;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(\Faker\Generator $faker)
    {
        factory(Application::class, 20)->make()->each(function($application) use ($faker) {
            $client = App\Client::all();

            $application->client_id = $faker->randomElement($client)->id;
            $application->save();
        });
    }
}
