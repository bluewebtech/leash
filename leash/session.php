<?php

class Session {

	public static function sessions() {
		session_name( SESSION_NAME );
		session_start();

		$inactive = SESSION_TIMEOUT * 60;

		if( isset( $_SESSION[ SESSION_NAME ][ 'timeout' ] ) ) {

		    $sessionTTL = time() - $_SESSION[ SESSION_NAME ][ 'timeout' ];

		    if ( $sessionTTL > $inactive ) {
		        return true;
		    } else {
		    	$_SESSION[ SESSION_NAME ][ 'timeout' ] = time();
		    	return false;
		    }

		}

		$_SESSION[ SESSION_NAME ][ 'timeout' ] = time();
	}

	public static function session_end() {
		if( Session::sessions() ) {
			return true;
		} else {
			return false;
		}
	}

}
