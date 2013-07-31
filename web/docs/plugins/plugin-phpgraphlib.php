<?php include '../inc/head.php' ?>

<h1>Plugins | PHPGraphLib Plugin</h1>
<p>
	The PHPGraphLib plugin helps to generate readable and downloadable PDF files on the fly using 
	HTML. Below are two examples of the PHPGraphLib plugin in use. More on PHPGraphLib can be read <a href="http://www.ebrueggeman.com/phpgraphlib" target="_blank">here</a>.
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

<?php include '../inc/foot.php' ?>
