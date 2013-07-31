<?php include '../inc/head.php' ?>
<?php include 'dbug/main.php' ?>

<h1>Plugins | dBug Plugin</h1>
<p>
	The dBug plugin helps to debug your code by outputting a structured variable information 
	that is colored with collapsible to hide specific items in a structure. The dBug plugin 
	is similar to that of the CFML cfdump tag. Below are a few examples of it usage.
</p>
<p>
	dBug website: <a href="http://dbug.ospinto.com/" target="_blank">http://dbug.ospinto.com/</a>
</p>
<p>
	The dBug plugin can be used in two ways. By either using the dump() or dbug().
</p>
<p>
	Below is an example use of the dump(), which outputs the following:
</p>
<?php
$price_is_right = array(
	'firstName' => 'Bob', 
	'lastName'  => 'Barker'
);

dump( $price_is_right );
?>
<pre>
<code>
&lt;?php

$price_is_right = array(
	'firstName' => 'Bob', 
	'lastName'  => 'Barker'
);

dump( $price_is_right );
</code>
</pre>

<p>
	Below is an example use of the dbug(), which outputs the following:
</p>
<?php
$grunge = array(
	'Nirvana', 'Pearl Jam', 'Screaming Trees'
);

dbug( $grunge );
?>
<pre>
<code>
&lt;?php

$grunge = array(
	'Nirvana', 'Pearl Jam', 'Screaming Trees'
);

dbug( $grunge );
</code>
</pre>

<?php include '../inc/foot.php' ?>