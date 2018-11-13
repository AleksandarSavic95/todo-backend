<?php

use Illuminate\Database\Seeder;
use \App\TodoItem;

include(app_path() . '/constants.php');

// use \App\Priority;


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
                'priority' => $faker->randomElement([Priority::$PRIORITY_LOW, Priority::$PRIORITY_MEDIUM, Priority::$PRIORITY_HIGH]),
                'is_done' => false,
                'user_id' => random_int(1,3)
            ]);
        }

    }
}
