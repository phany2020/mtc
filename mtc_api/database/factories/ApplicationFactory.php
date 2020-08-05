<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Application;
use Faker\Generator as Faker;

$factory->define(Application::class, function (Faker $faker) {
    return [
        'files' => "/uploads/documents/logo1.pdf",
        'description' =>  $faker->sentence,
    ];
});
