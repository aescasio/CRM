<?php
/**
 * Created by PhpStorm.
 * User: ITS-Gelo
 * Date: 5/23/2016
 * Time: 5:02 PM
 */

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class permissionsTableSeeder extends Seeder
{
    /**
     * Run the database seed
     * @return void
     */
    public function run()
    {
        \App\Models\Permission::truncate();

        $permission = DB::table( 'permissions' )->insert(
            [
                ['name'=>'global-permission','display_name'=>'Create User Account','description'=>'Create User Account','created_at' => Carbon::now(), 'updated_at' => Carbon::now()] ,
                ['name'=>'user-permission','display_name'=>'Access User Account','description'=>'Access to user account','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name'=>'user-create','display_name'=>'Create User Account','description'=>'Create a user account','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name'=>'user-update','display_name'=>'Update User Account','description'=>'Update a specific user account','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name'=>'user-delete','display_name'=>'Delete User Account','description'=>'Delete a specific user account','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name'=>'role-permission','display_name'=>'Access Roles','description'=>'Access the model role','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name'=>'create-new','display_name'=>'Create New Records','description'=>'Show the create form, were the user inputs data.','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name'=>'delete-record','display_name'=>'Delete Record','description'=>'Able to delete a particular record','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name'=>'edit-record','display_name'=>'Edit Record','description'=>'Able to edit particular record','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name'=>'show-record','display_name'=>'Show Record','description'=>'Show Detailed record as read only','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name'=>'update-record','display_name'=>'Update Record','description'=>'Allow to update the edited record','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name'=>'store-record','display_name'=>'Store Record','description'=>'Allow to store the created records.','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['name'=>'dev','display_name'=>'Developer use','description'=>'Developer Use Only','created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ]
        );
    }

}