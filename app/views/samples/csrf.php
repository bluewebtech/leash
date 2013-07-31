<h1>CSRF Sample</h1>
<p>
	You will need to have CSRF protection enabled to properly execute this example. 
	To enable CSRF protection, change the value of CSRF_PROTECT from 0 to 1 within 
	the configuration.
</p>

<form action="" name="csrf_form" id="csrf_form" method="post">
	<p>
		Name:<br />
		<input type="text" name="name" id="name" size="50" value="" />
	</p>
	<p>
		<?php csrf_generate() ?>
		<input type="submit" name="process" id="process" value="Process" />
	</p>
</form>

<?php
if( isset( $process ) ) {
	if( csrf_val() ) {
		Response::out( 'YES' );
	} else {
		Response::out( 'NO' );
	}
}
?>
