<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class roleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Role::truncate();

        $role = DB::table( 'roles' )->insert(
            [
                ['name'=>'admin','display_name'=>'Administrators','description'=>'Can access all','created_at' => Carbon::now(), 'updated_at' => Carbon::now()] ,
                ['name'=>'sales','display_name'=>'Sales Role','description'=>'Can access sales modules only','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name'=>'marketing','display_name'=>'Marketing Role','description'=>'Can access marketing modules','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ]
        );
    }
}
