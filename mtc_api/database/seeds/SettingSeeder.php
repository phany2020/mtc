<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(\Faker\Generator $faker)
    {
        factory(Setting::class, 20)->make()->each(function($setting) use ($faker) {
            $setting->save();
        });
    }
}
