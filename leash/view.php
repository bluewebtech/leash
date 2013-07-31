<?php

class View {

	public $view;
	public $model;

	/**
	 * Checks whether the core view function was used
	 *
	 * return boolean
	*/
	public static function view_isset() {
		if( array_key_exists( 'view', $_REQUEST ) ) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Return the view name
	 * 
	 * @param string $view
	 * 
	 * return string
	*/
	public static function view_filename( $view ) {
		return $view;
	}

	/**
	 * Return the view file path
	 * 
	 * @param string $view
	 * 
	 * return string
	*/
	public static function view_path( $view ) {
		return VIEWS_PATH . Controller::controller_filename() . '/' . $view . EXT_PHP;
	}

	/**
	 * Check if the defined view even exists
	 * 
	 * @param string $view
	 * 
	 * return boolean
	*/
	public static function view_exists( $view ) {
		return file_exists( $view );
	}

	/**
	 * Render the defined view and include array of values
	 *
	 * @param string $view
	 * @param array $model
	*/
	public static function render( $view, $model = array() ) {
		$_REQUEST[ 'view' ] = true;
		$view               = View::view_filename( $view );

		if( !empty( $model ) ) {
			foreach ( $model as $key => $value ) {
				$$key = $value;
			}
		}

		try {

			// -- Check whether the specified view even exists
			if( View::view_exists( View::view_path( $view ) ) ) {
				ob_start();
				include VIEWS_PATH . Controller::controller_filename() . '/' . $view . EXT_PHP;
				$action = ob_get_contents();
				ob_get_clean();

				echo $action;
			} else {
				throw new Exception( 'View (' . $view . ') does not exist.' );
				return false;
			}

		} catch( Exception $e ) {
			Error::message( $e, 500 );
		}
	}

	/**
	 * Render the defined view with optional model values
	 *
	 * @param string $view
	 * @param array $model
	*/
	public static function get( $view, $model = array() ) {
		$_REQUEST[ 'view' ] = true;
		$view             = View::view_filename( $view );

		if( !empty( $model ) ) {
			foreach ( $model as $key => $value ) {
				$$key = $value;
			}
		}

		try {

			// -- Check whether the specified view even exists
			if( View::view_exists( View::view_path( $view ) ) ) {
				ob_start();
				include VIEWS_PATH . Controller::controller_filename() . '/' . $view . EXT_PHP;
				$action = ob_get_contents();
				ob_get_clean();

				echo $action;
			} else {
				throw new Exception( 'View (' . $view . ') does not exist.' );
				return false;
			}

		} catch( Exception $e ) {
			Error::message( $e, 500 );
		}
	}

}
