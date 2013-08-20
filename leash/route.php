<?php

class Routes {

	public static $routes = 'routes';

	/**
	 * Return the current url path
	 *
	 * return string
	*/
	public static function uri() {
		return $_SERVER[ 'REQUEST_URI' ];
	}

	public static function url( $url ) {
		$array = array();

		foreach( $url as $key => $value ) {
			$array[] = $value;
		}

		return $array;
	}

	/**
	 * Return the url path as an array
	 *
	 * return array
	*/
	public static function url_array() {
		return explode( '/', Routes::uri() );
	}

	/**
	 * Clean out empty url array elements and return the updated array
	 *
	 * return array
	*/
	public static function url_filter() {
		return array_filter( Routes::url_array() );
	}

	/**
     * Returns a formatted url string based on url and routes configuration
     * 
     * return string
    */
	public static function route() {
		require CONF_PATH . Routes::$routes . SYSTEM_EXT;

		$url = implode( '/', Routes::url( Routes::url_filter() ) );
		$url_array = Routes::url_array();
		$uri = '';

		foreach( $routes as $key => $value ) {

			// -- Check if default controller
			if( $key == '(:default)' && empty( $url ) ) {
				$uri = $value;
				break;

			// -- Find url exact match
			} elseif( $url == $key ) {
				$uri = $value;
				break;

			// -- Check for :any route param
			} elseif( strpos( $key, '(:any)' ) !== false && !empty( $value ) ) {

				$url = explode( '/', $url );
				$keys = explode( '/', $key );
				$values = explode( '/', $value );

				// -- Check if first position url elements exist
				if( array_key_exists( 1, $url ) && array_key_exists( 0, $keys ) ) {

					// -- Check if url first position keys match
					if( $url[ 0 ] == $keys[ 0 ] ) {

						// -- Check if second position url elements exist
						if( array_key_exists( 2, $url ) && array_key_exists( 1, $keys ) ) {
							
							$params = array();

							// --  Loop through and collect all url params
							for( $a = 2; $a < count( $url ); $a++ ) {
								$params[] = $url[ $a ];
							}

							$uri = $values[ 0 ] . '/' . $url[ 1 ] . '/' . implode( '/', $params );

						} else {
							$uri = $values[ 0 ] . '/' . $url[ 1 ];
						}

					} else {
						$uri = false;
					}
					
				} else {
					$uri = false;
				}

				break;

			} elseif( method_exists( $value, $url ) ) {
				$uri = DEFAULT_CONTROLLER . '/' . $url;
				break;	
			}

		}

		return $uri;
	}

}
