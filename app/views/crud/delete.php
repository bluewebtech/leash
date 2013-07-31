<?php 

/*
 * Created by: Peter Morrison
 * Date Created: 2013-02-20
 * Date Updated: 2013-07-22
 * Sample CRUD application delete view.
 */

Response::out( 
	HTML::h1( $title . ' | ' . $band ) . 
	HTML::h2( 'Delete' )
);

if( !isset( $process ) ) {

	Response::out(
		'<form action="" name="band_form" id="band_form" method="post">' . 
			HTML::p( 
				HTML::b( 'Are you sure you want to delete? ' ) . $band
			) . 
			HTML::p(
				HTML::nl( '<input type="submit" name="process" id="process" value="Yes" />' ) . 
				HTML::nl( '<input type="submit" name="process" id="process" value="No" />' ) 
			) . 
		'</form>'
	);

} else {

	Response::out(
		HTML::p( 'Deleted' ) . 
		HTML::p( 'Click ' . HTML::ahref( 'here', '/crud/' ) . ' to go to band list' )
	);

}
