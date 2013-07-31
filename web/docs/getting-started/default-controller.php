<?php include '../inc/head.php' ?>

<h1>Getting Started | Default Controller</h1>
<p>
	By default, the framework will load a controller called IndexController which is located in 
	<span class="path">/app/controllers/index.php</span> and contains the following code below. 
</p>
<pre>
<code>
&lt;?php

class IndexController {

	public function index() {
		view( 'index' );
	}

}
</code>
</pre>
<h2>Changing the Default Controller</h2>
<p>
	The default controller can be changed very easily by updating the 
	<span class="value">DEFAULT_CONTROLLER</span> configuration value located within the 
	<span class="path">/app/conf/config.php</span> file from its default of 
	<span class="value">index</span> to any available controller you would like. For instance, 
	if you have a controller called <span class="value">hammer</span>, you can update the 
	<span class="value">DEFAULT_CONTROLLER</span> configuration value to 
	<span class="value">hammer</span> as seen in the code block below.
</p>
<p>
	<span class="note">Note</span>: If the default controller does not exist, you wil receive 
	an error stating exactly that.  <span class="value">Controller (hammer) does not exist.</span> 
</p>
<pre>
<code>
'DEFAULT_CONTROLLER' => 'hammer', 
</code>
</pre>

<?php include '../inc/foot.php' ?>