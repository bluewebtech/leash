<?php

/*
 * Created by: Peter Morrison
 * Date Created: 2013-02-20
 * Date Updated: 2013-07-22
 * Sample CRUD application controller.
 */

class CRUDController {

	public static $title = 'Bands CRUD Example';

	public static $redirect = '/crud/';

	public function __construct() {
		title( self::$title );
	}

	public function index() {
		$bands  = CRUDModel::getBands();
		$values = array(
			'title' => self::$title, 
			'bands' => $bands
		);

		View::render( 'index', $values );
	}

	public static function cancel() {
		Request::redirect( self::$redirect );
	}

	public function create() {
		$post   = Request::post();
		$values = array(
			'title' => self::$title
		);

		if( isset( $post->process ) ) {
			$values[ 'band' ]         = $post->band;
			$values[ 'date_created' ] = date( 'Y-m-d' );
			$values[ 'process' ]      = $post->process;

			if( $post->process == 'Cancel' ) {
				CRUDController::cancel();
			} else {
				CRUDModel::createBand( $values );
			}
		}

		View::render( 'create', $values );
	}

	public function delete() {
		$post   = Request::post();
		$id     = $GLOBALS[ 'params' ];
		$bands  = CRUDModel::getBand( $id );
		$values = array(
			'title' => self::$title, 
			'id'    => $bands[ 0 ]->id, 
			'band'  => $bands[ 0 ]->band
		);

		if( $post->process == 'Yes' ) {
			CRUDModel::deleteBand( $id );
		}

		if( empty( $post->process ) || $post->process == 'Yes' ) {
			View::render( 'delete', $values );
		} else {
			CRUDController::cancel();
		}
	}

	public function read() {
		$post  = Request::post();
		$bands = CRUDModel::getBand( $GLOBALS[ 'params' ] );

		$values = array(
			'title'        => self::$title, 
			'id'           => $bands[ 0 ]->id, 
			'band'         => $bands[ 0 ]->band, 
			'date_created' => $bands[ 0 ]->date_created, 
			'date_updated' => empty( $bands[ 0 ]->date_updated ) ? 'Not Yet' : $bands[ 0 ]->date_updated
		);

		if( $post->process == 'Cancel' ) {
			CRUDController::cancel();
		} else {
			View::render( 'read', $values );
		}
	}

	public function update() {
		$post   = Request::post();
		$id     = $GLOBALS[ 'params' ];
		$bands  = CRUDModel::getBand( $id );

		$values = array(
			'title'        => self::$title, 
			'id'           => $bands[ 0 ]->id, 
			'band'         => $bands[ 0 ]->band, 
			'date_created' => $bands[ 0 ]->date_created, 
			'date_updated' => empty( $bands[ 0 ]->date_updated ) ? 'Not Yet' : $bands[ 0 ]->date_updated
		);

		if( isset( $post->process ) ) {
			$values[ 'id' ]           = $id;
			$values[ 'band' ]         = $post->band;
			$values[ 'date_updated' ] = date( 'Y-m-d' );
			$values[ 'process' ]      = $post->process;

			if( $post->process == 'Cancel' ) {
				CRUDController::cancel();
			} else {
				CRUDModel::updateBand( $values );
			}
		}

		View::render( 'update', $values );
	}

}
