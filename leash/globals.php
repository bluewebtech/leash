<?php

class Globals {

	/**
     * Returns the current environment status
     *
     * return string
    */
	public static function environment() {
		return Environment::type();
	}

	/**
     * Returns the values in the get scope if it has been set
     *
     * return array
    */
	public static function get() {
		if( !empty( $_GET ) ) {
			return $_GET;
		} else {
			return false;
		}
	}

	/**
     * Returns the values in the post scope if it has been set
     *
     * return array
    */
	public static function post() {
		if( !empty( $_POST ) ) {
			return $_POST;
		} else {
			return false;
		}
	}

	/**
     * Returns the values in the request scope if it has been set
     *
     * return array
    */
	public static function request() {
		if( !empty( $_REQUEST ) ) {
			return $_REQUEST;
		} else {
			return false;
		}
	}

	/**
     * Returns the values in the server scope if it has been set
     *
     * return array
    */
	public static function server() {
		if( !empty( $_SERVER ) ) {
			return $_SERVER;
		} else {
			return false;
		}
	}

	/**
     * Returns the values in the session scope if it has been set
     *
     * return array
    */
	public static function session() {
		if( !empty( $_SESSION ) ) {
			return $_SESSION;
		} else {
			return false;
		}
	}

	/**
     * Returns the name of the current controller
     *
     * return string
    */
	public static function controller() {
		return Controller::controller_filename();
	}

	/**
     * Returns the name of the current action method
     *
     * return string
    */
	public static function action() {
		return Controller::action_filename();
	}

	/**
     * Returns the available url params
     *
     * return string or array
    */
	public static function params() {
		return Controller::params();
	}
	
	/**
     * Returns an array of application items: controller name, action method name, and url params
     *
     * return array
    */
	public static function system() {
		$system = array(
			'controller' => Globals::controller(), 
			'action'     => Globals::action(), 
			'params'     => Globals::params()
		);

		return $system;
	}

	/**
     * Defines all application values within the global scope
     *
     * return void
    */
	public static function all() {
		$globals = array(
			'action'      => Globals::action(), 
			'controller'  => Globals::controller(), 
			'environment' => Globals::environment(), 
			'get'         => Globals::get(), 
			'params'      => Globals::params(), 
			'post'        => Globals::post(), 
			'request'     => Globals::request(), 
			'server'      => Globals::server(), 
			'session'     => Globals::session(), 
			'system'      => Globals::system()
		);

		if ( !empty( $globals ) ) {
			foreach( $globals as $key => $value ) {
				$GLOBALS[ $key ] = $value;
			}
	    }
	}

}
