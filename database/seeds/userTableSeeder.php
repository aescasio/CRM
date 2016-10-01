<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class userTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        \App\User::truncate();


        $db = DB::table( 'users' )->insert(
            array (
                array (
                    'nick_name'       => 'Administrator' ,
                    'email'          => 'admin@email.com' ,
                    'password'       => bcrypt( 'administrator' ) ,
                    'first_name'     => 'NA' ,
                    'middle_initial' => '' ,
                    'last_name'      => 'NA',
                    'created_at' => Carbon::now()
                ) ,
                array (
                    'nick_name'       => 'gelo' ,
                    'email'          => 'avescasio@enchantkingdom.com' ,
                    'password'       => '$2y$10$7TKU5CRVe7UlWAeUWT5yKOVyVT9.6NAiQ0DPTLNsWRvlN8NKgyGea' ,
                    'first_name'     => 'Angelo' ,
                    'middle_initial' => 'V' ,
                    'last_name'      => 'Escasio' ,
                    'created_at' => Carbon::now()
                ) ,
                array (
                    'nick_name'       => 'sales' ,
                    'email'          => 'sales@email.com' ,
                    'password'       => bcrypt( 'sales' ) ,
                    'first_name'     => 'NA' ,
                    'middle_initial' => '' ,
                    'last_name'      => 'NA',
                    'created_at' => Carbon::now()
                ) ,
                array (
                    'nick_name'       => 'marketing' ,
                    'email'          => 'marketing@email.com' ,
                    'password'       => bcrypt( 'marketing' ) ,
                    'first_name'     => 'NA' ,
                    'middle_initial' => '' ,
                    'last_name'      => 'NA',
                    'created_at' => Carbon::now()
                ) ,
            )
        );

/*
        foreach ( range( 1 , 10 ) as $index )
        {
            \App\User::create( [
                'nick_name'       => $faker->name ,
                'email'          => $faker->email ,
                'password'       => bcrypt( 'password' ) ,
                'first_name'     => ucfirst( $faker->firstName ) ,
                'middle_initial' => strtoupper( $faker->randomLetter ) ,
                'last_name'      => ucfirst( $faker->lastName )
            ] );

        }
*/

    }
}
