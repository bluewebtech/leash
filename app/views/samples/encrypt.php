<?php Response::out( HTML::h1( $title ) ) ?>

<form action="" name="encrypt_form" id="encrypt_form" method="post">
	<p>
		Name:<br />
		<input type="password" name="password" id="password" />
	</p>
	<p>
		<input type="submit" name="process" id="process" value="Process" />
	</p>
</form>

<?php
if( isset( $process ) ) {
	$encrypt = Security::encrypt( $password );
	$decrypt = Security::decrypt( $encrypt );

	Response::out( HTML::p( $encrypt ) );
	Response::out( HTML::p( $decrypt ) );
}
?>
