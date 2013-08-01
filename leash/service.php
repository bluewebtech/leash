<?php

class Service {

	private static $outfix = 'service';

	public static function class_name( $file ) {
		return 'class ' . str_replace( EXT_PHP, Service::$outfix , $file ) . ' {';
	}

	public static function model_val( $file ) {
		$path = SERVICES_PATH . $file;

		if( file_exists( $path ) ) {
			$contents = file( $path );
			$lines    = array();

			foreach( $contents as $key => $value ) {
				array_push( $lines, trim( strtolower( $value ) ) );
			}

			$class_name = Service::class_name( $file );
			$pos        = array_search( $class_name, $lines );

			if( $pos ) {
				return true;
			} else {
				return false;
			}
		}
	}

	public static function get() {
		$dir   = scandir( SERVICES_PATH );
		$files = array();

		foreach ( $dir as $key => $value ) {
			if( $value != '.' && $value != CD ) {
				array_push( $files, $value );
			}
		}

		foreach ( $files as $key => $value ) {
			if( $value != '.' && $value != CD && strpos( $value, '.' ) != 0 ) {

				try {

					if( Service::model_val( $value ) ) {
						require SERVICES_PATH . $value;
					} else {
						throw new Exception( 'The service class name for ' . SERVICES_PATH . $value . ' does not match the service file name.' );
					}

				} catch( Exception $e ) {
					Error::message( $e, 500 );
				}

			}
		}
	}

}
