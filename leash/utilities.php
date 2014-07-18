<?php

class Utilities {

	/**
     * Returns an array of all available controllers
     *
     * return array
    */
	public static function list_controllers() {
		$dir     = scandir( APP_ROOT . CONTROLLERS_PATH );
		$files   = array();
		$control = array();

		foreach ( $dir as $key => $value ) {

			if( $value != '.' && $value != CD ) {
				array_push( $files, $value );
			}

		}

		if( count( $files ) > 0 ) {

			foreach ( $files as $key => $value ) {

				if( $value != '.' && $value != CD ) {
					$controller = str_replace( EXT_PHP, '', $value );
					$class      = ucfirst( str_replace( EXT_PHP, '', $value ) . 'Controller' );

					$control[ $controller ] = $controller;
					$control[ $controller ] = $class;
				}

			}
		}

		return $control;
	}

	/**
     * Returns an array of all available models
     *
     * return array
    */
	public static function list_models() {
		$dir    = scandir( APP_ROOT . MODELS_PATH );
		$files  = array();
		$models = array();

		foreach ( $dir as $key => $value ) {

			if( $value != '.' && $value != CD ) {
				array_push( $files, $value );
			}

		}

		if( count( $files ) > 0 ) {

			foreach ( $files as $key => $value ) {

				if( $value != '.' && $value != CD ) {
					$models[] = ucfirst( str_replace( EXT_PHP, '', $value ) . 'Model' );
				}

			}

		}

		return $models;
	}

	/**
     * Returns an array of all available plugins
     *
     * return array
    */
	public static function list_plugins() {
		$dir     = scandir( APP_ROOT . PLUGINS_PATH );
		$files   = array();
		$plugins = array();

		foreach ( $dir as $key => $value ) {

			if( $value != '.' && $value != CD ) {
				array_push( $files, $value );
			}

		}

		if( count( $files ) > 0 ) {

			foreach ( $files as $key => $value ) {

				if( $value != '.' && $value != CD ) {
					$plugins[] = ucfirst( str_replace( EXT_PHP, '', $value ) );
				}

			}

		}

		return $plugins;
	}

	/**
     * Returns an array of all available services
     *
     * return array
    */
	public static function list_services() {
		$dir      = scandir( APP_ROOT . SERVICES_PATH );
		$files    = array();
		$services = array();

		foreach ( $dir as $key => $value ) {

			if( $value != '.' && $value != CD && strpos( $value, '.' ) != 0 ) {
				array_push( $files, $value );
			}

		}

		if( count( $files ) > 0 ) {

			foreach ( $files as $key => $value ) {

				if( $value != '.' && $value != CD ) {
					$services[] = ucfirst( str_replace( EXT_PHP, '', $value ) ) . 'Service';
				}

			}

		}

		return $services;
	}

	/**
     * Returns an array of all available tags
     *
     * return array
    */
	public static function list_tags() {
		$dir     = scandir( APP_ROOT . TAGS_PATH );
		$files   = array();
		$tags    = array();

		foreach ( $dir as $key => $value ) {

			if( $value != '.' && $value != CD && strpos( $value, '.' ) != 0 ) {
				array_push( $files, $value );
			}

		}

		if( count( $files ) > 0 ) {

			foreach ( $files as $key => $value ) {

				if( $value != '.' && $value != CD ) {
					$tags[] = ucfirst( str_replace( EXT_PHP, '', $value ) ) . 'Tag';
				}

			}

		}

		return $tags;
	}

	/**
     * Populates an array containing all files specific to the given param path
     * 
     * return array
	 * 
     * @param string dir
    */
	public static function get_files( $dir ) {
	    if( $dh = opendir( $dir ) ) {

	        $files = array();
	        $inner = array();

	        while( $file = readdir( $dh ) ) {

	            if( $file != '.' && $file != CD && $file[ 0 ] != '.' ) {
	                
	                if( is_dir( $dir . '/' . $file ) ) {
	                    $inner = System::get_files( $dir . '/' . $file );
	                    if( is_array( $inner ) ) $files = array_merge( $files, $inner ); 
	                } else {
	                    array_push( $files, $dir . '/' . $file );
	                }

	            }

	        }

	        closedir( $dh );

	        return $files;
	    }
	}

	/**
     * Returns the total lines in all files that reside in the given param path
     * 
     * return string
     * 
     * @param string dir
    */
	public static function count_lines( $dir ) {
		$count = array();

		foreach( System::get_files( $dir ) as $key=>$file ){
			$count[] = count( file( $file ) );
		}

		return array_sum( $count );
	}

	/**
     * Returns the total lines in all files that reside in the /web/ directory
     *
     * return string
    */
	public static function web_line_count() {
		return System::count_lines( DIR );
	}

	/**
     * Returns the total lines in all files that reside in the /app/ directory
     *
     * return string
    */
	public static function app_line_count() {
		return System::count_lines( APP_ROOT );
	}

	/**
     * Returns the total lines in all files that reside in the /leash/ directory
     *
     * return string
    */
	public static function system_line_count() {
		return System::count_lines( SYSTEM_PATH );
	}

	/**
     * Returns the total lines in all files that reside in the / directory
     *
     * return string
    */
	public static function total_line_count() {
		if( ( $pos = strrpos( DIR , WEB ) ) !== false ) {
			return System::count_lines( substr_replace( DIR , '' , $pos , strlen( WEB ) ) );
		}
	}

}
