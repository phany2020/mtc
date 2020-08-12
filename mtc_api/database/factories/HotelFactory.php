<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Hotel;
use Faker\Generator as Faker;

$factory->define(Hotel::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' =>  $faker->sentence,
        'location' =>  $faker->sentence,
        'link' =>  "https://www.google.com/search?q=photo+hotel",
        'avatar' => "/uploads/images/logo1.png",
    ];
});
