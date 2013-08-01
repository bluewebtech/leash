<?php

// -- Collection of constant names
$contant_names = array(
	'APP_NAME', 
	'DEFAULT_CONTROLLER', 
	'DEFAULT_VIEW', 
	'LAYOUT', 
	'MOBILE_ENABLE', 
	'MOBILE_LAYOUT', 
	'DEBUGGING', 
	'LOGGING', 
	'LOGS_PATH', 
	'LOGS_ACCESS', 
	'LOGS_ERROR', 
	'LOGS_EXT', 
	'DB_FETCH_TYPE', 
	'DB_POOLING', 
	'DB_CONNECTOR_TYPES', 
	'SESSION_ENABLE', 
	'SESSION_NAME', 
	'SESSION_TIMEOUT', 
	'ENCRYPTION_TYPE', 
	'ENCRYPTION_KEY', 
	'XSS_PROTECT', 
	'CSRF_PROTECT', 
	'CSRF_TOKEN_NAME', 
	'CSRF_KEY', 
	'ASSETS_PATH', 
	'EXT_PHP', 
	'TIME_ZONE'
);

// -- Check if all required constant names exist before continuing
try {

	foreach( $contant_names as $key => $value ) {
		if( !array_key_exists( $value, $config) ) {
			throw new Exception( 'Configuration property (' . $value . ') does not exist.' );
		}
	}

} catch( Exception $e ) {
	echo $e->getMessage();
	exit;
}

// -- Define all constants
define( 'APP_NAME',           $config[ 'APP_NAME' ] );
define( 'DEFAULT_CONTROLLER', $config[ 'DEFAULT_CONTROLLER' ] );
define( 'DEFAULT_VIEW',       $config[ 'DEFAULT_VIEW' ] );
define( 'LAYOUT',             $config[ 'LAYOUT' ] );
define( 'MOBILE_ENABLE',      $config[ 'MOBILE_ENABLE' ] );
define( 'MOBILE_LAYOUT',      $config[ 'MOBILE_LAYOUT' ] );
define( 'DEBUGGING',          $config[ 'DEBUGGING' ] );
define( 'LOGGING',            $config[ 'LOGGING' ] );
define( 'LOGS_PATH',          $config[ 'LOGS_PATH' ] );
define( 'LOGS_ACCESS',        $config[ 'LOGS_ACCESS' ] );
define( 'LOGS_ERROR',         $config[ 'LOGS_ERROR' ] );
define( 'LOGS_EXT',           $config[ 'LOGS_EXT' ] );
define( 'DB_FETCH_TYPE',      $config[ 'DB_FETCH_TYPE' ] );
define( 'DB_POOLING',         $config[ 'DB_POOLING' ] );
define( 'DB_CONNECTOR_TYPES', $config[ 'DB_CONNECTOR_TYPES' ] );
define( 'SESSION_ENABLE',     $config[ 'SESSION_ENABLE' ] );
define( 'SESSION_NAME',       $config[ 'SESSION_NAME' ] );
define( 'SESSION_TIMEOUT',    $config[ 'SESSION_TIMEOUT' ] );
define( 'ENCRYPTION_TYPE',    $config[ 'ENCRYPTION_TYPE' ] );
define( 'ENCRYPTION_KEY',     $config[ 'ENCRYPTION_KEY' ] );
define( 'XSS_PROTECT',        $config[ 'XSS_PROTECT' ] );
define( 'CSRF_PROTECT',       $config[ 'CSRF_PROTECT' ] );
define( 'CSRF_TOKEN_NAME',    $config[ 'CSRF_TOKEN_NAME' ] );
define( 'CSRF_KEY',           $config[ 'CSRF_KEY' ] );
define( 'ASSETS_PATH',        $config[ 'ASSETS_PATH' ] );
define( 'WEB_ROOT',           WEB );
define( 'TEMP_ROOT',          'temp' );
define( 'APP_ROOT',           CD . DS . APP . DS );
define( 'CONF_PATH',          APP_ROOT . 'conf' . DS );
define( 'CONTROLLERS_PATH',   'controllers'  .DS );
define( 'VIEWS_PATH',         APP_ROOT . 'views' . DS );
define( 'MODELS_PATH',        APP_ROOT . 'models' . DS );
define( 'LAYOUTS_PATH',       APP_ROOT . 'views' . DS . 'layouts' . DS );
define( 'SERVICES_PATH',      APP_ROOT . 'services' . DS );
define( 'SYSTEM_PATH',        CD . DS . SYSTEM . DS );
define( 'PLUGINS_PATH',       APP_ROOT . 'plugins' . DS );
define( 'TAGS_PATH',          APP_ROOT . 'tags' . DS );
define( 'DOCS_ROOT',          'docs' . DS );
define( 'CLI_ROOT',           CD . DS . 'cli' . DS );
define( 'EXT_PHP',            $config[ 'EXT_PHP' ] );
define( 'TIME_ZONE',          $config[ 'TIME_ZONE' ] );

date_default_timezone_set( TIME_ZONE );
