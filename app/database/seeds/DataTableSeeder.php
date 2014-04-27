<?php

class DataTableSeeder extends Seeder {

    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0'); // disable foreign key constraints
        DB::table('session_times')->truncate();

        DB::table('cinemas')->truncate();

        Cinema::create(array(
            'name' => 'c1',
            'address' => 'a1',
            'latitude' => 1.0,
            'longitude' => 1.0
        ));
        Cinema::create(array(
            'name' => 'c2',
            'address' => 'a2',
            'latitude' => 2.0,
            'longitude' => 2.0
        ));
        Cinema::create(array(
            'name' => 'c3',
            'address' => 'a3',
            'latitude' => 3.0,
            'longitude' => 3.0
        ));
        Cinema::create(array(
            'name' => 'c4',
            'address' => 'a4',
            'latitude' => 4.0,
            'longitude' => 4.0
        ));
        Cinema::create(array(
            'name' => 'c5',
            'address' => 'a5',
            'latitude' => 5.0,
            'longitude' => 5.0
        ));
        Cinema::create(array(
            'name' => 'c6',
            'address' => 'a6',
            'latitude' => 6.0,
            'longitude' => 6.0
        ));

        DB::table('movies')->truncate();

        Movie::create(array(
            'title' => 'm1'
        ));

        Movie::create(array(
            'title' => 'm2'
        ));

        Movie::create(array(
            'title' => 'm3'
        ));

        SessionTime::create(array(
            'movie_id' => 1,
            'cinema_id' => 1,
            'play_at' => '2014-04-25 10:00:00'
        ));
        SessionTime::create(array(
            'movie_id' => 2,
            'cinema_id' => 1,
            'play_at' => '2014-04-25 11:00:00'
        ));
        SessionTime::create(array(
            'movie_id' => 1,
            'cinema_id' => 1,
            'play_at' => '2014-04-26 10:00:00'
        ));
        SessionTime::create(array(
            'movie_id' => 2,
            'cinema_id' => 1,
            'play_at' => '2014-04-25 10:00:00'
        ));
        SessionTime::create(array(
            'movie_id' => 1,
            'cinema_id' => 2,
            'play_at' => '2014-04-25 10:00:00'
        ));
        SessionTime::create(array(
            'movie_id' => 1,
            'cinema_id' => 1,
            'play_at' => '2014-04-25 09:00:00'
        ));

        DB::statement('SET FOREIGN_KEY_CHECKS = 1'); // enable foreign key constraints

    }

}