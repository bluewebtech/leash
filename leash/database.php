<?php

//dump( DB::delete( 'Sample', 'bands', 'id', '27' ) );
//dump( DB::all( 'Sample', 'bands', 'band' ) );
//dump( DB::equal( 'Sample', 'bands', 'id', '5' ) );
//dump( DB::not_equal( 'Sample', 'bands', 'id', '5' ) );
//dump( DB::greater( 'Sample', 'bands', 'id', '5' ) );
//dump( DB::greater_or_equal( 'Sample', 'bands', 'id', '5' ) );
//dump( DB::less( 'Sample', 'bands', 'id', '5' ) );
//dump( DB::less_or_equal( 'Sample', 'bands', 'id', '5' ) );
//dump( DB::like( 'Sample', 'bands', 'id', '5' ) );
//dump( DB::where( 'Sample', 'bands', 'band', 'like', '%p%', 'band', 'asc' ) );

/*
$columns = array( 'date_created', 'band' );
$values = array( date( 'Y-m-d' ), 'Morbid Angel' );
dump( DB::insert( 'Sample', 'bands', $columns, $values, true ) );
dump( DB::all( 'Sample', 'bands', 'band' ) );
*/

/*
$columns = array( 'date_updated', 'band', 'id' );
$values = array( date( 'Y-m-d' ), 'Morbid Angel', 36 );
$band = DB::update( 'Sample', 'bands', $columns, $values, true );
dump( DB::all( 'Sample', 'bands', 'band' ) );
*/

class Database {

	public static $bind;

    public static $connect;

    private static $cond_types = array( 
        '=', 
        '!=', 
        '>', 
        '>=', 
        '<', 
        '<=', 
        'LIKE' 
    );

    public static $query;

    private static $sort_types = array( 
        'asc', 
        'desc' 
    );

    public static $sql;

    public static $statement;

    /**
     * Constructs an SQL query statement that returns all results.
     *
     * return boolean
     * 
     * @param string dsn
     * @param string table
     * @param string order (optional)
     * @param string sort (optional)
    */
    public static function all( $dsn, $table, $order = null, $sort = null ) {
        try {

            if( isset( $dsn ) && strlen( $dsn ) > 0 ) {

                $dsn   = Database::dsn( $dsn );
                $order = Database::order( $order, $sort );

                try {

                    if( Database::table_val( $table ) ) {
                        
                        $state = "SELECT * FROM $table $order;";

                        return Database::query( $state );
                        
                    } else {
                        throw new Exception( 'A table name was not provided in the ORM statement.' );
                    }
                    
                } catch( Exception $e ) {
                    Error::message( $e, 500 );
                }

            } else {
                throw new Exception( 'A datasource name was not provided in the ORM statement.' );
            }

        } catch( Exception $e ) {
            Error::message( $e, 500 );
        }
    }

    /**
     * Checks if any table columns exist in the result set and returns an array of 
     * column names. Otherwise a false boolean value is returned.
     * 
     * return boolean
     * 
     * @param array query
    */
    public static function columns() {
        $cols = array();
        
        if( count( Database::$query ) ) {

            foreach( Database::$query[ 0 ] as $key => $value ) {
                array_push( $cols, $key );
            }

            return $cols;
        } else {
            return false;
        }
    }

    /**
     * The count method is an alias of the Database::recordcount() method
     * 
     * return string
     * 
     * @param array query
    */
    public static function count() {
        return Database::recordcount();
    }

    /**
     * Checks whether a valid SQL WHERE clause conditional was provided.
     *
     * return string
     * 
     * @param string cond
    */
    public static function cond( $cond ) {
        $list = implode( ', ', Database::$cond_types );

        try {

            if( strlen( $cond ) > 0 ) {

                try {
                    if( in_array( $cond, Database::$cond_types ) ) {
                        return $cond;
                    } else {
                        throw new Exception( 'The conditional type (' . $cond . ') is not valid. Valid types are: ' . $list . '.'  );
                    }
                } catch( Exception $e ) {
                    Error::message( $e, 500 );
                }

            } else {
                throw new Exception( 'A conditonal type was not provided in the WHERE clause. Valid types are: ' . $list . '.' );
            }

        } catch( Exception $e ) {
            Error::message( $e, 500 );
        }
    }

