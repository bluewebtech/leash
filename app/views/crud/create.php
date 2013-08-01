<?php 

/*
 * Created by: Peter Morrison
 * Date Created: 2013-02-20
 * Date Updated: 2013-08-01
 * Sample CRUD application create view.
 */

echo HTML::h1( $title );
echo HTML::h2( 'Create' ); 

if( !isset( $process ) ) {

	Form::open( array( 'action' => '/crud/create/', 'name' => 'create', 'method' => 'post' ) );
		Form::text( array( 'label' => 'Band:', 'name' => 'band' ) );
		Form::div(
			Form::submit( array( 'name' => 'process', 'value' => 'Create' ) ) . 
			Form::submit( array( 'name' => 'process', 'value' => 'Cancel' ) ) 
		);
	Form::close();

} else {
	echo HTML::p( 'Created!' );
	echo HTML::p( 'Click ' . ahref( 'here', '/crud/' ) . ' to go to band list' );
}
