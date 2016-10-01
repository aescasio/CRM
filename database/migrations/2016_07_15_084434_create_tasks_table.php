<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTasksTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->text('subject', 50);
            $table->text('status', 14);
            $table->dateTime('start_date');
            $table->dateTime('due_date');
            $table->text('related_to', 50);
            $table->text('related_result');
            $table->integer('related_result_id')->unsigned()->nullable();


            $table->text('priority', 50);
            $table->longText('description');
            $table->text('contact_id')->unsigned()->nullable();
            $table->foreign('contact_id')->references('id')->on('contacts');
            $table->boolean('notifications')->default(1);
            $table->integer('assigned_to')->unsigned()->nullable();
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
        Schema::dropIfExists('tasks');
		DB::statement( 'SET FOREIGN_KEY_CHECKS=1;' );
    }
}
