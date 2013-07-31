<?php include '../inc/head.php' ?>

<h1>Plugins | Mail Plugin</h1>
<p>
	The mail plugin is a plugin that makes sending email messages simple. The mail plugin 
	is installed by default but can easily be removed if needed. The default mail plugin 
	uses the PHPMailer library with custom functions to make its use even simpler.
</p>
<p>
	PHPMailer website: <a href="http://phpmailer.worxware.com/" target="_blank">http://phpmailer.worxware.com/</a>
</p>
<p>
	<span class="note">Note</span>: The following code examples use phony email addresses, usernames and passwords. 
	If you choose to copy the code samples below, please remember to replace the information 
	with you own working information.
</p>
<ul>
	<li>
		<a href="#Configuration">Configuration</a>
	</li>
	<li>
		<a href="#Sending_Simple_Text_E-mail_Messages">Sending Simple Text E-mail Messages</a>
	</li>
	<li>
		<a href="#Sending_HTML_E-mail_Messages">Sending HTML E-mail Messages</a>
	</li>
	<li>
		<a href="#Sending_HTML_Template_E-mail_Messages">Sending HTML Template E-mail Messages</a>
	</li>
	<li>
		<a href="#Sending_HTML_Template_E-mail_Messages_with_Images">Sending HTML Template E-mail Messages with Images</a>
	</li>
	<li>
		<a href="#Sending_HTML_Template_E-mail_Messages_with_Values">Sending HTML Template E-mail Messages with Values</a>
	</li>
	<li>
		<a href="#Sending_Text_Messages">Sending Text Messages</a>
	</li>
</ul>

<h2 id="Configuration">Configuration [ /app/conf/mail.php ]</h2>
<p>
	The mail plugin has options for specifying smtp settings for both development and production 
	environments. Below is a mail.php configuration sample. Simply add your own settings and begin 
	to send email messages.
</p>
<pre>
<code>
&lt;?php

$mail = array(

	// Development mail settings
	'development' => array(

		'mail' => array(
			'host'     => 'ssl://smtp.gmail.com', 
			'port'     => 465, 
			'username' => 'email@gmail.com', 
			'password' => 'password'
		)

	), 

	// Production mail settings
	'production' => array(

		'mail' => array(
			'host'     => 'ssl://smtp.gmail.com', 
			'port'     => 465, 
			'username' => 'email@gmail.com', 
			'password' => 'password'
		)

	)

);

</code>
</pre>

<h2 id="#Sending_Simple_Text_E-mail_Messages">Sending Simple Text E-mail Messages</h2>
<p>
	Within a few lines of code you can send simple text email messages. The code below 
	shows exactly how this is done.
</p>
<pre>
<code>
&lt;?php

class IndexController {

	public function index() {
		sendMail(
			$to      = 'email@domain.com', 
			$from    = 'email@domain.com', 
			$subject = 'Simple Test Email Message', 
			$body    = 'Hello World' 
		);

		view( 'index' );
	}

}
</code>
</pre>

<h2 id="Sending_HTML_E-mail_Messages">Sending HTML E-mail Messages</h2>
<p>
	Below is an example of how to send HTML email messages.
</p>
<pre>
<code>
&lt;?php

class IndexController {

	public function index() {
		sendMail(
			$to      = 'email@domain.com', 
			$from    = 'email@domain.com', 
			$subject = 'Simple Test Email Message', 
			$body    = '&lt;h1&gt;Hello World&lt;/h1&gt;', 
			$format  = 'html'
		);

		view( 'index' );
	}

}
</code>
</pre>

<h2 id="Sending_HTML_Template_E-mail_Messages">Sending HTML Template E-mail Messages</h2>
<p>
	Below is an example of how to send HTML email messages with dedicated mail view 
	tempates.
</p>
<p>
	To use a dedicated HTML view template, you must have a view file that you plan to 
	use within the view directory of the current controller. Using a view for HTML email 
	can be done by calling the sendMailView() for the $body variable and defining the view 
	you would like to use for an email template.
</p>
<p>
	Below is an example of using an HTML view template as the message body.
