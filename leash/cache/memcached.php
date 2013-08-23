<?php 

class Memcached {

	public static $host = 'localhost';

	public static $memcache; 
	
	public static $port = 11211; 

	public function __construct() {
		Memcached::$memcache = new Memcache;
		Memcached::connect();
	}

	public static function delete( $key ) {
		return Memcached::$memcache->delete( CACHE_NAME . $key );
	}

	public static function connect() {
		return Memcached::$memcache->connect( Memcached::$host, Memcached::$port );
	}

	public static function get( $key ) {
		return Memcached::$memcache->get( CACHE_NAME . $key );
	}

	public static function save( $key, $data, $time ) {
		return Memcached::$memcache->add( CACHE_NAME . $key, $data, $time );
	}

}
