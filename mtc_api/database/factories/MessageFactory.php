<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Message;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    return [
        'content' => $faker->sentence,
        'like' =>  $faker->number_format,
        'send_at' => $faker->now(),
    ];
});
