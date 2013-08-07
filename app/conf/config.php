<?php

$config = array(

	// -- Application Name
	'APP_NAME'           => 'Leash Framework', 

	// -- General settings
	'DEFAULT_CONTROLLER' => 'index', 
	'DEFAULT_VIEW'       => 'index', 

	// -- Default layout
	'LAYOUT'             => 'main', 

	// -- Mobile settings
	'MOBILE_ENABLE'      => 0, 
	'MOBILE_LAYOUT'      => 'mobile', 

	// -- Enable/disable debugging
	'DEBUGGING'          => 0, 

	// -- PHPUnit path
	'PHPUNIT'            => '', 
	
	// -- Logging settings
	'LOGGING'            => 0, 
	'LOGS_PATH'          => 'logs', 
	'LOGS_ACCESS'        => 'access', 
	'LOGS_ERROR'         => 'error', 
	'LOGS_EXT'           => '.log', 

	// -- Datasource
	'DB_FETCH_TYPE'      => 'class', 
	'DB_POOLING'         => false, 
	'DB_CONNECTOR_TYPES' => 'mariadb, 
							 mongodb, 
							 mysql, 
							 postgresql, 
							 sqlsrv, 
							 sqlite', 

	// -- Session settings
	'SESSION_ENABLE'     => 1, 
	'SESSION_NAME'       => 'app', 
	'SESSION_TIMEOUT'    => 30, 

	// -- Security settings
	'ENCRYPTION_TYPE'    => 'sha512', 
	'ENCRYPTION_KEY'     => '', 
	'XSS_PROTECT'        => 0, 
	'CSRF_PROTECT'       => 0, 
	'CSRF_TOKEN_NAME'    => 'csrf_token', 
	'CSRF_KEY'           => '', 

	// Path to assets
	'ASSETS_PATH'        => '/assets/', 

	// -- Extension settings
	'EXT_PHP'            => '.php', 

	// -- Timezone
	'TIME_ZONE'          => 'America/New_York' 

);
