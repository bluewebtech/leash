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
		try {

			// -- Auto load all available model class files
			Model::get();

			// -- Auto load all available service class files
			Service::get();

			// -- Get the name of the current controller
			$controller_file = Controller::controller_filename();

			// -- Check if controller file even exists
			if( Controller::controller_exists() ) {
				
				try {

					// -- Get the file for the current controller
					Controller::controller_file_get();
				
					// -- Get the class name of the current controller
					$controller_classname = Controller::controller_classname();

					// -- Check if the controller class exists
					if ( Controller::class_isset() ) {
						
						// -- Create an instance of the current controller
						$controller = new $controller_classname();

						// -- Get the name of the current controller action method
						$action = Controller::action_name();

						// -- Check if class action method even exists
						// -- If it does not, check if a URL annotation was used in the next check
						if( Controller::action_exists( $controller, $action ) ) {

							// -- Display the controller action template
							ob_start();
							$controller->$action();
							$method = ob_get_contents();
							ob_get_clean();

							// -- Check if the View::render() as used
							if( isset( $_REQUEST[ 'view' ] ) ) {
								return $method;
							} else {
								// -- Display the default controller action template if the core viex() was not used
								return Controller::action_file_get();
							}

						} else {

							try {

								// -- Create an instance of the annotations class
								$annotations = new Annotations();
							
								// -- Check if the current method for the specified annotation even exists
								if( $annotations->function_is_defined( Controller::controller_path(), $action ) ) {
									
									// -- Get the name of the current controller action method based on url annotation
									$annotations_method = $annotations->get_function_name( Controller::controller_path(), $action );

									// -- Display the action method template how ever the user specified the display type
									ob_start();
									$controller->$annotations_method();
									$method = ob_get_contents();
									ob_get_clean();

									// -- Check if the View::render() as used
									if( isset( $_REQUEST[ 'view' ] ) ) {
										return $method;
									} else {
										// -- Display the default controller action template if the core viex() was not used
										return Controller::action_file_get( $annotations_method );
									}

								} else {
									// -- Display  the missing controller method error
									throw new Exception( 'Function (' . $action . ') does not exist.' );
								}

							} catch( Exception $e ) {
								Error::message( $e, 404 );
							}

						}

					} else {
						// -- Display controller class error
						throw new Exception( 'Class (' . $controller_classname . ') does not exist.' );
					}

				} catch( Exception $e ) {
					Error::message( $e, 404 );
				}

			} else {
				// -- Display missing controller file error
				throw new Exception( 'Controller (' . $controller_file . ') does not exist.' );
			}

		} catch( Exception $e ) {
			Error::message( $e, 404 );
		}

	}

}
