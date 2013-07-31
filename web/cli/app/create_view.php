<?php

namespace CLI;

use CLI\CreateController;
use CLI\Format;

class CreateView {

	/**
     * Checks whether view name param was provided
     *
     * return boolean
     * 
     * @param array command
    */
	public static function view_name_isset( $command ) {
		if( array_key_exists( 2, $command ) ) {
			return true;
		} else {
			return false;
		}
	}

	/**
     * Return view name if view name param was provided
     *
     * return string
     * 
     * @param string command
    */
	public static function view_name( $command ) {
		if( CreateView::view_name_isset( $command ) ) {
			return Format::clean( $command[ 2 ] );
		} else {
			return false;
		}
	}

	/**
     * Return view file name with default file extension
     *
     * return string
    */
	public static function view_file_ext( $name ) {
		return $name . EXT_PHP;
	}

	/**
     * Return the complete path to the new view directory with file name and extension
     *
     * return string
     * 
     * @param string path
    */
	public static function view_file_path( $path, $file ) {
		return $path . $file;
	}

	/**
     * Handle all controller and view logic 
     *
     * return void
     * 
     * @param string command
    */
	public static function create_view( $command ) {
		// -- Check if a controller name was provided
		if( CreateController::controller_name_isset( $command ) ) {

			// -- Controller variable definitions
			$controller_name           = CreateController::controller_name( $command );
			$controller_class_name     = CreateController::controller_class_name( $controller_name );
			$controller_directory_path = CreateController::controller_directory_path();
			$controller_file_ext       = CreateController::controller_file_ext( $controller_name );
			$controller_file_path      = CreateController::controller_file_path( $controller_file_ext );

			// -- Check if controller exists
			if( CreateController::controller_file_exists( $controller_file_path ) ) {
				
				// -- Check if a name for the new view was provided
				if( CreateView::view_name_isset( $command ) ) {

					// View variable definitions
					$view_name             = CreateView::view_name( $command );
					$view_file_ext         = CreateView::view_file_ext( $view_name );
					$view_file_directory   = CreateController::view_file_directory( $controller_name );
					$view_file_path        = CreateView::view_file_path( $view_file_directory, $view_file_ext );
					$view_directory_exists = CreateController::view_directory_exists( $view_file_directory );
					$view_file_exists      = CreateController::view_file_exists( $view_file_path );
					$view_file_contents    = CreateController::view_file_contents( $view_name );

					// -- DEBUGGING START
					/*
					print $controller_name . "\n";
					print $controller_class_name . "\n";
					print $controller_directory_path . "\n";
					print $controller_file_ext . "\n";
					print $controller_file_path . "\n";

					print $view_name . "\n";
					print $view_file_ext . "\n";
					print $view_file_directory . "\n";
					print $view_file_path . "\n";
					print $view_file_contents . "\n";
					*/
					// -- DEBUGGING END

					// -- Check if new view file already exists
					if( $view_file_exists ) {
						print Format::error_style( 'View ' . $view_name . ' already exists.' ) . "\n";
					} else {
						// -- Generate the new view file
						CreateController::view_make( $view_file_path, $view_file_contents );
						
						print 'View ' . Format::command_style( $view_name ) . ' was created successfully for controller ' . Format::command_style( $controller_name ) . "\n";
					}

				} else {
					print Format::error_style( 'Please provided a view name.' ) . "\n";
					print 'Example: ' . Format::command_style( 'create-view controller view' ) . "\n";
				}

			} else {
				print "Controller " . Format::command_style( $controller_name ) . " does not exist. Please create it and try again.\n";
			}

		} else {
			print Format::error_style( 'Please provided a controller name and a view name.' ) . "\n";
			print 'Example: ' . Format::command_style( 'create-view controller view' ) . "\n";
		}
	}

}
