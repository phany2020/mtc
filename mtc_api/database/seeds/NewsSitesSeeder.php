<?php

use Illuminate\Database\Seeder;

class NewsSitesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(\Faker\Generator $faker)
    {
        factory(NewsSites::class, 20)->make()->each(function($news_site) use ($faker) {
            $news = App\News::all();
            $site = App\Site::all();

            $news_site->news_id = $faker->randomElement($news)->id;
            $news_site->site_id = $faker->randomElement($site)->id;
            $news_site->save();
        });
    }
}
