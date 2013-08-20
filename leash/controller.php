<?php

class Controller {

	public static $outfix = 'Controller';

	/**
	 * Return the controller directory path
	 *
	 * return string
	*/
	public static function controller_directory() {
		return CONTROLLERS_PATH;
	}

	/**
	 * Return the default controller name
	 *
	 * return string
	*/
	public static function controller_default() {
		return DEFAULT_CONTROLLER;
	}

	/** 
	 * Pending if the first position controller url return the controller filename lower 
	 * cased or the default controller set in conf/config.php
	 *
	 * return string
	*/
	public static function controller_filename() {
		$url        = Url::url_array();
		$controller = Controller::controller_clean( $url[ 1 ] );

		// -- Check if controller url exists
		if( Url::url_controller_isset() ) {
			return strtolower( $controller );
		} else {
			return Controller::controller_default();
		}
	}

	/** 
	 * Pending if the first position controller url return the controller classname upper 
	 * cased or the default controller set in conf/config.php
	 *
	 * return string
	*/
	public static function controller_classname() {
		$url        = Url::url_array();
		$controller = ucwords( Controller::controller_clean( $url[ 1 ] ) );

		// -- Determine whether to use the default controller
		if( Url::url_controller_isset() ) {
			return str_replace( ' ', '', $controller ) . Controller::$outfix;
		} else {
			return ucwords( Controller::controller_default() ) . Controller::$outfix;
		}
	}

	/** 
	 * Checks whether the class for the current controller exists
	 *
	 * return boolean
	*/
	public static function class_isset() {
		$class = Controller::controller_classname();

		try {

			if( class_exists( $class ) ) {
				return true;
			} else {
				throw new Exception( 'Controller class name (' . $class . ') does not exist.' );
				return false;
			}

		} catch( Exception $e ) {
			Error::message( $e );
		}
	}

	/** 
	 * Clean all special characters from the first position controller url string
	 * 
	 * @param string controller
	 *
	 * return string
	*/
	public static function controller_clean( $controller ) {
		return preg_replace( '/[^a-z]/', '', $controller );
	}

	/** 
	 * Return the path to the current controller
	 *
	 * return string
	*/
	public static function controller_path() {
		return APP_ROOT . CONTROLLERS_PATH . Controller::controller_filename() . EXT_PHP;
	}

	/** 
	 * Check if the current controller even exists
	 *
	 * return boolean
	*/
	public static function controller_exists() {
		return file_exists( Controller::controller_path() );
	}

	/** 
	 * Return the current controller file not before checking if it even exists
	 *
	 * return string
	*/
	public static function controller_file_get() {
		$class = Controller::controller_classname();
		$path  = Controller::controller_path();

		try {

			// -- Check if the controller file exists
			if( Controller::controller_exists() ) {
				return require Controller::controller_path();
			} else {
				throw new Exception( 'The path (' . $path . ') to controller (' . $class . ') is invalid of does not exist.' );
				return false;
			}

		} catch( Exception $e ) {
			Error::message( $e );
		}
	}

	/**
	 * Return the view directory path
	 *
	 * return string
	*/
	public static function view_directory() {
		return VIEWS_PATH;
	}

	/**
	 * Return the view directory path
	 *
	 * return string
	*/
	public static function view_default() {
		return DEFAULT_VIEW;
	}

	/** 
	 * Return controller action name
	 * 
	 * return string
	*/
	public static function action_name() {
		$url = Url::url_array();

		// -- Determine whether to use the default view
		if( Url::url_action_isset() ) {
			return strtolower( $url[ 2 ] );
		} else {
			return DEFAULT_VIEW;
		}
	}

	/** 
	 * Check if controller action method even exists
	 * 
	 * @param string class
	 * @param string action
	 *
	 * return boolean
	*/
	public static function action_exists( $class, $action ) {
		$class = Controller::controller_classname();

		/*
		try {

			// -- Check if the requested action method exists in the specified controller class
			if( method_exists( $class, $action ) ) {
				return true;
			} else {
				throw new Exception( 'The action method of (' . $action . ') does not exist in the controller class (' . $class . ').' );
				return false;
			}

		} catch( Exception $e ) {
			Error::message( $e );
		}
		*/

		// -- Check if the requested action method exists in the specified controller class
		if( method_exists( $class, $action ) ) {
			return true;
		} else {
			return false;
		}
	}

	/** 
	 * Return the controller action name
	 *
	 * return string
	*/
	public static function action_filename() {
		return Controller::action_name();
	}

	/** 
	 * Return the path to the current controller action/view file
	 *
	 * return string
	*/
	public static function action_file_path( $action = null ) {
		if( !isset( $action ) ) {
			return VIEWS_PATH . Controller::controller_filename() . DS . Controller::action_filename() . EXT_PHP;
		} else {
			return VIEWS_PATH . Controller::controller_filename() . DS . $action . EXT_PHP;
		}
	}

	/** 
	 * Check if the current controller action/view file even exists
	 *
	 * return boolean
	*/
	public static function action_file_exists( $action = null ) {
		return file_exists( Controller::action_file_path( $action ) );
	}

	/** 
	 * Return the current controller action/view file not before checking if it exists
	 * or if the core view() was used to retrieve a specific view file
	 *
	 * return string
	*/
	public static function action_file_get( $action = null ) {
		if( Controller::action_file_exists( $action ) && !View::view_isset() ) {
			
			ob_start();

			if( !isset( $action ) ) {
				include Controller::action_file_path();
			} else {
				include Controller::action_file_path( $action );
			}

			$action = ob_get_contents();
			
			ob_get_clean();
			
			return $action;
		} else {
			return false;
		}
	}

	/**
     * Returns url parameters either as a string or array pending if there is more than one url param
     *
     * return string or array
    */
	public static function params() {
		// -- Check if any url params have been defined
		if( Url::url_params_isset() ) {

			// -- Get the url items
			$url = Url::url_filter();

			// -- Define a new collection
			$url_params = array();

			// -- Loop through all url params populating url_params with the values 
			for( $a = 3; $a <= count( $url ); $a++ ) { 
				$url_params[] = $url[ $a ];
			}

			// -- Get the total of url params in the url_params collection
			$total = count( $url_params );

			// -- Check the total of the url_params collection only contains a single element 
			// -- and return that single element instead of the entire collection.
			if( $total == 1 ) {
				return $url_params[ 0 ];
			} else {
				return $url_params;
			}

		}
	}

}
