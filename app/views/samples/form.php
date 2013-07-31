<?php

Response::out( 
	HTML::h1( $title ) . 
	Form::open( array( 'name' => 'contact', 'action' => '', 'method' => 'post' ) ) . 
	Form::text( array( 'label' => 'First Name:',  'name' => 'first_name', 'size' => '30' ) ) . 
	Form::text( array( 'label' => 'Last Name:',  'name' => 'last_name', 'size' => '30' ) ) . 
	Form::checkbox( array( 'label' => 'Favorite Color:',  'name' => 'color', 'values' => 'Blue, Green, Black, Brown, Orange' ) ) . 
	Form::radio( array( 'label' => 'Do you like beer?',  'name' => 'beer', 'values' => 'Yes, No' ) ) . 
	Form::select( array( 'label' => 'Gender',  'name' => 'gender', 'values' => 'Male, Female, Alien, Zombie, Moose' ) ) . 
	Form::textarea( array( 'label' => 'Comments:',  'name' => 'comments' ) ) . 
	Form::submit( array( 'name' => 'process', 'value' => 'Process' ) ) . 
	Form::hidden( array( 'name' => 'stuff', 'value' => 'Hammer' ) ) . 
	Form::close()
);

dump( $post );

/*
$form = Form::create( 
	array( 'name' => 'hello', 'action' => '', 'method' => 'post' ), 
	array(
		Form::text( array( 'label' => 'First Name:',  'name' => 'first_name', 'size' => '30' ) ),  
		Form::text( array( 'label' => 'Last Name:',  'name' => 'last_name', 'size' => '30' ) ), 
		Form::checkbox( array( 'label' => 'Favorite Color:',  'name' => 'color[]', 'values' => 'Blue, Green, Black, Brown, Orange' ) ), 
		Form::radio( array( 'label' => 'Do you like beer?',  'name' => 'beer', 'values' => 'Yes, No' ) ), 
		Form::textarea( array( 'label' => 'Comments:',  'name' => 'comments' ) ), 
		Form::submit( array( 'name' => 'process', 'value' => 'Process' ) ) 
	)
);
Response::out( $form );
*/
