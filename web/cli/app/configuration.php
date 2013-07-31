<?php

namespace CLI;

use CLI\Format;

class Configuration {

	public static function conf_command_items() {
		return array(
			'app_name', 
			'default_controller', 
			'default_view', 
			'layout', 
			'mobile_layout', 
			'debugging', 
			'logging', 
			'logs_path', 
			'logs_access', 
			'logs_ext', 
			'fetch_type', 
			'session_enable', 
			'session_name', 
			'session_timeout', 
			'encryption_type', 
			'encryption_key', 
			'assets_path', 
			'help'
		);
	}

	public static function conf_boolean_values() {
		return array(
			'0', 
			'1', 
			'true', 
			'false'
		);
	}

	public static function conf_param_is_boolean( $command ) {
		return in_array( $command[ 2 ], Configuration::conf_boolean_values() );
	}

	public static function conf_command_valid( $command ) {
		if( in_array( $command, Configuration::conf_command_items() ) ) {
			return true;
		} else {
			return false;
		}
	}

	public static function conf_command_isset( $command ) {
		if( array_key_exists( 1, $command ) ) {
			return true;
		} else {
			return false;
		}
	}

	public static function conf_item_isset( $command ) {
		if( array_key_exists( 2, $command ) ) {
			return true;
		} else {
			return false;
		}
	}

	public static function conf_command( $command ) {
		if( Configuration::conf_command_isset( $command ) ) {
			return $command[ 1 ];
		} else {
			return false;
		}
	}

	public static function conf_default_directory() {
		$conf_path = str_replace( '../app/', '', CONF_PATH );
		$path = str_replace( DS . 'web' . DS . 'cli' . DS . 'app', DS . 'app' . DS, __DIR__ );
		return str_replace( '/', DS, $path ) . str_replace( '/', DS, $conf_path );
	}

	public static function conf_file() {
		return Configuration::conf_default_directory() . 'config';
	}

	public static function conf_file_ext() {
		return Configuration::conf_file() . EXT_PHP;
	}

	public static function conf_file_exists() {
		return file_exists( Configuration::conf_file_ext() );
	}

	public static function conf_file_array() {
		return file( Configuration::conf_file_ext() );
	}

	public static function conf_file_open() {
		return fopen( Configuration::conf_file_ext(), 'w' );
	}

	// -- APP_NAME
	public static function app_name( $command ) {
		$conf  = Configuration::conf_file_array();
		$lines = array();
		$comm  = array();

		// -- Loop through all elements in the command array starting from the second param on 
		// -- adding each looped value to a new $comm array
		for( $i = 2; $i <= count( $command ) - 1; $i++ ) { 
			$comm[ $i ] = $command[ $i ];
		}

		// -- Convert the $comm array into a string separating all elements with spaces
		$comm = implode( ' ', $comm );

		// -- Loop through the contents of the configuration file.
		foreach( $conf as $key => $value ) {

			// -- Check for APP_NAME value during the configuration array loop
			if( substr_count( $value, "'APP_NAME'" ) > 0 ) {
				// -- Update APP_NAME line with the provided 3rd param in new array
				array_push( $lines, "\t'APP_NAME'           => '" . $comm . "', " . "\n" );
			} else {
				// -- Add already existant lines to new array
				array_push( $lines, $value );
			}

		}

		// -- Open configuration file
		$file = Configuration::conf_file_open();

		// -- Loop through new array adding each line to the configuration file
		foreach( $lines as $key => $value ) {
			fwrite( $file, $value ); 
		}

		print "app_name command executed\n";
	}

	// -- DEFAULT_CONTROLLER
	public static function default_controller( $command ) {
		$conf  = Configuration::conf_file_array();
		$lines = array();
		$comm  = Format::clean( $command[ 2 ] );

		// -- Loop through the contents of the configuration file.
		foreach( $conf as $key => $value ) {

			// -- Check for DEFAULT_CONTROLLER value during the configuration array loop
			if( substr_count( $value, "'DEFAULT_CONTROLLER'" ) > 0 ) {
				// -- Update DEFAULT_CONTROLLER line with the provided 3rd param in new array
				array_push( $lines, "\t'DEFAULT_CONTROLLER' => '" . $comm . "', " . "\n" );
			} else {
				// -- Add already existant lines to new array
				array_push( $lines, $value );
			}

		}

		// -- Open configuration file
		$file = Configuration::conf_file_open();

		// -- Loop through new array adding each line to the configuration file
		foreach( $lines as $key => $value ) {
			fwrite( $file, $value ); 
		}

		print "default_controller command executed\n";
	}

