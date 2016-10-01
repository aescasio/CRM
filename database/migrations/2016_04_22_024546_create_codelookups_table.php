<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCodelookupsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('codelookups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('typename', 15);
            $table->string('description', 100)->nullable();
            $table->smallInteger('code', false, true)->nullable()->length(6);
            $table->double('value')->nullable();
            $table->string('string', 50)->nullable();
            $table->double('value2')->nullable();
            $table->string('string2', 50)->nullable();
            $table->binary('binary')->nullable();
            $table->mediumtext('memo');
            $table->boolean('bool')->nullable();
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
        Schema::dropIfExists('codelookups');
		DB::statement( 'SET FOREIGN_KEY_CHECKS=1;' );
    }
}
