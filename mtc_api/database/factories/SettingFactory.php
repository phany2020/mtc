<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Setting;
use Faker\Generator as Faker;

$factory->define(Setting::class, function (Faker $faker) {
    return [
        'key' => $faker->unique()->name(),
        'value' => $faker->name,
        'description' =>  $faker->sentence,
    ];
});
