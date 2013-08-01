<?php

/*
 * Created by: Peter Morrison
 * Date Created: 2013-02-20
 * Date Updated: 2013-08-01
 * Sample CRUD application controller.
 */

class CRUDController {

	public static $title;

	public static $redirect = '/crud/';

	public function __construct() {
		$title  = 'Bands CRUD Example';
		$action = Strings::uppercase_first( $GLOBALS[ 'action' ] );
		CRUDController::$title = isset( $action ) && $action != 'Index' ? $title . ' : ' . $action : $title;
		
		HTML::title( CRUDController::$title );
	}

	public function index() {
		$values = array(
			'title' => CRUDController::$title, 
			'bands' => CRUDModel::all()
		);

		View::render( 'index', $values );
	}

	public static function cancel() {
		Request::redirect( CRUDController::$redirect );
	}

	public function create() {
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

		View::render( 'create', $values );
	}

	public function delete() {
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

		View::render( 'delete', $values );
	}

	public function read() {
		$post  = Request::post();
		$bands = CRUDModel::find( 'id', $GLOBALS[ 'params' ] );

		$values = array(
			'title'        => CRUDController::$title, 
			'id'           => $bands[ 0 ]->id, 
			'band'         => $bands[ 0 ]->band, 
			'date_created' => $bands[ 0 ]->date_created, 
			'date_updated' => empty( $bands[ 0 ]->date_updated ) ? 'Not Yet' : $bands[ 0 ]->date_updated
		);

		View::render( 'read', $values );
	}

	public function update() {
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

		View::render( 'update', $values );
	}

}
