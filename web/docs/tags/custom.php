<?php include '../inc/head.php' ?>

<h1>Tags | Custom Tags</h1>
<p>
	The framework supports the ability to define custom tags that can used within layouts and 
	view templates. 
</p>
<p>
	By default, all custom tags are stored within the <span class="path">/app/tags/</span> 
	directory.
</p>
<pre>
<code>
&lt;?php

function hello( $name ) {
	return 'Hello ' . $name;
}

$name = 'Bob Barker';
$tags->set( 'hello', hello( $name ) );
</code>
</pre>
<p>
	The example 
<p>

<?php include '../inc/foot.php' ?>