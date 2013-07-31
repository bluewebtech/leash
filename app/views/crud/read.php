<?php 

/*
 * Created by: Peter Morrison
 * Date Created: 2013-02-20
 * Date Updated: 2013-07-22
 * Sample CRUD application read view.
 */

Response::out( 

	HTML::h1( $title . ' | ' . $band ) . 
	HTML::h2( 'Read' ) . 
	HTML::p( 
		HTML::b( 'Created: ' ) . 
		$date_created 
	) . 
	HTML::p( 
		HTML::b( 'Updated: ' ) . 
		$date_updated 
	) . 
	HTML::p( 
		HTML::b( 'Band: ' ) . 
		$band 
	) . 
	HTML::p( 
		HTML::ahref( 'Update', '/crud/update/' . $id, 'Update' ) . ' | ' . 
		HTML::ahref( 'Delete', '/crud/delete/' . $id, 'Delete' ) . ' | ' . 
		HTML::ahref( 'Cancel', '/crud/cancel/' . $id, 'Cancel' )
	)

);
