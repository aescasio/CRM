<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCallsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calls', function (Blueprint $table) {
            $table->increments('id');
            $table->text('subject');
            $table->text('status');
            $table->text('status2');
            $table->dateTime('date_time');
            $table->text('related_to');
            $table->integer('related_results')->unsigned()->nullable();
            $table->longtext('description');
            $table->boolean('notifications');

            $table->integer('assigned_to')->unsigned();
            $table->foreign('assigned_to')->references('id')->on('users');

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
        Schema::dropIfExists('calls');
		DB::statement( 'SET FOREIGN_KEY_CHECKS=1;' );
    }
}
