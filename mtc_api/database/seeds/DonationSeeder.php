<?php

use Illuminate\Database\Seeder;
use App\Donation;

class DonationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(\Faker\Generator $faker)
    {
        factory(Donation::class, 20)->make()->each(function($donation) use ($faker) {
            $client = App\Client::all();

            $donation->client_id = $faker->randomElement($client)->id;
            $donation->save();
        });
    }
}
