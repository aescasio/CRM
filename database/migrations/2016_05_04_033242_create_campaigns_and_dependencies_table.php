<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignsAndDependenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table)
        {
            $table->increments( 'id' );
            $table->string( 'name' )->unique();
            $table->string( 'status' );
            $table->string( 'type' );
            $table->date( 'start_date' );
            $table->date( 'end_date' );
            $table->text( 'description' );
            $table->decimal( 'budget', 15, 2 );
            $table->string( 'currency' );
            $table->string( 'impressions' );
            $table->decimal( 'actual_cost', 15, 2 );
            $table->decimal( 'expected_cost', 15, 2 );
            $table->decimal( 'expected_revenue', 15, 2 );
            $table->text( 'objective' );

            $table->integer( 'assigned_to' )->unsigned();
            $table->foreign( 'assigned_to' )->references( 'id' )->on( 'users' );

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('leads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('salutation');
            $table->string('first_name');
            $table->string('mi',2);
            $table->string('last_name');
            $table->string('full_name');
            $table->string('office_phone');
            $table->string('position');
            $table->string('mobile');
            $table->string('department');
            $table->string('fax');
            $table->string('company_name');
            $table->string('website');
            $table->text('description');

            $table->string('primary_street');
            $table->string('primary_city');
            $table->string('primary_state');
            $table->string('primary_postal');
            $table->string('primary_country');

            $table->boolean('same_address');
            $table->string('secondary_street');
            $table->string('secondary_city');
            $table->string('secondary_state');
            $table->string('secondary_postal');
            $table->string('secondary_country');

            $table->text('email_address');
            $table->string('status');
            $table->text('status_remarks');

            $table->string('lead_source');
            $table->text('lead_source_remarks');

            $table->float('opportunity_amount');
            $table->string('referred_by');
            $table->boolean('notifications')->default(1);

            $table->integer('campaign_id')->unsigned();
            //$table->foreign('campaign_id')->references('id')->on('campaigns');

            $table->string('campaign_name');
            $table->integer('assigned_to')->unsigned();
            $table->foreign('assigned_to')->references('id')->on('users');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('salutation');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('mi',2);
            $table->string('office_phone');
            $table->string('position');
            $table->string('mobile');
            $table->string('department');
            $table->string('fax');
            $table->integer('account_id');
            $table->string('website');
            $table->text('description');
            $table->string('primary_street');
            $table->string('primary_city');
            $table->string('primary_state');
            $table->string('primary_postal');
            $table->string('primary_country');
            $table->boolean('same_address');
            $table->string('secondary_street');
            $table->string('secondary_city');
            $table->string('secondary_state');
            $table->string('secondary_postal');
            $table->string('secondary_country');
            $table->text('email_address');
            $table->string('lead_source');
            $table->boolean('notifications')->default();
            $table->integer('campaign_id')->unsigned();
//            $table->foreign('campaign_id')->references('id')->on('campaigns');

            $table->integer('assigned_to')->unsigned();
//            $table->foreign('assigned_to')->references('id')->on('users');

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
        Schema::dropIfExists('leads');
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('campaigns');
		DB::statement( 'SET FOREIGN_KEY_CHECKS=1;' );
    }
}
