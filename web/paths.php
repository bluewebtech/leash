<?php 

// -- Directory separator for cross-platform compatibility
define( 'DS', DIRECTORY_SEPARATOR );

// -- Change directory
define( 'CD', '..' );

// -- Absolute path to current directory
define( 'DIR', __DIR__ );

// -- Application directory
// -- You can change the name of the application directory to whatever you want. Just 
// ---- be sure to rename the actual directory itself or things will break.
define( 'APP', 'app' );

// -- System directory
// -- You can change the name of the system directory to whatever you want. Just 
// ---- be sure to rename the actual directory itself or things will break.
define( 'SYSTEM', 'leash' );

// -- Web root directory
// -- You can change the name of the web directory to whatever you want. Just 
// ---- be sure to rename the actual directory itself and update the host path.
define( 'WEB', 'web' );

// -- Temp directory
// -- You can change the name of the temp directory to whatever you want. Just 
// ---- be sure to rename the actual directory itself or things will break.
define( 'TEMP', 'temp' );

// -- Application main configuration path
define( 'CONF', CD . DS . APP . DS . 'conf' . DS . 'config' . SYSTEM_EXT );

// -- Collection of path constant names
$constant_paths = array(
	'DS', 
	'CD', 
	'DIR', 
	'APP', 
	'SYSTEM', 
	'WEB', 
	'CONF'
);

// -- Check if all required constant paths exist before continuing
try {

	foreach( $constant_paths as $key => $value ) {
		if( !defined( $value ) ) {
			throw new Exception( 'Directory property (' . $value . ') does not exist.' );
		}
	}

} catch( Exception $e ) {
	echo $e->getMessage();
	exit;
}

// Build path for framework main
if( ( $pos = strrpos( DIR , WEB ) ) !== false ) {
	$main = substr_replace( DIR , SYSTEM , $pos , strlen( WEB ) ) . DS . 'leash' . SYSTEM_EXT;
}

// -- Make sure the main.php application file exists before continuing
try {

	if( !file_exists( $main ) ) {
		throw new Exception( 'Main application file (leash' . SYSTEM_EXT . ') does not exist.' );
	}

} catch( Exception $e ) {
	echo $e->getMessage();
	exit;
}
