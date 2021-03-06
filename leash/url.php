<?php

class Url {

	/**
	 * Return the current url path
	 *
	 * return string
	*/
	public static function uri() {
		return $_SERVER[ 'REQUEST_URI' ];
	}

	/**
	 * Return the url path as an array
	 *
	 * return array
	*/
	public static function url_array() {
		if( Routes::route() ) {
			return explode( '/', '/' . Routes::route() . '/' );
		} else {
			return explode( '/', Url::uri() );
		}
	}

	/**
	 * Clean out empty url array elements and return the updated array
	 *
	 * return array
	*/
	public static function url_filter() {
		return array_filter( Url::url_array() );
	}

	/** 
	 * Check if a first position controller url value isset and whether to use the 
	 * default controller specified in conf/config.php
	 *
	 * return boolean
	*/
	public static function url_controller_isset( $url = null ) {
		if( array_key_exists( 1, isset( $url ) ? $url : Url::url_filter() ) ) {
			return true;
		} else {
			return false;
		}
	}

	/** 
	 * Check if a second position controller, action url value isset
	 * 
	 * return boolean
	*/
	public static function url_action_isset( $url = null ) {
		if( array_key_exists( 2, isset( $url ) ? $url : Url::url_filter() ) ) {
			return true;
		} else {
			return false;
		}
	}

	/** 
	 * Check if a third position url param value exists
	 * 
	 * return boolean
	*/
	public static function url_params_isset( $url = null ) {
		if( array_key_exists( 3, isset( $url ) ? $url : Url::url_filter() ) ) {
			return true;
		} else {
			return false;
		}
	}

}
