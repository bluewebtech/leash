<?php 

/*
 * Created by: Peter Morrison
 * Date Created: 2013-02-20
 * Date Updated: 2013-08-12
 * Sample CRUD application read view.
 */

echo HTML::h1( $title . ' | ' . $band );
echo HTML::h2( 'Read' );
echo HTML::p( HTML::b( 'Created: ' ) . $date_created );
echo HTML::p( HTML::b( 'Updated: ' ) . $date_updated );
echo HTML::p( HTML::b( 'Band: ' ) . $band );
echo HTML::p( 
	HTML::ahref( 'Update', '/crud/update/' . $id, 'Update' ) . ' | ' . 
	HTML::ahref( 'Delete', '/crud/delete/' . $id, 'Delete' ) . ' | ' . 
	HTML::ahref( 'Cancel', '/crud/cancel/' . $id, 'Cancel' )
);
