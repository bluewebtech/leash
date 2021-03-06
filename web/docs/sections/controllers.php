<h1>Controllers</h1>
<p>
	The controllers section will help with getting an understanding of how controllers are used 
	within the framework as well as some tricks that will become quite helpful throughout 
	development with the framework.
</p>
<h2 id="controller-basics">&#43; Controller Basics</h2>
<p>
	All controllers are to be stored within the controllers directory located at 
	<span class="path">/app/controllers/</span>. 
</p>
<p>
	Here, the default loading process of all controllers and dependancies will be explained, 
	using the default controller as an example. 
</p>
<p>
	By default a controller with a file name of index.php within the <span class="path">/app/controllers/</span> directory 
	will be loaded. This index.php file contains a class name of IndexController and a default 
	method name of <span class="method">index()</span>, all of which will be executed once requested by the browser. Once the 
	<span class="method">index()</span> method is requested, the framework searches the <span class="path">/app/views/</span> 
	directory for a directory  corresponding to the <span class="file">index.php</span> controller called index, which would have a path of 
	<span class="path">/app/views/index/</span>. Since the browser is requesting the <span class="method">index()</span> method, 
	the framework will do additional searching for a default view template with a name of <span class="file">index.php</span>. 
	The path to the index.php view template would be <span class="path">/app/views/index/index.php</span>.
</p>
<h2 id="controller-naming">&#43; Controller Naming</h2>
<p>
	All controllers can be named anything and are to have a keyword of Controller added to the end 
	of the controller class name. No special characters can be used within the controller class 
	name. Below are a few examples.
</p>
<pre>
<code>
&lt;?php 

class IndexController {}

&lt;?php 

class AboutController {}

&lt;?php 

class ContactController {}
</code>
</pre>
<h2 id="controller-default-method">&#43; Controller Default Method</h2>
<p>
	All controllers (although not necessary) should contain a default method with a name of index. 
	Below is an example of this.
</p>
<pre>
<code>
&lt;?php 

class IndexController {
	
	function index() {}

}
</code>
</pre>
<h2 id="controller-method-visibility">&#43; Controller Method Visibility</h2>
<p>
	Notice in the example above, the method name of <span class="method">index()</span> did not contain 
	a visibility property. This is not necessary as it will default to public but for best practices, you 
	should take the extra step in defining the every method with a visibility property as seen in the example 
	below.
</p>
<pre>
<code>
&lt;?php 

class IndexController {
	
	public function index() {}

	public function about() {}

	public function contact() {}

	private function process() {}

}
</code>
</pre>
<h2 id="controller-static-methods">&#43; Controller Static Methods</h2>
<p>
	All controller methods can be defined with a type of static if you prefer. This makes it 
	easier to call methods from any where within the currently requested controller. Below are 
	a few examples.
</p>
<pre>
<code>
&lt;?php 

class IndexController {
	
	public function index() {}

	public function about() {}

	public function contact() {
		IndexController::process();
	}

	private static function process() {}

}
</code>
</pre>
<h2 id="controller-annotations">&#43; Controller Annotations</h2>
<p>
	The framework contains a way to make calls to controller action methods by defining an 
	annotation for all action methods except for all <span class="method">index()</span> action 
	methods. For instance if you have an action method within the index controller called about, 
	you could set an annotation for the about action method as seen below.
</p>
<pre>
<code>
&lt;?php 

class IndexController {
	
	public function index() {}

	//@Url('about-us')
	public function about() {}

}
</code>
</pre>
<p>
	Visiting <a href="http://<?php echo $_SERVER[ 'HTTP_HOST' ] ?>/index/about/">http://<?php echo $_SERVER[ 'HTTP_HOST' ] ?>/index/about/</a> or 
	<a href="http://<?php echo $_SERVER[ 'HTTP_HOST' ] ?>/index/about/">http://<?php echo $_SERVER[ 'HTTP_HOST' ] ?>/index/about-us/</a>
	would return the about.php view that is located at <span class="path">/app/views/index/about.php</span>.
</p>
<br />
