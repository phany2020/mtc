<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Hotel;
use Faker\Generator as Faker;

$factory->define(Hotel::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' =>  $faker->sentence,
        'location' =>  $faker->sentence,
        'link' =>  "https://www.google.com/search?q=photo+hotel&client=firefox-b-d&sxsrf=ALeKk02iV-FiHflmxx4wQdyZcxPN_QTN-w:1596643994065&tbm=isch&source=iu&ictx=1&fir=QZtX6W27Cihw4M%252CtKLsTu71C1W8TM%252C_&vet=1&usg=AI4_-kSalAEsDtKaPxbRFWl9ldbakPFabg&sa=X&ved=2ahUKEwit4-SwuoTrAhVKRBoKHUkNDuYQ9QEwAXoECAsQHg&biw=1366&bih=654#imgrc=QZtX6W27Cihw4M",
        'avatar' => "/uploads/images/logo1.png",
    ];
});
