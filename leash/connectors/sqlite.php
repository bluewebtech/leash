<?php

class SQLiteConnect {

	public static function connect( $params = array() ) {
		return new PDO( 'sqlite:' . $params[ 'database' ] );
    }

}
