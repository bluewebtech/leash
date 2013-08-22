<?php

require 'format.php';
require 'clear.php';
require 'configuration.php';
require 'create-controller.php';
require 'create-model.php';
require 'create-service.php';
require 'create-view.php';
require 'generate-all.php';
require 'examples.php';
require 'help.php';

class CLI {

	public static function main( $command ) {

		if ( !empty( $command ) ) {
			
			$command_string = $command;
			$command_array = explode( ' ', $command_string );
			$command = $command_array[ 0 ];

			$mtime = microtime();
			$mtime = explode( ' ', $mtime );
			$mtime = $mtime[ 1 ] + $mtime[ 0 ];
			$starttime = $mtime; 

			echo '<div id="command_holder">' . "\n";

			switch( $command ) {
				case 'clear': 
				case 'refresh': 
				case 'clr': 
					Clear::main( $command_array );
				break;

				case 'configuration': 
				case 'config': 
					Configuration::main( $command_array );
				break;

				case 'create-controller': 
				case 'c-ctrl': 
					CreateController::main( $command_array );
				break;

				case 'create-model': 
				case 'c-mod': 
					CreateModel::main( $command_array );
				break;

				case 'create-service': 
				case 'c-srv': 
					CreateService::main( $command_array );
				break;

				case 'create-view': 
				case 'c-view': 
					CreateView::main( $command_array );
				break;

				case 'examples': 
				case 'ex': 
					Examples::main();
				break;

				case 'generate-all': 
				case 'gen-all': 
					GenerateAll::main( $command_array );
				break;

				case 'help': 
				case '?': 
					Help::main();
				break;

				case 'version': 
				case 'ver': 
					print VERSION . "\n";
				break;				
			}

			$mtime = microtime();
			$mtime = explode( ' ', $mtime );
			$mtime = $mtime[ 1 ] + $mtime[ 0 ];
			$endtime = $mtime;
			$totaltime = ( $endtime - $starttime );
			print Format::time_style( '-- Command execution time: ' . round( $totaltime ) . ' seconds --' ) . "\n"; 

			echo "</div>\n";
			
		} else {
			print "No command provided, Type 'help' or '?' for help.";
		}

		print "\n";
		
	}

}
