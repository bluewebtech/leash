<?php

class Environment {

	public static $local = '127.0.0.1';

	public static $server_address = 'SERVER_ADDR';

	public static $types = array( 
		'development', 
		'production' 
	);

	/**
     * Returns an array of allowable environment types
     *
     * return array
    */
	public static function types() {
		return Environment::$types;
	}

	/**
     * Returns the current environment type
     *
     * return string
    */
	public static function type() {
		if( $_SERVER[ Environment::$server_address ] == Environment::$local ) {
            return Environment::$types[ 0 ];
        } else {
            return Environment::$types[ 1 ];
        }
	}

	/**
     * Checks whether the given environment type is valid
     *
     * return boolean
     * 
     * @param string type
    */
	public static function status_exists( $type ) {
		try {

			if( in_array( $type, Environment::$types ) ) {
				return true;
			} else {
				throw new Exception( 'Environment status type is not valid. Available types are: ' . implode( ', ', Environment::$types ) );
			}

		} catch( Exception $e ) {
			Error::message( $e, 500 );
		}
	}

	/**
     * Checks whether the current environment type is development
     *
     * return boolean
     * 
     * @param boolean status
    */
	public static function is_development( $status ) {
		if( Environment::type() == Environment::$types[ 0 ] && Environment::status_exists( $status ) ) {
			return true;
		} else {
			return false;
		}
	}

	/**
     * Checks whether the current environment type is production
     *
     * return boolean
     * 
     * @param boolean status
    */
	public static function is_production( $status ) {		
		if( Environment::type() == Environment::$types[ 1 ] && Environment::status_exists( $status[ 1 ] ) ) {
			return true;
		} else {
			return false;
		}
	}

	/**
     * Returns the current environment status
     *
     * return string
     * 
     * @param boolean status
    */
	public static function status( $status ) {
		if( Environment::status_exists( $status[ 0 ] ) || Environment::status_exists( $status[ 1 ] ) ) {
			return Environment::type();
		}
	}

}
