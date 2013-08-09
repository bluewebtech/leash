<?php require '../templates/header.php' ?>
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
	located at /app/views/index/. If you have a controller named contact.php, all views pertaining 
	to that controller would be stored within a contact directory located at /app/views/contact/. 
</p>
<p>
	By default, an index.php view is called once a controller is loaded. For instance if a 
	controller called IndexController is requested and contains a default method of index(), the 
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
	"about" within the url such as http://&lt;domain&gt;/index/about/, the framework will return 
	the corresponding action method within the IndexController controller of about(). Once the 
	about() action method is called, the view template at /app/views/index/about.php would be 
	displayed in the browser.
</p>
<h2 id="overriding-views">&#43; Overriding Views</h2>
<p>
	All views can be overrided by defining a view within the View::render() method. For instance 
	if you have a method of index() and wish to call the view "stuff", this can be accomplished by 
	doing the following within the index() method as seen below. There are no limitations on what 
	views can be overrided.
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
<h2 id="values-to-views">&#43; Values to Views</h2>
<p>
	Passing values from a controller to a view is very simple. To do so the View::render() method 
	is utilized once again. The way to use the View::render() method tp pass values to a view is 
	done in such a way. You would specify the view in the View::render() method along with an array 
	containing keys and values such as the example below.
</p>
<pre>
<code>
&lt;?php

class IndexController {
	
	public function index() {
		View::render( 'index', $values = array( 'stuff' => 'Stuff' ) );
	}

}
</code>
</pre>
<p>
	Within the index view, you would then output the value as seen below. Which would simply output 
	the text Stuff. This can be done with pretty much anything including database result sets.
</p>
<pre>
<code>
&lt;?php

echo $stuff;
</code>
</pre>
<?php require '../templates/footer.php' ?>
