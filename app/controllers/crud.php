<?php

/*
 * Created by: Peter Morrison
 * Date Created: 2013-02-20
 * Date Updated: 2013-08-22
 * Sample CRUD application controller.
 */

class CRUDController {

	public static $title;

	public static $redirect = '/crud/';

	public function __construct() {
		$title  = 'Bands CRUD Example';
		$action = String::uppercase_first( $GLOBALS[ 'action' ] );
		CRUDController::$title = isset( $action ) && $action != 'Index' ? $title . ' : ' . $action : $title;
		HTML::title( CRUDController::$title );
	}

	public function index() {
		View::render( 'index', CRUDModel::crud_index() );
	}

	public static function cancel() {
		Request::redirect( CRUDController::$redirect );
	}

	public function create() {
		View::render( 'create', CRUDModel::crud_create() );
	}

	public function delete() {
		View::render( 'delete', CRUDModel::crud_delete() );
	}

	public function read() {
		View::render( 'read', CRUDModel::crud_read() );
	}

	public function update() {
		View::render( 'update', CRUDModel::crud_update() );
	}

}