    /**
     * Alias method of the Database::dsn() method
     *
     * return boolean
     * 
     * @param string dsn
    */
    public static function datasource( $dsn ) {
        return Database::dsn( $dsn );
    }

    /**
     * Check if datasource database configuration is valid and type sqlite which takes no database param
     *
     * return boolean
     * 
     * @param array dsn
    */
    public static function dbase( $dsn = array() ) {
        // -- Check whether the database configuration database key exists
        if( array_key_exists( 'database', $dsn[ 'dsn' ] ) ) {

            try {

                // -- Check whether the database configuration engine key is blank
                if( !empty( $dsn[ 'dsn' ][ 'database' ] ) ) {
                    return $dsn[ 'dsn' ][ 'database' ];
                } else {
                    throw new Exception( 'A datasource (database) element was defined for (' . $dsn[ 'name' ] . ')  in the datasource configuration but is empty.' );
                    return false;
                }
                
            } catch( Exception $e ) {
                Error::message( $e, 500 );
            }

        } else {
            throw new Exception( 'A datasource (database) element was not specified for (' . $dsn[ 'name' ] . ') in the datasource configuration.' );
            return false;
        }
    }

    /**
     * Constructs an SQL query statement that deletes the specified record.
     *
     * return boolean
     * 
     * @param string dsn
     * @param string table
     * @param string column
     * @param string item
    */
    public static function delete( $dsn, $table, $column, $item ) {
        try {

            if( isset( $dsn ) && strlen( $dsn ) > 0 ) {

                $dsn = Database::dsn( $dsn );

                try {

                    if( Database::table_val( $table ) ) {
                        
                        try {

                            $where = $column . ' = :item';
                            $state = "DELETE FROM $table WHERE $where;" ;

                            return Database::query( $state, array( $item ) );

                        } catch( Exception $e ) {
                            Error::message( $e, 500 );
                        }

                    } else {
                        throw new Exception( 'A table name was not provided in the ORM statement.' );
                    }
                    
                } catch( Exception $e ) {
                    Error::message( $e, 500 );
                }

            } else {
                throw new Exception( 'A datasource name was not provided in the ORM statement.' );
            }

        } catch( Exception $e ) {
            Error::message( $e, 500 );
        }
    }

    /**
     * Returns a connection to a database using the datasource name specified
     *
     * return boolean
     * 
     * @param string dsn
    */
	public static function dsn( $dsn ) {
		$datasource   = $GLOBALS[ 'datasource' ];
        $environments = Database::dsn_keys( $datasource );
        $environment  = Environment::status( $environments );
        
        $dsn = array(
        	'name' => $dsn, 
        	'dsn'  => $datasource[ $environment ][ $dsn ]
        );

        $params = array(
        	'engine'   => Database::engine( $dsn ), 
        	'host'     => Database::host( $dsn ), 
        	'port'     => Database::port( $dsn ), 
        	'username' => Database::username( $dsn ), 
        	'password' => Database::password( $dsn ), 
        	'database' => Database::dbase( $dsn )
        );

        // -- Make sure all dsn values passed validation
        if( Database::dsn_val( $params ) ) {

        	switch( $params[ 'engine' ] ) {
                case 'mariadb':
                case 'mysql':
                    Database::$connect = MySQLConnect::connect( $params );
                break;

                case 'mongodb':
                    Database::$connect = MongoDBConnect::connect( $params );
                break;

                case 'postgresql':
                    Database::$connect = PostgreSQLConnect::connect( $params );
                break;
                
                case 'sqlsrv':
                    Database::$connect = SQLServerConnect::connect( $params );
                break;

                case 'sqlite':
                    Database::$connect = SQLiteConnect::connect( $params );
                break;
            }

            // -- Check whether the engine type is not MongoDB
            if( $params[ 'engine' ] != 'mongodb' ) {
                return Database::$connect->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            }

		}
	}

