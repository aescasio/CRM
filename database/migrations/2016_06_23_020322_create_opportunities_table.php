<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOpportunitiesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opportunities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('currency')->nullable();
            $table->date('closed_date');
            $table->decimal('amount',15,2)->nullable();
            $table->string('type')->nullable();
            $table->string('sales_stage');
            $table->string('lead_source')->nullable();
            $table->integer('probability')->unsigned()->nullable();

            $table->string('next_step')->nullable();
            $table->longtext('description')->nullable();
            $table->boolean('notifications')->dafault(1);

            $table->integer('account_id')->unsigned();
            $table->foreign('account_id')->references('id')->on('accounts');

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
        Schema::dropIfExists('opportunities');
		DB::statement( 'SET FOREIGN_KEY_CHECKS=0;' );
    }
}
