<?php

// -- STILL IN DEVELOPMENT AND NOT IN USE

class Routes {

	public static function types() {
		return array( '(:all)', '(:string)', '(:int)' );
	}

	public static function url( $url ) {
		$array = array();

		foreach( $url as $key => $value ) {
			$array[] = $value;
		}

		return $array;
	}

	public static function route( $routes ) {
		$url            = Routes::url( Url::url_filter() );
		$url_total      = count( $url );
		$url_type_array = array();

		foreach( $url as $url_type_key => $url_type_value ) {

			if( is_numeric( $url_type_value ) ) {
				$url_type_array[] = '(:int)';
			} else {
				$url_type_array[] = '(:string)';
			}

		}

		// -- Debugging output for Url
		echo "<h3>Url</h3>\n";
		echo "<pre>\n";
			print_r( $url );
		echo "</pre>\n";

		// -- Debugging output for Routes
		echo "<h3>Routes</h3>\n";
		echo "<pre>\n";
			print_r( $routes );
		echo "</pre>\n";

		echo "<h3>Url Type Check. If Routes Containing (:all) Exist. Type Checking Is Ignored</h3>\n";
		echo "<pre>\n";
			print_r( $url_type_array );
		echo "</pre>\n";

		// -- Debugging text
		echo "<h3>All Routes Containing (:all) That Match The Array Element Total</h3>\n";
		// -- Loop through all available routes defined within /app/conf/routes.php
		foreach( $routes as $routes_key => $routes_value ) {
			
			// -- Convert current route to an array
			$route_array = explode( '/', $routes_key );

			// -- Get the total elements in the new array
			$route_array_total = count( $route_array );
			
			// -- Load all routes containing (:all) that have the same amount of elements 
			// -- within the array as the url array
			if( in_array( '(:all)', $route_array) && $route_array_total == $url_total ) {

				// -- Debugging output all route arrays that contain (:all) and match the 
				// -- url array count as well
				/*
				echo "<pre>\n";
					print_r( $route_array );
				echo "</pre>\n";
				*/

				$route_compare_array = array();

				for( $a = 0; $a <= $route_array_total - 1; $a++ ) {

					if( $route_array[ $a ] == $url[ $a ] || in_array( $route_array[ $a ], Routes::types() ) ) {
						//echo $route_array[ $a ] . "<br />\n";
						$route_compare_array[] = $route_array[ $a ];
					}

				}

				$route_compare_array_total = count( $route_compare_array );

				if( $route_compare_array_total == $url_total  ) {
					/*
					echo "<pre>\n";
						print_r( $route_compare_array_total );
					echo "</pre>\n";
					*/

					for( $c = 0; $c <= $route_compare_array_total - 1; $c++ ) { 
						//echo $route_array[ $c ] . "<br />\n";
					}

					$route_array_string = implode( '/', $route_array );
					//echo $route_array_convert;

					$routes_total = count( $routes );

					foreach( $routes as $routes_config_key => $routes_config_value ) {

						if( $route_array_string == $routes_config_key ) {

							$route_array_convert = explode( '/', $route_array_string );
							$routes_config_convert = explode( '/', $routes_config_value );
							$route_array_url = $url;

							echo "<pre>\n";
								print_r( $routes_config_convert );
							echo "</pre>\n";

							echo "<pre>\n";
								print_r( $route_array_convert );
							echo "</pre>\n";

							echo "<pre>\n";
								print_r( $route_array_url );
							echo "</pre>\n";

							$url_actual_array = array();

							for( $d = 0; $d <= count( $routes_config_convert ) - 1; $d++ ) { 

								if( strpos( $routes_config_convert[ $d ], '$' ) !== false ) {
									$url_actual_array[] = $route_array_url[ $d ];
								} else {
									$url_actual_array[] = $routes_config_convert[ $d ];
								}
							}

							echo "<pre>\n";
								print_r( $url_actual_array );
							echo "</pre>\n";

							$url_actual_convert = implode( '/', $url_actual_array );

							echo $url_actual_convert . "<br />\n";
						}
						
					}
				
				}

			} else {
				// -- 
			}

		}

	}

}

























