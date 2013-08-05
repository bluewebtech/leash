<?php

require_once 'dBug.php';

class dBug {

	public static function get( $var ) { 
		new __dBug( $var );
	}

	public static function dump( $var ) { 
		return dBug::get( $var );
	}

	public static function writedump( $var ) { 
		return dBug::get( $var );
	}

	public static function write_dump( $var ) { 
		return dBug::get( $var );
	}

	public static function o( $var ) { 
		return dBug::get( $var );
	}

	public static function out( $var ) { 
		return dBug::get( $var );
	}

	public static function output( $var ) { 
		return dBug::get( $var );
	}

	public static function speak( $var ) { 
		return dBug::get( $var );
	}

}
