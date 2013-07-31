<?php

namespace CLI;

// -- Directory separator for cross-platform compatibility
define( 'DS', DIRECTORY_SEPARATOR );

// -- Absolute path to current directory
define( 'DIR', __DIR__ );

// -- Application configuration directory
define( 'APP', 'app' . DS . 'conf' );

// -- CLI web application root directory
define( 'WEB', 'web' . DS . 'cli' . DS . 'app' );

// Build path for framework configuration file
if( ( $pos = strrpos( DIR , WEB ) ) !== false ) {
	$conf = substr_replace( DIR , APP, $pos , strlen( WEB ) ) . DS . 'config.php';
}

require $conf;
require 'format.php';
require 'clear.php';
require 'configuration.php';
require 'create_controller.php';
require 'create_model.php';
require 'create_service.php';
//require 'create_unit_test.php';
require 'create_view.php';
require 'generate_all.php';
require 'examples.php';
require 'help.php';
require 'sing.php';
require 'version_control.php';

class CLI {

	public static function main( $command ) {

		if ( !empty( $command ) ) {
			
			$command_string = $command;
			$command_array = explode( ' ', $command_string );
			$command = $command_array[ 0 ];

			$mtime = microtime();
			$mtime = explode(" ",$mtime);
			$mtime = $mtime[1] + $mtime[0];
			$starttime = $mtime; 

			switch( $command ) {
				case 'clear': 
				case 'refresh': 
				case 'clr': 
					Clear::clear( $command_array );
				break;

				case 'configuration': 
				case 'config': 
					Configuration::configuration( $command_array );
				break;

				case 'create-controller': 
				case 'c-ctrl': 
					CreateController::create_controller( $command_array );
				break;

				case 'create-model': 
				case 'c-mod': 
					CreateModel::create_model( $command_array );
				break;

				case 'create-service': 
				case 'c-srv': 
					CreateService::create_service( $command_array );
				break;

				case 'create-view': 
				case 'c-view': 
					CreateView::create_view( $command_array );
				break;

				case 'examples': 
				case 'ex': 
					Examples::examples();
				break;

				case 'generate-all': 
				case 'gen-all': 
					GenerateAll::generate_all( $command_array );
				break;

				case 'help': 
				case '?': 
					Help::help();
				break;

				case 'sing': 
				case '?': 
					Sing::sing();
				break;

				case 'version-control': 
					VersionControl::version_control( $command_array );
				break;				
			}

			$mtime = microtime();
			$mtime = explode(" ",$mtime);
			$mtime = $mtime[1] + $mtime[0];
			$endtime = $mtime;
			$totaltime = ($endtime - $starttime);
			print Format::time_style( '-- Command execution time: ' . round( $totaltime ) . ' seconds --' ) . "\n"; 

		} else {
			print "No command provided, Type 'help' or '?' for help.";
		}

		print "\n";
		
	}

}
