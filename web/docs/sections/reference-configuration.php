<?php require '../templates/header.php' ?>
<h1>Reference Configuration</h1>
<p>
	The following information describes all configuration settings broken down based on 
	the following configuration files: <a href="#config">config.php</a>, <a href="#datasource">
	datasource.php</a>, and <a href="#mail">mail.php</a>.
</p>
<h2 id="config">Configuration [/app/conf/config.php]</h2>
<p>
	The framework configuration is incredibly easy to manage and make changes to. Once a change 
	has been made to any configuration, it will automatically be set throughout an application 
	without the need to restart the server.
</p>
<table width="98%" cellpadding="0" cellspacing="2" border="0">
	<tr>
		<th>
			SETTING
		</th>
		<th>
			VALUE
		</th>
		<th>
			DEFAULT
		</th>
		<th>
			TYPE
		</th>
		<th>
			DESCRIPTION
		</th>
	</tr>
	<tr>
		<td align="left">
			APP_NAME
		</td>
		<td align="center">
			Framework
		</td>
		<td align="center">
			Framework
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Default application name.
		</td>
	</tr>
	<tr>
		<td align="left">
			DEFAULT_CONTROLLER
		</td>
		<td align="center">
			index
		</td>
		<td align="center">
			index
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Default controller to load.
		</td>
	</tr>
	<tr>
		<td align="left">
			DEFAULT_VIEW
		</td>
		<td align="center">
			index
		</td>
		<td align="center">
			index
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Default view to load.
		</td>
	</tr>
	<tr>
		<td align="left">
			LAYOUT
		</td>
		<td align="center">
			main
		</td>
		<td align="center">
			main
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Default application layout.
		</td>
	</tr>
	<tr>
		<td align="left">
			MOBILE_ENABLE
		</td>
		<td align="center">
			1/0 or true/false
		</td>
		<td align="center">
			0
		</td>
		<td align="center">
			boolean
		</td>
		<td align="left">
			Turns on the mobile layout.
		</td>
	</tr>
	<tr>
		<td align="left">
			MOBILE_LAYOUT
		</td>
		<td align="center">
			mobile
		</td>
		<td align="center">
			mobile
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Default mobile application layout.
		</td>
	</tr>
	<tr>
		<td align="left">
			DEBUGGING
		</td>
		<td align="center">
			1/0 or true/false
		</td>
		<td align="center">
			0
		</td>
		<td align="center">
			boolean
		</td>
		<td align="left">
			Turns on debugging if true and off if false.
		</td>
	</tr>
	<tr>
		<td align="left">
			PHPUNIT
		</td>
		<td align="center">
			&lt;path-to-phpunit-binary&gt;
		</td>
		<td align="center">
			[blank]
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Enables the use of PHPUnit.
		</td>
	</tr>
	<tr>
		<td align="left">
			LOGGING
		</td>
		<td align="center">
			1/0 or true/false
		</td>
		<td align="center">
			0
		</td>
		<td align="center">
			boolean
		</td>
		<td align="left">
			Turns on logging if true and off if false.
		</td>
	</tr>
	<tr>
		<td align="left">
			LOGS_PATH
		</td>
		<td align="center">
			logs
		</td>
		<td align="center">
			logs
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Log directory name.
		</td>
	</tr>
	<tr>
		<td align="left">
			LOGS_ACCESS
		</td>
		<td align="center">
			access
		</td>
		<td align="center">
			access
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Access log file name.
		</td>
	</tr>
	<tr>
		<td align="left">
			LOGS_ERROR
		</td>
		<td align="center">
			error
		</td>
		<td align="center">
			error
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Error log file name.
		</td>
	</tr>
	<tr>
		<td align="left">
			LOGS_EXT
		</td>
		<td align="center">
			.log
		</td>
		<td align="center">
			.log
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Log file extension.
		</td>
	</tr>
	<tr>
		<td align="left">
			FETCH_TYPE
		</td>
		<td align="center">
			class, array
		</td>
		<td align="center">
			class
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Datasource query PDO fetch type.
		</td>
	</tr>
	<tr>
		<td align="left">
			DB_POOLING
		</td>
		<td align="center">
			1/0 or true/false 
		</td>
		<td align="center">
			false
		</td>
		<td align="center">
			boolean
		</td>
		<td align="left">
			Persistent database connections for supported datasources.
		</td>
	</tr>
	<tr>
		<td align="left">
			DB_CONNECTOR_TYPES
		</td>
		<td align="center">
			supported database servers
		</td>
		<td align="center">
			list
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			List of supported databases.
		</td>
	</tr>
	<tr>
		<td align="left">
			SESSION_ENABLE
		</td>
		<td align="center">
			1/0 or true/false
		</td>
		<td align="center">
			1
		</td>
		<td align="center">
			boolean
		</td>
		<td align="left">
			Turns on sessions if true and off if false.
		</td>
	</tr>
	<tr>
		<td align="left">
			SESSION_NAME
		</td>
		<td align="center">
			app
		</td>
		<td align="center">
			app
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Datasource query PDO fetch type.
		</td>
	</tr>
	<tr>
		<td align="left">
			SESSION_TIMEOUT
		</td>
		<td align="center">
			30
		</td>
		<td align="center">
			30
		</td>
		<td align="center">
			int
		</td>
		<td align="left">
			Default timeout is 30 minutes.
		</td>
	</tr>
	<tr>
		<td align="left">
			ENCRYPTION_TYPE
		</td>
		<td align="center">
			MD2, MD5, SHA1, SHA256, SHA384, SHA512
		</td>
		<td align="center">
			SHA512
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Encryption type.
		</td>
	</tr>
	<tr>
		<td align="left">
			ENCRYPTION_KEY
		</td>
		<td align="center">
			@#$%^
		</td>
		<td align="center">
			[blank]
		</td>
		<td align="center">
			int
		</td>
		<td align="left">
			Encryption key.
		</td>
	</tr>
	<tr>
		<td align="left">
			XSS_PROTECT
		</td>
		<td align="center">
			 1/0 or true/false 
		</td>
		<td align="center">
			0
		</td>
		<td align="center">
			boolean
		</td>
		<td align="left">
			Turns on global XSS protection.
		</td>
	</tr>
	<tr>
		<td align="left">
			CSRF_PROTECT
		</td>
		<td align="center">
			 1/0 or true/false 
		</td>
		<td align="center">
			0
		</td>
		<td align="center">
			boolean
		</td>
		<td align="left">
			Turns on global CSRF protection.
		</td>
	</tr>
	<tr>
		<td align="left">
			CSRF_TOKEN_NAME
		</td>
		<td align="center">
			CSRF hidden input field name
		</td>
		<td align="center">
			 csrf_token
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Defines a name for the CSRF hidden input field name
		</td>
	</tr>
	<tr>
		<td align="left">
			CSRF_KEY
		</td>
		<td align="center">
			mixed character string
		</td>
		<td align="center">
			 [blank] 
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Incorporates an additional string into the generation of CSRF tokens.
		</td>
	</tr>
	<tr>
		<td align="left">
			ASSETS_PATH
		</td>
		<td align="center">
			/assets/
		</td>
		<td align="center">
			/assets/
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Path to assests root directory.
		</td>
	</tr>
	<tr>
		<td align="left">
			EXT_PHP
		</td>
		<td align="center">
			.php
		</td>
		<td align="center">
			.php
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Default extension for PHP files.
		</td>
	</tr>
	<tr>
		<td align="left">
			TIME_ZONE
		</td>
		<td align="center">
			<a href="http://php.net/manual/en/timezones.php" target="_blank">
				List of supported timezones
			</a>
		</td>
		<td align="center">
			America/New_York
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Default timezone definition.
		</td>
	</tr>
