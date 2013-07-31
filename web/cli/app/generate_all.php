<?php

namespace CLI;

use CLI\CreateController;
use CLI\CreateModel;
use CLI\Format;

class GenerateAll {

	public static function generate_all( $command ) {
		// -- Controller variable definitions
		$controller_name = CreateController::controller_name( $command );
		$controller_class_name     = CreateController::controller_class_name( $controller_name );
		$controller_directory_path = CreateController::controller_directory_path();
		$controller_file_ext       = CreateController::controller_file_ext( $controller_name );
		$controller_file_path      = CreateController::controller_file_path( $controller_file_ext );

		// -- Check if controller already exists. If it does let the user know
		if( CreateController::controller_file_exists( $controller_file_path ) ) {
			print "Controller " . Format::command_style( $controller_name ) . " already exists.\n";
			print "Cancelling request...";
		} else {
			CreateController::create_controller( $command );
			CreateModel::create_model( $command );
		}
	}

}

?>
