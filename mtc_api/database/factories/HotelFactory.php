<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Hotel;
use Faker\Generator as Faker;

$factory->define(Hotel::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' =>  $faker->sentence,
        'location' =>  $faker->sentence,
        'link' =>  $faker->sentence,
        'avatar' => "/uploads/images/logo1.png",
    ];
});
