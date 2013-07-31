<?php

class Logging {

	/**
	 * Build the complete path to the logs directory where all Leash logs will be stored
	 * 
	 * return string
	*/
	public static function path() {
		return CD . DS . APP . DS . LOGS_PATH . DS;
	}

	/**
	 * Return the ip address of the current remote page request
	 * 
	 * return string
	*/
	public static function ipaddress() {
		return $_SERVER[ 'REMOTE_ADDR' ];
	}

	/**
	 * Return the current date
	 * 
	 * return string
	*/
	public static function date() {
		return date( 'Y-m-d' );
	}

	/**
	 * Return the current time
	 * 
	 * return string
	*/
	public static function time() {
		return date( 'h:i:s:A' );
	}

	/** 
	 * Return the page request time string
	 * 
	 * return string
	*/
	public static function request_time() {
		return $_SERVER[ 'REQUEST_TIME' ];
	}

	/**
	 *Return the browser identification string that is currently being used
	 * 
	 * return string
	*/
	public static function browser() {
		return $_SERVER[ 'HTTP_USER_AGENT' ];
	}

	/**
	 * Check if the specified log file has already been created and return a boolean
	 * 
	 * @param string file
	 *
	 * return string
	*/
	public static function exists( $file ) {
		return file_exists( $file );
	}

	/**
	 * Return the total lines of the specified file
	 * 
	 * @param string file
	 * 
	 * return string
	*/
	public static function get_last_line( $file ) {
		return count( file( $file ) );
	}

	/**
	 * Return the next line available for the specified file
	 * 
	 * @param string file
	 *
	 * return string
	*/
	public static function get_next_line( $file ) {
		return count( file( $file ) ) + 1;
	}

	/**
	 * Return the set access log file name
	 * 
	 * return string
	*/
	public static function access_log_filename() {
		return LOGS_ACCESS . LOGS_EXT;
	}

	/**
	 * Return the path and file name of the access log
	 * 
	 * return string
	*/
	public static function access_log_file_path() {
		return Logging::path() . Logging::access_log_filename();
	}

	/**
	 * Create the access log file
	 * 
	 * return string
	*/
	public static function access_log_create() {
		return fopen( Logging::access_log_file_path(), "w" );
	}

	/**
	 * Add the head string to the access log
	 * 
	 * return string
	*/
	public static function access_log_head() {
		$head = '"Id","IPAddress","Date","Time","Execution","Message","Browser"' . "\n";
		return file_put_contents( Logging::access_log_file_path(), $head );
	}

	/**
	 * Return the access log message string
	 * 
	 * return string
	*/
	public static function access_log_message() {
		return $_SERVER[ 'REQUEST_METHOD' ] . ' ' . $_SERVER[ 'REQUEST_URI' ];
	}

	/** 
	 * Populate an access string array and return a double quoted comma delimited string
	 * 
	 * return string
	*/
	public static function access_collection() {
		$access = array(
			'Id'        => Logging::get_last_line( Logging::access_log_file_path() ), 
			'IPAddress' => Logging::ipaddress(), 
			'Date'      => Logging::date(), 
			'Time'      => Logging::time(), 
			'Execution' => Logging::request_time(), 
			'Message'   => Logging::access_log_message(), 
			'Browser'   => Logging::browser()
		);

		return '"' . implode( '","', $access ) . '"' . "\n";
	}

	/** 
	 * Open the access log and add a new log line
	 * 
	 * return string
	*/
	public static function access_new_line() {
		$file = fopen( Logging::access_log_file_path(), 'a' );
		chmod( Logging::access_log_file_path(), 0777 );
		return fwrite( $file,  Logging::access_collection() );
	}

	public static function access_dir_exists() {
		return is_dir( Logging::path() );
	}

	/** 
	 * Execute all access log functionality
	 * 
	 * return void
	*/
	public static function access_log() {
		// -- Check if file exists
		if( Logging::exists( Logging::access_log_file_path() ) ) {

			// -- Add new line to access log
			Logging::access_new_line();

		} else {

			// -- Create access log file
			Logging::access_log_create();

			// -- Add access log head to file
			Logging::access_log_head();

			// -- Add first log to access log
			return Logging::access_new_line();
		}
	}

	/**
	 * Return the set error log file name
	 * 
	 * return string
	*/
	public static function error_log_filename() {
		return LOGS_ERROR . LOGS_EXT;
	}

	/**
	 * Return the path and file name of the error log
	 * 
	 * return string
	*/
	public static function error_log_file_path() {
		return Logging::path() . Logging::error_log_filename();
	}

	/**
	 * Create the error log file
	 * 
	 * return string
	*/
	public static function error_log_create() {
		return fopen( Logging::error_log_file_path(), "w" );
	}

	/** 
	 * Populate an items array with the error message and request information
	 * 
	 * @param string error
	 * @param string code
	 * 
	 * return string
	*/
	public static function error_collection( $error, $code ) {
		$msg = 'IPAddress: ' . Logging::ipaddress() . "\n" . 
		       'Date: ' . Logging::date() . "\n" . 
		       'Time: ' . Logging::time() . "\n" . 
		       'Execution: ' . Logging::request_time() . "\n" . 
		       'Message: ' . Logging::access_log_message(). "\n" . 
		       'Browser: ' . Logging::browser() . "\n" . 
		       'Error: ' . $error ."\n\n";

		return $msg;
	}

	/** 
	 * Open the error log and add a new log line
	 * 
	 * return string
	*/
	public static function error_new_line( $error, $code ) {
		$file = fopen( Logging::error_log_file_path(), 'a' );
		chmod( Logging::error_log_file_path(), 0777 );
		return fwrite( $file,  Logging::error_collection( $error, $code ) );
	}

	/** 
	 * Execute all error log functionality
	 * The error_log method is executed within the Error::message()
	 * 
	 * return boolean
	*/
	public static function error_log( $error, $code ) {
		// -- Check if file exists
		if( Logging::exists( Logging::error_log_file_path() ) ) {

			// -- Add new line to access log
			Logging::error_new_line( $error, $code );

		} else {

			// -- Create access log file
			Logging::error_log_create();

			// -- Add first log to access log
			return Logging::error_new_line( $error, $code );
		}
	}

	/** 
	 * Create the log directory
	 * 
	 * return boolean
	*/
	public static function logging_make_dir() {
		if( Logging::access_dir_exists() ) {
			return true;
		} else {
			mkdir( Logging::path() );
			chmod( Logging::path(), 0777 );
			return false;
		}
	}

	/**
	 * Execute all logging functionality
	 * 
	 * return string
	*/
	public static function log() {
		try {

			// -- Make sure a log path is defined in the configuration
			if( LOGS_PATH ) {

				// -- Check if logging is enabled
				if( LOGGING ) {

					// -- Make log directory
					Logging::logging_make_dir();

					return Logging::access_log();
				}
				
			} else {
				throw new Exception( 'Log path not set in ' . DS . APP . DS . 'config.php' );
			}

		} catch( Exception $e ) {
			Error::message( $e, 500 );
		}
	}

}
