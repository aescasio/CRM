<?php

    namespace App;


    /**
     * Created by PhpStorm.
     * User: ITS-Gelo
     * Date: 2016-04-25
     * Time: 3:37 PM
     */

    Class Standards
    {

        public function dateToDB( $input )
        {
            return date( 'Y-m-d', strtotime( str_replace( '-', '/', $input ) ) );
        }

        /*
         * This un-mask single numeric variable
         */
        public function unMask( $input )
        {
            if ( preg_match( "/^[0-9,]/", $input ) )
            {
                $input = str_replace( ',', '', $input );
            }

            return $input;
        }

        /*
         * This will un-mask multiple variable money to decimal, ready for database input
         */
        public function unMaskArray( $input )
        {
            foreach ( $input as $key => $value )
            {
                if ( preg_match( "/^[0-9,]/", $value ) )
                {
                    $input[ $key ] = str_replace( ',', '', $value );
                }
            }

            return $input;
        }

    }
