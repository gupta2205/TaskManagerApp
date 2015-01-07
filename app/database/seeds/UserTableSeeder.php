<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

	public function run()
	{
		User::truncate();

		User::create([
				'username' => 'me',
			    'email' => 'me@test.com',
			    'password' => 'mypass',
			]);

		$faker = Faker::create();

		foreach(range(1, 3) as $index)
		{
			User::create([
				'username' => str_replace('.', '', $faker->unique()->userName),
			    'email' => str_replace('.', '', $faker->unique()->email),
			    'password' => 'password',
			]);
		}
	}

}