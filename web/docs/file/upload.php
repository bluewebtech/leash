<?php include '../inc/head.php' ?>

<h1>File | Upload</h1>
<p>
	The File class contains an easy to use file upload function that also gives you control over 
	many aspects of handling what is allowed to be uploaded. Below are some examples of how the 
	upload function could be utilized.
</p>

<h2>Upload Function Usage</h2>
<p>
	Here we have three different forms that the upload function can be used. All three examples allow 
	the uploading of multiple files of any type and size. Each example does exactly the same thing.
</p>

<h2>Example 1</h2>
<p>Example 1 passes upload parameters as an array within the function itself.</p>
<pre>
<code>
&lt;?php

	Leash\File::file( 
		array(
			'field'       => $files, 
			'action'      => 'upload', 
			'destination' => $_SERVER[ 'DOCUMENT_ROOT' ] . 'assets/files/'
		)
	);
</code>
</pre>

<h2>Example 2</h2>
<p>Example 2 passes a variable containing the parameter structure into the function.</p>
<pre>
<code>
&lt;?php

	$file = array(
		'field'       => $files, 
		'action'      => 'upload', 
		'destination' => $_SERVER[ 'DOCUMENT_ROOT' ] . 'assets/files/'
	);

	Leash\File::file( $file );
</code>
</pre>

<h2>Example 3</h2>
<p>Example 3 passes each parameter separately</p>
<pre>
<code>
&lt;?php

	Leash\File::file( 
		$field       = $files, 
		$action      = 'upload', 
		$accept      = '', 
		$destination = $_SERVER[ 'DOCUMENT_ROOT' ] . 'assets/files/'
	);
</code>
</pre>

<h2>Upload Results</h2>
<p>
	The results that are returned after the upload function has been executed successfully can 
	be printed to the screen by utilizing the built in PHP print_r command or by using one of the 
	core functions built into the framework. Below are two examples of outputting the results of a 
	successful upload to the screen. All examples will print out information about the file(s) that 
	have been upload including the file name, temp file name, file size, upload path, conflict type 
	(if specified), allowed file types (if specified) and allowed file size (if specified).
</p>

<h2>Output Results Example 1</h2>
<p>
	Output example 1 uses the built in core framework pre() function to display the results of the 
	uploaded file(s).
</p>
<pre>
<code>
&lt;?php

	$upload = Leash\File::file( 
		$field       = $files, 
		$action      = 'upload', 
		$accept      = '', 
		$destination = $_SERVER[ 'DOCUMENT_ROOT' ] . 'assets/files/'
	);

	pre( $upload );
</code>
</pre>

<h2>Output Results Example 2</h2>
<p>
	Output example 2 uses the dump core function that utilizes the dBug plugin which is installed by 
	default to display the results more clearly.
</p>
<pre>
<code>
&lt;?php

	$upload = Leash\File::file( 
		$field       = $files, 
		$action      = 'upload', 
		$accept      = '', 
		$destination = $_SERVER[ 'DOCUMENT_ROOT' ] . 'assets/files/'
	);

	dump( $upload );
</code>
</pre>

<?php include '../inc/foot.php' ?>
