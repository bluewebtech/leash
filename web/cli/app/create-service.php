<?php

class CreateService {

	public static $outfix = 'Service';

	/**
     * Checks whether the service name param was provided
     *
     * return boolean
     * 
     * @param array command
    */
	public static function service_name_isset( $command ) {
		if( array_key_exists( 1, $command ) ) {
			return true;
		} else {
			return false;
		}
	}

	/**
     * Return service name if service name param was provided
     *
     * return string
     * 
     * @param string command
    */
	public static function service_name( $command ) {
		if( CreateService::service_name_isset( $command ) ) {
			return Format::clean( $command[ 1 ] );
		} else {
			return false;
		}
	}

	/**
     * Return service file name with default file extension
     *
     * return string
    */
	public static function service_file_ext( $name ) {
		return $name . EXT_PHP;
	}

	/**
     * Return service name with the first letter uppercased
     *
     * return string
     * 
     * @param string name
    */
	public static function service_class_name( $name ) {
		return ucfirst( $name ) . CreateService::$outfix;
	}

	/**
     * Return the complete path to the services directory
     *
     * return string
    */
	public static function service_default_directory() {
		$service_path = str_replace( CD . DS . APP . DS, '', SERVICES_PATH );
		$path = str_replace( DS . WEB . DS . CLI . DS . APP, DS . APP . DS, __DIR__ );
		return str_replace( '/', DS, $path ) . str_replace( '/', DS, $service_path );
	}

	/**
     * Return the complete service path with file name
     *
     * return string
     * 
     * @param string name
    */
	public static function service_file_path( $name ) {
		return CreateService::service_default_directory() . $name;
	}

	/**
     * Check if service file exists
     *
     * return boolean
     * 
     * @param string file
    */
	public static function service_file_exists( $file ) {
		return file_exists( $file );
	}

	/**
     * Return service file contents
     *
     * return string
     * 
     * @param string class
    */
	public static function service_file_contents( $class ) {
		$content = <<<SERVICE
<?php

class $class {

}
SERVICE;
		return $content;
	}

	/**
     * Generate service file and populate with contents
     *
     * return boolean
     * 
     * @param string file
     * @param string contents
    */
	public static function service_make( $file, $contents ) {
		$f = fopen( $file, 'w' );
		chmod( $file, 0777 );
		fwrite( $f, $contents );
		return fclose( $f );
	}

	public static function main( $command ) {
		// -- Check if a service name was provided
		if( CreateService::service_name_isset( $command ) ) {

			// -- Service variable definitions
			$service_name              = CreateService::service_name( $command );
			$service_class_name        = CreateService::service_class_name( $service_name );
			$service_default_directory = CreateService::service_default_directory();
			$service_file_ext          = CreateService::service_file_ext( $service_name );
			$service_file_path         = CreateService::service_file_path( $service_file_ext );
			$service_file_contents     = CreateService::service_file_contents( $service_class_name );

			// -- Check if service already exists
			if( CreateService::service_file_exists( $service_file_path ) ) {
				print 'Service ' . Format::command_style( $service_name ) . " already exists.\n";
			} else {

				// -- DEBUGGING START
				/*
				print $service_name . "\n";
				print $service_class_name . "\n";
				print $service_default_directory . "\n";
				print $service_file_ext . "\n";
				print $service_file_path . "\n";
				print $service_file_contents . "\n";
				*/
				// -- DEBUGGING END

				// -- Generate the new service file
				CreateService::service_make( $service_file_path, $service_file_contents );

				print 'Service ' . Format::command_style( $service_name ) . " created successfully.\n";
			}

		} else {
			print Format::error_style( 'Please provided a name for your new service.' ) . "\n";
			print 'Example: ' . Format::command_style( 'create-service zombie' ) . "\n";
		}
	}

}
