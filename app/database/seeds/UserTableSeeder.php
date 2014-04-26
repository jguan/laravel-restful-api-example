<?php

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create(array(
            'username' => 'tester',
            'password' => Hash::make('testing')
        ));

    }

}