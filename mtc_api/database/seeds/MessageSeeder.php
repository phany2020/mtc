<?php

use Illuminate\Database\Seeder;
use App\Message;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(\Faker\Generator $faker)
    {
        factory(Message::class, 10)->make()->each(function($message) use ($faker) {
            $client = App\Client::all();
            $message = App\Message::all();

            $message->client_id = $faker->randomElement($client)->id;
            $message->message_id = $faker->randomElement($message)->id;
            $message->save();
        });
    }
}