	/**
     * Return associative array as a numeric array
     *
     * return array
     * 
     * @param array dsn
    */
    public static function dsn_keys( $dsn ) {
        return array_keys( $dsn );
    }

    /**
     * Check if all datasource configuration values are valid as a whole
     *
     * return boolean
     * 
     * @param array params
    */
    public static function dsn_val( $params ) {
        if( !in_array( false, $params) ) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Check if datasource engine is valid and return the engine type
     *
     * return boolean
     * 
     * @param array dsn
    */
    public static function engine( $dsn = array() ) {
        try {

            // -- Check whether the datasource configuration engine key exists
            if( array_key_exists( 'engine', $dsn[ 'dsn' ] ) ) {
                
                try {

                    // -- Check whether the datasource configuration engine key is blank
                    if( !empty( $dsn[ 'dsn' ][ 'engine' ] ) ) {
                        
                        try {

                            // -- Check whether the datasource configuration engine key is of valid type
                            if( Database::engine_type_val( $dsn[ 'dsn' ][ 'engine' ] ) ) {
                                return $dsn[ 'dsn' ][ 'engine' ];
                            } else {
                                throw new Exception( 'The datasource (engine) type specified for (' . $dsn[ 'name' ] . ')  is not a valid type. Valid types are: ' . Database::engine_list() );
                                return false;
                            }

                        } catch( Exception $e ) {
                            Error::message( $e, 500 );
                        }

                    } else {
                        throw new Exception( 'A datasource (engine) element was defined for (' . $dsn[ 'name' ] . ')  in the datasource configuration but is empty.' );
                        return false;
                    }

                } catch( Exception $e ) {
                    Error::message( $e, 500 );
                }

            } else {
                throw new Exception( 'A datasource (engine) element was not specified for (' . $dsn[ 'name' ] . ')  in the datasource configuration.' );
                return false;
            }

        } catch( Exception $e ) {
            Error::message( $e, 500 );
        }
    }

    /**
     * Returns a comma delimited list of datasource types
     *
     * return string
    */
    public static function engine_list() {
        return implode( ', ', Database::engine_types() );
    }

    /**
     * Returns a list of available datasource types
     *
     * return array
    */
    public static function engine_types() {
        return explode( ',', preg_replace( '/\s+/', '', trim( DB_CONNECTOR_TYPES ) ) );
    }

    /**
     * Checks whether the provided datasource engine is of a valid type
     *
     * return boolean
     * 
     * @param string type
    */
    public static function engine_type_val( $type ) {
        if( in_array( $type, Database::engine_types() ) ) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Constructs an SQL query statement that returns all results equal to the provided value.
     *
     * return query
     * 
     * @param string dsn
     * @param string table
     * @param string column
     * @param string item
     * @param string order (optional)
    */
    public static function equal( $dsn, $table, $column, $item, $order = null, $sort = null ) {
        try {

            if( isset( $dsn ) && strlen( $dsn ) > 0 ) {

                $dsn   = Database::dsn( $dsn );
                $order = Database::order( $order, $sort );

                try {

                    if( Database::table_val( $table ) ) {
                        
                        try {

                            $where = $column . ' = :item';
                            $state = "SELECT * FROM $table WHERE $where $order;" ;

                            return Database::query( $state, array( $item ) );

                        } catch( Exception $e ) {
                            Error::message( $e, 500 );
                        }

                    } else {
                        throw new Exception( 'A table name was not provided in the ORM statement.' );
                    }
                    
                } catch( Exception $e ) {
                    Error::message( $e, 500 );
                }

            } else {
                throw new Exception( 'A datasource name was not provided in the ORM statement.' );
            }

        } catch( Exception $e ) {
            Error::message( $e, 500 );
        }
    }

    /**
     * Returns the PDO fetch type set in the conf/config.php
     *
     * return object
    */
    public static function fetchType() {
        switch( FETCH_TYPE ) {
            case 'class':
                return PDO::FETCH_CLASS;
            break;

            case 'array':
                return PDO::FETCH_ASSOC;
            break;
        }
    }

    /**
     * Constructs an SQL query statement that returns all results greater than the provided value.
     *
     * return query
     * 
     * @param string dsn
     * @param string table
     * @param string column
     * @param string item
     * @param string order (optional)
     * @param string sort (optional)
    */
    public static function greater( $dsn, $table, $column, $item, $order = null, $sort = null ) {
        try {

            if( isset( $dsn ) && strlen( $dsn ) > 0 ) {

                $dsn   = Database::dsn( $dsn );
                $order = Database::order( $order, $sort );

                try {

                    if( Database::table_val( $table ) ) {
                        
                        try {

                            $where = $column . ' > :item';
                            $state = "SELECT * FROM $table WHERE $where $order;" ;
                            
                            return Database::query( $state, array( $item ) );

                        } catch( Exception $e ) {
                            Error::message( $e, 500 );
                        }

                    } else {
                        throw new Exception( 'A table name was not provided in the ORM statement.' );
                    }
                    
                } catch( Exception $e ) {
                    Error::message( $e, 500 );
                }

            } else {
                throw new Exception( 'A datasource name was not provided in the ORM statement.' );
            }

        } catch( Exception $e ) {
            Error::message( $e, 500 );
        }
    }

    /**
     * Constructs an SQL query statement that returns all results greater than or equal to the provided value.
     *
     * return query
     * 
     * @param string dsn
     * @param string table
     * @param string column
     * @param string item
     * @param string order (optional)
     * @param string sort (optional)
    */
    public static function greater_or_equal( $dsn, $table, $column, $item, $order = null, $sort = null) {
        try {

            if( ORM::dsn_val( $dsn ) ) {

                $dsn   = Database::dsn( $dsn );
                $order = Database::order( $order, $sort );

                try {

                    if( Database::table_val( $table ) ) {
                        
                        try {

                            $where = $column . ' >= :item';
                            $state = "SELECT * FROM $table WHERE $where $order;" ;
                            
                            return Database::query( $state, array( $item ) );

                        } catch( Exception $e ) {
                            Error::message( $e, 500 );
                        }

                    } else {
                        throw new Exception( 'A table name was not provided in the ORM statement.' );
                    }
                    
                } catch( Exception $e ) {
                    Error::message( $e, 500 );
                }

            } else {
                throw new Exception( 'A datasource name was not provided in the ORM statement.' );
            }

        } catch( Exception $e ) {
            Error::message( $e, 500 );
        }
    }

    /**
     * Check if datasource host configuration is valid and type sqlite which takes no host param
     *
     * return boolean
     * 
     * @param array dsn
    */
    public static function host( $dsn = array() ) {
        // -- Check whether the database configuration host key exists
        if( array_key_exists( 'host', $dsn[ 'dsn' ] ) ) {

            try {

                // -- Check whether the database configuration engine key is blank
                if( !empty( $dsn[ 'dsn' ][ 'host' ] ) ) {
                    return $dsn[ 'dsn' ][ 'host' ];
                } else {
                    throw new Exception( 'A datasource (host) element was defined for (' . $dsn[ 'name' ] . ')  in the datasource configuration but is empty.' );
                    return false;
                }

            } catch( Exception $e ) {
                Error::message( $e, 500 );
            }

        } else {

            // -- Check whether the database configuration engine meets all validation
            if( Database::engine( $dsn ) ) {

                try {

                    // -- Check whether the database engine specified was sqlite
                    if( $dsn[ 'dsn' ][ 'engine' ] == 'sqlite' || $dsn[ 'dsn' ][ 'engine' ] == 'mongodb' ) {
                        return $dsn[ 'dsn' ][ 'database' ];
                    } else {
                        throw new Exception( 'A datasource (host) element was not specified for (' . $dsn[ 'name' ] . ')  in the datasource configuration.' );
                        return false;
                    }

                } catch( Exception $e ) {
                    Error::message( $e, 500 );
                }

            }
            
        }
    }

    /**
     * Constructs an SQL query statement that inserts a new record.
     *
     * return query
     * 
     * @param string dsn
     * @param string table
     * @param string columns
     * @param string values
    */
    public static function insert( $dsn, $table, $columns, $values ) {
        try {

            if( isset( $dsn ) && strlen( $dsn ) > 0 ) {

                $dsn = Database::dsn( $dsn );

                try {

                    if( Database::table_val( $table ) ) {
                        
                        try {

                            $count         = count( $columns ) - 1;
                            $column_values = array();

                            for( $a = 0; $a <= $count; $a++ ) {
                                
                                if( $a != $count ) {
                                    $del = ', ';
                                } else {
                                    $del = '';
                                }

                                $column_values[] = ':' . $columns[ $a ];
                            }

                            $columns       = implode( ', ', $columns );
                            $column_values = implode( ', ', $column_values );
                            $state         = "INSERT INTO $table ( $columns ) VALUES ( $column_values );";
                            
                            return Database::query( $state, $values );

                        } catch( Exception $e ) {
                            Error::message( $e, 500 );
                        }

                    } else {
                        throw new Exception( 'A table name was not provided in the ORM statement.' );
                    }
                    
                } catch( Exception $e ) {
                    Error::message( $e, 500 );
                }

            } else {
                throw new Exception( 'A datasource name was not provided in the ORM statement.' );
            }

        } catch( Exception $e ) {
            Error::message( $e, 500 );
        }
    }

    public static function lastinserted() {
        return Database::$connect->lastInsertId();
    }

    /**
     * Constructs an SQL query statement that returns all results less than the provided value.
     *
     * return query
     * 
     * @param string dsn
     * @param string table
     * @param string column
     * @param string item
     * @param string order (optional)
     * @param string sort (optional)
    */
    public static function less( $dsn, $table, $column, $item, $order = null, $sort = null ) {
        try {

            if( isset( $dsn ) && strlen( $dsn ) > 0 ) {

                $dsn   = Database::dsn( $dsn );
                $order = Database::order( $order, $sort );

                try {

                    if( Database::table_val( $table ) ) {
                        
                        try {

                            $where = $column . ' < :item';
                            $state = "SELECT * FROM $table WHERE $where $order;" ;
                            
                            return Database::query( $state, array( $item ) );

                        } catch( Exception $e ) {
                            Error::message( $e, 500 );
                        }

                    } else {
                        throw new Exception( 'A table name was not provided in the ORM statement.' );
                    }
                    
                } catch( Exception $e ) {
                    Error::message( $e, 500 );
                }

            } else {
                throw new Exception( 'A datasource name was not provided in the ORM statement.' );
            }

        } catch( Exception $e ) {
            Error::message( $e, 500 );
        }
    }

    /**
     * Constructs an SQL query statement that returns all results less than or equal to the provided value.
     *
     * return query
     * 
     * @param string dsn
     * @param string table
     * @param string column
     * @param string item
     * @param string order (optional)
     * @param string sort (optional)
    */
    public static function less_or_equal( $dsn, $table, $column, $item, $order = null, $sort = null ) {
        try {

            if( isset( $dsn ) && strlen( $dsn ) > 0 ) {

                $dsn   = Database::dsn( $dsn );
                $order = Database::order( $order, $sort );

                try {

                    if( Database::table_val( $table ) ) {
                        
                        try {

                            $where = $column . ' <= :item';
                            $state = "SELECT * FROM $table WHERE $where $order;" ;
                            
                            return Database::query( $state, array( $item ) );

                        } catch( Exception $e ) {
                            Error::message( $e, 500 );
                        }

                    } else {
                        throw new Exception( 'A table name was not provided in the ORM statement.' );
                    }
                    
                } catch( Exception $e ) {
                    Error::message( $e, 500 );
                }

            } else {
                throw new Exception( 'A datasource name was not provided in the ORM statement.' );
            }

        } catch( Exception $e ) {
            Error::message( $e, 500 );
        }
    }

    /**
     * Constructs an SQL query statement that returns all results matching the provided value criteria.
     *
     * return query
     * 
     * @param string dsn
     * @param string table
     * @param string column
     * @param string item
     * @param string order (optional)
     * @param string sort (optional)
    */
    public static function like( $dsn, $table, $column, $item, $order = null, $sort = null ) {
        try {

            if( isset( $dsn ) && strlen( $dsn ) > 0 ) {

                $dsn   = Database::dsn( $dsn );
                $order = Database::order( $order, $sort );

                try {

                    if( Database::table_val( $table ) ) {
                        
                        try {

                            $where = $column . ' LIKE :item';
                            $state = "SELECT * FROM $table WHERE $where $order;" ;

                            return Database::query( $state, array( $item ) );

                        } catch( Exception $e ) {
                            Error::message( $e, 500 );
                        }

                    } else {
                        throw new Exception( 'A table name was not provided in the ORM statement.' );
                    }
                    
                } catch( Exception $e ) {
                    Error::message( $e, 500 );
                }

            } else {
                throw new Exception( 'A datasource name was not provided in the ORM statement.' );
            }

        } catch( Exception $e ) {
            Error::message( $e, 500 );
        }
    }

    /**
     * Constructs an SQL query statement that returns all results not equal to the provided value.
     *
     * return query
     * 
     * @param string dsn
     * @param string table
     * @param string column
     * @param string item
     * @param string order (optional)
     * @param string sort (optional)
    */
    public static function not_equal( $dsn, $table, $column, $item, $order = null, $sort = null ) {
        try {

            if( isset( $dsn ) && strlen( $dsn ) > 0 ) {

                $dsn   = Database::dsn( $dsn );
                $order = Database::order( $order, $sort );

                try {

                    if( Database::table_val( $table ) ) {
                        
                        try {

                            $where = $column . ' != :item';
                            $state = "SELECT * FROM $table WHERE $where $order;" ;
                            
                            return  Database::query( $state, array( $item ) );

                        } catch( Exception $e ) {
                            Error::message( $e, 500 );
                        }

                    } else {
                        throw new Exception( 'A table name was not provided in the ORM statement.' );
                    }
                    
                } catch( Exception $e ) {
                    Error::message( $e, 500 );
                }

            } else {
                throw new Exception( 'A datasource name was not provided in the ORM statement.' );
            }

        } catch( Exception $e ) {
            Error::message( $e, 500 );
        }
    }

    /**
     * Returns an SQL ORDER BY string with a sort type, if a sort type was defined.
     * The default sort type is ASC.
     *
     * return string
     * 
     * @param string order
     * @param string sort
    */
    public static function order( $order = null, $sort = null ) {
        if( strlen( $order ) > 0 ) {
            return 'ORDER BY ' . $order . ' ' . Database::sort( $sort );
        } else {
            return '';
        }
    }

    /**
     * Check if datasource password configuration is valid and type sqlite which takes no password param
     *
     * return boolean
     * 
     * @param array dsn
    */
    public static function password( $dsn = array() ) {
        // -- Check whether the database configuration password key exists
        if( array_key_exists( 'password', $dsn[ 'dsn' ] ) ) {

            try {

                // -- Check whether the database configuration engine key is blank
                if( !empty( $dsn[ 'dsn' ][ 'password' ] ) ) {
                    return $dsn[ 'dsn' ][ 'password' ];
                } else {
                    throw new Exception( 'A datasource (password) element was defined for (' . $dsn[ 'name' ] . ')  in the datasource configuration but is empty.' );
                    return false;
                }

            } catch( Exception $e ) {
                Error::message( $e, 500 );
            }

        } else {

            // -- Check whether the database configuration engine meets all validation
            if( Database::engine( $dsn ) ) {

                try {

                    // -- Check whether the database engine specified was sqlite
                    if( $dsn[ 'dsn' ][ 'engine' ] == 'sqlite' || $dsn[ 'dsn' ][ 'engine' ] == 'mongodb' ) {
                        return true;
                    } else {
                        throw new Exception( 'A datasource (password) element was not specified for (' . $dsn[ 'name' ] . ')  in the datasource configuration.' );
                        return false;
                    }

                } catch( Exception $e ) {
                    Error::message( $e, 500 );
                }

            }
            
        }
    }

    /**
     * Check if datasource port configuration is valid and type sqlite which takes no port param
     *
     * return boolean
     * 
     * @param array dsn
    */
    public static function port( $dsn = array() ) {
        // -- Check whether the database configuration port key exists
        if( array_key_exists( 'port', $dsn[ 'dsn' ] ) ) {

            try {

                // -- Check whether the database configuration engine key is blank
                if( !empty( $dsn[ 'dsn' ][ 'port' ] ) ) {
                    return $dsn[ 'dsn' ][ 'port' ];
                } else {
                    throw new Exception( 'A datasource (port) element was defined for (' . $dsn[ 'name' ] . ')  in the datasource configuration but is empty.' );
                    return false;
                }

            } catch( Exception $e ) {
                Error::message( $e, 500 );
            }

        } else {

            // -- Check whether the database configuration engine meets all validation
            if( Database::engine( $dsn ) ) {

                try {

                    // -- Check whether the database engine specified was sqlite
                    if( $dsn[ 'dsn' ][ 'engine' ] == 'sqlite' || $dsn[ 'dsn' ][ 'engine' ] == 'mongodb' ) {
                        return true;
                    } else {
                        throw new Exception( 'A datasource (port) element was not specified for (' . $dsn[ 'name' ] . ')  in the datasource configuration.' );
                        return false;
                    }

                } catch( Exception $e ) {
                    Error::message( $e, 500 );
                }

            }
            
        }
    }

    /**
     * Return query results based on the sql param and binding if one exists
     *
     * return object
     * 
     * @param string sql
     * @param array bind
    */
    public static function query( $sql, $bind = array() ) {
        Database::$sql = $sql;
        Database::$bind = $bind;
        $sql_array = explode( ' ', preg_replace( '/\s+/', ' ', Database::$sql ) );
        Database::$statement = Database::$connect->prepare( Database::$sql );
        Database::$statement->execute( Database::$bind );

        switch( $sql_array[ 0 ] ) {
            case 'SELECT':
                return Database::$query = Database::$statement->fetchAll( Database::fetchType() );
            break;

            case 'INSERT':
                return Database::$query = Database::$statement->rowCount(); 
            break;

            case 'UPDATE':
                return Database::$query = Database::$statement->rowCount(); 
            break;

            case 'DELETE':
                return Database::$query = Database::$statement->rowCount(); 
            break;
        }
    }

    /**
     * Returns the total count of returned elements in the result set.
     * 
     * return string
     * 
     * @param array query
    */
    public static function recordcount() {
        return count( Database::$query );
    }

    /**
     * Alias of the Database::all() method
     *
     * return query
     * 
     * @param string dsn
     * @param string table
     * @param string order (optional)
     * @param string sort (optional)
    */
    public static function select( $dsn, $table, $order = null, $sort = null ) {
        return Database::all( $dsn, $table, $order, $sort );
    }

    /**
     * Checks whether a provided sort type is valid and returns the sort type. 
     * The default sort type is ASC.
     *
     * return string
     * 
     * @param string sort
    */
    public static function sort( $sort = null ) {
        $list = implode( ', ', Database::$sort_types );

        if( strlen( $sort ) > 0 ) {

            try {
                if( in_array( $sort, Database::$sort_types ) ) {
                    return strtoupper( $sort );
                } else {
                    throw new Exception( 'The sort type (' . $sort . ') is not valid. Valid types are: ' . $list . '. The default sort type is asc.'  );
                }
            } catch( Exception $e ) {
                Error::message( $e, 500 );
            }

        } else {
            return ' ASC';
        }
    }

    /**
     * Checks whether a table was provided.
     *
     * return boolean
     * 
     * @param string table
    */
    public static function table_val( $table ) {
        if( isset( $table ) && strlen( $table ) > 0 ) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * The total method is an alias of the Database::recordcount() method
     * 
     * return string
     * 
     * @param array query
    */
    public static function total() {
        return Database::recordcount();
    }

    /**
     * Constructs an SQL query statement that updates a record.
     *
     * return query
     * 
     * @param string dsn
     * @param string table
     * @param string columns
     * @param string values
    */
    public static function update( $dsn, $table, $columns, $values ) {
        try {

            if( isset( $dsn ) && strlen( $dsn ) > 0 ) {

                $dsn = Database::dsn( $dsn );

                try {

                    if( Database::table_val( $table ) ) {
                        
                        try {

                            $id            = $columns[ count( $columns ) - 1 ];
                            $count         = count( $columns ) - 2;
                            $column_values = array();

                            for( $a = 0; $a <= $count; $a++ ) {
                                
                                if( $a != $count ) {
                                    $del = ', ';
                                } else {
                                    $del = '';
                                }

                                $column_values[] = $columns[ $a ] . ' = :' . $columns[ $a ];
                            }

                            $columns       = implode( ', ', $columns );
                            $column_values = implode( ', ', $column_values );
                            //$where         = $column . " = '" . $item . "'";
                            $state         = "UPDATE $table SET $column_values WHERE $id = :$id;";
                            
                            return Database::query( $state, $values );

                        } catch( Exception $e ) {
                            Error::message( $e, 500 );
                        }

                    } else {
                        throw new Exception( 'A table name was not provided in the ORM statement.' );
                    }
                    
                } catch( Exception $e ) {
                    Error::message( $e, 500 );
                }

            } else {
                throw new Exception( 'A datasource name was not provided in the ORM statement.' );
            }

        } catch( Exception $e ) {
            Error::message( $e, 500 );
        }
    }

    /**
     * Check if datasource username configuration is valid and type sqlite which takes no username param
     *
     * return boolean
     * 
     * @param array dsn
    */
    public static function username( $dsn = array() ) {
        // -- Check whether the database configuration username key exists
        if( array_key_exists( 'username', $dsn[ 'dsn' ] ) ) {

            try {

                // -- Check whether the database configuration engine key is blank
                if( !empty( $dsn[ 'dsn' ][ 'username' ] ) ) {
                    return $dsn[ 'dsn' ][ 'username' ];
                } else {
                    throw new Exception( 'A datasource (username) element was defined for (' . $dsn[ 'name' ] . ')  in the datasource configuration but is empty.' );
                    return false;
                }

            } catch( Exception $e ) {
                Error::message( $e, 500 );
            }

        } else {

            // -- Check whether the database configuration engine meets all validation
            if( Database::engine( $dsn ) ) {

                try {

                    // -- Check whether the database engine specified was sqlite
                    if( $dsn[ 'dsn' ][ 'engine' ] == 'sqlite' || $dsn[ 'dsn' ][ 'engine' ] == 'mongodb' ) {
                        return true;
                    } else {
                        throw new Exception( 'A datasource (username) element was not specified for (' . $dsn[ 'name' ] . ')  in the datasource configuration.' );
                        return false;
                    }

                } catch( Exception $e ) {
                    Error::message( $e, 500 );
                }

            }
            
        }
    }

    /**
     * Constructs an SQL query statement that returns all results matching the where clause of the provided search criteria.
     *
     * return query
     * 
     * @param string dsn
     * @param string table
     * @param string column
     * @param string item
     * @param string order (optional)
     * @param string sort (optional)
    */
    public static function where( $dsn, $table, $column, $cond, $item, $order = null, $sort = null ) {
        $cond = strtoupper( $cond );

        try {

            if( isset( $dsn ) && strlen( $dsn ) > 0 ) {

                $dsn   = Database::dsn( $dsn );
                $order = Database::order( $order, $sort );

                try {

                    if( Database::table_val( $table ) ) {
                        
                        try {

                            if( Database::cond( $cond ) ) {

                                $where = $column . ' ' . $cond . ' :item';
                                $state = "SELECT * FROM $table WHERE $where $order;" ;
                                
                                return Database::query( $state, array( $item ) );
                                
                            } else {
                                throw new Exception( Database::$error_conditional );
                            }

                        } catch( Exception $e ) {
                            Error::message( $e, 500 );
                        }

                    } else {
                        throw new Exception( 'A table name was not provided in the ORM statement.' );
                    }
                    
                } catch( Exception $e ) {
                    Error::message( $e, 500 );
                }

            } else {
                throw new Exception( 'A datasource name was not provided in the ORM statement.' );
            }

        } catch( Exception $e ) {
            Error::message( $e, 500 );
        }
    }

}
