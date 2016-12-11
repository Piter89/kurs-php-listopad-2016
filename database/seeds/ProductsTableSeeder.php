<?php

use Illuminate\Database\Seeder;
use App\Products;
class ProductsTableSeeder extends Seeder
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
            $product = new Products();
            $product->name = $faker->name;
            $product->description = $faker->text(200);
            $product->price = $faker->randomFloat() ;
            $product->category_id = rand(1,9);
            $product->save();
        }
    }
}
