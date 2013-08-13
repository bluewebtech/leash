<h1>Views</h1>
<p>
	The views section will help with getting an understanding of how views are used 
	within the framework as well as some tricks that will become quite helpful throughout 
	development with the framework.
</p>
<h2 id="view-basics">&#43; View Basics</h2>
<p>
	Views can contain HTML, PHP or a mixture of both. All views are stored within a directory 
	named after its corresponding controller. If for instance you have a controller named 
	index.php, all views pertaining to that controller would be stored within an index directory 
	located at <span class="path">/app/views/index/</span>. If you have a controller named <span class="file">contact.php</span>, all views pertaining 
	to that controller would be stored within a contact directory located at <span class="path">/app/views/contact/</span>. 
</p>
<p>
	By default, an index.php view is called once a controller is loaded. For instance if a 
	controller called IndexController is requested and contains a default method of <span class="method">index()</span>, the 
	default index.php view would be called and displayed to the browser.
</p>
<h2 id="action-method-views">&#43; Action Method Views</h2>
<p>
	Once an action method for a specific controller is requested in the browser, the framework 
	will search the views directory corresponding to the requested controller and call the view 
	file matching the name of the action method.
</p>
<p>
	For instance if you request the index controller in the browser, and specify an action of 
	"about" within the url such as <a href="http://<?php echo $_SERVER[ 'HTTP_HOST' ] ?>/index/about/">http://<?php echo $_SERVER[ 'HTTP_HOST' ] ?>/index/about/</a> 
	the corresponding action method within the IndexController controller of <span class="method">about()</span>. Once the 
	<span class="method">about()</span> action method is called, the view template at <span class="path">/app/views/index/about.php</span> would be 
	displayed in the browser.
</p>
<h2 id="overriding-views">&#43; Overriding Views</h2>
<p>
	All views can be overrided by using the <span class="method">View::render()</span> method. The 
	<span class="method">View::render()</span> method will try to determine if you are trying to output 
	a view template or a simple string of text. By default, the <span class="method">View::render()</span> 
	method will assume you want to load a view template by examining the view argument provided and 
	search for a view in the <span class="path">/app/views/&lt;controller&gt;/</span> directory. If no 
	view template is found matching the provided text, the text will be outputted. Below is an example 
	of outputting simple text using the <span class="method">View::render()</span> method.
</p>
<pre>
<code>
&lt;?php

class IndexController {
	
	public function index() {
		View::render( 'Hello to the entire world!' );
	}

}
</code>
</pre>
<p>
	In the next example, lets say there is a view template of <span class="file">stuff.php</span> 
	within the <span class="path">/app/views/index/</span> directory and we want to override the 
	default view template of <span class="file">index.php</span>. Below is an example of how this 
	could be accomplished.
</p>
<pre>
<code>
&lt;?php

class IndexController {
	
	public function index() {
		View::render( 'stuff' );
	}

}
</code>
</pre>
<p>
	If no view is specified within the <span class="method">View::render()</span> method, a view 
	template matching the requested controller method is then loaded. If the view template matching 
	the controller method does not exist, an error will be thrown indicating the problem.
</p>
<h2 id="multiple-views">&#43; Multiple Views</h2>
<p>
	It is entirely possible to utilize the <span class="method">View::render()</span> method more 
	than once within a single controller action method. Although this way of doing things is a bit 
	unconventional, it will work as expected. Below is an example of what this would look 
	like.
</p>
<pre>
<code>
&lt;?php

class IndexController {
	
	public function index() {
		View::render( 'index' );
		View::render( 'about' );
	}

}
</code>
</pre>
<h2 id="values-to-views">&#43; Values to Views</h2>
<p>
	Passing values from a controller to a view is very simple. To do so the <span class="method">View::render()</span> method 
	is utilized once again. The way to use the <span class="method">View::render()</span> method tp pass values to a view is 
	done in such a way. You would specify the view in the <span class="method">View::render()</span> method along with a string 
	or an array.
</p>
<p>
	Below is an example of passing a single string value to a view and outputting the value to 
	the view template that was specified.
</p>
<pre>
<code>
&lt;?php

// -- Controller
class IndexController {
	
	public function index() {
		View::render( 'index', 'Mark Tremonti is a brilliant guitarist.' );
	}

}

// -- View
echo $params[ 0 ];
</code>
</pre>
<p>
	Notice the use of the pre-defined $params variable. The $params variable is to be used when 
	specifying a string. The provided string is automatically converted to an indexed array 
	for you. Below is another example of passing string values to the <span class="method">View::render()</span> 
	class method.
</p>
<pre>
<code>
&lt;?php

// -- Controller
class IndexController {
	
	public function index() {
		View::render( 'index', 'Frank Sinatra, Dean Martin, Sammy Davis Jr.' );
	}

}

// -- View
foreach( $params as $key => $value ) {
	echo $value . "&lt;br /&gt;\n";
}
</code>
</pre>
<p>
	Similar to the previous example, the new example provides a list to the <span class="method">View::render()</span> 
	class method. The provided list will again be converted to an indexed array and then can be looped 
	through to output all values within the pre-defined $params array.
</p>
<p>
	It is also possible to pass associative arrays to the <span class="method">View::render()</span> 
	class method. Below is an example of how this would look.
</p>
<pre>
<code>
&lt;?php

// -- Controller
class IndexController {
	
	public function index() {
		View::render( 'index', array( 'firstname' => 'Bob', 'lastname' => 'Barker' ) );
	}

}

// -- View
echo HTML::p( $firstname . ' ' . $lastname . ' is the greatest game show host ever.' );
</code>
</pre>
<p>
	Notice that instead of using the pre-defined $params variable, each key within the associative 
	array is being used to output each value within the $params array. As with the previous example, 
	it is entirely possible to loop through the $params array in the same fashion as before.
</p>
