<?php


class UserTableSeeder extends Seeder
{

    public function run()
    {

        User::create([
            'name' => 'Leonardo Hidalgo',
            'server' => 'outlook.office365.com',
            'email' => 'lhidalgo@alumnos.uai.cl',
            'password' => '4380.UoY',
            'version' => 'Exchange2013_SP1'
        ]);

    }

}