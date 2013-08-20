<h1>File</h1>
<p>
	The File class contains many methods to handle file actions easy. Available file actions 
	are: <a href="#append">Append</a>, <a href="#copy">Copy</a>, <a href="#delete">Delete</a>, 
	<a href="#move">Move</a>, <a href="#rename">Rename</a>, <a href="#read">Read</a>, 
	<a href="#upload">Upload</a>, <a href="#write">Write</a>
</p>
<h2 id="append">&#43; Append</h2>
<p>
	The append file class method appends text from the content parameter to a specific file 
	defined in the destination parameter.
</p>
<pre>
<code>
&lt;?php

$content = "HAPPY TIMES!\n";
$append = File::append( 
	array(
		'destination' => $_SERVER[ 'DOCUMENT_ROOT' ] . 'assets/files/file.txt', 
		'content' => $content
	)
);

Dbug::dump( $append );
</code>
</pre>
<h2 id="copy">&#43; Copy</h2>
<p>
	The copy file class method copies a specific file defined in the source parameter to the 
	specified location defined in the destination parameter.
</p>
<pre>
<code>
&lt;?php

$copy = File::copy( 
	array(
		'source' => $_SERVER[ 'DOCUMENT_ROOT' ] . 'assets/files/file.txt', 
		'destination' => $_SERVER[ 'DOCUMENT_ROOT' ] . 'assets/files/stuff/file.txt'
	)
);

Dbug::dump( $copy );
</code>
</pre>
<h2 id="delete">&#43; Delete</h2>
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
<h2 id="move">&#43; Move</h2>
<p>
	The move file class method moves a specific file defined in the source parameter to the 
	specified location specified within the destination parameter.
</p>
<pre>
<code>
&lt;?php

$move = File::move( 
	array(
		'source' => $_SERVER[ 'DOCUMENT_ROOT' ] . 'assets/files/file.txt', 
		'destination' => $_SERVER[ 'DOCUMENT_ROOT' ] . 'assets/files/stuff/file.txt'
	)
);

Dbug::dump( $move );
</code>
</pre>
<h2 id="read">&#43; Read</h2>
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
<h2 id="rename">&#43; Rename</h2>
<p>
	The rename file class method renames the defined file in the source parameter to the defined 
	file defined within the destination parameter.
</p>
<pre>
<code>
&lt;?php

$rename = File::rename( 
	array(
		'source' => $_SERVER[ 'DOCUMENT_ROOT' ] . 'assets/files/file.txt', 
		'destination' => $_SERVER[ 'DOCUMENT_ROOT' ] . 'assets/files/monkey.txt'
	)
);

Dbug::dump( $rename );
</code>
</pre>
<h2 id="upload">&#43; Upload</h2>
<p>
	The upload file class method handles the uploading of all files based on specified parameters.
</p>
<p>
	Here we have three different forms that the upload method can be used. All three examples 
	allow the uploading of multiple files of any type and size. Each example does exactly the 
	same thing.
</p>
<pre>
<code>
&lt;?php

$upload = File::upload( 
	array(
		'field' => $files, 
		'destination' => $_SERVER[ 'DOCUMENT_ROOT' ] . 'assets/files/', 
		'accept' => 'pdf, doc, jpg', 
		'size' => '200', 
		'conflict' => 'unique'
	)
);

HTML::pre( $upload );
</code>
</pre>
<h2 id="write">&#43; Write</h2>
<p>
	The write file class method creates a new file specified in the destination parameter and 
	saves it to the path specified in the destination and populates the file with the content 
	provided in the content parameter.
</p>
<pre>
<code>
&lt;?php

$content = "HAPPY TIMES!\n";
$write = File::write( 
	array(
		'destination' => $_SERVER[ 'DOCUMENT_ROOT' ] . 'assets/files/file.txt', 
		'content' => $content
	)
);

Dbug::dump( $write );
</code>
</pre>
<br />
