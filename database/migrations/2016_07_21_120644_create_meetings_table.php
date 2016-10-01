<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMeetingsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->increments('id');
            $table->text('subject');
            $table->text('status');
            $table->text('location');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->longtext('description');
            $table->text('related_to');
            $table->text('related_result');
            $table->integer('related_result_id')->unsigned();
            $table->boolean('notifications')->default(1);
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
        Schema::dropIfExists('meetings');
		DB::statement( 'SET FOREIGN_KEY_CHECKS=1;' );
    }
}
