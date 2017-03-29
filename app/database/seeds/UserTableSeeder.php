<?php


class UserTableSeeder extends Seeder {

	public function run()
	{

		User::create([
				'name' => 'Leonardo Hidalgo',
				'email' => 'lhidalgo@alumnos.uai.cl',
				'password' => '4380.UoY'
		]);

	}

}