	// -- DEFAULT_VIEW
	public static function default_view( $command ) {
		$conf  = Configuration::conf_file_array();
		$lines = array();
		$comm  = Format::clean( $command[ 2 ] );

		// -- Loop through the contents of the configuration file.
		foreach( $conf as $key => $value ) {

			// -- Check for DEFAULT_VIEW value during the configuration array loop
			if( substr_count( $value, "'DEFAULT_VIEW'" ) > 0 ) {
				// -- Update DEFAULT_VIEW line with the provided 3rd param in new array
				array_push( $lines, "\t'DEFAULT_VIEW'       => '" . $comm . "', " . "\n" );
			} else {
				// -- Add already existant lines to new array
				array_push( $lines, $value );
			}

		}

		// -- Open configuration file
		$file = Configuration::conf_file_open();

		// -- Loop through new array adding each line to the configuration file
		foreach( $lines as $key => $value ) {
			fwrite( $file, $value ); 
		}

		print "default_view command executed\n";
	}

	// -- LAYOUT
	public static function layout( $command ) {
		$conf  = Configuration::conf_file_array();
		$lines = array();
		$comm  = Format::clean( $command[ 2 ] );

		// -- Loop through the contents of the configuration file.
		foreach( $conf as $key => $value ) {

			// -- Check for LAYOUT value during the configuration array loop
			if( substr_count( $value, "'LAYOUT'" ) > 0 ) {
				// -- Update LAYOUT line with the provided 3rd param in new array
				array_push( $lines, "\t'LAYOUT'             => '" . $comm . "', " . "\n" );
			} else {
				// -- Add already existant lines to new array
				array_push( $lines, $value );
			}

		}

		// -- Open configuration file
		$file = Configuration::conf_file_open();

		// -- Loop through new array adding each line to the configuration file
		foreach( $lines as $key => $value ) {
			fwrite( $file, $value ); 
		}

		print "layout command executed\n";
	}

	// -- MOBILE_LAYOUT
	public static function mobile_layout( $command ) {
		$conf  = Configuration::conf_file_array();
		$lines = array();
		$comm  = Format::clean( $command[ 2 ] );

		// -- Loop through the contents of the configuration file.
		foreach( $conf as $key => $value ) {

			// -- Check for MOBILE_LAYOUT value during the configuration array loop
			if( substr_count( $value, "'MOBILE_LAYOUT'" ) > 0 ) {
				// -- Update MOBILE_LAYOUT line with the provided 3rd param in new array
				array_push( $lines, "\t'MOBILE_LAYOUT'      => '" . $comm . "', " . "\n" );
			} else {
				// -- Add already existant lines to new array
				array_push( $lines, $value );
			}

		}

		// -- Open configuration file
		$file = Configuration::conf_file_open();

		// -- Loop through new array adding each line to the configuration file
		foreach( $lines as $key => $value ) {
			fwrite( $file, $value ); 
		}

		print "mobile_layout command executed\n";
	}

	// -- DEBUGGING
	public static function debugging( $command ) {
		$conf  = Configuration::conf_file_array();
		$lines = array();
		$comm  = $command[ 2 ];		

		if( Configuration::conf_param_is_boolean( $command ) ) {

			// -- Loop through the contents of the configuration file.
			foreach( $conf as $key => $value ) {

				// -- Check for DEBUGGING value during the configuration array loop
				if( substr_count( $value, "'DEBUGGING'" ) > 0 ) {
					// -- Update DEBUGGING line with the provided 3rd param in new array
					array_push( $lines, "\t'DEBUGGING'          => " . $comm . ", " . "\n" );
				} else {
					// -- Add already existant lines to new array
					array_push( $lines, $value );
				}

			}

			// -- Open configuration file
			$file = Configuration::conf_file_open();

			// -- Loop through new array adding each line to the configuration file
			foreach( $lines as $key => $value ) {
				fwrite( $file, $value ); 
			}					

			print "debugging command executed\n";
		} else {
			print "debugging command value must be a boolean: 1/0 or true/false\n";
		}
	}

