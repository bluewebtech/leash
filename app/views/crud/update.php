<?php 

/*
 * Created by: Peter Morrison
 * Date Created: 2013-02-20
 * Date Updated: 2013-07-22
 * Sample CRUD application update view.
 */

Response::out( 
	HTML::h1( $title . ' | ' . $band ) . 
	HTML::h2( 'Update' ) 
);

if( !isset( $process ) ) {

	Response::out( 
		'<form action="" name="band_form" id="band_form" method="post">' . 
			HTML::p( 
				HTML::b( 'Created: ' ) . $date_created 
			) . 
			HTML::p( 
				HTML::b( 'Updated: ' ) . $date_updated 
			) . 
			HTML::p( 
				HTML::b( 'Band: ' ) . 
				'<input type="text" name="band" id="band" value="' . $band . '" />' 
			) . 
			HTML::p( 
				HTML::nl( '<input type="submit" name="process" id="process" value="Update" />' ) . 
				HTML::nl( '<input type="submit" name="process" id="process" value="Cancel" />' ) 
			) . 
		'</form>'
	);

} else {

	Response::out(
		HTML::p( 'Updated ' . $band ) . 
		HTML::p( 'Click ' . HTML::ahref( 'here', '/crud/' ) . ' to go to band list' )
	);

}
