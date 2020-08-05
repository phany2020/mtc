<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TourismType;
use Faker\Generator as Faker;

$factory->define(TourismType::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' =>  $faker->sentence,
    ];
});
