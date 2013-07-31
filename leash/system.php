<?php

class System {

	/**
     * Lists all app files
     *
     * return void
    */
	public static function list_all() {
		$dir     = scandir( APP_ROOT . CONTROLLERS_PATH );
		$files   = array();
		$content = '';

		foreach ( $dir as $key => $value ) {

			if( $value != '.' && $value != CD ) {
				array_push( $files, $value );
			}

		}

		$content .= "<ul>\n";

		foreach ( $files as $key => $value ) {
			
			if( $value != '.' && $value != CD ) {
				
				$controller = str_replace( EXT_PHP, '', $value );
				$class      = ucfirst( str_replace( EXT_PHP, '', $value ) );
				$content   .= "\t<li>\n";
				$content   .= "\t\t" . '<a href="' . '/' . $controller . '">' . $class . "Controller</a>\n";
				$content   .= "\t</li>\n";
				$view_dir   = scandir( APP_ROOT . VIEWS_PATH . $controller );
				$view_files = array();

				foreach( $view_dir as $view_key => $view_value) {

					$content .= "\t<ul>\n";

					if( $view_value != '.' && $view_value != CD ) {
						$view     = str_replace( EXT_PHP, '', $view_value );
						$content .= "\t<li>\n";
						$content .= "\t\t" . '<a href="' . '/' .$controller . '/' . $view . '">' . $view_value . "</a>\n";
						$content .= "\t</li>\n";
					}

					$content .= "\t</ul>\n";

				}
				
			}

		}

		$content .= "</ul>\n";

		return $content;
	}

	/**
     * Lists all available controllers
     *
     * return string
    */
	public static function list_controllers() {
		$dir     = scandir( APP_ROOT . CONTROLLERS_PATH );
		$files   = array();
		$content = '';

		foreach ( $dir as $key => $value ) {

			if( $value != '.' && $value != CD ) {
				array_push( $files, $value );
			}

		}

		if( count( $files ) > 0 ) {

			$content .= "<h2>Controllers</h2>\n";
			$content .= "<ul>\n";

			foreach ( $files as $key => $value ) {

				if( $value != '.' && $value != CD ) {
					$controller = str_replace( EXT_PHP, '', $value );
					$class      = ucfirst( str_replace( EXT_PHP, '', $value ) );
					$content .= "\t<li>\n";
					$content .= "\t\t" . '<a href="/' . $controller . '/">' . $class . "Controller</a>\n";
					$content .= "\t</li>\n";
				}

			}

			$content .= "</ul>\n";
		}

		return $content;
	}

	/**
     * Lists all available plugins
     *
     * return void
    */
	public static function list_models() {
		$dir     = scandir( APP_ROOT . MODELS_PATH );
		$files   = array();
		$content = '';

		foreach ( $dir as $key => $value ) {

			if( $value != '.' && $value != CD ) {
				array_push( $files, $value );
			}

		}

		if( count( $files ) > 0 ) {

			$content .= "<h2>Models</h2>\n";
			$content .= "<ul>\n";

			foreach ( $files as $key => $value ) {

				if( $value != '.' && $value != CD ) {
					$plugin   = str_replace( EXT_PHP, '', $value );
					$class    = ucfirst( str_replace( EXT_PHP, '', $value ) );
					$content .= "\t<li>\n";
					$content .= "\t\t" . $class . "\n";
					$content .= "\t</li>\n";
				}

			}

			$content .= "</ul>\n";
		}

		return $content;
	}

	/**
     * Lists all available plugins
     *
     * return void
    */
	public static function list_plugins() {
		$dir     = scandir( APP_ROOT . PLUGINS_PATH );
		$files   = array();
		$content = '';

		foreach ( $dir as $key => $value ) {

			if( $value != '.' && $value != CD ) {
				array_push( $files, $value );
			}

		}

		if( count( $files ) > 0 ) {

			$content .= "<h2>Plugins</h2>\n";
			$content .= "<ul>\n";

			foreach ( $files as $key => $value ) {

				if( $value != '.' && $value != CD ) {
					$plugin   = str_replace( EXT_PHP, '', $value );
					$class    = ucfirst( str_replace( EXT_PHP, '', $value ) );
					$content .= "\t<li>\n";
					$content .= "\t\t" . $class . "\n";
					$content .= "\t</li>\n";
				}

			}

			$content .= "</ul>\n";
		}

		return $content;
	}

