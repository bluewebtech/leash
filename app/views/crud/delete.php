<?php 

/*
 * Created by: Peter Morrison
 * Date Created: 2013-02-20
 * Date Updated: 2013-08-12
 * Sample CRUD application delete view.
 */

echo HTML::h1( $title . ' | ' . $band );
echo HTML::h2( 'Delete' );

if( isset( $process ) ) {

	echo HTML::p( 'Deleted!' );
	echo HTML::p( 'Click ' . HTML::ahref( 'here', '/crud/' ) . ' to go to band list' );

} else {

	Form::open( array( 'action' => '/crud/delete/' . $id, 'name' => 'delete', 'method' => 'post' ) );
		Form::label( array( 'label' => 'Band:', 'value' => $band ) );
		Form::div(
			Form::submit( array( 'name' => 'process', 'value' => 'Yes' ) ) . 
			Form::submit( array( 'name' => 'process', 'value' => 'No' ) ) 
		);
	Form::close();

}
