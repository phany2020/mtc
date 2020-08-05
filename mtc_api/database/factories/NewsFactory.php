<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'description' =>  $faker->sentence,
        'picture' => "/uploads/images/logo1.png",
    ];
});
