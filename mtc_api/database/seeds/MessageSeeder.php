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
            $user = App\User::all();
           // $message1 = App\Message::all();

            $message->user_id = $faker->randomElement($user)->id;
            //$message->parent_id = $faker->randomElement($message1)->id;
            $message->save();
        });
    }
}