/*
// -- STILL IN DEVELOPMENT AND NOT IN USE

namespace Leash;

use Leash\Controller;
use Leash\Url;

class Routes {

	public static function types() {
		return array( '(:all)', '(:string)', '(:int)' );
	}

	public static function url( $url ) {
		$array = array();

		foreach( $url as $key => $value ) {
			$array[] = $value;
		}

		return $array;
	}

	public static function routes( $routes ) {
		$url            = Routes::url( Url::url_filter() );
		$url_total      = count( $url );
		$url_type_array = array();

		foreach( $url as $url_type_key => $url_type_value ) {

			if( is_numeric( $url_type_value ) ) {
				$url_type_array[] = '(:int)';
			} else {
				$url_type_array[] = '(:string)';
			}

		}

		// -- Debugging output for Url
		echo "<h3>Url</h3>\n";
		echo "<pre>\n";
			print_r( $url );
		echo "</pre>\n";

		// -- Debugging output for Routes
		echo "<h3>Routes</h3>\n";
		echo "<pre>\n";
			print_r( $routes );
		echo "</pre>\n";

		echo "<h3>Url Type Check. If Routes Containing (:all) Exist. Type Checking Is Ignored</h3>\n";
		echo "<pre>\n";
			print_r( $url_type_array );
		echo "</pre>\n";

		// -- Debugging text
		echo "<h3>All Routes Containing (:all) That Match The Array Element Total</h3>\n";
		// -- Loop through all available routes defined within /app/conf/routes.php
		foreach( $routes as $routes_key => $routes_value ) {
			
			// -- Convert current route to an array
			$route_array = explode( '/', $routes_key );

			// -- Get the total elements in the new array
			$route_array_total = count( $route_array );
			
			// -- Load all routes containing (:all) that have the same amount of elements 
			// -- within the array as the url array
			if( in_array( '(:all)', $route_array) && $route_array_total == $url_total ) {

				// -- Debugging output all route arrays that contain (:all) and match the 
				// -- url array count as well
				echo "<pre>\n";
					print_r( $route_array );
				echo "</pre>\n";

				$route_compare_array = array();

				for( $a = 0; $a <= $route_array_total - 1; $a++ ) {

					if( $route_array[ $a ] == $url[ $a ] || in_array( $route_array[ $a ], Routes::types() ) ) {
						//echo $route_array[ $a ] . "<br />\n";
						$route_compare_array[] = $route_array[ $a ];
					}

				}

				$route_compare_array_total = count( $route_compare_array );

				if( $route_compare_array_total == $url_total  ) {
					echo "<pre>\n";
						print_r( $route_compare_array_total );
					echo "</pre>\n";

					for( $c = 0; $c <= $route_compare_array_total - 1; $c++ ) { 
						//echo $route_array[ $c ] . "<br />\n";
					}

					$route_array_string = implode( '/', $route_array );
					//echo $route_array_convert;

					$routes_total = count( $routes );

					foreach( $routes as $routes_config_key => $routes_config_value ) {

						if( $route_array_string == $routes_config_key ) {

							$route_array_convert = explode( '/', $route_array_string );
							$routes_config_convert = explode( '/', $routes_config_value );
							$route_array_url = $url;

							echo "<pre>\n";
								print_r( $routes_config_convert );
							echo "</pre>\n";

							echo "<pre>\n";
								print_r( $route_array_convert );
							echo "</pre>\n";

							echo "<pre>\n";
								print_r( $route_array_url );
							echo "</pre>\n";

							$url_actual_array = array();

							for( $d = 0; $d <= count( $routes_config_convert ) - 1; $d++ ) { 

								if( strpos( $routes_config_convert[ $d ], '$' ) !== false ) {
									$url_actual_array[] = $route_array_url[ $d ];
								} else {
									$url_actual_array[] = $routes_config_convert[ $d ];
								}
							}

							echo "<pre>\n";
								print_r( $url_actual_array );
							echo "</pre>\n";

							$url_actual_convert = implode( '/', $url_actual_array );

							echo $url_actual_convert . "<br />\n";
						}
						
					}
				
				}

			} else {
				// -- 
			}

		}

	}

}
*/
