<?php include '../inc/head.php' ?>

<h1>Plugins | MPDF Plugin</h1>
<p>
	The MPDF plugin helps to generate readable and downloadable PDF files on the fly using 
	HTML. Below are two examples of the MPDF plugin in use. More on MPDF can be read <a href="http://www.mpdf1.com/mpdf/index.php" target="_blank">here</a>.
</p>
<h2>Readable PDF</h2>
<p>
	The following example will generate a PDF within the browser window that can be saved.
</p>
<pre>
<code>
&lt;?php

pdf( '&lt;h1&gt;Test Content&lt;/h1&gt;' );
</code>
</pre>

<h2>Downloadable PDF</h2>
<p>
	The following example will generate a PDF and force the file to be downloaded to the users computer with a file name of <span class="file">pdf_file</span>
</p>
<pre>
<code>
&lt;?php

pdf( '&lt;h1&gt;Test Content&lt;/h1&gt;', 'pdf_file' );
</code>
</pre>
<h2>Another Example</h2>
<p>
	The added example generates a PDF within the browser containing a list of famous Bobs.
</p>
<pre>
<code>
&lt;?php

$names = array(
	'Bob Barker', 'Bob Saget', 'Bob Seger', 'Bob Dylan', 'Bob Evans', 'Bob Hope'
);

$content = '';

foreach( $names as $key => $value ) {
	$content .= $value . "&lt;br /&gt;\n";
}

pdf( $content );
</cod>
</pre>

<?php include '../inc/foot.php' ?>
