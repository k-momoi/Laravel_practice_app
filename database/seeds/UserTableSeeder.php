<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
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

        DB::table('users')->insert([
            'name' => 'sutara79',
            'email' => 'toumin.m7@gmail.com',
            'password' => bcrypt('1234'),
            'lang' => 'ja',
            'email_verified_at' => $faker->dateTime(),
            'created_at' => $faker->dateTime(),
            'updated_at' => $faker->dateTime(),
        ]);
        DB::table('users')->insert([
            'name' => 'foo1',
            'email' => 'foo1@foo.com',
            'password' => bcrypt('1234'),
            'lang' => 'en',
            'email_verified_at' => $faker->dateTime(),
            'created_at' => $faker->dateTime(),
            'updated_at' => $faker->dateTime(),
        ]);

        //random user create

        for ($i =0; $i < 18; $i++)
        {
            DB::table('users')->INSERT([
            'name' => $faker->unique()->userName(),
            'email' => $faker->unique()->email(),
            'password' => bcrypt('1234'),
            'lang' => $faker->randomElement(['en', 'ja']),
            'email_verified_at' => $faker->dateTime(),
            'created_at' => $faker->dateTime(),
            'updated_at' => $faker->dateTime(),
            ]);
        }
    }
}
