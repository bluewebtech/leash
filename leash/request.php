<?php

class Request {

	/**
     * Return all available cookie values as an object
     * 
     * return obj
     */
	public static function cookies() {
		$object = new stdClass();

		foreach( $_COOKIE as $key => $value ) {
			if( XSS_PROTECT ) {
				$object->$key = htmlspecialchars( $value );
			} else {
				$object->$key = $value;
			}
		}

		return $object;
	}

	/**
     * Return the domain name of the application
     * 
     * return string
     */
	public static function domain() {
		return 'http://' . $_SERVER[ 'SERVER_NAME' ];
	}

	/**
     * Return all available file values as an object
     * 
     * return obj
     */
	public static function files() {
		$object = new stdClass();

		foreach( $_FILES as $key => $value ) {
			if( XSS_PROTECT ) {
				$object->$key = htmlspecialchars( $value );
			} else {
				$object->$key = $value;
			}
		}

		return $object;
	}

	/**
     * Return all available get values as an object
     * 
     * return obj
     */
	public static function get() {
		$object = new stdClass();

		foreach( $_GET as $key => $value ) {
			if( XSS_PROTECT ) {
				$object->$key = htmlspecialchars( $value );
			} else {
				$object->$key = $value;
			}
		}

		return $object;
	}

	/**
     * Return user ipaddress
     * 
     * return string
     */
	public static function ipaddress() {
		return $_SERVER[ 'REMOTE_ADDR' ];
	}

	/**
     * Check to see if the request was made by an ajax trip
     * 
     * return boolean
     */
	public static function is_ajax() {
		$http = '';

		if( isset( $_SERVER[ 'HTTP_X_REQUESTED_WITH' ] ) ) {
			$http = $_SERVER[ 'HTTP_X_REQUESTED_WITH' ];
		}

		if( !empty( $http ) && strtolower( $http ) == 'xmlhttprequest') {
			return true;
		} else {
			return false;
		}
	}

	/**
     * Return all available post values as an object
     * 
     * return obj
     */
	public static function post() {
		$object = new stdClass();

		foreach( $_POST as $key => $value ) {
			if( XSS_PROTECT ) {
				$object->$key = htmlspecialchars( $value );
			} else {
				$object->$key = $value;
			}
		}

		return $object;
	}

	/**
     * Redirect to another page. That's about it.
     * 
     * return true
     */
	public static function redirect( $url ) {
		return header( 'Location: ' . $url );
	}

	/**
     * Return all available request values as an object
     * 
     * return obj
     */
	public static function requests() {
		$object = new stdClass();

		foreach( $_REQUEST as $key => $value ) {
			if( XSS_PROTECT ) {
				$object->$key = htmlspecialchars( $value );
			} else {
				$object->$key = $value;
			}
		}

		return $object;
	}

	/**
     * Return all available get values as an object
     * 
     * return obj
     */
	public static function server() {
		$object = new stdClass();

		foreach( $_SERVER as $key => $value ) {
			if( XSS_PROTECT ) {
				$object->$key = htmlspecialchars( $value );
			} else {
				$object->$key = $value;
			}
		}

		return $object;
	}

	/**
     * Return a random unique string
     * 
     * return string
     */
	public static function uuid() {
		return md5( rand() . date( 'Ymdhis' ) );
	}

}
