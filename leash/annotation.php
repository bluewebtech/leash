<?php

/*
	Example of use: 
	//@Url('there-are-no-vegetarian-zombies')

	class StuffController {
		
		function index() {
			out( h1('Stuff Controller') );
		}

		//@Url('look-a-monkey')
		function monkey() {
			out( h1('Monkey Method') );
		}
		
	}
*/

class Annotations {

	public $file;
	public $view;

	/**
     * Checks whether a function within the given file exists
     *
     * return boolean
     * 
     * @param string file
     * @param string view
    */
	public function function_is_defined( $file, $view ) {
		if( file_exists( $file ) ) {
			$contents = file( $file );
			$lines    = array();

			foreach( $contents as $lineNumber => $lineValue ) {
				array_push( $lines, trim( $lineValue ) );
			}

			$searchArray = array_search( "//@Url('" . $view . "')", $lines );

			if( $searchArray ) {

				$getLine   = $searchArray + 1;
				$funcArray = explode( ' ', $lines[ $getLine ] );

				foreach( $funcArray as $funcNumber => $funcValue ) {
					if( ( strpos( $funcValue, '()' ) !== false ) ) {
						$funcName = str_replace( '()', '', $funcValue );
					}
				}

				return true;

			} else {
				return false;
			}
			
		}
	}

	/**
     * Returns the given function for the specified annotation
     *
     * return string
     * 
     * @param string file
     * @param string view
    */
	public function get_function_name( $file, $view ) {
		if( file_exists( $file ) ) {
			$contents = file( $file );
			$lines    = array();

			foreach( $contents as $lineNumber => $lineValue ) {
				array_push( $lines, trim( $lineValue ) );
			}

			$searchArray = array_search( "//@Url('" . $view . "')", $lines );

			if( $searchArray ) {

				$getLine   = $searchArray + 1;
				$funcArray = explode( ' ', $lines[ $getLine ] );

				foreach( $funcArray as $funcNumber => $funcValue ) {
					if( ( strpos( $funcValue, '()' ) !== false ) ) {
						$funcName = str_replace( '()', '', $funcValue );
					}
				}

				return $funcName;

			} else {
				return false;
			}
			
		}
	}

}
