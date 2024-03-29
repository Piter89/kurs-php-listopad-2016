<?php

use Illuminate\Database\Seeder;

class CategoriesSitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = \Faker\Factory::create();

        for($i = 0; $i < 10; $i++) {
            $categoriesSites = new \App\CategoriesSites();
            $categoriesSites->name = $faker->city;
            $categoriesSites->save();
        }
    }
}