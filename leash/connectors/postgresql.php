<?php

class PostgreSQLConnect {

	public static function connect( $params = array() ) {
		return new PDO( 'pgsql:host= ' . $params[ 'host' ] . ';port= ' . $params[ 'port' ] . ';dbname= ' . $params[ 'database' ] . ';user= ' . $params[ 'username' ] . ';password= ' . $params[ 'password' ] . ';' ); 
    }

}