</table>
<pre>
<code>
&lt;?php

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
	'DB_CONNECTOR_TYPES' => 'mariadb, mongodb, mysql, postgresql, sqlsrv, sqlite', 

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
</code>
</pre>
<h2 id="datasource">Datasource Configuration [/app/conf/datasource.php]</h2>
<p>
	All PHP datasources are executed using the PHP PDO class.
</p>
<table width="98%" cellpadding="0" cellspacing="2" border="0">
	<tr>
		<th>
			ENVIRONMENT
		</th>
		<th>
			VALUE
		</th>
		<th>
			TYPE
		</th>
		<th>
			DESCRIPTION
		</th>
	</tr>
	<tr>
		<td align="left">
			Development
		</td>
		<td align="center">
			development
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Datasource settings that will be available to local development servers.
		</td>
	</tr>
	<tr>
		<td align="left">
			Production
		</td>
		<td align="center">
			production
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Datasource settings that will be available to local production servers.
		</td>
	</tr>
</table>
<table width="98%" cellpadding="0" cellspacing="2" border="0">
	<tr>
		<th>
			SERVER
		</th>
		<th>
			ENGINE
		</th>
		<th>
			HOST
		</th>
		<th>
			PORT
		</th>
		<th>
			USERNAME
		</th>
		<th>
			PASSWORD
		</th>
		<th>
			DATABASE
		</th>
	</tr>
	<tr>
		<td align="left">
			MariaDB / MySQL
		</td>
		<td align="center">
			mariadb or mysql
		</td>
		<td align="center">
			string
		</td>
		<td align="center">
			int
		</td>
		<td align="center">
			string
		</td>
		<td align="center">
			string
		</td>
		<td align="center">
			string
		</td>
	</tr>
	<tr>
		<td align="left">
			MongoDB
		</td>
		<td align="center">
			mongodb
		</td>
		<td align="center">
			n/a
		</td>
		<td align="center">
			n/a
		</td>
		<td align="center">
			n/a
		</td>
		<td align="center">
			n/a
		</td>
		<td align="center">
			string
		</td>
	</tr>
	<tr>
		<td align="left">
			PostgreSQL
		</td>
		<td align="center">
			postgresql
		</td>
		<td align="center">
			string
		</td>
		<td align="center">
			int
		</td>
		<td align="center">
			string
		</td>
		<td align="center">
			string
		</td>
		<td align="center">
			string
		</td>
	</tr>
	<tr>
		<td align="left">
			SQLite
		</td>
		<td align="center">
			sqlite
		</td>
		<td align="center">
			n/a
		</td>
		<td align="center">
			n/a
		</td>
		<td align="center">
			n/a
		</td>
		<td align="center">
			n/a
		</td>
		<td align="center">
			string
		</td>
	</tr>
	<tr>
		<td align="left">
			SQL Server
		</td>
		<td align="center">
			sqlsrv
		</td>
		<td align="center">
			string
		</td>
		<td align="center">
			int
		</td>
		<td align="center">
			string
		</td>
		<td align="center">
			string
		</td>
		<td align="center">
			string
		</td>
	</tr>
