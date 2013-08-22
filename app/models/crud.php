<?php

/*
 * Created by: Peter Morrison
 * Date Created: 2013-02-20
 * Date Updated: 2013-08-22
 * Sample CRUD application model.
 */

class CRUDModel extends ORM {

	public static $dsn   = 'Sample';
	public static $table = 'bands';

	public static function crud_index() {
		$values = array(
			'title' => CRUDController::$title, 
			'bands' => CRUDModel::all()
		);

		return $values;
	}

	public static function crud_create() {
		$post   = Request::post();
		$values = array(
			'title' => CRUDController::$title
		);

		if( isset( $post->process ) ) {
			$values[ 'band' ]         = $post->band;
			$values[ 'date_created' ] = date( 'Y-m-d' );
			$values[ 'process' ]      = $post->process;

			if( $post->process == 'Cancel' ) {
				CRUDController::cancel();
			} else {
				$columns = array( 'date_created', 'band' );
				CRUDModel::save( $columns, array( date( 'Y-m-d' ), $values[ 'band' ] ) );
			}
		}

		return $values;
	}

	public static function crud_delete() {
		$post   = Request::post();
		$bands  = CRUDModel::find( 'id', $GLOBALS[ 'params' ] );
		$values = array(
			'title' => CRUDController::$title, 
			'id'    => $bands[ 0 ]->id, 
			'band'  => $bands[ 0 ]->band
		);

		if( isset( $post->process ) ) {

			$values[ 'process' ] = $post->process;

			if( $post->process == 'Yes' ) {
				CRUDModel::delete( 'id', $GLOBALS[ 'params' ] );
			} else {
				CRUDController::cancel();
			}

		}

		return $values;
	}

	public static function crud_read() {
		$post  = Request::post();
		$bands = CRUDModel::find( 'id', $GLOBALS[ 'params' ] );

		$values = array(
			'title'        => CRUDController::$title, 
			'id'           => $bands[ 0 ]->id, 
			'band'         => $bands[ 0 ]->band, 
			'date_created' => $bands[ 0 ]->date_created, 
			'date_updated' => empty( $bands[ 0 ]->date_updated ) ? 'Not Yet' : $bands[ 0 ]->date_updated
		);

		return $values;
	}

	public static function crud_update() {
		$post  = Request::post();
		$bands = CRUDModel::find( 'id', $GLOBALS[ 'params' ] );

		$values = array(
			'title'        => CRUDController::$title, 
			'id'           => $bands[ 0 ]->id, 
			'band'         => $bands[ 0 ]->band, 
			'date_created' => $bands[ 0 ]->date_created, 
			'date_updated' => empty( $bands[ 0 ]->date_updated ) ? 'Not Yet' : $bands[ 0 ]->date_updated
		);

		if( isset( $post->process ) ) {
			$values[ 'id' ]           = $GLOBALS[ 'params' ];
			$values[ 'band' ]         = $post->band;
			$values[ 'date_updated' ] = date( 'Y-m-d' );
			$values[ 'process' ]      = $post->process;

			if( $post->process == 'Cancel' ) {
				CRUDController::cancel();
			} else {
				$columns = array( 'date_updated', 'band', 'id' );
				$band    = CRUDModel::edit( $columns, array( date( 'Y-m-d' ), $values[ 'band' ], $values[ 'id' ] ) );
			}
		}

		return $values;
	}

}
