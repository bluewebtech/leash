<?php

class XML {

	/**
     * Takes an XML file and converts the contents from a simplexml object to an array
     * 
     * return array
     * 
     * @param string xml
    */
	public static function file( $xml ) {
		try {

			if( is_file( $xml ) ) {
				return json_decode( json_encode( simplexml_load_file( $xml ) ), 1 );
			} else {
				throw new Exception( 'The specified XML is not a file.' );
			}

		} catch( Exception $e ) {
			Error::message( $e );
		}
	}

	/**
     * Takes an XML file or string and converts the contents from a simplexml object to an array
     * 
     * return array
     * 
     * @param string xml
    */
	public static function get( $xml ) {
		try {

			if( is_file( $xml ) ) {
				return json_decode( json_encode( simplexml_load_file( $xml ) ), 1 );
			} elseif( !is_file( $xml ) ) {
				return json_decode( json_encode( simplexml_load_string( $xml ) ), 1 );
			} else {
				throw new Exception( 'The specified XML document is not a file or string' );
			}

		} catch( Exception $e ) {
			Error::message( $e );
		}
	}

	/**
     * Takes an XML string and converts the contents from a simplexml object to an array
     * 
     * return array
     * 
     * @param string xml
    */
	public static function string( $xml ) {
		try {

			if( !is_file( $xml ) ) {
				return json_decode( json_encode( simplexml_load_string( $xml ) ), 1 );
			} else {
				throw new Exception( 'The specified XML is not a string.' );
			}

		} catch( Exception $e ) {
			Error::message( $e );
		}
	}

}
