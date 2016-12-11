<?php

use Illuminate\Database\Seeder;

use App\Comments;

class CommentsTableSeeder extends Seeder
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
            $comments = new Comments();
            $comments->title = $faker->company;
            $comments->subtitle = $faker->company;
            $comments->content = $faker->text(200);
            $comments->category_id = rand(1,9);
            $comments->save();
        }
    }
}