	// -- LOGGING
	public static function logging( $command ) {
		$conf  = Configuration::conf_file_array();
		$lines = array();
		$comm  = $command[ 2 ];		

		if( Configuration::conf_param_is_boolean( $command ) ) {
			
			// -- Loop through the contents of the configuration file.
			foreach( $conf as $key => $value ) {

				// -- Check for LOGGING value during the configuration array loop
				if( substr_count( $value, "'LOGGING'" ) > 0 ) {
					// -- Update LOGGING line with the provided 3rd param in new array
					array_push( $lines, "\t'LOGGING'            => " . $comm . ", " . "\n" );
				} else {
					// -- Add already existant lines to new array
					array_push( $lines, $value );
				}

			}

			// -- Open configuration file
			$file = Configuration::conf_file_open();

			// -- Loop through new array adding each line to the configuration file
			foreach( $lines as $key => $value ) {
				fwrite( $file, $value ); 
			}

			print "logging command executed\n";

		} else {
			print "logging command value must be a boolean: 1/0 or true/false\n";
		}
	}

	// -- LOGS_PATH
	public static function logs_path( $command ) {
		$conf  = Configuration::conf_file_array();
		$lines = array();
		$comm  = Format::clean( $command[ 2 ] );
		$logs_path = str_replace( '../app/', '', LOGS_PATH );
		$path = str_replace( '\web\cli\app', '\app\\', __DIR__ );
		$old = str_replace( '/', '\\', $path ) . str_replace( '/', '\\', $logs_path );
		$new = str_replace( '/', '\\', $path ) . str_replace( '/', '\\', $comm );

		// -- Make sure logs directory even exists
		if( is_dir( $old ) ) {

			// -- Loop through the contents of the configuration file.
			foreach( $conf as $key => $value ) {

				// -- Check for LOGS_PATH value during the configuration array loop
				if( substr_count( $value, "'LOGS_PATH'" ) > 0 ) {
					// -- Update LOGS_PATH line with the provided 3rd param in new array
					array_push( $lines, "\t'LOGS_PATH'          => '" . $comm . "', " . "\n" );
				} else {
					// -- Add already existant lines to new array
					array_push( $lines, $value );
				}

			}

			// -- Rename logs directory
			rename( $old, $new );

			// -- Open configuration file
			$file = Configuration::conf_file_open();

			// -- Loop through new array adding each line to the configuration file
			foreach( $lines as $key => $value ) {
				fwrite( $file, $value ); 
			}

			print "logs_path command executed\n";

		} else {
			print "Cannot update logs path.\n";
		}
	}

	// -- LOGS_ACCESS
	public static function logs_access( $command ) {
		$conf      = Configuration::conf_file_array();
		$lines     = array();
		$comm      = Format::clean( $command[ 2 ] );
		$logs_path = str_replace( '../app/', '', LOGS_PATH ) . '\\';
		$path      = str_replace( '\web\cli\app', '\app\\', __DIR__ );
		$old       = str_replace( '/', '\\', $path ) . str_replace( '/', '\\', $logs_path ) . LOGS_ACCESS . LOGS_EXT;
		$new       = str_replace( '/', '\\', $path ) . str_replace( '/', '\\', $logs_path ) . $comm . LOGS_EXT;

		// -- Make sure logs directory even exists
		if( file_exists( $old ) ) {

			// -- Loop through the contents of the configuration file.
			foreach( $conf as $key => $value ) {

				// -- Check for LOGS_ACCESS value during the configuration array loop
				if( substr_count( $value, "'LOGS_ACCESS'" ) > 0 ) {
					// -- Update LOGS_ACCESS line with the provided 3rd param in new array
					array_push( $lines, "\t'LOGS_ACCESS'        => '" . $comm . "', " . "\n" );
				} else {
					// -- Add already existant lines to new array
					array_push( $lines, $value );
				}

			}

			// -- Rename logs directory
			rename( $old, $new );

			// -- Open configuration file
			$file = Configuration::conf_file_open();

			// -- Loop through new array adding each line to the configuration file
			foreach( $lines as $key => $value ) {
				fwrite( $file, $value ); 
			}

			print "logs_access command executed\n";

		} else {
			print "Cannot update access log name.\n";
		}
	}

