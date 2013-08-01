<?php

class PostgreSQLConnect {

	public static function connect( $params = array() ) {
		//return new PDO( 'pgsql:dbname=' . $params[ 'database' ] . ';host=' . $params[ 'host' ] . ';port= ' . $params[ 'port' ], $params[ 'username' ], $params[ 'password' ], array( PDO::ATTR_PERSISTENT => true ) );
		return new PDO( 'pgsql:dbname=' . $params[ 'database' ] . ';host=' . $params[ 'host' ] . ';port= ' . $params[ 'port' ], $params[ 'username' ], $params[ 'password' ] );
    }

}
