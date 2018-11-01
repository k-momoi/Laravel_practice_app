<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Faker use
        $faker = Faker\Factory::create('ja_JP');

        //random posts create
        for ($i = 0; $i < 40; $i++)
        {
            DB::table('posts')->INSERT([
                'title' => $faker->text(20),
                'body' => $faker->text(200),
                'created_at' => $faker->datetime(),
                'updated_at' => $faker->datetime(),
                'user_id' => $faker->numberBetween(1, 20),
            ]);
        }
    }
}
