<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class TasksTableSeeder extends Seeder {

	public function run()
	{
		Task::truncate();

		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Task::create([
				'title' => $faker->word(),
			    'body' => $faker->text(20),
			    'user_id' => $faker->numberBetween(1, 4),
			    'completed' => $faker->boolean(),
			]);
		}
	}

}