<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Site;
use Faker\Generator as Faker;

$factory->define(Site::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' =>  $faker->sentence,
        'avatar' => "/uploads/images/logo1.png",
    ];
});
