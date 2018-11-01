<?php

use Illuminate\Database\Seeder;

class FollowersTableSeeder extends Seeder
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
            DB::table('followers')->INSERT([
                'following_user_id' => $faker->int(10),
                'followed_user_id' => $faker->int(10),
                'created_at' => $faker->datetime(),
                'updated_at' => $faker->datetime(),
            ]);
        }
    }
}
