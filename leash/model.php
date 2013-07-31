<?php

class Model {

	private static $outfix = 'model';

	public static function class_name( $file ) {
		return 'class ' . str_replace( EXT_PHP, Model::$outfix , $file ) . ' {';
	}

	public static function class_extends( $file ) {
		return 'class ' . str_replace( EXT_PHP, Model::$outfix , $file ) . ' extends orm {';
	}

	public static function class_val( $file ) {
		$path = MODELS_PATH . $file;

		if( file_exists( $path ) ) {
			$contents = file( $path );
			$lines    = array();

			foreach( $contents as $key => $value ) {
				array_push( $lines, trim( strtolower( $value ) ) );
			}

			$class_name    = Model::class_name( $file );
			$class_extends = Model::class_extends( $file );
			$name          = array_search( $class_name, $lines );
			$extends       = array_search( $class_extends, $lines );

			if( $name || $extends ) {
				return true;
			} else {
				return false;
			}
		}
	}

	public static function get() {
		$dir   = scandir( MODELS_PATH );
		$files = array();

		foreach ( $dir as $key => $value ) {
			if( $value != '.' && $value != CD ) {
				array_push( $files, $value );
			}
		}

		foreach ( $files as $key => $value ) {
			if( $value != '.' && $value != CD ) {

				try {

					if( Model::class_val( $value ) ) {
						require MODELS_PATH . $value;
					} else {
						throw new Exception( 'The model class name for ' . MODELS_PATH . $value . ' does not match the model file name.' );
					}

				} catch( Exception $e ) {
					Error::message( $e, 500 );
				}

			}
		}
	}

}
