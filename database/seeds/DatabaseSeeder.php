<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        //disable foreign key check for this connection before running seeders
        DB::statement( 'SET FOREIGN_KEY_CHECKS=0;' );

//        $this->call( userTableSeeder::class );
//        $this->call( campaignTableSeeder::class );
//        $this->call( codelookupsTableSeeder::class );
//        $this->call( roleTableSeeder::class );
//        $this->call( permissionsTableSeeder::class );
//        $this->call( roleUserTableSeeder::class);

        // supposed to only apply to a single connection and reset it's self
        // undo what is done for clarity
        DB::statement( 'SET FOREIGN_KEY_CHECKS=1;' );

        Eloquent::reguard();
    }
}