	/**
     * Lists all available controllers
     *
     * return void
    */
	public static function list_services() {
		$dir     = scandir( APP_ROOT . SERVICES_PATH );
		$files   = array();
		$content = '';

		foreach ( $dir as $key => $value ) {

			if( $value != '.' && $value != CD ) {
				array_push( $files, $value );
			}

		}

		if( count( $files ) > 0 ) {

			$content .= "<h2>Services</h2>\n";
			$content .= "<ul>\n";

			foreach ( $files as $key => $value ) {

				if( $value != '.' && $value != CD ) {
					$service  = str_replace( EXT_PHP, '', $value );
					$class    = ucfirst( str_replace( EXT_PHP, '', $value ) );
					$content .= "\t<li>\n";
					$content .= "\t\t" . $class . "Service\n";
					$content .= "\t</li>\n";
				}

			}

			$content .= "</ul>\n";
		}

		return $content;
	}

	/**
     * Lists all available tags
     *
     * return void
    */
	public static function list_tags() {
		$dir     = scandir( APP_ROOT . TAGS_PATH );
		$files   = array();
		$content = '';

		foreach ( $dir as $key => $value ) {

			if( $value != '.' && $value != '..' ) {
				array_push( $files, $value );
			}

		}

		if( count( $files ) > 0 ) {

			$content .= "<h2>Tags</h2>\n";
			$content .= "<ul>\n";

			foreach ( $files as $key => $value ) {

				if( $value != '.' && $value != CD ) {
					$plugin   = str_replace( EXT_PHP, '', $value );
					$class    = ucfirst( str_replace( EXT_PHP, '', $value ) );
					$content .= "\t<li>\n";
					$content .= "\t\t" . $class . "\n";
					$content .= "\t</li>\n";
				}

			}

			$content .= "</ul>\n";
		}

		return $content;
	}

	/**
     * Populates an array containing all files specific to the given param path
     * 
     * return array
	 * 
     * @param string dir
    */
	public static function get_files( $dir ) {
	    if( $dh = opendir( $dir ) ) {

	        $files = array();
	        $inner = array();

	        while( $file = readdir( $dh ) ) {

	            if( $file != '.' && $file != CD && $file[ 0 ] != '.' ) {
	                
	                if( is_dir( $dir . '/' . $file ) ) {
	                    $inner = System::get_files( $dir . '/' . $file );
	                    if( is_array( $inner ) ) $files = array_merge( $files, $inner ); 
	                } else {
	                    array_push( $files, $dir . '/' . $file );
	                }

	            }

	        }

	        closedir( $dh );

	        return $files;
	    }
	}

	/**
     * Returns the total lines in all files that reside in the given param path
     * 
     * return string
     * 
     * @param string dir
    */
	public static function count_lines( $dir ) {
		$count = array();

		foreach( System::get_files( $dir ) as $key=>$file ){
			$count[] = count( file( $file ) );
		}

		return array_sum( $count );
	}

	/**
     * Returns the total lines in all files that reside in the /web/ directory
     *
     * return string
    */
	public static function web_line_count() {
		return System::count_lines( DIR );
	}

	/**
     * Returns the total lines in all files that reside in the /app/ directory
     *
     * return string
    */
	public static function app_line_count() {
		return System::count_lines( APP_ROOT );
	}

	/**
     * Returns the total lines in all files that reside in the /leash/ directory
     *
     * return string
    */
	public static function system_line_count() {
		return System::count_lines( SYSTEM_PATH );
	}

	/**
     * Returns the total lines in all files that reside in the / directory
     *
     * return string
    */
	public static function total_line_count() {
		if( ( $pos = strrpos( DIR , WEB ) ) !== false ) {
			return System::count_lines( substr_replace( DIR , '' , $pos , strlen( WEB ) ) );
		}
	}

}
