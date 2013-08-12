<h1>Tags</h1>
<p>
	Tags are special classes that can be executed by adding textual statements such as 
	<span class="value">[stuff]</span> to any defined layouts. All tags are stored within the 
	tags directory located at <span class="path">/app/tags/</span>.
</p>
<h2 id="pre-defined-tags">&#43; Pre-defined Tag</h2>
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
<h2 id="custom-tags">&#43; Custom Tags</h2>
<p>
	Custom tags can be a simple string of text, a simple file include or a complete class that 
	is to handle some special actions. Below is an example of a tag in its simplest form. The 
	example would create a new tag called <span class="value">[name]</span>. This tag could be 
	placed within a layout and would output the text "Bob Barker".
</p>
<pre>
<code>
&lt;?php

$tags->set( 'name', 'Bob Barker' );
</code>
</pre>
<p>
	The next example below expands on the <span class="value">[name]</span> tag by defining a 
	class to handle some actions. You will notice the class name has a keyword of Tag appended 
	to the end. This is required when defining classes in tag files. The updated <span class="value">[name]</span> 
	tag will now output the text "Hey there Bob Barker".
</p>
<pre>
<code>
&lt;?php

class NameTag {
	
	public static function name( $name ) {
		return 'Hey there ' . $name;
	}

}

$tags->set( 'name', NameTag::name( 'Bob Barker' ) );
</code>
</pre>
<p>
	Continuing with custom tags, the following example will include a template into a layout. 
	This is useful for separating all the pieces to a layout and gives flexibility to handle 
	some actions within each template. Below is an example of what including templates within 
	a tag would look like. The example would output a header template that resides in a templates 
	directory, within the views directory. The complete path to the templates directory would 
	be <span class="path">/app/views/templates/</span>. Please note that the directory name of 
	templates is not necessary. You can create a directory of bunnies in the views directory 
	if you wanted. It is even possible to store template files within the root views directory 
	although that is not suggested.
</p>
<pre>
<code>
&lt;?php

$tags->set( 'header', $tags->template( 'templates/header' ) );
</code>
</pre>
<p>
	Finishing up with custom tags, it is also possible to pass values and class functionality to 
	a template that is being called within a tag. This is very much the same as passing values 
	within the View::render() method. Below is an example of how this would look. 
</p>
<pre>
<code>
&lt;?php

$tags->set( 'header', $tags->template( 'templates/header', array( 'name' => 'Bob Barker' ) ) );
</code>
</pre>
