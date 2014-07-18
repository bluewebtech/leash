<?php

/* 
 * This leash.php file is the heart of the entire framework. Anything and 
 * everything that happens in this framework is dependant on this file. If 
 * this leash.php file is removed, renamed or relocated, nothing will work. 
 * 
 * Once this leash.php file is loaded, a few checks for other necessary files 
 * are completed below. If any of the necessary files are missing an error 
 * will be displayed on the screen notifying of the current issue and what 
 * file is actually missing or causing problems.
 */

// -- Make sure /app/conf/config.php exists before trying to do anything else.
// -- The config.php file contains all main application configuration settings.
try {

	if( file_exists( CONF ) ) {
		require CONF;
	} else {
		throw new Exception( 'Configuration file missing in ' . CONF );
	}

} catch( Exception $e ) {
	echo $e->getMessage();
	exit;
}


// -- Make sure /leash/constants.php exists before trying to do anything else.
// -- The constants.php file contains all application constants.
try {

	if( file_exists( CD . DS . SYSTEM . DS . 'constants' . SYSTEM_EXT ) ) {
		require 'constants' . SYSTEM_EXT;
	} else {
		throw new Exception( 'Constants file (constants' . SYSTEM_EXT . ') missing in ' . DS . SYSTEM . DS );
	}

} catch( Exception $e ) {
	echo $e->getMessage();
	exit;
}

// -- Make sure /leash/classes.php exists before trying to do anything else.
// -- The classes.php file is the central location point where all framework class files are called.
try {

	if( file_exists( CD . DS . SYSTEM . DS . 'classes' . SYSTEM_EXT ) ) {
		require 'classes' . SYSTEM_EXT;
	} else {
		throw new Exception( 'Classes file (classes' . SYSTEM_EXT . ') missing in ' . DS . SYSTEM . DS );
	}

} catch( Exception $e ) {
	echo $e->getMessage();
	exit;
}

// -- Check if documentation folder exists and load up the framework documentation
if( Controller::controller_filename() == 'docs' && is_dir( DOCS_ROOT ) ) {
	require DOCS_ROOT . 'index' . SYSTEM_EXT;
	exit;
}

// -- Check if cli folder exists and load up the framework cli
if( Controller::controller_filename() == 'cli' && is_dir( CLI_ROOT ) ) {
	require CLI_ROOT . 'index' . SYSTEM_EXT;
	exit;
}

// -- Run all global app start functions
// -- Check if user has an app.php file living in the web root
if( Application::application_file_exists() ) {

	// -- Append the app.php file once
	require Application::application_filename_ext();

	// -- Check if the App class was defined in the app.php file
	if( Application::application_class_exists() ) {
		Application::on_start();
	}

}

//require CD . DS . 'vendor' . DS . 'autoload' . SYSTEM_EXT;

// -- Core datasource configuration global
$GLOBALS[ 'datasource' ] = $datasource;

// -- Core global collection function
Globals::all();

// -- Core plugins loader function
Plugins::get();

// -- Handle the session timeout
Session::sessions();

Tags::tag_val();

// -- Call the framework core logging function
Logging::log();

// -- Include the layout and custom tags if the request is not ajax
if( !Request::is_ajax() ) {

	// -- Check whether the mobile layout should be loaded or the default layout
	if( MOBILE_ENABLE && Mobile::is_mobile() ) {
		$tags = new Tags( LAYOUTS_PATH . MOBILE_LAYOUT . EXT_PHP );
	} else {
		$tags = new Tags( LAYOUTS_PATH . LAYOUT . EXT_PHP );
	}

	if( Unit::is_unit_test() ) {
		Unit::unit_test();
	} else {

		// -- Set pre-defined tags
		$tags->set( 'assets', ASSETS_PATH );
		$tags->set( 'body', Loader::request( $tags ) );
		
		if( isset( $GLOBALS[ 'meta_description' ] ) ) {
			$tags->set( 'description', $GLOBALS[ 'meta_description' ] );
		} else {
			$tags->set( 'description', '' );
		}

		if( isset( $GLOBALS[ 'meta_keywords' ] ) ) {
			$tags->set( 'keywords', $GLOBALS[ 'meta_keywords' ] );
		} else {
			$tags->set( 'keywords', '' );
		}

		// -- Check whether to use the default app name for the page title or a defined title
		if( isset( $GLOBALS[ 'meta_title' ] ) ) {
			$tags->set( 'title', $GLOBALS[ 'meta_title' ] );
		} else {
			$tags->set( 'title', HTML::title( APP_NAME ) );
		}

		// -- Get any custom tags that may be available within the /app/tags/ directory
		$tags->get_tags( $tags );

		// -- Generate and output the application
		echo $tags->output();
	
	}

} else {
	echo Loader::request();
}

// -- Run all global app end functions
// -- Check if user has an app.php file living in the web root
if( Application::application_file_exists() ) {

	// -- Check if the App class was defined in the app.php file
	if( Application::application_class_exists() ) {
		Application::on_end();
	}

}

// -- Call the framework core debugging function
if( DEBUGGING ) { echo Debugging::debug(); }
