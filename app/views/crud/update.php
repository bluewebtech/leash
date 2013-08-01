<?php 

/*
 * Created by: Peter Morrison
 * Date Created: 2013-02-20
 * Date Updated: 2013-08-01
 * Sample CRUD application update view.
 */

echo HTML::h1( $title . ' | ' . $band );
echo HTML::h2( 'Update' );

if( !isset( $process ) ) {

	Form::open( array( 'action' => '/crud/update/' . $id, 'name' => 'update', 'method' => 'post' ) );
		Form::label( array( 'label' => 'Created:', 'value' => $date_created ) );
		Form::label( array( 'label' => 'Updated:', 'value' => $date_updated ) );
		Form::text( array( 'label' => 'Band:', 'name' => 'band', 'value' => $band ) );
		Form::div(
			Form::submit( array( 'name' => 'process', 'value' => 'Update' ) ) . 
			Form::submit( array( 'name' => 'process', 'value' => 'Cancel' ) ) 
		);
	Form::close();

} else {
	echo HTML::p( 'Updated ' . $band );
	echo HTML::p( 'Click ' . HTML::ahref( 'here', '/crud/' ) . ' to go to band list' );
}
