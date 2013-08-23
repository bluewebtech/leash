<?php

// -- Class file path definitions
$class_files = array(
	CONF_PATH . 'datasource' . SYSTEM_EXT, 
	CONF_PATH . 'mail' . SYSTEM_EXT, 
	CONF_PATH . 'routes' . SYSTEM_EXT, 
	SYSTEM_PATH . 'annotation' . SYSTEM_EXT, 
	SYSTEM_PATH . 'application' . SYSTEM_EXT,
	SYSTEM_PATH . 'cache' . DS . 'apc' . SYSTEM_EXT, 
	SYSTEM_PATH . 'cache' . DS . 'memcached' . SYSTEM_EXT, 
	SYSTEM_PATH . 'cache' . SYSTEM_EXT,  
	SYSTEM_PATH . 'controller' . SYSTEM_EXT, 
	SYSTEM_PATH . 'database' . SYSTEM_EXT, 
	SYSTEM_PATH . 'debugging' . SYSTEM_EXT, 
	SYSTEM_PATH . 'environment' . SYSTEM_EXT, 
	SYSTEM_PATH . 'error' . SYSTEM_EXT, 
	SYSTEM_PATH . 'connectors' . DS . 'mongodb' . SYSTEM_EXT, 
	SYSTEM_PATH . 'connectors' . DS . 'mysql' . SYSTEM_EXT, 
	SYSTEM_PATH . 'connectors' . DS . 'postgresql' . SYSTEM_EXT, 
	SYSTEM_PATH . 'connectors' . DS . 'sqlite' . SYSTEM_EXT, 
	SYSTEM_PATH . 'connectors' . DS . 'sqlsrv' . SYSTEM_EXT, 
	SYSTEM_PATH . 'file' . SYSTEM_EXT, 
	SYSTEM_PATH . 'form' . SYSTEM_EXT, 
	SYSTEM_PATH . 'globals' . SYSTEM_EXT, 
	SYSTEM_PATH . 'html' . SYSTEM_EXT, 
	SYSTEM_PATH . 'loader' . SYSTEM_EXT, 
	SYSTEM_PATH . 'logging' . SYSTEM_EXT, 
	SYSTEM_PATH . 'mobile' . SYSTEM_EXT, 
	SYSTEM_PATH . 'model' . SYSTEM_EXT, 
	SYSTEM_PATH . 'orm' . SYSTEM_EXT, 
	SYSTEM_PATH . 'plugins' . SYSTEM_EXT, 
	SYSTEM_PATH . 'route' . SYSTEM_EXT, 
	SYSTEM_PATH . 'request' . SYSTEM_EXT, 
	SYSTEM_PATH . 'response' . SYSTEM_EXT, 
	SYSTEM_PATH . 'security' . SYSTEM_EXT, 
	SYSTEM_PATH . 'service' . SYSTEM_EXT, 
	SYSTEM_PATH . 'session' . SYSTEM_EXT, 
	SYSTEM_PATH . 'string' . SYSTEM_EXT, 
	SYSTEM_PATH . 'system' . SYSTEM_EXT, 
	SYSTEM_PATH . 'tag' . SYSTEM_EXT, 
	SYSTEM_PATH . 'unit' . SYSTEM_EXT, 
	SYSTEM_PATH . 'url' . SYSTEM_EXT, 
	SYSTEM_PATH . 'view' . SYSTEM_EXT, 
	SYSTEM_PATH . 'xml' . SYSTEM_EXT, 
	SYSTEM_PATH . 'alias' . SYSTEM_EXT
);

// -- Loop through all class files making sure that they all exist before loading them.
try {

	foreach( $class_files as $key => $value ) {
		if( in_array( $value, $class_files ) && file_exists( $value ) ) {
			require $value;
		} else {
			throw new Exception( 'Class file (' . $value . ') does not exist.' );
		}
	}

} catch( Exception $e ) {
	echo $e->getMessage();
	exit;
}
