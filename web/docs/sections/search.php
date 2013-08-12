<h1>Search</h1>
<?php

$s = $_POST[ 'search' ];
$dir = scandir( 'sections/' );
$files = array();
$results = array();

if( isset( $s ) && !empty( $s ) ) {

	foreach ( $dir as $key => $value ) {
		if( $value != '.' && $value != '..' ) {
			array_push( $files, $value );
		}
	}

	foreach ( $files as $key => $value ) {
		$file = file_get_contents( 'sections/' . $value );
		if( strpos( $file, $s ) || strpos( $file, strtolower( $s ) ) || strpos( $file, ucwords( $s ) ) ) {
			$results[] = $value;
		}
	}

	echo '<h2>A total of ' . count( $results ) . ' results were found matching search criteria (' . $s . ")</h2>\n";

	if( count( $results ) ) {
		foreach ( $results as $key => $value ) {
			$text = preg_replace( '/[^A-Za-z0-9\-]-/', '', str_replace( '.php', '', str_replace( '-',  ' ', $value ) ) );
			$link = '/docs/' . $text;
			echo '<a href="' . $link . '"><h3>' . ucwords( $text ) . "</h3></a>\n";
		}
	} else {
		echo "<p>No results were found.</p>\n";
	}

} else {
	echo "<p>No search criteria provided.</p>\n";
}
