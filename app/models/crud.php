<?php

/*
 * Created by: Peter Morrison
 * Date Created: 2013-02-20
 * Date Updated: 2013-06-27
 * Sample CRUD application model.
 */

class CRUDModel {

	public static $dsn = 'Sample';

	public static function getBands() {
		$dsn   = Database::dsn( self::$dsn );
		$query = Database::query( 
			'SELECT id, 
			        date_created, 
			        date_updated, 
			        band 
	         FROM   bands' 
		);

		return $query;
	}

	public static function getBand( $id ) {
		$dsn   = Database::dsn( self::$dsn );
		$query = Database::query( 
			'SELECT id, 
			        date_created, 
			        date_updated, 
			        band  
			 FROM   bands 
			 WHERE  id = :id', 
			 array( $id ) 
		);

		return $query;
	}

	public static function createBand( $values ) {
		$dsn   = Database::dsn( self::$dsn );
		$query = Database::query( 
			'INSERT INTO bands ( 
				band, 
				date_created 
			)
		     VALUES ( 
				:band, 
				:date_created 
			)', 
			array( 
				$values[ 'band' ], 
				$values[ 'date_created' ] 
			) 
		);

		return $query;
	}

	public static function updateBand( $values ) {
		$dsn   = Database::dsn( self::$dsn );
		$query = Database::query( 
			'UPDATE bands
			 SET    band         = :band, 
			        date_updated = :date_updated
			 WHERE  id           = :id', 
			 array( 
			 	$values[ 'band' ], 
			 	$values[ 'date_updated' ], 
			 	$values[ 'id' ]  
			 ) 
		);

		return $query;
	}

	public static function deleteBand( $id ) {
		$dsn   = Database::dsn( self::$dsn );
		$query = Database::query( 
			'DELETE FROM bands
			 WHERE id = :id', 
			 array( $id ) 
		);

		return $query;
	}

}
