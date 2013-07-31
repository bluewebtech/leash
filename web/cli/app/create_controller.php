<?php

namespace CLI;

use CLI\Format;

class CreateController {

	/**
     * Checks whether controller name param was provided
     *
     * return boolean
     * 
     * @param array command
    */
	public static function controller_name_isset( $command ) {
		if( array_key_exists( 1, $command ) ) {
			return true;
		} else {
			return false;
		}
	}

	/**
     * Return controller name if controller name param was provided
     *
     * return string
     * 
     * @param string command
    */
	public static function controller_name( $command ) {
		if( CreateController::controller_name_isset( $command ) ) {
			return Format::clean( $command[ 1 ] );
		} else {
			return false;
		}
	}

	/**
     * Return controller name with the first letter uppercased
     *
     * return string
     * 
     * @param string name
    */
	public static function controller_class_name( $name ) {
		return ucfirst( $name ) . 'Controller';
	}

	/**
     * Return the default controller path 
     *
     * return string
    */
	public static function controller_default_directory() {
		return str_replace( '/', DS, CONTROLLERS_PATH );
	}

	/**
     * Return the complete path to the controllers directory
     *
     * return string
    */
	public static function controller_directory_path() {
		$path = str_replace( DS . 'web' . DS . 'cli' . DS . 'app', DS . 'app' . DS, __DIR__ );
		return $path . CreateController::controller_default_directory();
	}

	/**
     * Return the controller name with the default file extension
     *
     * return string
     * 
     * @param string name
    */
	public static function controller_file_ext( $name ) {
		return $name . EXT_PHP;
	}

	/**
     * Return the complete controller path with file name
     *
     * return string
     * 
     * @param string name
    */
	public static function controller_file_path( $name ) {
		return CreateController::controller_directory_path() . $name;
	}

	/**
     * Check if controller file exists
     *
     * return boolean
     * 
     * @param string file
    */
	public static function controller_file_exists( $file ) {
		return file_exists( $file );
	}

	/**
     * Return controller file contents
     *
     * return string
     * 
     * @param string class
    */
	public static function controller_file_contents( $class ) {
		$content = <<<CONTROLLER
<?php

class $class {

	public function index() {
		view( 'index' );
	}

}
CONTROLLER;
		return $content;
	}

	/**
     * Generate controller file with contents
     *
     * return boolean
     * 
     * @param string file
     * @param string content
    */
	public static function controller_make( $file, $contents ) {
		$f = fopen( $file, 'w' );
		chmod( $file, 0777 );
		fwrite( $f, $contents );
		return fclose( $f );
	}

	/**
     * Return default view file name
     *
     * return string
    */
	public static function view_default_file() {
		return DEFAULT_VIEW;
	}

	/**
     * Return view file name with default file extension
     *
     * return string
    */
	public static function view_default_file_ext() {
		return CreateController::view_default_file() . EXT_PHP;
	}

	/**
     * Return the complete path to the views directory
     *
     * return string
    */
	public static function view_default_directory() {
		$view_path = str_replace( '../app/', '', VIEWS_PATH );
		$path = str_replace( DS . 'web' . DS . 'cli' . DS . 'app', DS . 'app' . DS, __DIR__ );
		return str_replace( '/', DS, $path ) . str_replace( '/', DS, $view_path );
	}

	/**
     * Return the path to the new view directory to be created
     *
     * return string
     * 
     * @param string name
    */
	public static function view_file_directory( $name ) {
		return CreateController::view_default_directory() . $name . DS;
	}

	/**
     * Return the complete path to the new view directory with file name and extension
     *
     * return string
     * 
     * @param string path
    */
	public static function view_file_path( $path ) {
		return $path . CreateController::view_default_file_ext();
	}

	/**
     * Check if the new view directory already exists
     *
     * return boolean
     * 
     * @param string dir
    */
	public static function view_directory_exists( $dir ) {
		return is_dir( $dir );
	}

	/**
     * Check if the default view file already exists
     *
     * return boolean
     * 
     * @param string file
    */
	public static function view_file_exists( $file ) {
		return file_exists( $file );
	}

	/**
     * Return the contents for the new view file
     *
     * return string
     * 
     * @param string name
    */
	public static function view_file_contents( $name ) {
		$title = ucfirst( $name );
		$content = <<<VIEW
<h1>$title</h1>
VIEW;
		return $content;
	}

	/**
     * Create the new view directory for the specific controller
     *
     * return boolean
     * 
     * @param string dir
    */
	public static function view_directory_make( $dir ) {
		mkdir( $dir );
		chmod( $dir, 0777 );
		return true;
	}

	/**
     * Generate default view file and populate with contents
     *
     * return boolean
     * 
     * @param string file
     * @param string contents
    */
	public static function view_make( $file, $contents ) {
		$f = fopen( $file, 'w' );
		chmod( $file, 0777 );
		fwrite( $f, $contents );
		return fclose( $f );
	}

	/**
     * Handle all controller and view logic 
     *
     * return void
     * 
     * @param string command
    */
	public static function create_controller( $command ) {
		if( CreateController::controller_name_isset( $command ) ) {

			// -- Controller variable definitions
			$controller_name           = CreateController::controller_name( $command );
			$controller_class_name     = CreateController::controller_class_name( $controller_name );
			$controller_directory_path = CreateController::controller_directory_path();
			$controller_file_ext       = CreateController::controller_file_ext( $controller_name );
			$controller_file_path      = CreateController::controller_file_path( $controller_file_ext );
			$controller_file_contents  = CreateController::controller_file_contents( $controller_class_name );

			// View variable definitions
			$view_default_file      = CreateController::view_default_file();
			$view_default_file_ext  = CreateController::view_default_file_ext();
			$view_default_directory = CreateController::view_default_directory();
			$view_file_directory    = CreateController::view_file_directory( $controller_name );
			$view_file_path         = CreateController::view_file_path( $view_file_directory );
			$view_directory_exists  = CreateController::view_directory_exists( $view_file_directory );
			$view_file_exists       = CreateController::view_file_exists( $view_file_path );
			$view_file_contents     = CreateController::view_file_contents( $controller_name );

			// -- Check if controller already exists. If it does let the user know
			if( CreateController::controller_file_exists( $controller_file_path ) ) {
				print "Controller " . Format::command_style( $controller_name ) . " already exists.\n";
			} else {

				CreateController::controller_make( $controller_file_path, $controller_file_contents );

				print "Controller " . Format::command_style( $controller_name ) . " created successfully.\n";
				
				if( $view_directory_exists ) {
					print 'View directory for controller ' . Format::command_style( $controller_name ) . " cannot be created because it already exists.\n";
				} else {
					CreateController::view_directory_make( $view_file_directory );
				}

				if( $view_file_exists ) {
					print 'Default view for controller ' . Format::command_style( $controller_name ) . " cannot be created because it already exists.\n";
				} else {
					CreateController::view_make( $view_file_path, $view_file_contents );

					print 'Default view for controller ' . Format::command_style( $controller_name ) . " created successfully.\n";
					print 'Click <a href="http://' . $_SERVER['SERVER_NAME'] . '/' . $controller_name . '" target="_blank">here</a> to view your new controller.' . "\n";
				}

			}

		} else {
			print Format::error_style( 'Please provided a controller name.' ) . "\n";
			print 'Example: ' . Format::command_style( 'create-controller zombie' ) . "\n";
		}
	}

}
