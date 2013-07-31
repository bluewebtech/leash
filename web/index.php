<?php 

// -- Define the file extension for all system files
define( 'SYSTEM_EXT', '.php' );

// -- Load up the application paths file.
// -- The paths.php file contains the main application path values.
require_once 'paths' . SYSTEM_EXT;

// -- Get the main framework file
require_once $main;