</p>
<pre>
<code>
&lt;?php

class IndexController {

	public function index() {
		sendMail(
			$to      = 'email@domain.com', 
			$from    = 'email@domain.com', 
			$subject = 'Simple Test Email Message', 
			$body    = sendMailView( 'mail' ), 
			$format  = 'html'
		);

		view( 'index' );
	}

}
</code>
</pre>

<p>
	Below is a very simple HTML email template that can be used. For example purposes, this 
	template will be known as 'mail' within sendMailView( 'mail' ).
</p>
<pre>
<code>
&lt;!DOCTYPE html&gt;
&lt;html&gt;
	&lt;meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /&gt;
&lt;/head&gt;
&lt;body&gt;
	&lt;h1&gt;HTML Template Email Message&lt;/h1&gt;
&lt;/body&gt;
&lt;/html&gt;
</code>
</pre>

<h2 id="Sending_HTML_Template_E-mail_Messages_with_Images">Sending HTML Template E-mail Messages with Images</h2>
<p>
	Below is an example of how to send HTML email messages with dedicated mail view 
	tempates and images.
</p>
<pre>
<code>
&lt;?php

class IndexController {

	public function index() {
		sendMail(
			$to      = 'email@domain.com', 
			$from    = 'email@domain.com', 
			$subject = 'Simple Test Email Message', 
			$body    = sendMailView( 'mail' ), 
			$format  = 'html', 
			$image   = array( '&lt;path-to-image&gt;logo.jpg', 'logo' )
		);

		view( 'index' );
	}

}
</code>
</pre>

<pre>
<code>
&lt;!DOCTYPE html&gt;
&lt;html&gt;
	&lt;meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /&gt;
&lt;/head&gt;
&lt;body&gt;
	&lt;h1&gt;HTML Template Email Message&lt;/h1&gt;
	&lt;img src="cid:logo" width="291" height="131" border="0" /&gt;
&lt;/body&gt;
&lt;/html&gt;
</code>
</pre>

<h2 id="Sending_HTML_Template_E-mail_Messages_with_Values">Sending HTML Template E-mail Messages with Values</h2>
<p>
	Below is an example of how to send HTML email messages with dedicated mail view 
	tempates and values.
</p>
<pre>
<code>
&lt;?php

class IndexController {

	public function index() {
		$values = array(
			'firstName' => 'Bob', 
			'lastName'  => 'Barker'
		);

		sendMail(
			$to      = 'email@domain.com', 
			$from    = 'email@domain.com', 
			$subject = 'Simple Test Email Message', 
			$body    = sendMailView( 'mail', $values ), 
			$format  = 'html'
		);

		view( 'index' );
	}

}
</code>
</pre>

<pre>
<code>
&lt;!DOCTYPE html&gt;
&lt;html&gt;
	&lt;meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /&gt;
&lt;/head&gt;
&lt;body&gt;
	&lt;h1&gt;HTML Template Email Message&lt;/h1&gt;
	Hello, my name is: &lt;?php out( $firstName . ' ' . $lastName ) ?&gt;
&lt;/body&gt;
&lt;/html&gt;
</code>
</pre>

<h2 id="Sending_Text_Messages">Sending Text Messages</h2>
<p>
	The mail plugin has the ability to send simple text messages with a few lines of code. 
	The example below will send the text message (Test Text Message) to the phone number 
	5555555555 whose mobile carrier is AT&amp;T. A specific mobile carrier gateway is needed 
	to send messages and a list mobile gateways can easily be found by searching 
	<a href="http://google.com" target="_blank">Google</a> or by going 
	<a href="http://en.wikipedia.org/wiki/List_of_SMS_gateways" target="_blank">here</a>
</p>
<pre>
<code>
&lt;?php

class IndexController {

	public function index() {
		sendMail(
			$to   = '5555555555@txt.att.net', 
			$from = 'email@gmail.com', 
			$body = 'Test Text Message' 
		);

		view( 'index' );
	}

}
</code>
</pre>

<?php include '../inc/foot.php' ?>