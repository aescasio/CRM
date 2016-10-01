<?php

use Illuminate\Database\Seeder;

class roleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {

        $role_user = DB::table( 'role_user' )->truncate();


        $role_user = DB::table( 'role_user' )->insert(
            [
                [ 'user_id' => '1' , 'role_id' => '1' ] ,
                [ 'user_id' => '2' , 'role_id' => '1' ] ,
                [ 'user_id' => '3' , 'role_id' => '2' ] ,
                [ 'user_id' => '4' , 'role_id' => '3' ]
            ]
        );
    }
}
