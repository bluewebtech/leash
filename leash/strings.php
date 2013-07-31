<?php

class Strings {

	/**
     * Removes all characters from the provided string telephone param
     * The remove_chars() function can also be used to accomplish the same result.
     * 
     * return string
     * 
     * @param string value
    */
	public static function clean_telephone( $value ) {
		$value = preg_replace( '/[^\d]/', '', $value );

		// -- Check if the string is less then 10 characters
		if( strlen( $value ) < 10 ) {
			return substr( $value, 0, 3 ) . substr( $value, 3, 4 );
		} else {
			return substr( $value, 0, 3 ) . substr( $value, 3, 3 ) . substr( $value, 6 );
		}
	}

	/**
     * Formats the provided string telephone param based on character count
     * 
     * return string
     * 
     * @param string value
    */
	public static function format_telephone( $value ) {
		$value = preg_replace( '/[^0-9]/', '', $value );

		if( strlen( $value ) == 7 ) {
			return preg_replace( '/([0-9]{3})([0-9]{4})/', '$1-$2', $value );
		} elseif( strlen( $value ) == 10 ) {
			return preg_replace( '/([0-9]{3})([0-9]{3})([0-9]{4})/', '($1) $2-$3', $value );
		} else {
			return $value;
		}
	}

	/**
     * Formats the provided float param to dollars
     * 
     * return string
     * 
     * @param float value
    */
	public static function format_dollars( $value ) {
		return "\$" . number_format( $value, 2, '.', ',' );
	}

	/**
     * Formats the provided float param to dollars
     * 
     * return string
     * 
     * @param float value
    */
	public static function format_money( $value ) {
		return Strings::format_dollars( $value );
	}

	/**
     * Formats the provided float param to a comma delimited number string
     * 
     * return string
     * 
     * @param string value
    */
	public static function format_number( $value ) {
		return number_format( $value );
	}

	/**
     * Formats the entire provided string param to lowercase
     * 
     * return string
     * 
     * @param string value
    */
	public static function lowercase( $value ) {
		return strtolower( $value );
	}

	/**
     * Formats the first letter of the provided string param to lowercase
     * 
     * return string
     * 
     * @param string value
    */
	public static function lowercase_first( $value ) {
		return lcfirst( $value );
	}

	/**
     * Formats the first letter of all words in the provided string param to lowercase
     * 
     * return string
     * 
     * @param string value
    */
	public static function lowercase_words( $value ) {
		return preg_replace( '#\b([a-z])#ie', 'strtolower($1)', $value );
	}

	/**
     * Removes all special characters from the provided string param
     * 
     * return string
     * 
     * @param string value
    */
	public static function remove_chars( $value ) {
		return preg_replace( '/[^A-Za-z0-9\-]/', '', str_replace( '-', ' ', $value ) );
	}

	/**
     * Removes all whitespace from the provided string param
     * 
     * return string
     * 
     * @param string value
    */
	public static function remove_whitespace( $value ) {
		return preg_replace( '/\s+/', '', $value );
	}

	/**
     * Searches for the specified $needle starting at the beginning of the provided $haystack 
     * and stops the search once it finds the last $occurrence.
     * 
     * return string
     * 
     * @param string needle
     * @param string haystack
     * @param string occurrence
    */
	public static function search_start( $needle, $haystack, $occurrence ) {
		$arr = explode( $needle, $haystack );

		switch( $occurrence ) {
			case $occurrence == 0:
				return false;

			case $occurrence > max( array_keys( $arr ) ):
				return false;

			default:
				return strlen( implode( $needle, array_slice( $arr, 0, $occurrence ) ) );
		}
	}

	/**
     * Searches for the specified $needle starting at the end of the provided $haystack and 
     * stops the search once it finds the last $occurrence.
     * 
     * @param string needle
     * @param string haystack
     * @param string occurrence
     * 
     * @param string value
    */
	public static function search_end( $needle, $haystack, $occurrence ) {
		$arr = array_reverse( explode( $needle, $haystack ) );

		switch( $occurrence ) {
			case $occurrence == 0:
				return false;

			case $occurrence > max( array_keys( $arr ) ):
				return false;

			default:
				$inverted = strlen( implode( $needle, array_slice( $arr, 0, $occurrence ) ) );
				$actual   = ( strlen( $haystack ) - 1 ) - $inverted;
				return $actual;
		}
	}

	/**
     * Converts the provided param to an array
     * 
     * return array
     * 
     * @param string value
    */
	public static function to_array( $value ) {
		return ( array ) $value;
	}

	/**
     * Converts the provided param to a boolean
     * 
     * return string
     * 
     * @param string value
    */
	public static function to_boolean( $value ) {
		return ( bool ) $value;
	}

	/**
     * Converts the provided param to a float
     * 
     * return string
     * 
     * @param string value
    */
	public static function to_float( $value ) {
		return ( float ) $value;
	}

	/**
     * Converts the provided param to an integer
     * 
     * return string
     * 
     * @param string value
    */
	public static function to_integer( $value ) {
		return ( int ) $value;
	}

	/**
     * Converts the provided param to null
     * 
     * return string
     * 
     * @param string value
    */
	public static function to_null( $value ) {
		return null;
	}

	/**
     * Converts the provided param to an object
     * 
     * return string
     * 
     * @param string value
    */
	public static function to_object( $value ) {
		return ( object ) $value;
	}

	/**
     * Converts the provided param to a string
     * 
     * return string
     * 
     * @param string value
    */
	public static function to_string( $value ) {
		return ( string ) $value;
	}

	/**
     * Formats the entire provided string param to uppercase
     * 
     * return string
     * 
     * @param string value
    */
	public static function uppercase( $value ) {
		return strtoupper( $value );
	}

	/**
     * Formats the first letter of the provided string param to uppercase
     * 
     * return string
     * 
     * @param string value
    */
	public static function uppercase_first( $value ) {
		return ucfirst( $value );
	}

	/**
     * Formats the first letter of all words in the provided string param to uppercase
     * 
     * return string
     * 
     * @param string value
    */
	public static function uppercase_words( $value ) {
		return ucwords( $value );
	}

}
