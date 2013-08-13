<?php

class Unit {

	private static $dir = 'tests';

	private static $temp = 'unit-test.json';

	private static $url = 'unit-test';

	private static function delete_temp_file() {
		return unlink( Unit::temp_file() );
	}

	private static function get_test_class_name( $file ) {
		$tokens      = token_get_all( file_get_contents( $file ) );
		$class_token = false;

		foreach( $tokens as $token ) {
			if( !is_array( $token ) ) continue;

			if( $token[ 0 ] == T_CLASS ) {
				$class_token = true;
			} elseif( $class_token && $token[ 0 ] == T_STRING ) {
				return $token[ 1 ];
				$class_token = false;
			}
		}
	}

	private static function test_dir() {
		return APP_ROOT . Unit::$dir . DS;
	}

	private static function temp_dir() {
		return TEMP_PATH;
	}

	private static function temp_file() {
		return Unit::temp_dir() . Unit::$temp;
	}

	private static function temp_file_exists() {
		return file_exists( Unit::temp_dir() . Unit::$temp );
	}

	private static function phpunit_path() {
		return PHPUNIT;
	}

	private static function phpunit_exists() {
		return file_exists( PHPUNIT );
	}

	private static function phpunit_cmd() {
		return PHPUNIT . ' --log-json ' . Unit::temp_file();
	}

	private static function phpunit_test( $test ) {
		return Unit::test_dir() . $test . SYSTEM_EXT;
	}

	public static function is_unit_test() {
		$controller  = Url::url_filter();
		$environment = Environment::is_development( Environment::type() );

		// -- Check if a controller url position exists and check the current environment
		if( isset( $controller[ 1 ] ) && $environment ) {

			// -- Check if the controller url is the default unit test value and make sure 
			// -- that PHPUnit even exists before doing anything else.
			if( $controller[ 1 ] == Unit::$url &&  Unit::phpunit_exists() ) {
				return true;
			} else {
				return false;
			}

		} else {
			return false;
		}
	}

	private static function shell_exec_exists() {
		return function_exists( 'shell_exec' );
	}

	private static function test_url( $test ) {
		return str_replace( SYSTEM_EXT, '', $test );
	}

	private static function list_tests() {
		$dir   = scandir( Unit::test_dir() );
		$files = array();
		$tests = array();

		foreach ( $dir as $key => $value ) {
			if( $value != '.' && $value != CD ) {
				array_push( $files, $value );
			}
		}
		
		foreach ( $files as $key => $value ) {
			if( $value != '.' && $value != CD && strpos( $value, '.' ) != 0 ) {

				$url = Unit::test_url( $value );
				$class = Unit::get_test_class_name( Unit::test_dir() . $value );

				$tests[ $key ][ 'url' ] = Unit::test_url( $url );
				$tests[ $key ][ 'class' ] = $class;
			}
		}

		return $tests;
	}

	public static function unit_test() {
		$output = '';
		$array = array();

		if( isset( $_GET[ 'test' ] ) ) {

			$cmd = explode( "\n", shell_exec( Unit::phpunit_cmd() . ' ' . Unit::phpunit_test( $_GET[ 'test' ] ) ) );
			
			if( Unit::temp_file_exists() ) {

				$results = explode( '}', file_get_contents( Unit::temp_file() ) );
				$data = array();

				foreach( $results as $key => $value ) {
					$data[] = $value . '}';
				}

				unset( $data[ count( $data ) - 1 ] );

				foreach( $data as $key => $value ) {
					$json = json_decode( $value );
					
					if( isset( $json->test ) ) {
						$array[ $json->test ] = $json;
					} else {
						
						if( isset( $json->suite ) ) {
							$array[ $json->suite ] = $json;
						}

					}
				}

			}
			
		}

		require SYSTEM_PATH . 'unit-test' . DS . 'unit-test' . SYSTEM_EXT;
	}

}
