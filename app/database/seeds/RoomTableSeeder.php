<?php

use Faker\Factory as Faker;

class RoomTableSeeder extends Seeder {

	public function run()
	{
        $faker = Faker::create();
        foreach (range(1,15) as $item) {
            Room::create([
                'name' => $faker->lexify('??')
            ]);
        }
	}

}