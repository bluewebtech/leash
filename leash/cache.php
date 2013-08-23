<?php 

class Cache {

	public static $driver;

	public static $types = array( 
		'apc', 
		'memcached' 
	);

	public static function delete( $key ) {
		return Cache::driver()->delete( $key );
	}

	public static function driver() {
		try {

			if( CACHE_ENABLE ) {

				try {

					if( CACHE_TYPE ) {

						try {

							if( in_array( CACHE_TYPE, Cache::$types ) ) {

								switch( CACHE_TYPE ) {
									case 'apc':
										return APC::exists() ? Cache::$driver = new APC : false;
									break;

									case 'memcached':
										return Cache::$driver = new Memcached;
										//return Memcached::exists() ? Cache::$driver = new Memcached : false;
									break;
								}

							} else {
								throw new Exception( 'Caching type (' . CACHE_TYPE . ') is not supported.' );
							}

						} catch( Exception $e ) {
							Error::message( $e, 500 );
						}

					} else {
						throw new Exception( 'Caching type not specified within the configuration.' );
					}

				} catch( Exception $e ) {
					Error::message( $e, 500 );
				}

			} else {
				throw new Exception( 'Caching is not enabled within the configuration.' );
			}

		} catch( Exception $e ) {
			Error::message( $e, 500 );
		}
	}

	public static function get( $key ) {
		return Cache::driver()->get( $key );
	}

	public static function save( $key, $data, $time = 60 ) {
		return Cache::driver()->save( $key, $data, $time );
	}

}
