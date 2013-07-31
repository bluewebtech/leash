<?php

class MySQLConnect {

	public static function connect( $params = array() ) {
		return new PDO( 'mysql:host=' . $params[ 'host' ] . ';dbname=' . $params[ 'database' ] . ';port=' . $params[ 'port' ], $params[ 'username' ], $params[ 'password' ] );
    }

}
