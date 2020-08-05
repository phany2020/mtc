<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Guide;
use Faker\Generator as Faker;

$factory->define(Guide::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'status' => $faker->randomElement(['PRIVATE', 'COMMON']),
        'hours' =>  $faker->number_format,
        'amount' =>  $faker->money_format,
        'is_taken' => $faker->boolean(),
    ];
});
