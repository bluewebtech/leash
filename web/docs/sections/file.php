<?php require '../templates/header.php' ?>
<h1>File</h1>
<p>
	The File class contains many methods to handle file actions easy. Available file actions 
	are: <a href="#append">Append</a>, <a href="#copy">Copy</a>, <a href="#delete">Delete</a>, 
	<a href="#move">Move</a>, <a href="#rename">Rename</a>, <a href="#read">Read</a>, 
	<a href="#upload">Upload</a>, <a href="#write">Write</a>
</p>
<h2 id="append">Append</h2>
<p>
	The append file class method appends text from the content parameter to a specific file 
	defined in the destination parameter.
</p>
<pre>
<code>
&lt;?php

$content = "I LOVE SOUTH CAROLINA\n";
$append = File::append( 
	array(
		'destination' => $_SERVER[ 'DOCUMENT_ROOT' ] . 'assets/files/file.txt', 
		'content'     => $content
	)
);

Dbug::dump( $append );
</code>
</pre>
<h2 id="copy">Copy</h2>
<p>
	The copy file class method copies a specific file defined in the source parameter to the 
	specified location defined in the destination parameter.
</p>
<pre>
<code>
&lt;?php

$copy = File::copy( 
	array(
		'source'      => $_SERVER[ 'DOCUMENT_ROOT' ] . 'assets/files/file.txt', 
		'destination' => $_SERVER[ 'DOCUMENT_ROOT' ] . 'assets/files/stuff/file.txt'
	)
);

Dbug::dump( $copy );
</code>
</pre>

<h2 id="delete">Delete</h2>
<p>
	The delete file class method deletes the specific file defined within the source parameter.
</p>
<pre>
<code>
&lt;?php

$delete = File::delete( 
	array( 'source' => $_SERVER[ 'DOCUMENT_ROOT' ] . 'assets/files/stuff/file.txt' )
);

Dbug::dump( $delete );
</code>
</pre>

<h2 id="move">Move</h2>
<p>
	The move file class method moves a specific file defined in the source parameter to the 
	specified location specified within the destination parameter.
</p>
<pre>
<code>
&lt;?php

$move = File::move( 
	array(
		'source'      => $_SERVER[ 'DOCUMENT_ROOT' ] . 'assets/files/file.txt', 
		'destination' => $_SERVER[ 'DOCUMENT_ROOT' ] . 'assets/files/stuff/file.txt'
	)
);

Dbug::dump( $move );
</code>
</pre>

<h2 id="read">Read</h2>
<p>
	The read file class method reads a specific file defined within the source parameter.
</p>
<pre>
<code>
&lt;?php

$read = File::read( 
	array( 'source' => $_SERVER[ 'DOCUMENT_ROOT' ] . 'assets/files/file.txt' )
);

Dbug::dump( $read );
</code>
</pre>

<h2 id="rename">Rename</h2>
<p>
	The rename file class method renames the defined file in the source parameter to the defined 
	file defined within the destination parameter.
</p>
<pre>
<code>
&lt;?php

$rename = File::rename( 
	array(
		'source'      => $_SERVER[ 'DOCUMENT_ROOT' ] . 'assets/files/file.txt', 
		'destination' => $_SERVER[ 'DOCUMENT_ROOT' ] . 'assets/files/monkey.txt'
	)
);

Dbug::dump( $rename );
</code>
</pre>

<h2 id="upload">Upload</h2>
<p>
	The upload file class method handles the uploading of all files based on specified parameters.
</p>
<p>
	Here we have three different forms that the upload method can be used. All three examples 
	allow the uploading of multiple files of any type and size. Each example does exactly the 
	same thing.
</p>
<h3>Example 1</h3>
<p>Example 1 passes upload parameters as an array within the function itself.</p>
<pre>
<code>
&lt;?php

File::file( 
	array(
		'field' => $files, 
		'action' => 'upload', 
		'destination' => $_SERVER[ 'DOCUMENT_ROOT' ] . 'assets/files/'
	)
);
</code>
</pre>
<h3>Example 2</h3>
<p>Example 2 passes a variable containing the parameter structure into the function.</p>
<pre>
<code>
&lt;?php

$file = array(
	'field' => $files, 
	'action' => 'upload', 
	'destination' => $_SERVER[ 'DOCUMENT_ROOT' ] . 'assets/files/'
);

File::file( $file );
</code>
</pre>

<h3>Example 3</h3>
<p>Example 3 passes each parameter separately</p>
<pre>
<code>
&lt;?php

File::file( 
	$field = $files, 
	$action = 'upload', 
	$accept = '', 
	$destination = $_SERVER[ 'DOCUMENT_ROOT' ] . 'assets/files/'
);
</code>
</pre>

<h3>Upload Results</h3>
<p>
	The results that are returned after the upload function has been executed successfully can 
	be printed to the screen by utilizing the built in PHP print_r command or by using one of the 
	core functions built into the framework. Below are two examples of outputting the results of a 
	successful upload to the screen. All examples will print out information about the file(s) that 
	have been upload including the file name, temp file name, file size, upload path, conflict type 
	(if specified), allowed file types (if specified) and allowed file size (if specified).
</p>

<h3>Output Results Example 1</h3>
<p>
	Output example 1 uses the built in core framework pre() function to display the results of the 
	uploaded file(s).
</p>
<pre>
<code>
&lt;?php

$upload = File::file( 
	$field = $files, 
	$action = 'upload', 
	$accept = '', 
	$destination = $_SERVER[ 'DOCUMENT_ROOT' ] . 'assets/files/'
);

HTML::pre( $upload );
</code>
</pre>

<h3>Output Results Example 2</h3>
<p>
	Output example 2 uses the dump core function that utilizes the dBug plugin which is installed by 
	default to display the results more clearly.
</p>
<pre>
<code>
&lt;?php

$upload = File::file( 
	$field = $files, 
	$action = 'upload', 
	$accept = '', 
	$destination = $_SERVER[ 'DOCUMENT_ROOT' ] . 'assets/files/'
);

Dbug::dump( $upload );
</code>
</pre>

<h2 id="write">Write</h2>
<p>
	The write file class method creates a new file specified in the destination parameter and 
	saves it to the path specified in the destination and populates the file with the content 
	provided in the content parameter.
</p>
<pre>
<code>
&lt;?php

$content = "I HATE NEW JERSEY\n";
$write = File::write( 
	array(
		'destination' => $_SERVER[ 'DOCUMENT_ROOT' ] . 'assets/files/file.txt', 
		'content'     => $content
	)
);

Dbug::dump( $write );
</code>
</pre>

<br />
<?php require '../templates/footer.php' ?>
