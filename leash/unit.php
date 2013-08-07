<?php

class Unit {

	private static $dir = 'tests';

	private static $temp = 'unit-test.json';

	private static $url = 'unit-tests';

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

	private static function test_url( $test, $class ) {
		$output = '<a href="?test=' . str_replace( SYSTEM_EXT, '', $test ) . '">' . $class . "</a>";
		return $output;
	}

	private static function list_tests() {
		$dir    = scandir( Unit::test_dir() );
		$files  = array();
		$output = '';

		foreach ( $dir as $key => $value ) {
			if( $value != '.' && $value != CD ) {
				array_push( $files, $value );
			}
		}

		$output .= "\t" . '<div id="navigation">' . "\n";
		$output .= "\t\t" . '<ul>' . "\n";
		
		foreach ( $files as $key => $value ) {
			$class = Unit::get_test_class_name( Unit::test_dir() . $value );

			if( $value != '.' && $value != CD && strpos( $value, '.' ) != 0 ) {
				$output .= "\t\t\t<li>\n";
				$output .= "\t\t\t\t" . Unit::test_url( $value, $class ) . "\n";
				$output .= "\t\t\t</li>\n";
			}
		}

		$output .= "\t\t</ul>\n";
		$output .= "\t</div>\n";

		return $output;
	}

	public static function unit_test() {
		try {

			if( Unit::shell_exec_exists() ) {

				$output = '';
				$output .= <<<HEAD
<!DOCTYPE html>
	<html>
	<head>
		<title>PHP Unit Testing</title>
		<style type="text/css">
		#container { margin:0 auto;width:900px;padding:10px; }
		#navigation { margin-right:2px;padding:0;width:200px;color:#ffffff;font-family:Arial;font-size:16px;float:left; }
		#navigation ul { list-style:none; margin:0; padding:0; }
		#navigation a { display: block;margin: 0;padding: 10px;text-decoration: none;font-family: Arial;font-size: 16px;font-weight: normal;color: #ffffff;background:#333333;text-decoration: none;border-bottom: 1px solid #ffffff; 
			-webkit-transition: background 1s ease-out; /* Saf3.2+, Chrome */
			-moz-transition: background 1s ease-out; /* Firefox 4+ */
			-ms-transition: background 1s ease-out; /* IE10+ */
			-o-transition: background 1s ease-out; /* Opera 10.5+ */
			transition: background 1s ease-out;
			-webkit-border-radius: 0 10px 0 0;
			-moz-border-radius: 0 10px 0 0;
			border-radius: 0 0 10px 0; }
		#navigation a:hover { font-family: Arial;font-size: 16px;font-weight: normal;color: #ffffff;background:#1356C2; padding: 10px;text-decoration: none;border-bottom: 1px solid #ffffff; }
		#right { margin-right:2px;padding:0;width:675px;background:#ffffff;color:#ffffff;font-family:Arial;font-size:16px;float:left; }
		#title { margin-bottom:2px;padding:10px;background:#333333;color:#ffffff;font-family:Arial;font-size:16px; }
		#pass { margin-bottom:2px;padding:10px;background:#197D00;color:#ffffff;font-family:Arial;font-size:16px; 
			transition: background 1s ease-out; 
			-webkit-transition: background 1s ease-out; /* Saf3.2+, Chrome */
			-moz-transition: background 1s, color 1s ease-out; /* Firefox 4+ */
			-ms-transition: background 1s ease-out; /* IE10+ */
			-o-transition: background 1s ease-out; /* Opera 10.5+ */
			transition: background 1s ease-out;
			transition: background 1s ease-out;
			-webkit-border-radius: 0 10px 0 0;
			-moz-border-radius: 0 10px 0 0;
			border-radius: 0 0 10px 0; }
		#pass:hover { margin-bottom:2px;padding:10px;background:#209E00;color:#ffffff;font-family:Arial;font-size:16px; cursor:pointer; }
		#fail { margin-bottom:2px;padding:10px;background:#B50000;color:#ffffff;font-family:Arial;font-size:16px; cursor:pointer; 
			transition: background 1s ease-out;
			-webkit-transition: background 1s ease-out; /* Saf3.2+, Chrome */
			-moz-transition: background 1s ease-out; /* Firefox 4+ */
			-ms-transition: background 1s ease-out; /* IE10+ */
			-o-transition: background 1s ease-out; /* Opera 10.5+ */
			transition: background 1s ease-out;
			-webkit-border-radius: 0 10px 0 0;
			-moz-border-radius: 0 10px 0 0;
			border-radius: 0 0 10px 0; }
		#fail:hover { margin-bottom:2px;padding:10px;background:#E00000;color:#ffffff;font-family:Arial;font-size:16px; }
		#clear { clear:both; }
		</style>
	</head>
	<body>\n
HEAD;
				$output .= '<div id="container">' . "\n";
				$output .= Unit::list_tests();

				if( isset( $_GET[ 'test' ] ) ) {

					$cmd = explode( "\n", shell_exec( Unit::phpunit_cmd() . ' ' . Unit::phpunit_test( $_GET[ 'test' ] ) ) );
					
					/*
					echo "<pre>\n";
						print_r( $cmd );
					echo "</pre>\n";
					*/

					$results = explode( '}', file_get_contents( Unit::temp_file() ) );
					$data = array();

					foreach( $results as $key => $value ) {
						$data[] = $value . '}';
					}

					unset( $data[ count( $data ) - 1 ] );

					/*
					echo "<pre>\n";
						print_r( $data );
					echo "</pre>\n";
					*/

					$array = array();

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

					//Dbug::dump( array_filter( $array ) );

					$output .= '<div id="right">' . "\n";

					foreach( $array as $key => $value ) {
						if( isset( $value->tests ) ) {
							$output .= '<div id="title">' . "\n";
								$output .= 'A total of ' . $value->tests . ' tests were completed for testing class ' . $value->suite . '.';
							$output .= "</div>\n";
						} else {

							if( isset( $value->status ) ) {
								$output .= '<div id="pass">' . "\n";
							} else {
								$output .= '<div id="fail">' . "\n";
							}
								$output .= $value->test;
							$output .= "</div>\n";
						}
					}

					$output .= "\t</div>\n";
					$output .= "\t" . '<div id="clear"></div>' . "\n";
					
					Unit::delete_temp_file();
				}

				$output .= "</div>\n";
				$output .= "\t\t</body>\n";
				$output .= "\t</html>\n";

				echo $output;

			} else {
				throw new Exception( 'The PHP (shell_exec) function is not enabled or does not exist. A possible solution to this problem is to remove the (shell_exec) function from the (disable_functions) list in php.ini.' );
			}

		} catch( Exception $e ) {
			Error::message( $e );
		}
	}

}
