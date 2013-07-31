<?php Response::out( HTML::h1( APP_NAME ) ) ?>

<iframe width="640" 
		height="360" 
		src="//www.youtube.com/embed/npAWkt_84QA" 
		frameborder="0" 
		allowfullscreen 
		id="leash">
</iframe>

<h2>Available References</h2>
<ul>
	<li>
		<a href="/docs/">Documentation</a>
	</li>
	<li>
		<a href="/cli/">CLI</a>
	</li>
</ul>

<?php 
Response::out( 
	System::list_controllers() . 
	System::list_models() . 
	System::list_plugins() . 
	System::list_services() . 
	System::list_tags()
);
?>
