<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccountsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->longtext('website')->nullable();
            $table->string('office_phone')->nullable();
            $table->string('office_fax')->nullable();
            $table->longtext('description')->nullable();

            $table->string('billing_street')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_state')->nullable();
            $table->string('billing_postal')->nullable();
            $table->string('billing_country')->nullable();

            $table->string('shipping_street')->nullable();
            $table->string('shipping_city')->nullable();
            $table->string('shipping_state')->nullable();
            $table->string('shipping_postal')->nullable();
            $table->string('shipping_country')->nullable();

            $table->string('employees',11)->nullable();
            $table->boolean('same_as_billing')->nullable();
            $table->decimal('annual_revenue',15,2)->nullable();
            $table->string('member_of')->nullable();

            $table->integer('industry_type')->unsigned();
            $table->integer('account_type')->unsigned();

            /**
             * Foreignkeys section
             */
            $table->integer('campaign_id')->unsigned();
//            $table->foreign('campaign_id')->references('id')->on('campaigns');

            $table->integer('assigned_to')->unsigned();
            $table->foreign('assigned_to')->references('id')->on('users');

            $table->boolean('notifications')->default(1);
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
        Schema::drop('accounts');
        DB::statement( 'SET FOREIGN_KEY_CHECKS=1;' );
    }
}
