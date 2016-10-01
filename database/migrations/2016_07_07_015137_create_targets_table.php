<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTargetsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('targets', function (Blueprint $table) {
            $table->increments('id');
            $table->text('salutation');
            $table->text('first_name');
            $table->text('last_name');
            $table->text('title');
            $table->text('department');

            $table->text('contact_office');
            $table->text('contact_mobile');
            $table->text('contact_fax');
            $table->longText('primary_address');
            $table->text('primary_city');
            $table->text('primary_state');
            $table->text('primary_postal');
            $table->text('primary_country');
            $table->boolean('same_address');
            $table->longText('secondary_address');
            $table->text('secondary_city');
            $table->text('secondary_state');
            $table->text('secondary_postal');
            $table->text('secondary_country');
            $table->text('email');
            $table->longText('description');
            $table->boolean('notifications')->default(1);
            $table->integer('assigned_to')->unsigned()->nullable();
            $table->foreign('assigned_to')->references('id')->on('users');
            $table->integer('account_id')->unsigned()->nullable();
            //$table->foreign('account_id')->references('id')->on('accounts');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		DB::statement( 'SET FOREIGN_KEY_CHECKS=0;' );
        Schema::drop('targets');
		DB::statement( 'SET FOREIGN_KEY_CHECKS=1;' );
    }
}