	// -- LOGS_EXT
	public static function logs_ext( $command ) {
		$conf      = Configuration::conf_file_array();
		$lines     = array();
		$comm      = Format::clean( $command[ 2 ] );
		$logs_path = str_replace( '../app/', '', LOGS_PATH ) . '\\';
		$path      = str_replace( '\web\cli\app', '\app\\', __DIR__ ) . $logs_path;
		$dir       = scandir( $path );
		$files     = array();

		foreach ( $dir as $key => $value ) {
			if( $value != '.' && $value != '..' ) {
				$old = $path . $value;
				$new = $path . str_replace( LOGS_EXT, '.' . $comm, $value );
				rename( $old, $new );
			}
		}

		// -- Loop through the contents of the configuration file.
		foreach( $conf as $key => $value ) {

			// -- Check for LOGS_EXT value during the configuration array loop
			if( substr_count( $value, "'LOGS_EXT'" ) > 0 ) {
				// -- Update LOGS_EXT line with the provided 3rd param in new array
				array_push( $lines, "\t'LOGS_EXT'           => '" . '.' . $comm . "', " . "\n" );
			} else {
				// -- Add already existant lines to new array
				array_push( $lines, $value );
			}

		}

		// -- Open configuration file
		$file = Configuration::conf_file_open();

		// -- Loop through new array adding each line to the configuration file
		foreach( $lines as $key => $value ) {
			fwrite( $file, $value ); 
		}

		print "logs_ext command executed\n";
	}

	// -- FETCH_TYPE
	public static function fetch_type( $command ) {
		$conf  = Configuration::conf_file_array();
		$lines = array();
		$comm  = Format::clean( $command[ 2 ] );
		$types = array( 'class', 'array' );

		if( in_array( $command[ 2 ], $types ) ) {

			// -- Convert the $comm array into a string separating all elements with spaces
			// -- Loop through the contents of the configuration file.
			foreach( $conf as $key => $value ) {

				// -- Check for FETCH_TYPE value during the configuration array loop
				if( substr_count( $value, "'FETCH_TYPE'" ) > 0 ) {
					// -- Update FETCH_TYPE line with the provided 3rd param in new array
					array_push( $lines, "\t'FETCH_TYPE'         => '" . $comm . "', " . "\n" );
				} else {
					// -- Add already existant lines to new array
					array_push( $lines, $value );
				}

			}

			// -- Open configuration file
			$file = Configuration::conf_file_open();

			// -- Loop through new array adding each line to the configuration file
			foreach( $lines as $key => $value ) {
				fwrite( $file, $value ); 
			}

			print "fetch_type command executed\n";

		} else {
			print "The provided fetch type is not a valid value.\n";
		}
	}

	// -- SESSION_ENABLE
	public static function session_enable( $command ) {
		$conf  = Configuration::conf_file_array();
		$lines = array();
		$comm  = $command[ 2 ];		

		if( Configuration::conf_param_is_boolean( $command ) ) {
			
			// -- Loop through the contents of the configuration file.
			foreach( $conf as $key => $value ) {

				// -- Check for SESSION_ENABLE value during the configuration array loop
				if( substr_count( $value, "'SESSION_ENABLE'" ) > 0 ) {
					// -- Update SESSION_ENABLE line with the provided 3rd param in new array
					array_push( $lines, "\t'SESSION_ENABLE'     => " . $comm . ", " . "\n" );
				} else {
					// -- Add already existant lines to new array
					array_push( $lines, $value );
				}

			}

			// -- Open configuration file
			$file = Configuration::conf_file_open();

			// -- Loop through new array adding each line to the configuration file
			foreach( $lines as $key => $value ) {
				fwrite( $file, $value ); 
			}

			print "session_enable command executed\n";

		} else {
			print "session_enable command value must be a boolean: 1/0 or true/false\n";
		}
	}

	// -- SESSION_NAME
	public static function session_name( $command ) {
		$conf  = Configuration::conf_file_array();
		$lines = array();
		$comm  = array();

		// -- Loop through all elements in the command array starting from the second param on 
		// -- adding each looped value to a new $comm array
		for( $i = 2; $i <= count( $command ) - 1; $i++ ) { 
			$comm[ $i ] = $command[ $i ];
		}

		// -- Convert the $comm array into a string separating all elements with spaces
		$comm = implode( '_', $comm );

		// -- Loop through the contents of the configuration file.
		foreach( $conf as $key => $value ) {

			// -- Check for SESSION_NAME value during the configuration array loop
			if( substr_count( $value, "'SESSION_NAME'" ) > 0 ) {
				// -- Update SESSION_NAME line with the provided 3rd param in new array
				array_push( $lines, "\t'SESSION_NAME'       => '" . $comm . "', " . "\n" );
			} else {
				// -- Add already existant lines to new array
				array_push( $lines, $value );
			}

		}

		// -- Open configuration file
		$file = Configuration::conf_file_open();

		// -- Loop through new array adding each line to the configuration file
		foreach( $lines as $key => $value ) {
			fwrite( $file, $value ); 
		}

		print "session_name command executed\n";
	}

