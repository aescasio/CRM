<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProjectsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->text('status');
            $table->text('priority');
            $table->date('start_date');
            $table->date('end_date');
            $table->longtext('notes');
            $table->boolean('notifications')->default(1);
            $table->integer('project_manager')->unsigned()->nullable();
            $table->foreign('project_manager')->references('id')->on('users');
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
        Schema::dropIfExists('projects');
		DB::statement( 'SET FOREIGN_KEY_CHECKS=1;' );
    }
}
