<?php 

class Response {

	/**
     * Outputs the provided parameter to the screen
     *
     * return string
     * 
     * @param string value
    */
	public static function out( $value = null ) {
		echo $value;
	}

	/**
     * Outputs the provided parameter to the screen
     *
     * return string
     * 
     * @param string value
    */
	public static function output( $value = null ) {
		echo $value;
	}

	/**
     * Outputs the provided parameter to the screen on a new line
     *
     * return string
     * 
     * @param string value
    */
	public static function println( $value = null ) {
		echo $value . "\n";
	}

	/**
     * Outputs the provided parameter to the screen
     *
     * return string
     * 
     * @param string value
    */
	public static function write( $value = null ) {
		echo $value;
	}

	/**
     * Outputs the provided parameter to the screen on a new line
     *
     * return string
     * 
     * @param string value
    */
	public static function writeln( $value = null ) {
		echo $value . "\n";
	}

	/**
     * Outputs the provided parameter to the screen
     *
     * return string
     * 
     * @param string value
    */
	public static function writeoutput( $value = null ) {
		echo $value;
	}

}