</table>
<pre>
<code>
&lt;?php

// -- Supported database engines are: mariadb, mysql, mongodb, postgresql, sqlsrv, sqlite
$datasource = array(

	// -- Development datasources
	'development' => array(

		// -- MariaDB example
		'Datasource1'  => array(
			'engine'   => 'mariadb',
			'host'     => 'localhost',
			'port'     => '3306',
			'username' => '&lt;username&gt;',
			'password' => '&lt;password&gt;',
			'database' => 'database'
		),

		// -- MySQL example
		'Datasource1'  => array(
			'engine'   => 'mysql',
			'host'     => 'localhost',
			'port'     => '3306',
			'username' => '&lt;username&gt;',
			'password' => '&lt;password&gt;',
			'database' => 'database'
		), 

		// -- PostgreSQL example
		'Datasource1'  => array(
			'engine'   => 'postgresql',
			'host'     => 'localhost',
			'port'     => '5432',
			'username' => '&lt;username&gt;',
			'password' => '&lt;password&gt;',
			'database' => 'database'
		), 

		// -- SQL Server example
		'Datasource2'  => array(
			'engine'   => 'sqlsrv',
			'host'     => 'localhost',
			'port'     => '1433',
			'username' => '&lt;username&gt;',
			'password' => '&lt;password&gt;',
			'database' => 'database'
		), 

		// -- SQLite example
		'Datasource3'  => array(
			'engine'   => 'sqlite',
			'database' => '../app/dbase/sample.sqlite'
		)

	), 

	// -- Production datasources
	'production' => array(

		// -- MariaDB example
		'Datasource1'  => array(
			'engine'   => 'mariadb',
			'host'     => 'localhost',
			'port'     => '3306',
			'username' => '&lt;username&gt;',
			'password' => '&lt;password&gt;',
			'database' => 'database'
		),

		// -- MySQL example
		'Datasource1'  => array(
			'engine'   => 'mysql',
			'host'     => 'localhost',
			'port'     => '3306',
			'username' => '&lt;username&gt;',
			'password' => '&lt;password&gt;',
			'database' => 'database'
		), 

		// -- PostgreSQL example
		'Datasource1'  => array(
			'engine'   => 'postgresql',
			'host'     => 'localhost',
			'port'     => '5432',
			'username' => '&lt;username&gt;',
			'password' => '&lt;password&gt;',
			'database' => 'database'
		), 

		// -- SQL Server example
		'Datasource2'  => array(
			'engine'   => 'sqlsrv',
			'host'     => 'localhost',
			'port'     => '1433',
			'username' => '&lt;username&gt;',
			'password' => '&lt;password&gt;',
			'database' => 'database'
		), 

		// -- SQLite example
		'Datasource3'  => array(
			'engine'   => 'sqlite',
			'database' => '../app/dbase/sample.sqlite'
		)

	)

);
</code>
</pre>
<h2 id="mail">Mail Configuration [/app/conf/mail.php]</h2>
<p>
	The mail configuration is utilized by the pre-installed mail plugin and known PHP mail library 
	<a href="http://phpmailer.worxware.com/" title="PHPMailer" target="_blank">PHPMailer</a>.
</p>
<table width="98%" cellpadding="0" cellspacing="2" border="0">
	<tr>
		<th>
			ENVIRONMENT
		</th>
		<th>
			VALUE
		</th>
		<th>
			TYPE
		</th>
		<th>
			DESCRIPTION
		</th>
	</tr>
	<tr>
		<td align="left">
			Development
		</td>
		<td align="center">
			development
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Datasource settings that will be available to local development servers.
		</td>
	</tr>
	<tr>
		<td align="left">
			Production
		</td>
		<td align="center">
			production
		</td>
		<td align="center">
			string
		</td>
		<td align="left">
			Datasource settings that will be available to local production servers.
		</td>
	</tr>
</table>
<pre>
<code>
&lt;?php

$mail = array(

	// -- Development mail settings
	'development' => array(

		'mail' => array(
			'host'     => 'ssl://smtp.gmail.com', 
			'port'     => 465, 
			'username' => 'email@gmail.com', 
			'password' => 'password'
		)

	), 

	// -- Production mail settings
	'production' => array(

		'mail' => array(
			'host'     => 'ssl://smtp.gmail.com', 
			'port'     => 465, 
			'username' => 'email@gmail.com', 
			'password' => 'password'
		)

	)

);
</code>
</pre>
<?php require '../templates/footer.php' ?>
