<?php include '../inc/head.php'; include '../plugins/dbug/main.php' ?>

<h1>Getting Started | Working with Values</h1>
<p>
	In this part of the Getting Started tutorial, we'll continue to work with the Test Controller 
	by showing how to work with values. From working with values within controllers to working with 
	values within views.
</p>
<h2>Outputting Values in Controllers</h2>
<p>
	Go a head and open the Test Controller <span class="path">[/app/controllers/test.php]</span> and 
	update the code to reflect the code block below and view the Test Controller in your browser.
</p>
<pre>
<code>
&lt;?php

class TestController {

	public function index() {
		$name = array(
			'firstName' => 'Bob', 
			'lastName'  => 'Barker'
		);

		foreach ($name as $key => $value) {
			out( br( $value ) );
		}
	}

}
</code>
</pre>
<p>
	You should see nothing more than the <span class="value">$name</span> array looped. Pretty simple 
	and basic PHP development knowledge. Question is, how to do the same within a view? Go ahead and 
	open the default view for the Test Controller <span class="path">[/app/views/index.php]</span> and 
	update the file to relect the code block below.
</p>
<pre>
<code>
&lt;h1&gt;Test Controller&lt;/h1&gt;

&lt;?php
	out( $firstName . ' ' . $lastName );
?&gt;
</code>
</pre>
<p>
	Now update the Test Controller with the code block below and view the Test Controller within 
	your browser.
</p>
<pre>
<code>
&lt;?php

class TestController {

	public function index() {
		$name = array(
			'firstName' => 'Bob', 
			'lastName'  => 'Barker'
		);

		view( 'index', $name );
	}

}
</code>
</pre>
<p>
	There's actually a pretty big difference from the previous version of the controller. Instead 
	of looping through the <span class="value">$name</span> array within the controller itself, we 
	pass the <span class="value">$name</span> array as a second parameter within the 
	<span class="value">view()</span> function. By passing an array collection to the 
	<span class="value">view()</span> function, this gives you the ability to call each item in the 
	collection by its given name.
</p>
<p>
	Below is a modified example of what was just accomplished. Go ahead and update the controller 
	view file to match and refresh your browser.
</p>
<pre>
<code>
&lt;h1&gt;Test Controller&lt;/h1&gt;

&lt;?php
	out( $model['firstName'] . ' ' . $model['lastName'] );
?&gt;
</code>
</pre>
<p>
	You should not see any difference from the previous example. The only difference is the way 
	we call the values. This time we call the values by using the built in <span class="value">$model</span> 
	variable, which is the default name of the collection that is passed into the <span class="value">view()</span>. 
</p>
<h2>Debugging Value Collections</h2>
<p>
	When working with values, it is always a good idea to have good tools to help with debugging. 
	The framework comes with a few helper tools to help with the debugging of values. We'll begin 
	with the simplest way to debug values, which is the built in <span class="value">pre()</span> 
	function. The <span class="value">pre()</span> function outputs collections in the same manor 
	as the PHP <span class="value">print_r()</span> but formats the output. Below is an example of 
	its use. Update the Test Controller view file to match the new code block below.
</p>
<pre>
<code>
&lt;h1&gt;Test Controller&lt;/h1&gt;

&lt;?php
	pre( $model );
?&gt;
</code>
</pre>
<p>
	You should see output similar to below
</p>
<?php
$name = array(
	'firstName' => 'Bob', 
	'lastName'  => 'Barker'
);
echo "<pre style='border:none;'>\n";
	print_r( $name );
echo "</pre>\n";
?>
<p>
	The <span class="value">pre()</span> function is easy to use and does exactly what is need to be 
	accomplished. Problem is that it is not exactly very visually friendly at times. That's why the 
	framework has the <a href="http://dbug.ospinto.com/" target="_blank">dBug</a> utility incorporated 
	into the framework as a plugin by default. Go ahead and update the Test Controller view to match 
	the changes below.
</p>
<pre>
<code>
&lt;h1&gt;Test Controller&lt;/h1&gt;

&lt;?php
	dump( $model );
?&gt;
</code>
</pre>
<p>
	You should now see a much more visual output of the following:
</p>
<?php
	dump( $name );
?>
<p>
	Much better on the eyes? It gets better, go ahead and click around the output, specifically, 
	the title and the collection name areas. A nice feature to an already brilliant way to debug 
	output occurs. There are two ways to use this function, as seen above, you can use the 
	<span class="value">dump()</span> function or another is <span class="value">dbug()</span> 
	which will do the exact same thing. More on <a href="http://dbug.ospinto.com/" target="_blank">dBug</a> 
	can be viewed <a href="http://dbug.ospinto.com/" target="_blank">here</a>
</p>

<?php include '../inc/foot.php' ?>