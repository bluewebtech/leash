<?php

//dump( BandsModel::all( array( 'order' => 'band', 'sort' => 'asc' ) ) );
//dump( BandsModel::all( 'band', 'desc' ) );
//dump( BandsModel::find( array( 'column' => 'id', 'item' => 11 ) ) );
//dump( BandsModel::find( 'id', 11 ) );
//dump( BandsModel::eq( array( 'column' => 'id', 'item' => 11 ) ) );
//dump( BandsModel::eq( 'id', 15 ) );
//dump( BandsModel::neq( array( 'column' => 'id', 'item' => 11 ) ) );
//dump( BandsModel::neq( 'id', 15 ) );
//dump( BandsModel::lt( array( 'column' => 'id', 'item' => 11 ) ) );
//dump( BandsModel::lt( 'id', 15 ) );
//dump( BandsModel::lte( array( 'column' => 'id', 'item' => 11 ) ) );
//dump( BandsModel::lte( 'id', 15 ) );
//dump( BandsModel::gt( array( 'column' => 'id', 'item' => 11 ) ) );
//dump( BandsModel::gt( 'id', 15 ) );
//dump( BandsModel::gte( array( 'column' => 'id', 'item' => 11 ) ) );
//dump( BandsModel::gte( 'id', 15 ) );
//dump( BandsModel::where( 'id', '=', 15 ) );

/*
$date = date( 'Y-m-d' );
$columns = array( 'date_created', 'band' );
BandsModel::save( $columns, array( $date, 'Danzig' ) );
BandsModel::save( $columns, array( $date, 'Powerman 5000' ) );
BandsModel::save( $columns, array( $date, 'Green Jelly' ) );
BandsModel::save( $columns, array( $date, 'Spinal Tap' ) );
dump( BandsModel::all( 'id', 'desc' ) );
*/

/*
$date = date( 'Y-m-d' );
$columns = array( 'date_updated', 'band', 'id' );
$band = BandsModel::edit( $columns, array( $date, 'Morbid Angel', 36 ) );
dump( BandsModel::all( 'id', 'desc' ) );
*/

/*
$date = date( 'Y-m-d' );
$columns = array( 'date_updated', 'band', 'id' );
$band = BandsModel::update( $columns, array( $date, 'Morbid Angel', 36 ) );
dump( BandsModel::all( 'id', 'desc' ) );
*/

/*
$band = BandsModel::delete( 'id', 43 );
dump( BandsModel::all( 'id', 'desc' ) );

$band = BandsModel::del( 'id', 42 );
dump( BandsModel::all( 'id', 'desc' ) );
*/

//dump( BandsModel::hunt( 'id', 11 ) );
//$band = BandsModel::obliterate( 'id', 14 );
//dump( BandsModel::werewolf( 'id', '!=', 14 ) );

class ORM extends Database {

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
	public static function all( $dsn = null, $tbl = null, $order = null, $sort = null ) {
		$class      = get_called_class();
		$datasource = $class::$dsn;
		$table      = $class::$table;

		if( !is_array( $dsn ) ) {
			$param = array();
			$param[ 'order' ]  = $dsn;
			$param[ 'sort' ]   = $tbl;
		} else {
			$param = $dsn;
		}

		return Database::all( $datasource, $table, $param[ 'order' ], $param[ 'sort' ] );
	}

