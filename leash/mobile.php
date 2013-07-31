<?php

class Mobile {

	public static $mobile_types = array( 
		'Android', 
		'BlackBerry', 
		'iPhone', 
		'iPad', 
		'iPod', 
		'PlayBook'
	);

	public static function agent() {
		return $_SERVER[ 'HTTP_USER_AGENT' ];
	}

	public static function mobile_check() {
		$checks = array();

		foreach( Mobile::$mobile_types as $key => $value ) {

			if( strpos( Mobile::agent(), $value ) ) {
				$checks[] = true;
			} else {
				$checks[] = false;
			}
			
		}

		return $checks;
	}

	public static function is_mobile() {
		if( in_array( true, Mobile::mobile_check() ) ) {
			return true;
		} else {
			return false;
		}
	}

}
