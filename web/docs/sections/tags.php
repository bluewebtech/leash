<?php require '../templates/header.php' ?>
<h1>Tags</h1>
<p>
	Tags are special classes that can be executed by adding textual statements such as 
	<span class="value">[stuff]</span> to any defined layouts. All tags are stored within the 
	tags directory located at <span class="path">/app/tags/</span>.
</p>
<h2 id="pre-defined-tags">Pre-defined Tag</h2>
<p>
	The framework comes with a few pre-defined tags that can be utilized in many ways. These 
	tags are: <a href="#asset">[assets]</a>, <a href="#body">[body]</a>, 
	<a href="#description">[description]</a>, <a href="#keywords">[keywords]</a>, 
	<a href="#title">[title]</a>.
</p>
<h3>Asset Tag</h3>
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
<h3 id="body">Body Tag</h3>
<p>
	The <span class="value">[body]</span> tag is the main content tag. What this means is that 
	depending on the content of the current controller and view. All controller and view information 
	will be outputted by the <span class="value">[body]</span> tag.
</p>
<h3 id="description">Description Tag</h3>
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
		HTML::description( 'Test Description' );
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

<h3 id="keywords">Keywords Tag</h3>
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
		HTML::keywords( 'Frank Sinatra, Dean Martin, Sammy Davis Jr., Peter Lawford, Joey Bishop' );
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

<h3 id="title">Title Tag</h3>
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
		HTML::title( 'Test Title' );
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





<h2 id="custom-tags">Custom Tags</h2>
<p>
 Tag class file names 
	can be names any thing you like but the class name must end with the keyword Tag. Below is 
	an example of how a tag class would be structured.

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

class HelloTag {
	
	public static function hello( $name ) {
		return 'Hello ' . $name;
	}

}

$tags->set( 'hello', HelloTag::hello( 'Bob Barker' ) );
</code>
</pre>
<p>
	The above example would create a new tags called <span class="value">[hello]</span>. This 
	tag could be placed within a layout and would output the text "Hello Bob Barker".
</p>
<?php require '../templates/footer.php' ?>