	/**
     * Constructs an SQL query statement that deletes the specified record.
     *
     * return boolean
     * 
     * @param string column
     * @param string item
    */
	public static function del( $column = null, $item = null ) {
		$class      = get_called_class();
		$datasource = $class::$dsn;
		$table      = $class::$table;

		return Database::delete( $datasource, $table, $column, $item );
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
	public static function delete( $dsn = null, $tbl = null, $column = null, $item = null ) {
		$class      = get_called_class();
		$datasource = $class::$dsn;
		$table      = $class::$table;
		$column     = $dsn;
		$item       = $tbl;

		return Database::delete( $datasource, $table, $column, $item );
	}

	/**
     * Constructs an SQL query statement that updates a record.
     *
     * return query
     * 
     * @param string columns
     * @param string values
    */
	public static function edit( $columns = array(), $values = array() ) {
		$class      = get_called_class();
		$datasource = $class::$dsn;
		$table      = $class::$table;

		return Database::update( $datasource, $table, $columns, $values );
	}


    /**
     * Constructs an SQL query statement that returns all results equal to the provided value.
     *
     * return query
     * 
     * @param string column
     * @param string item
     * @param string order (optional)
     * @param string sort (optional)
    */
	public static function eq( $column = null, $item = null, $order = null, $sort = null ) {
		$class      = get_called_class();
		$datasource = $class::$dsn;
		$table      = $class::$table;

		if( !is_array( $column ) ) {
			$param = array();
			$param[ 'column' ] = $column;
			$param[ 'item' ]   = $item;
			$param[ 'order' ]  = $order;
			$param[ 'sort' ]   = $sort;
		} else {
			$param = $column;
		}

		return Database::where( $datasource, $table, $param[ 'column' ], '=', $param[ 'item' ], $param[ 'order' ], $param[ 'sort' ] );
	}

	/**
     * Constructs an SQL query statement that returns all results equal to the provided value.
     *
     * return query
     * 
     * @param string column
     * @param string item
     * @param string order (optional)
     * @param string sort (optional)
    */
	public static function find( $column = null, $item = null, $order = null, $sort = null ) {
		$class      = get_called_class();
		$datasource = $class::$dsn;
		$table      = $class::$table;

		if( !is_array( $column ) ) {
			$param = array();
			$param[ 'column' ] = $column;
			$param[ 'item' ]   = $item;
			$param[ 'order' ]  = $order;
			$param[ 'sort' ]   = $sort;
		} else {
			$param = $column;
		}

		return Database::where( $datasource, $table, $param[ 'column' ], '=', $param[ 'item' ], $param[ 'order' ], $param[ 'sort' ] );
	}

	/**
     * Constructs an SQL query statement that returns all results greater than the provided value.
     *
     * return query
     * 
     * @param string column
     * @param string item
     * @param string order (optional)
     * @param string sort (optional)
    */
	public static function gt( $column = null, $item = null, $order = null, $sort = null ) {
		$class      = get_called_class();
		$datasource = $class::$dsn;
		$table      = $class::$table;

		if( !is_array( $column ) ) {
			$param = array();
			$param[ 'column' ] = $column;
			$param[ 'item' ]   = $item;
			$param[ 'order' ]  = $order;
			$param[ 'sort' ]   = $sort;
		} else {
			$param = $column;
		}

		return Database::where( $datasource, $table, $param[ 'column' ], '>', $param[ 'item' ], $param[ 'order' ], $param[ 'sort' ] );
	}

	/**
     * Constructs an SQL query statement that returns all results greater than or equal to the provided value.
     *
     * return query
     * 
     * @param string column
     * @param string item
     * @param string order (optional)
     * @param string sort (optional)
    */
	public static function gte( $column = null, $item = null, $order = null, $sort = null ) {
		$class      = get_called_class();
		$datasource = $class::$dsn;
		$table      = $class::$table;

		if( !is_array( $column ) ) {
			$param = array();
			$param[ 'column' ] = $column;
			$param[ 'item' ]   = $item;
			$param[ 'order' ]  = $order;
			$param[ 'sort' ]   = $sort;
		} else {
			$param = $column;
		}

		return Database::where( $datasource, $table, $param[ 'column' ], '>=', $param[ 'item' ], $param[ 'order' ], $param[ 'sort' ] );
	}

	/**
     * Constructs an SQL query statement that returns all results equal to the provided value.
     *
     * return query
     * 
     * @param string column
     * @param string item
     * @param string order (optional)
     * @param string sort (optional)
    */
	public static function hunt( $column = null, $item = null, $order = null, $sort = null ) {
		$class      = get_called_class();
		$datasource = $class::$dsn;
		$table      = $class::$table;

		if( !is_array( $column ) ) {
			$param = array();
			$param[ 'column' ] = $column;
			$param[ 'item' ]   = $item;
			$param[ 'order' ]  = $order;
			$param[ 'sort' ]   = $sort;
		} else {
			$param = $column;
		}

		return Database::where( $datasource, $table, $param[ 'column' ], '=', $param[ 'item' ], $param[ 'order' ], $param[ 'sort' ] );
	}

	/**
     * Constructs an SQL query statement that returns all results less than the provided value.
     *
     * return query
     * 
     * @param string column
     * @param string item
     * @param string order (optional)
     * @param string sort (optional)
    */
	public static function lt( $column = null, $item = null, $order = null, $sort = null ) {
		$class      = get_called_class();
		$datasource = $class::$dsn;
		$table      = $class::$table;

		if( !is_array( $column ) ) {
			$param = array();
			$param[ 'column' ] = $column;
			$param[ 'item' ]   = $item;
			$param[ 'order' ]  = $order;
			$param[ 'sort' ]   = $sort;
		} else {
			$param = $column;
		}

		return Database::where( $datasource, $table, $param[ 'column' ], '<', $param[ 'item' ], $param[ 'order' ], $param[ 'sort' ] );
	}

	/**
     * Constructs an SQL query statement that returns all results less than or equal to the provided value.
     *
     * return query
     * 
     * @param string column
     * @param string item
     * @param string order (optional)
     * @param string sort (optional)
    */
	public static function lte( $column = null, $item = null, $order = null, $sort = null ) {
		$class      = get_called_class();
		$datasource = $class::$dsn;
		$table      = $class::$table;

		if( !is_array( $column ) ) {
			$param = array();
			$param[ 'column' ] = $column;
			$param[ 'item' ]   = $item;
			$param[ 'order' ]  = $order;
			$param[ 'sort' ]   = $sort;
		} else {
			$param = $column;
		}

		return Database::where( $datasource, $table, $param[ 'column' ], '<=', $param[ 'item' ], $param[ 'order' ], $param[ 'sort' ] );
	}

	/**
     * Constructs an SQL query statement that returns all results not equal to the provided value.
     *
     * return query
     * 
     * @param string column
     * @param string item
     * @param string order (optional)
     * @param string sort (optional)
    */
	public static function neq( $column = null, $item = null, $order = null, $sort = null ) {
		$class      = get_called_class();
		$datasource = $class::$dsn;
		$table      = $class::$table;

		if( !is_array( $column ) ) {
			$param = array();
			$param[ 'column' ] = $column;
			$param[ 'item' ]   = $item;
			$param[ 'order' ]  = $order;
			$param[ 'sort' ]   = $sort;
		} else {
			$param = $column;
		}

		return Database::where( $datasource, $table, $param[ 'column' ], '!=', $param[ 'item' ], $param[ 'order' ], $param[ 'sort' ] );
	}

	/**
     * Constructs an SQL query statement that deletes the specified record.
     *
     * return boolean
     * 
     * @param string column
     * @param string item
    */
	public static function obliterate( $column = null, $item = null ) {
		$class      = get_called_class();
		$datasource = $class::$dsn;
		$table      = $class::$table;

		return Database::delete( $datasource, $table, $column, $item );
	}

	/**
     * Constructs an SQL query statement that inserts a new record.
     *
     * return query
     * 
     * @param string columns
     * @param string values
    */
	public static function save( $columns = array(), $values = array() ) {
		$class      = get_called_class();
		$datasource = $class::$dsn;
		$table      = $class::$table;

		return Database::insert( $datasource, $table, $columns, $values );
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
	public static function update( $dsn = array(), $tbl = array(), $columns = array(), $item = array() ) {
		$class      = get_called_class();
		$datasource = $class::$dsn;
		$table      = $class::$table;
		$column     = $dsn;
		$item       = $tbl;

		return Database::update( $datasource, $table, $column, $item );
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
	public static function where( $dsn = null, $tbl = null, $column = null, $cond = null, $item = null, $order = null, $sort = null ) {
		$class      = get_called_class();
		$datasource = $class::$dsn;
		$table      = $class::$table;

		if( !is_array( $column ) ) {
			$param = array();
			$param[ 'column' ] = $dsn;
			$param[ 'cond' ]   = $tbl;
			$param[ 'item' ]   = $column;
			$param[ 'order' ]  = $item;
			$param[ 'sort' ]   = $order;
		} else {
			$param = $column;
		}

		return Database::where( $datasource, $table, $param[ 'column' ], $param[ 'cond' ], $param[ 'item' ], $param[ 'order' ], $param[ 'sort' ] );
	}

	/**
     * Constructs an SQL query statement that returns all results matching the where clause of the provided search criteria.
     *
     * return query
     * 
     * @param string column
     * @param string item
     * @param string order (optional)
     * @param string sort (optional)
    */
	public static function werewolf( $column = null, $cond = null, $item = null, $order = null, $sort = null ) {
		$class      = get_called_class();
		$datasource = $class::$dsn;
		$table      = $class::$table;

		if( !is_array( $column ) ) {
			$param = array();
			$param[ 'column' ] = $column;
			$param[ 'cond' ]   = $cond;
			$param[ 'item' ]   = $item;
			$param[ 'order' ]  = $order;
			$param[ 'sort' ]   = $sort;
		} else {
			$param = $column;
		}

		return Database::where( $datasource, $table, $param[ 'column' ], $param[ 'cond' ], $param[ 'item' ], $param[ 'order' ], $param[ 'sort' ] );
	}

}
