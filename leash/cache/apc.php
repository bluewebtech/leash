<?php

class APC {

	public static function delete( $key ) {
		return apc_delete( CACHE_NAME . $key );
	}

	public static function exists() {
		if( function_exists( 'apc_store' ) ) {
			return true;
		} else {
			return false;
		}
	}

	public static function get( $key ) {
		return apc_fetch( CACHE_NAME . $key );
	}

	public static function save( $key, $data, $time ) {
		return apc_store( CACHE_NAME . $key, $data, $time );
	}

}