	// -- SESSION_TIMEOUT
	public static function session_timeout( $command ) {
		$conf  = Configuration::conf_file_array();
		$lines = array();
		$comm  = intval( $command[ 2 ] );		

		if( is_int( $comm ) ) {

			// -- Loop through the contents of the configuration file.
			foreach( $conf as $key => $value ) {

				// -- Check for SESSION_TIMEOUT value during the configuration array loop
				if( substr_count( $value, "'SESSION_TIMEOUT'" ) > 0 ) {
					// -- Update SESSION_TIMEOUT line with the provided 3rd param in new array
					array_push( $lines, "\t'SESSION_TIMEOUT'    => " . $comm . ", " . "\n" );
				} else {
					// -- Add already existant lines to new array
					array_push( $lines, $value );
				}

			}

			// -- Open configuration file
			$file = Configuration::conf_file_open();

			// -- Loop through new array adding each line to the configuration file
			foreach( $lines as $key => $value ) {
				fwrite( $file, $value ); 
			}

			print "session_timeout command executed\n";

		} else {
			print "The provided value for the session_timeout command must be an integer\n";
		}
	}

	// -- ENCRYPTION_TYPE
	public static function encryption_type( $command ) {
		$conf  = Configuration::conf_file_array();
		$lines = array();
		$comm  = $command[ 2 ];
		$types = array( 'MD2', 'MD5', 'SHA1', 'SHA256', 'SHA384', 'SHA512' );

		if( in_array( $command[ 2 ], $types ) ) {

			// -- Convert the $comm array into a string separating all elements with spaces
			// -- Loop through the contents of the configuration file.
			foreach( $conf as $key => $value ) {

				// -- Check for ENCRYPTION_TYPE value during the configuration array loop
				if( substr_count( $value, "'ENCRYPTION_TYPE'" ) > 0 ) {
					// -- Update ENCRYPTION_TYPE line with the provided 3rd param in new array
					array_push( $lines, "\t'ENCRYPTION_TYPE'    => '" . $comm . "', " . "\n" );
				} else {
					// -- Add already existant lines to new array
					array_push( $lines, $value );
				}

			}

			// -- Open configuration file
			$file = Configuration::conf_file_open();

			// -- Loop through new array adding each line to the configuration file
			foreach( $lines as $key => $value ) {
				fwrite( $file, $value ); 
			}

			print "encryption_type command executed\n";

		} else {
			print "The provided encryption type is not a valid value.\n";
		}
	}

	// -- ENCRYPTION_KEY
	public static function encryption_key( $command ) {
		$conf  = Configuration::conf_file_array();
		$lines = array();
		$comm  = Format::clean( $command[ 2 ] );

		// -- Loop through the contents of the configuration file.
		foreach( $conf as $key => $value ) {

			// -- Check for ENCRYPTION_KEY value during the configuration array loop
			if( substr_count( $value, "'ENCRYPTION_KEY'" ) > 0 ) {
				// -- Update ENCRYPTION_KEY line with the provided 3rd param in new array
				array_push( $lines, "\t'ENCRYPTION_KEY'     => '" . $comm . "', " . "\n" );
			} else {
				// -- Add already existant lines to new array
				array_push( $lines, $value );
			}

		}

		// -- Open configuration file
		$file = Configuration::conf_file_open();

		// -- Loop through new array adding each line to the configuration file
		foreach( $lines as $key => $value ) {
			fwrite( $file, $value ); 
		}

		print "encryption_key command executed\n";
	}

	// -- ASSETS_PATH
	public static function assets_path( $command ) {
		$conf  = Configuration::conf_file_array();
		$lines = array();
		$comm  = $command[ 2 ];

		// -- Loop through the contents of the configuration file.
		foreach( $conf as $key => $value ) {

			// -- Check for ASSETS_PATH value during the configuration array loop
			if( substr_count( $value, "'ASSETS_PATH'" ) > 0 ) {
				// -- Update ASSETS_PATH line with the provided 3rd param in new array
				array_push( $lines, "\t'ASSETS_PATH'        => '" . $comm . "', " . "\n" );
			} else {
				// -- Add already existant lines to new array
				array_push( $lines, $value );
			}

		}

		// -- Open configuration file
		$file = Configuration::conf_file_open();

		// -- Loop through new array adding each line to the configuration file
		foreach( $lines as $key => $value ) {
			fwrite( $file, $value ); 
		}

		print "assets_path command executed\n";
	}

