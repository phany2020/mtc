<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(\Faker\Generator $faker)
    {
        factory(User::class, 10)->make()->each(function ($user) use ($faker) {
            $user->save();
        });
    }
}
