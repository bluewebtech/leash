<?php

class Loader {

	/** 
	 * The request() is the absolute main controller, action and view loader
	 * Basically, the request() is the heart of the framework
	 * Thus, the reason for all the documentation through out
	 *
	 * return void
	*/
	public static function request() {
		// -- Auto load all available model class files
		Model::get();

		// -- Auto load all available service class files
		Service::get();

		// -- Get the name of the current controller
		$controller_file = Controller::controller_filename( Url::url_array() );

		// -- Check if controller file even exists
		if( Controller::controller_exists( $controller_file ) ) {
			
			try {

				// -- Get the file for the current controller
				Controller::controller_file_get( $controller_file );
			
				// -- Get the class name of the current controller
				$controller_classname = Controller::controller_classname( $controller_file );

				// -- Check if the controller class exists
				if ( Controller::class_isset( $controller_file ) ) {
					
					// -- Create an instance of the current controller
					$controller = new $controller_classname( $controller_file );

					// -- Get the name of the current controller action method
					$action = Controller::action_name( Url::url_filter() );

					// -- Check if class action method even exists
					// -- If it does not, check if a URL annotation was used in the next check
					if( Controller::action_exists( $controller, $action ) ) {

						// -- Display the controller action template
						ob_start();
						$controller->$action();
						$method = ob_get_contents();
						ob_get_clean();

						// -- Check if the View::render() was used
						if( isset( $GLOBALS[ '__view__' ] ) ) {
							return $method;
						} else {

							if( Controller::action_file_exists( $controller_file, $action ) ) {
								return Controller::action_file_get( $controller_file, $action );
							} else {
								return $method;
							}
						}

					} else {

						try {

							// -- Create an instance of the annotations class
							$annotations = new Annotations();
						
							// -- Check if the current method for the specified annotation even exists
							if( $annotations->function_is_defined( Controller::controller_path( $controller_file ), $action ) ) {
								
								// -- Get the name of the current controller action method based on url annotation
								$annotations_method = $annotations->get_function_name( Controller::controller_path( $controller_file ), $action );

								// -- Display the action method template how ever the user specified the display type
								ob_start();
								$controller->$annotations_method();
								$method = ob_get_contents();
								ob_get_clean();

								// -- Check if the View::render() as used
								if( isset( $GLOBALS[ '__view__' ] ) ) {
									return $method;
								} else {

									if( Controller::action_file_exists() ) {
										// -- Display the default controller action template if the Viex::render() was not used
										return Controller::action_file_get( $annotations_method );
									} else {
										return $method;
									}
									
								}

							} else {
								// -- Display  the missing controller method error
								throw new Exception( 'Action (' . $action . ') does not exist within (' . $controller_classname . ').' );
							}

						} catch( Exception $e ) {
							Error::message( $e, 404 );
						}

					}

				} else {
					// -- Display controller class error
					throw new Exception( 'Controller (' . $controller_classname . ') does not exist.' );
				}

			} catch( Exception $e ) {
				Error::message( $e, 404 );
			}

		} else {

			$url = Routes::root();
			$controller_file = Controller::controller_filename( $url );

			try { 
			
				// -- Check if controller file even exists
				if( Controller::controller_exists( $controller_file ) ) {

					// -- Get the file for the current controller
					Controller::controller_file_get( $controller_file );
				
					// -- Get the class name of the current controller
					$controller_classname = Controller::controller_classname( $controller_file );

					if ( Controller::class_isset( $controller_file ) ) {
						
						// -- Create an instance of the current controller
						$controller = new $controller_classname( $controller_file );

						// -- Get the name of the current controller action method
						$action = Controller::action_name( $url);

						try {

							// -- Check if class action method even exists
							// -- If it does not, check if a URL annotation was used in the next check
							if( Controller::action_exists( $controller, $action ) ) {

								// -- Display the controller action template
								ob_start();
								$controller->$action();
								$method = ob_get_contents();
								ob_get_clean();

								// -- Check if the View::render() was used
								if( isset( $GLOBALS[ '__view__' ] ) ) {
									return $method;
								} else {

									if( Controller::action_file_exists( $controller_file, $action ) ) {
										return Controller::action_file_get( $controller_file, $action );
									} else {
										return $method;
									}
								}

							} else {
								throw new Exception( 'Action (' . $action . ') does not exist within (' . $controller_classname . ').' );
							}

						} catch( Exception $e ) {
							Error::message( $e, 404 );
						}

					}

				} else {
					throw new Exception( 'Controller (' . $controller_classname . ') does not exist.' );
				}

			} catch( Exception $e ) {
				Error::message( $e, 404 );
			}
			
		}

	}

}
