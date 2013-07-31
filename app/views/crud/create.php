<?php 

/*
 * Created by: Peter Morrison
 * Date Created: 2013-02-20
 * Date Updated: 2013-07-22
 * Sample CRUD application create view.
 */

Response::out( 
	HTML::h1( $title ) . 
	HTML::h2( 'Create' ) 
);

if( !isset( $process ) ) {

	Response::out( 
		'<form action="" name="band_form" id="band_form" method="post">' . 
			HTML::p( 
				HTML::b( 'Band: ' ) . '<input type="text" name="band" id="band" value="" />' 
			) . 
			HTML::p( 
				HTML::nl( '<input type="submit" name="process" id="process" value="Create" />' ) . 
				HTML::nl( '<input type="submit" name="process" id="process" value="Cancel" />' ) 
			) . 
		'</form>' 
	);

} else {

	Response::out( 
		HTML::p( 'Created' ) . 
		HTML::p( 'Click ' . ahref( 'here', '/crud/' ) . ' to go to band list' )
	);
}
