<?php include '../inc/head.php' ?>

<h1>Getting Started | First Controller</h1>
<p>
	In this tutorial we will create a new controller to work with throughout the Getting 
	Started tutorial. We will create the new controller in two different ways. By creating 
	all the necessary files by hand and by using utilizing the browser based CLI.
</p>
<h2>Creating a Controller by Hand</h2>
<p>
	Firstly, we'll start by creating all the necessary files by hand. Go ahead and create a 
	new file within the controllers directory <span class="path">[/app/controllers/]</span> 
	called <span class="file">test.php</span> and paste the code below into the new file and 
	save the file.
</p>
<pre>
<code>
&lt;?php

class TestController {

	public function index() {
		echo 'Test Controller';
	}

}
</code>
</pre>
<p>
	Go ahead and view the new controller in a browser by visiting http://[domain]/test or by 
	clicking <a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/test'; ?>" target="_blank">this</a>. 
	You should see the text as seen below, style pending of coarse.
</p>
<p>
	Test Controller
</p>
<h2>Adding More to the Test Controller</h2>
<p>
	In the controller example above you had the controller output simple plain text of 
	Test Controller. In the next example we'll use some of the core HTML helper functions to 
	output and add some style to the text. Copy and paste the code below into 
	<span class="file">test.php</span>, save it and refresh your browser.
</p>
<pre>
<code>
&lt;?php

class TestController {

	public function index() {
		out( h1( 'Test Controller' ) );
	}

}
</code>
</pre>
<p>
	You should now see something similar to the example output below. Again, style pending of coarse. 
	The example utilizes the built in <span class="file">out()</span> and <span class="file">h1()</span> 
	functions to make outputting text easy. Of coarse these HTML functions are not necessary to be used 
	and are completely optional. It's all in preference.
</p>
<h1 style="margin: 0 20px 20px 20px;
	       padding: 15px;
	       background: #333333;
	       color: #ffffff;
	       font-weight: normal;
	       font-size: 25px;">
	Test Controller
</h1>
<h2>Creating a View for the Test Controller</h2>
<p>
	Now, create a new folder within the <span class="value">views</span> directory 
	<span class="path">[/app/views/]</span> called <span class="value">test</span>. Create a 
	new file in the new <span class="value">test</span> directory called 
	<span class="file">index.php</span>. You should now have an available complete path of 
	<span class="path">[/app/views/test/index.php]</span>. Go ahead and copy and paste the 
	code block below into the new <span class="file">index.php</span> file and save it.
</p>
<pre>
<code>
&lt;h1&gt;Test Controller&lt;/h1&gt;
</code>
</pre>
<p>
	Now we need to update the Test Controller file <span class="path">[/app/controllers/test.php]</span>
	by updating the code to the what is available within the code block below.
</p>
<pre>
<code>
&lt;?php

class TestController {

	public function index() {
		view( 'index' );
	}

}
</code>
</pre>
<p>
	Given your browser is still displaying the Test Controller page, give your browser a refresh. 
	You shouldn't see a difference as the code does exactly the same as before. The only real 
	difference is how the content is being called to the browser. Instead of using the Test 
	Controller to output the text, we use a view template that is associated with the specific 
	controller. This is a great foundation to developing some very simple and well organized 
	HTML websites.
</p>
<h2>Adding Action Methods to Controllers</h2>
<p>
	It's easy to expand your controllers by adding action methods to them. An action method is 
	a method available within a controller that acts as a second page level to the current 
	controller. This might sound confusing but it is easier to see to get a better understanding 
	of what this means exactly.
</p>
<p>
	Still working with the Test Controller, update the code to reflect the code block below and 
	save the file and go to http://[domain]/test/stuff or click 
	<a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/test/stuff'; ?>" target="_blank">this</a>
</p>
<pre>
<code>
&lt;?php

class TestController {

	public function index() {
		view( 'index' );
	}

	public function stuff() {
		out( h1( 'Stuff Action Method' ) );
	}

}
</code>
</pre>
<p>
	You should see the following output in your browser. Style pending as usual.
</p>
<h1 style="margin: 0 20px 20px 20px;
	       padding: 15px;
	       background: #333333;
	       color: #ffffff;
	       font-weight: normal;
	       font-size: 25px;">
	Stuff Action Method
</h1>
<p>
	We can accomplish this exact same thing in the same way we did with the Test Controller 
	default action method. By creating a view template for the <span class="value">stuff</span> 
	action method. Go ahead and create a new view file within the <span class="value">test</span> 
	view directory <span class="path">[/app/views/test/]</span> called <span class="file">[stuff.php]</span>. 
</p>
<p>
	Go ahead and paste the code in the block below into the new <span class="file">[stuff.php]</span> 
	view.
</p>
<pre>
<code>
&lt;h1&gt;Stuff Action Method&lt;/h1&gt;
</code>
</pre>
<p>
	Now, update the <span class="value">stuff</span> action method to the code below.
</p>
<pre>
<code>
&lt;?php

class TestController {

	public function index() {
		view( 'index' );
	}

	public function stuff() {
		view( 'stuff' );
	}

}
</code>
</pre>
<p>
	Refresh your browser and take note that nothing has changed and that you still see the exact 
	same output as before. The only difference is that there is now a specific view template for 
	the <span class="value">stuff</span> action method.
</p>
<h2>Custom Action Method URL's</h2>
<p>
	Similar to typical MVC routing where you can specify a custom URL to retrieve controllers and 
	action methods, this is possible within the actual controller file itself. Go ahead and update 
	the Test Controller to the code block below.
</p>
<pre>
<code>
&lt;?php

class TestController {

	public function index() {
		view( 'index' );
	}

	//@Url('stuff-action-method')
	public function stuff() {
		view( 'stuff' );
	}

}
</code>
</pre>
<p>
	Now to view the changes. But how? Go ahead and visit http://[domain]/test/stuff-action-method or 
	click <a href="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/test/stuff-action-method'; ?>" target="_blank">this</a>. 
	You should see no change yet again.
</p>
<p>
	How does this work? Basically, once the controller is loaded, the framework checks the current 
	controller action methods for matching URL annotations. If there was a match, the annotations 
	class is put into action to retrieve the specific controller action method.
</p>
<p>
	<span class="note">Note:</span> Custom URL's are not available for use with the default 
	controller at the current time by using annotations.
</p>

<?php include '../inc/foot.php' ?>