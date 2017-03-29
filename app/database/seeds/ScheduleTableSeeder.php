<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ScheduleTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 1000) as $index)
		{
            $end = $faker->dateTimeBetween($startDate = '2017-03-29 08:00:00', $endDate = '2017-03-29 17:00:00', $timezone = date_default_timezone_get());
			Schedule::create([
                'name' => $faker->name,
                'subject' => $faker->sentence(6,false),
                'start' => $faker->dateTimeBetween($startDate = '2017-03-29 08:00:00', $endDate = '2017-03-29 17:00:00', $timezone = date_default_timezone_get()),
                'end' => $faker->dateTimeBetween($end, $endDate = '2017-03-29 17:00:00', $timezone = date_default_timezone_get()),
                'room_id' => rand(1,15)
			]);
		}
	}

}