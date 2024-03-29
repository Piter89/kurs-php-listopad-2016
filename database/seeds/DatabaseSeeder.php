<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {




        $this->call(CategoriesSitesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
         $this->call(UsersTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);

    }
}
