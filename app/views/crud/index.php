<?php 

/*
 * Created by: Peter Morrison
 * Date Created: 2013-02-20
 * Date Updated: 2013-08-12
 * Sample CRUD application index view.
 */

$content = 
HTML::nl( '<table width="98%" border="0" cellpadding="1" cellspacing="1">
	<tr>
		<th>Item</th>
		<th>Band</th>
		<th>Date Created</th>
		<th>Date Updated</th>
		<th>Read</th>
		<th>Update</th>
		<th>Delete</th>
	</tr>' );

foreach( $bands as $key => $value ) {
	$key = $key + 1;

	$content .= HTML::nl( '<tr>' );
		$content .= HTML::nl( '<td align="center">' . $key . '</td>' );
		$content .= HTML::nl( '<td>' . $value->band . '</td>' );
		$content .= HTML::nl( '<td align="center">' . $value->date_created . '</td>' );
		$content .= HTML::nl( '<td align="center">' . $value->date_updated . '</td>' );
		$content .= HTML::nl( '<td align="center">' . HTML::ahref( 'Read', '/crud/read/' . $value->id, 'Read ' . $value->band ) . '</td>' );
		$content .= HTML::nl( '<td align="center">' . HTML::ahref( 'Update', '/crud/update/' . $value->id, 'Update ' . $value->band ) . '</td>' );
		$content .= HTML::nl( '<td align="center">' . HTML::ahref( 'Delete', '/crud/delete/' . $value->id, 'Delete ' . $value->band ) . '</td>' );
	$content .= HTML::nl( '</tr>' );
}

$content .= HTML::nl( '</table>' );

echo HTML::h1( $title );
echo HTML::p( 'Click ' . HTML::ahref( 'here', '/crud/create/' )  . ' to create a new band.' );
echo $content;