	public static function help() {
		$help = <<<HELP
The following are available actions for the config command:
<span class="command">app_name</span> ---------------- <span class="examples">app_name [string]</span>
<span class="command">default_controller</span> ------ <span class="examples">default_controller [string]</span>
<span class="command">default_view</span> ------------ <span class="examples">default_view [string]</span>
<span class="command">layout</span> ------------------ <span class="examples">layout [string]</span>
<span class="command">mobile_layout</span> ----------- <span class="examples">mobile_layout [string]</span>
<span class="command">debugging</span> --------------- <span class="examples">debugging [boolean]</span>
<span class="command">logging</span> ----------------- <span class="examples">logging [boolean]</span>
<span class="command">logs_path</span> --------------- <span class="examples">logs_path  [string]</span>
<span class="command">logs_access</span> ------------- <span class="examples">logs_access  [string]</span>
<span class="command">logs_ext</span> ---------------- <span class="examples">logs_ext  [string]</span>
<span class="command">fetch_type</span> -------------- <span class="examples">fetch_type  [string]</span>
<span class="command">session_enable</span> ---------- <span class="examples">session_enable [boolean]</span>
<span class="command">session_name</span> ------------ <span class="examples">session_name [string]</span>
<span class="command">session_timeout</span> --------- <span class="examples">session_timeout [int]</span>
<span class="command">encryption_type</span> --------- <span class="examples">encryption_type [string]</span>
<span class="command">encryption_key</span> ---------- <span class="examples">encryption_key [string]</span>
<span class="command">assets_path</span> ------------- <span class="examples">assets_path [string]</span>
<span class="command">help</span> -------------------- <span class="examples">help</span>
HELP;
		print $help . "\n";
	}

	// -- Main
	public static function configuration( $command ) {
		// -- Check if configuration file exists
		if( Configuration::conf_file_exists() ) {

			// -- Check for first position config command param was provided
			if( Configuration::conf_command_isset( $command ) ) {

				// -- Get the current config command without params
				$conf_command = Configuration::conf_command( $command );

				// -- Check if the provided command is an actual valid command
				if( Configuration::conf_command_valid( $conf_command ) ) {

					// -- Check if the config command second param was provided
					if( Configuration::conf_item_isset( $command ) ) {
						
						// -- Config command switch board
						switch( $conf_command ) {
							case 'app_name':
								Configuration::app_name( $command );
							break;

							case 'default_controller':
								Configuration::default_controller( $command );
							break;

							case 'default_view':
								Configuration::default_view( $command );
							break;

							case 'layout':
								Configuration::layout( $command );
							break;

							case 'mobile_layout':
								Configuration::mobile_layout( $command );
							break;

							case 'debugging':
								Configuration::debugging( $command );
							break;

							case 'logging':
								Configuration::logging( $command );
							break;

							case 'logs_path':
								Configuration::logs_path( $command );
							break;

							case 'logs_access':
								Configuration::logs_access( $command );
							break;

							case 'logs_ext':
								Configuration::logs_ext( $command );
							break;

							case 'fetch_type':
								Configuration::fetch_type( $command );
							break;

							case 'session_enable':
								Configuration::session_enable( $command );
							break;

							case 'session_name':
								Configuration::session_name( $command );
							break;

							case 'session_timeout':
								Configuration::session_timeout( $command );
							break;

							case 'encryption_type':
								Configuration::encryption_type( $command );
							break;

							case 'encryption_key':
								Configuration::encryption_key( $command );
							break;

							case 'assets_path':
								Configuration::assets_path( $command );
							break;			
						}

					} else {

						if( $conf_command == 'help' ) {
							Configuration::help();
						} else {
							print "Configuration command " . Format::command_style( $conf_command ) . " needs a second parameter to continue.\n";
							print 'Example: ' . Format::command_style( 'configuration debugging 1' ) . "\n";
						}

					}

				} else {
					print 'Command ' . Format::command_style( $conf_command ) . " is not a valid configuration command.\n";
				}

			} else {
				print "Configuration command is missing 2 parameters.\n";
				print 'Example: ' . Format::command_style( 'configuration debugging 1' ) . "\n";
			}
		} else {
			print "Configuration file does not exist.\n";
		}
	}

}
