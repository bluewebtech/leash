<?php include '../inc/head.php' ?>

<h1>Tags | Pre-defined Tags</h1>
<p>
	By default, the framework consists of a few pre-defined tags that can be used within 
	any layout and define the output of a tag with simple functions. Listed below are all 
	of the current pre-defined tags along with examples.
</p>
<ul>
	<li>
		<a href="#assets">Assets Tag</a>
	</li>
	<li>
		<a href="#body">Body Tag</a>
	</li>
	<li>
		<a href="#description">Description Tag</a>
	</li>
	<li>
		<a href="#keywords">Keywords Tag</a>
	</li>
	<li>
		<a href="#title">Title Tag</a>
	</li>
</ul>

<h2 id="assets">Assets Tag</h2>
<p>
	The <span class="value">[assets]</span> tag can be used to help with outputting the path to your 
	application css, javascript or files assets directory. Below is an example of its use. The default 
	value for the <span class="value">[assets]</span> tag is define within the application configuration 
	<span class="path">[/app/conf/config.php]</span> file.
</p>
<pre>
<code>
&lt;link rel="stylesheet" type="text/css" href="[assets]css/main/main.css" /&gt;
</code>
</pre>
<p>
	Which would output the following to the application layout:
</p>
<pre>
<code>
&lt;link rel="stylesheet" type="text/css" href="/assets/css/main/main.css" /&gt;
</code>
</pre>

<h2 id="body">Body Tag</h2>
<p>
	The <span class="value">[body]</span> tag is the main content tag. What this means is that 
	depending on the content of the current controller and view. All content will be displayed 
	using this special tag.
</p>
<pre>
<code>
[body]
</code>
</pre>

<h2 id="description">Description Tag</h2>
<p>
	The <span class="value">[description]</span> tag when defined by using the built in function 
	<span class="value">description()</span> will output the defined text wrapped in meta description 
	tags <span class="value">&lt;meta name="description" content="" /&gt;</span>. Below is an example 
	of its use and the output that it will generate.
</p>
<pre>
<code>
&lt;?php

class IndexController {

	public function index() {
		description( 'Test Description' );
		view( 'index' );
	}

}
</code>
</pre>
<p>
	Which would output the following to the application layout:
</p>
<pre>
<code>
&lt;meta name="description" content="Test Description" /&gt;
</code>
</pre>

<h2 id="keywords">Keywords Tag</h2>
<p>
	The <span class="value">[keywords]</span> tag when defined by using the built in function 
	<span class="value">keywords()</span> will output the defined text wrapped in meta keywords 
	tags <span class="value">&lt;meta name="keywords" content="" /&gt;</span>. Below is an example 
	of its use and the output that it will generate.
</p>
<pre>
<code>
&lt;?php

class IndexController {

	public function index() {
		keywords( 'Frank Sinatra, Dean Martin, Sammy Davis Jr., Peter Lawford, Joey Bishop' );
		view( 'index' );
	}

}
</code>
</pre>
<p>
	Which would output the following to the application layout:
</p>
<pre>
<code>
&lt;meta name="keywords" content="Frank Sinatra, Dean Martin, Sammy Davis Jr., Peter Lawford, Joey Bishop" /&gt;
</code>
</pre>

<h2 id="title">Title Tag</h2>
<p>
	The <span class="value">[title]</span> tag when defined by using the built in function 
	<span class="value">title()</span> will output the defined text wrapped in title tags 
	<span class="value">&lt;title&gt;&lt;/title&gt;</span>. Below is an example of its use and 
	the output that it will generate.
</p>
<pre>
<code>
&lt;?php

class IndexController {

	public function index() {
		title( 'Test Title' );
		view( 'index' );
	}

}
</code>
</pre>
<p>
	Which would output the following application layout:
</p>
<pre>
<code>
&lt;title&gt;Test Title&lt;/title&gt;
</code>
</pre>

<?php include '../inc/foot.php' ?>