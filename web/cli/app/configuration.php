<?php

class Configuration {

	public static function conf_command_items() {
		return array(
			'app-name', 
			'assets-path', 
			'csrf-protect', 
			'csrf-token-name', 
			'csrf-key', 
			'db-pooling', 
			'default-controller', 
			'default-view', 
			'encryption-key', 
			'encryption-type', 
			'fetch-type', 
			'help', 
			'layout', 
			'mobile-layout', 
			'mobile-enable', 
			'debugging', 
			'logging', 
			'logs-path', 
			'logs-access', 
			'logs-error', 
			'logs-ext', 
			'session-enable', 
			'session-name', 
			'session-timeout', 
			'xss-protect', 
			'?' 
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
		$conf_path = str_replace( CD . DS . APP . DS, '', CONF_PATH );
		$path = str_replace( DS . WEB . DS . CLI . DS . APP, DS . APP . DS, __DIR__ );
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

		print "app-name command executed\n";
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

		print "default-controller command executed\n";
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

		print "default-view command executed\n";
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

	// -- MOBILE_ENABLE
	public static function mobile_enable( $command ) {
		$conf  = Configuration::conf_file_array();
		$lines = array();
		$comm  = $command[ 2 ];		

		if( Configuration::conf_param_is_boolean( $command ) ) {

			// -- Loop through the contents of the configuration file.
			foreach( $conf as $key => $value ) {

				// -- Check for MOBILE_ENABLE value during the configuration array loop
				if( substr_count( $value, "'MOBILE_ENABLE'" ) > 0 ) {
					// -- Update MOBILE_ENABLE line with the provided 3rd param in new array
					array_push( $lines, "\t'MOBILE_ENABLE'      => " . $comm . ", " . "\n" );
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

			print "mobile-enable command executed\n";
		} else {
			print "mobile-enable command value must be a boolean: 1/0 or true/false\n";
		}
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

		print "mobile-layout command executed\n";
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
		$conf      = Configuration::conf_file_array();
		$lines     = array();
		$comm      = Format::clean( $command[ 2 ] );
		$logs_path = str_replace( CD . DS . APP . DS, '', LOGS_PATH ) . '\\';
		$path      = str_replace( DS . WEB . DS . CLI . DS . APP, DS . APP . DS, __DIR__ );
		$old       = str_replace( '/', '\\', $path ) . str_replace( '/', '\\', $logs_path );
		$new       = str_replace( '/', '\\', $path ) . str_replace( '/', '\\', $comm );

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

			print "logs-path command executed\n";

		} else {
			print "Cannot update logs path.\n";
		}
	}

	// -- LOGS_ACCESS
	public static function logs_access( $command ) {
		$conf      = Configuration::conf_file_array();
		$lines     = array();
		$comm      = Format::clean( $command[ 2 ] );
		$logs_path = str_replace( CD . DS . APP . DS, '', LOGS_PATH ) . '\\';
		$path      = str_replace( DS . WEB . DS . CLI . DS . APP, DS . APP . DS, __DIR__ );
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

			print "logs-access command executed\n";

		} else {
			print "Cannot update access log name.\n";
		}
	}

	// -- LOGS_ERROR
	public static function logs_error( $command ) {
		$conf      = Configuration::conf_file_array();
		$lines     = array();
		$comm      = Format::clean( $command[ 2 ] );
		$logs_path = str_replace( CD . DS . APP . DS, '', LOGS_PATH ) . '\\';
		$path      = str_replace( DS . WEB . DS . CLI . DS . APP, DS . APP . DS, __DIR__ );
		$old       = str_replace( '/', '\\', $path ) . str_replace( '/', '\\', $logs_path ) . LOGS_ERROR . LOGS_EXT;
		$new       = str_replace( '/', '\\', $path ) . str_replace( '/', '\\', $logs_path ) . $comm . LOGS_EXT;

		// -- Make sure logs directory even exists
		if( file_exists( $old ) ) {

			// -- Loop through the contents of the configuration file.
			foreach( $conf as $key => $value ) {

				// -- Check for LOGS_ERROR value during the configuration array loop
				if( substr_count( $value, "'LOGS_ERROR'" ) > 0 ) {
					// -- Update LOGS_ERROR line with the provided 3rd param in new array
					array_push( $lines, "\t'LOGS_ERROR'         => '" . $comm . "', " . "\n" );
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

			print "logs-access command executed\n";

		} else {
			print "Cannot update access log name.\n";
		}
	}

	// -- LOGS_EXT
	public static function logs_ext( $command ) {
		$conf      = Configuration::conf_file_array();
		$lines     = array();
		$comm      = Format::clean( $command[ 2 ] );
		$logs_path = str_replace( CD . DS . APP . DS, '', LOGS_PATH ) . '\\';
		$path      = str_replace( DS . WEB . DS . CLI . DS . APP, DS . APP . DS, __DIR__ ) . $logs_path;
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

		print "logs-ext command executed\n";
	}

	// -- DB_FETCH_TYPE
	public static function fetch_type( $command ) {
		$conf  = Configuration::conf_file_array();
		$lines = array();
		$comm  = Format::clean( $command[ 2 ] );
		$types = array( 'class', 'array' );

		if( in_array( $command[ 2 ], $types ) ) {

			// -- Convert the $comm array into a string separating all elements with spaces
			// -- Loop through the contents of the configuration file.
			foreach( $conf as $key => $value ) {

				// -- Check for DB_FETCH_TYPE value during the configuration array loop
				if( substr_count( $value, "'DB_FETCH_TYPE'" ) > 0 ) {
					// -- Update DB_FETCH_TYPE line with the provided 3rd param in new array
					array_push( $lines, "\t'DB_FETCH_TYPE'      => '" . $comm . "', " . "\n" );
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

			print "fetch-type command executed\n";

		} else {
			print "The provided fetch type is not a valid value.\n";
		}
	}

	// -- DB_POOLING
	public static function db_pooling( $command ) {
		$conf  = Configuration::conf_file_array();
		$lines = array();
		$comm  = $command[ 2 ];		

		if( Configuration::conf_param_is_boolean( $command ) ) {

			// -- Loop through the contents of the configuration file.
			foreach( $conf as $key => $value ) {

				// -- Check for DB_POOLING value during the configuration array loop
				if( substr_count( $value, "'DB_POOLING'" ) > 0 ) {
					// -- Update DB_POOLING line with the provided 3rd param in new array
					array_push( $lines, "\t'DB_POOLING'         => " . $comm . ", " . "\n" );
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

			print "db-pooling command executed\n";
		} else {
			print "db-pooling command value must be a boolean: 1/0 or true/false\n";
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

			print "session-enable command executed\n";

		} else {
			print "session-enable command value must be a boolean: 1/0 or true/false\n";
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

		print "session-name command executed\n";
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

			print "session-timeout command executed\n";

		} else {
			print "The provided value for the session_timeout command must be an integer\n";
		}
	}

	// -- ENCRYPTION_TYPE
	public static function encryption_type( $command ) {
		$conf  = Configuration::conf_file_array();
		$lines = array();
		$comm  = $command[ 2 ];
		$types = array( 
			'adler32', 
			'crc32b', 
			'crc32', 
			'haval128,3', 
			'haval160,3', 
			'haval192,3', 
			'haval224,3', 
			'haval256,3', 
			'haval128,4', 
			'haval160,4v', 
			'haval192,4', 
			'haval224,4', 
			'haval256,4', 
			'md4', 
			'md5', 
			'sha1', 
			'sha384', 
			'sha512', 
			'tiger128,3', 
			'tiger160,3', 
			'tiger192,3', 
			'tiger128,4', 
			'tiger160,4', 
			'tiger192,4' 
		);

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

			print "encryption-type command executed\n";

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

		print "encryption-key command executed\n";
	}

	// -- XSS_PROTECT
	public static function xss_protect( $command ) {
		$conf  = Configuration::conf_file_array();
		$lines = array();
		$comm  = $command[ 2 ];		

		if( Configuration::conf_param_is_boolean( $command ) ) {
			
			// -- Loop through the contents of the configuration file.
			foreach( $conf as $key => $value ) {

				// -- Check for XSS_PROTECT value during the configuration array loop
				if( substr_count( $value, "'XSS_PROTECT'" ) > 0 ) {
					// -- Update XSS_PROTECT line with the provided 3rd param in new array
					array_push( $lines, "\t'XSS_PROTECT'        => " . $comm . ", " . "\n" );
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

			print "xss-protect command executed\n";

		} else {
			print "xss-protect command value must be a boolean: 1/0 or true/false\n";
		}
	}

	// -- CSRF_PROTECT
	public static function csrf_protect( $command ) {
		$conf  = Configuration::conf_file_array();
		$lines = array();
		$comm  = $command[ 2 ];		

		if( Configuration::conf_param_is_boolean( $command ) ) {
			
			// -- Loop through the contents of the configuration file.
			foreach( $conf as $key => $value ) {

				// -- Check for CSRF_PROTECT value during the configuration array loop
				if( substr_count( $value, "'CSRF_PROTECT'" ) > 0 ) {
					// -- Update CSRF_PROTECT line with the provided 3rd param in new array
					array_push( $lines, "\t'CSRF_PROTECT'       => " . $comm . ", " . "\n" );
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

			print "csrf-protect command executed\n";

		} else {
			print "csrf-protect command value must be a boolean: 1/0 or true/false\n";
		}
	}

	// -- CSRF_TOKEN_NAME
	public static function csrf_token_name( $command ) {
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

			// -- Check for CSRF_TOKEN_NAME value during the configuration array loop
			if( substr_count( $value, "'CSRF_TOKEN_NAME'" ) > 0 ) {
				// -- Update CSRF_TOKEN_NAME line with the provided 3rd param in new array
				array_push( $lines, "\t'CSRF_TOKEN_NAME'    => '" . $comm . "', " . "\n" );
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

		print "csrf-token-name command executed\n";
	}

	// -- CSRF_KEY
	public static function csrf_key( $command ) {
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

			// -- Check for CSRF_KEY value during the configuration array loop
			if( substr_count( $value, "'CSRF_KEY'" ) > 0 ) {
				// -- Update CSRF_KEY line with the provided 3rd param in new array
				array_push( $lines, "\t'CSRF_KEY'           => '" . $comm . "', " . "\n" );
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

		print "csrf-key command executed\n";
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

		print "assets-path command executed\n";
	}

	public static function help() {
		$help = <<<HELP
The following are available actions for the config command:
<span class="command">app-name</span> : <span class="examples">app-name [string]</span>
<span class="command">assets-path</span> : <span class="examples">assets-path [string]</span>
<span class="command">csrf-protect</span> : <span class="examples">csrf-protect [boolean]</span>
<span class="command">csrf-token-name</span> : <span class="examples">csrf-token-name [string]</span>
<span class="command">csrf-key</span> : <span class="examples">csrf-key [string]</span>
<span class="command">db-pooling</span> : <span class="examples">db-pooling [boolean]</span>
<span class="command">debugging</span> : <span class="examples">debugging [boolean]</span>
<span class="command">default-controller</span> : <span class="examples">default-controller [string]</span>
<span class="command">default-view</span> : <span class="examples">default-view [string]</span>
<span class="command">encryption-type</span> : <span class="examples">encryption-type [string]</span>
<span class="command">encryption-key</span> : <span class="examples">encryption-key [string]</span>
<span class="command">fetch-type</span> : <span class="examples">fetch-type [string (class, array)]</span>
<span class="command">help or ?</span> : <span class="examples">help or ?</span>
<span class="command">layout</span> : <span class="examples">layout [string]</span>
<span class="command">logging</span> : <span class="examples">logging [boolean]</span>
<span class="command">logs-access</span> : <span class="examples">logs-access [string]</span>
<span class="command">logs-error</span> : <span class="examples">logs-error [string]</span>
<span class="command">logs-ext</span> : <span class="examples">logs-ext [string]</span>
<span class="command">logs-path</span> : <span class="examples">logs-path [string]</span>
<span class="command">mobile-enable</span> : <span class="examples">mobile-enable [boolean]</span>
<span class="command">mobile-layout</span> : <span class="examples">mobile-layout [string]</span>
<span class="command">session-enable</span> : <span class="examples">session-enable [boolean]</span>
<span class="command">session-name</span> : <span class="examples">session-name [string]</span>
<span class="command">session-timeout</span> : <span class="examples">session-timeout [int]</span>
<span class="command">xss-protect</span> : <span class="examples">xss-protect [boolean]</span>
HELP;
		print $help . "\n";
	}

	// -- Main
	public static function main( $command ) {
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
							case 'app-name':
								Configuration::app_name( $command );
							break;

							case 'assets-path':
								Configuration::assets_path( $command );
							break;	

							case 'csrf-protect':
								Configuration::csrf_protect( $command );
							break;	

							case 'csrf-token-name':
								Configuration::csrf_token_name( $command );
							break;	

							case 'csrf-key':
								Configuration::csrf_key( $command );
							break;	

							case 'default-controller':
								Configuration::default_controller( $command );
							break;

							case 'default-view':
								Configuration::default_view( $command );
							break;

							case 'debugging':
								Configuration::debugging( $command );
							break;

							case 'encryption-type':
								Configuration::encryption_type( $command );
							break;

							case 'encryption-key':
								Configuration::encryption_key( $command );
							break;

							case 'fetch-type':
								Configuration::fetch_type( $command );
							break;

							case 'db-pooling':
								Configuration::db_pooling( $command );
							break;

							case 'layout':
								Configuration::layout( $command );
							break;

							case 'logging':
								Configuration::logging( $command );
							break;

							case 'logs-path':
								Configuration::logs_path( $command );
							break;

							case 'logs-access':
								Configuration::logs_access( $command );
							break;

							case 'logs-error':
								Configuration::logs_error( $command );
							break;

							case 'logs-ext':
								Configuration::logs_ext( $command );
							break;

							case 'mobile-enable':
								Configuration::mobile_enable( $command );
							break;

							case 'mobile-layout':
								Configuration::mobile_layout( $command );
							break;

							case 'session-enable':
								Configuration::session_enable( $command );
							break;

							case 'session-name':
								Configuration::session_name( $command );
							break;

							case 'session-timeout':
								Configuration::session_timeout( $command );
							break;

							case 'xss-protect':
								Configuration::xss_protect( $command );
							break;
						}

					} else {

						if( $conf_command == 'help' || $conf_command == '?' ) {
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
