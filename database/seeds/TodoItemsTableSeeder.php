<?php

use Illuminate\Database\Seeder;
use \App\TodoItem;


class TodoItemsTableSeeder extends Seeder
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
            TodoItem::create([
                'title' => $faker->sentence($nbWords = 2),
                'content' => $faker->paragraph,
                'priority' => 0,
                'done' => false
            ]);
        }

    }
}
