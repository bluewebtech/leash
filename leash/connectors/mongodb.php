<?php

class MongoDBConnect {

	public static function connect( $params = array() ) {
		if( !isset( $params[ 'host' ] ) && !isset( $params[ 'database' ] ) && !isset( $params[ 'port' ] ) && !isset( $params[ 'username' ] ) && !isset( $params[ 'password' ] ) ) {
			return new Mongo();
		}
		//return new Mongo("mongodb://localhost:27017/test");
		//return new Mongo("mongodb://$host:27017"); 
		//return new MongoClient("mongodb://${username}:${password}@localhost");
		//return new MongoClient("mongodb://${username}:${password}@localhost/myDatabase");
    }

}
