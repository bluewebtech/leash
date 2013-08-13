<?php

class View {

	public $view;
	public $params;

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
	 * Render the defined view and include a collection of values
	 *
	 * @param string $view
	 * @param array / string $params
	*/
	public static function render( $view = null, $params = null ) {
		try {

			// -- Make sure the view argument has been provided
			if( isset( $view ) && !is_null( $view ) ) {

				try {

					// -- Make sure the view argument is not an array
					if( !is_array( $view ) ) {

						// -- Set a __view__ global variable which determines if a view template
						// -- is being used within the render method.
						$GLOBALS[ '__view__' ] = true;

						// -- Get the filename of the provided view
						$view = View::view_filename( $view );

						// -- Check if any values were provided for the params argument
						if( !empty( $params ) ) {

							// -- Check if the provided params argument is an array
							if( is_array( $params ) ) {

								// -- Loop through the provided array params using the given 
								// -- element names to define them as their own variable
								foreach ( $params as $key => $value ) {
									$$key = $value;
								}

							} else {

								// -- Check if the provided params argument is a string and 
								// -- convert the string into an array
								if( is_string( $params ) ) {
									$params = explode( ',', $params );
								}

							}

						}

						try {

							// -- Check whether the specified view even exists
							if( View::view_exists( View::view_path( $view ) ) ) {

								ob_start();
								require VIEWS_PATH . Controller::controller_filename() . DS . $view . EXT_PHP;
								$action = ob_get_contents();
								ob_get_clean();

								echo $action;

							} elseif( !is_file( View::view_path( $view ) ) && is_string( $view ) ) {
								
								echo $view;

							} else {
								
								throw new Exception( 'View (' . $view . ') does not exist.' );
								return false;

							}

						} catch( Exception $e ) {
							Error::message( $e, 500 );
						}

					} else {
						throw new Exception( 'Argument 1 (view) must be a string, an array was provided.' );
						return false;
					}

				} catch( Exception $e ) {
					Error::message( $e, 500 );
				}

			} else {
				throw new Exception( 'Argument 1 (view) of View::render() was not provided.' );
				return false;
			}

		} catch( Exception $e ) {
			Error::message( $e, 500 );
		}
	}

	/**
	 * Alias of the View::render() method
	 *
	 * @param string $view
	 * @param array / string $params
	*/
	public static function get( $view, $params = array() ) {
		return View::render( $view, $params );
	}

}
