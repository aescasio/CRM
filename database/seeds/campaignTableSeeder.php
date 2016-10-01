<?php

    use Illuminate\Database\Seeder;
    use App\Models\Campaign;
    use App\User;

    class campaignTableSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         * @return void
         */

        public function run()
        {
            $faker = Faker\Factory::create();
            $users = User::all()->pluck( 'id' );
            $users->toArray();

            Campaign::truncate();

            foreach ( range( 1, 30 ) as $index )
            {
                Campaign::create( [
                    'name'             => $faker->sentence( 3 ),
                    'status'           => $faker->randomElement( array ( 'Planning', 'Active', 'Inactive', 'Complete', 'In-Queue', 'Sending' ) ),
                    'type'             => $faker->randomElement( array ( 'Telesales', 'Mail', 'Email', 'Print', 'Web', 'Radio', 'Television', 'Newsletter' ) ),
                    'start_date'       => $faker->date(),
                    'end_date'         => $faker->date(),
                    'description'      => $faker->paragraph(),
                    'assigned_to'      => $faker->randomElement( $users->toArray() ),
                    'budget'           => $faker->randomNumber(),
                    'currency'         => $faker->randomElement( array ( 'S', 'P' ) ),
                    'impressions'      => $faker->sentence( 4 ),
                    'actual_cost'      => $faker->randomNumber(),
                    'expected_cost'    => $faker->randomNumber(),
                    'expected_revenue' => $faker->randomNumber(),
                    'objective'        => $faker->paragraph(),
                ] );

            }
        }
    }
