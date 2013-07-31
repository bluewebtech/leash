<?php Response::out( HTML::h1( $title ) ); ?>

<?php if( !isset( $process ) ) { ?>
<form action="" method="post" name="upload_form" id="upload_form" enctype="multipart/form-data">
<p>
	File:<br />
	<input type="file" name="file[]" id="file" multiple="multiple" />
</p>
<p>
	<input type="submit" name="process" id="process" value="Upload" />
</p>
</form>
<?php } else {

	/*
	$content = "I LOVE SOUTH CAROLINA\n";
	$append = File::append( 
		array(
			'destination' => $_SERVER[ 'DOCUMENT_ROOT' ] . 'assets/files/file.txt', 
			'content'     => $content
		)
	);
	dump( $append );
	*/
	
	/*
	$copy = File::copy( 
		array(
			'source'      => $_SERVER[ 'DOCUMENT_ROOT' ] . 'assets/files/file.txt', 
			'destination' => $_SERVER[ 'DOCUMENT_ROOT' ] . 'assets/files/stuff/file.txt'
		)
	);
	dump( $copy );
	*/
	
	/*
	$delete = File::delete( 
		array( 'source' => $_SERVER[ 'DOCUMENT_ROOT' ] . 'assets/files/stuff/file.txt' )
	);
	dump( $delete );
	*/
	
	/*
	$move = File::move( 
		array(
			'source'      => $_SERVER[ 'DOCUMENT_ROOT' ] . 'assets/files/file.txt', 
			'destination' => $_SERVER[ 'DOCUMENT_ROOT' ] . 'assets/files/stuff/file.txt'
		)
	);
	dump( $move );
	*/
	
	/*
	$read = File::read( 
		array( 'source' => $_SERVER[ 'DOCUMENT_ROOT' ] . 'assets/files/file.txt' )
	);
	dump( $read );
	*/
	
	/*
	$rename = File::rename( 
		array(
			'source'      => $_SERVER[ 'DOCUMENT_ROOT' ] . 'assets/files/file.txt', 
			'destination' => $_SERVER[ 'DOCUMENT_ROOT' ] . 'assets/files/monkey.txt'
		)
	);
	dump( $rename );
	*/
	
	/*
	$upload = File::upload( 
		array(
			'field'       => $files, 
			'destination' => $_SERVER[ 'DOCUMENT_ROOT' ] . 'assets/files/', 
			'accept'      => 'pdf, doc, jpg', 
			'size'        => '200', 
			'conflict'    => 'unique'
		)
	);
	dump( $upload );
	*/

	/*
	$content = "I HATE NEW JERSEY\n";
	$write = File::write( 
		array(
			'destination' => $_SERVER[ 'DOCUMENT_ROOT' ] . 'assets/files/file.txt', 
			'content'     => $content
		)
	);
	dump( $write );
	*/

}
?>
