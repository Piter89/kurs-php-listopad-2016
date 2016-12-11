<?php

use Illuminate\Database\Seeder;
use App\Articles;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($i = 0; $i < 100; $i++) {
            $articles = new Articles();
            $articles ->title = $faker->company;
            $articles ->content = $faker->text(200);
            $articles ->categories_id = rand(1,9);
            $articles ->save();
        }
    }
}