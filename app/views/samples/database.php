<?php

$dsn = Database::dsn( 'Sample' );

$query = Database::query( 'SELECT * FROM bands' );
$columns = Database::columns();
$total = Database::count();

dump( $columns );
dump( $total );
dump( $query );

/*
$query = Database::query( 
	'INSERT INTO bands ( 
		band, 
		date_created 
	)
     VALUES ( 
		:band, 
		:date_created 
	)', 
	array( 
		'Creed', 
		date( 'Y-m-d' ) 
	) 
);

dump( Database::lastinserted() );
*/
