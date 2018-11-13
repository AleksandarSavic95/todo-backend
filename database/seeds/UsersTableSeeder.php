<?php

use Illuminate\Database\Seeder;
use \App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->sentence($nbWords = 2),
                'email' => str_random(4) . '@gmail.com',
                'password' => Hash::make('123123'),
            ]);
        }
    }
}
