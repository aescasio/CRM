<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCalendarsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendars', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title');
            $table->longText('description');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->text('backgroundColor');
            $table->text('borderColor');
            $table->boolean('allDay');
            $table->text('url');
            $table->text('assigned_to');
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
        Schema::dropIfExists('calendars');
		DB::statement( 'SET FOREIGN_KEY_CHECKS=1;' );
    }
}
