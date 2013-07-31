<?php

class SQLServerConnect {

	public static function connect( $params = array() ) {
		if( empty( $port ) ) {
            return new PDO( 'sqlsrv:Server=' . $params[ 'host' ] . ';Database=' . $params[ 'database' ], $params[ 'username' ], $params[ 'password' ] );
        } else {
            return new PDO( 'sqlsrv:Server=' . $params[ 'host' ] . ',' . $params[ 'port' ] . ';Database=' . $params[ 'database' ], $params[ 'username' ], $params[ 'password' ] );
        }
    }

}
