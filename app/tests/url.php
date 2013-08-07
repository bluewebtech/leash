<?php

class UrlTest extends PHPUnit_Framework_TestCase {

	public static function uri() {
		return '/controller/action/id';
	}

	public static function url_array() {
		return explode( '/', UrlTest::uri() );
	}

	public static function url_filter() {
		return array_filter( UrlTest::url_array() );
	}

	public static function url_controller_isset() {
		if( array_key_exists( 1, UrlTest::url_filter() ) ) {
			return true;
		} else {
			return false;
		}
	}

	public static function url_action_isset() {
		if( array_key_exists( 2, UrlTest::url_filter() ) ) {
			return true;
		} else {
			return false;
		}
	}

	public static function url_params_isset() {
		if( array_key_exists( 3, UrlTest::url_filter() ) ) {
			return true;
		} else {
			return false;
		}
	}

	public function testUri() {
		// -- This will fail on purpose
		$this->assertFalse( is_string( UrlTest::uri() ) );
	}

	public function testUriArray() {
		$this->assertTrue( is_array( UrlTest::url_array() ) );
	}

	public function testUriArrayFilter() {
		$this->assertTrue( is_array( UrlTest::url_filter() ) );
	}

	public function testUrlControllerIsset() {
		$this->assertTrue( UrlTest::url_controller_isset() );
	}

	public function testUrlActionIsset() {
		$this->assertTrue( UrlTest::url_action_isset() );
	}

	public function testUrlParamsIsset() {
		$this->assertTrue( UrlTest::url_params_isset() );
	}

}
