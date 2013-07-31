<?php include '../inc/head.php' ?>

<h1>Getting Started | Installation</h1>
<h2>Requirements</h2>
<p>
	A few requirements to get started are a working Apache and PHP environment set up. Also make sure 
	the following PHP extensions are enabled. These are pretty common PHP extensions so they might even 
	already be enabled for you.
</p>
<pre>
<code>
extension=php_gd2.dll
extension=php_openssl.dll
extension=php_pdo_mysql.dll
extension=php_pdo_odbc.dll
extension=php_pdo_sqlite.dll
</code>
</pre>
<p>
	<span class="note">Note</span>: Some plugins may need additional PHP extensions to be enabled.
</p>
<p>
	You also need to make sure that the Apache rewrite module is enabled as well by uncommenting the 
	following line in the Apache configuration.
</p>
<pre>
<code>
LoadModule rewrite_module modules/mod_rewrite.so
</code>
</pre>
<p>
	Now, created a new folder in the Apache web root and unzip the framework zip into the new directory.
</p>
<p>
	Setup a new Virtual Host within Apache making sure to point DocumentRoot to the web directory of 
	the extracted framework zip contents.
</p>
<pre>
<code>
&lt;VirtualHost *:80&gt;
	DocumentRoot "&lt;/path/to/your/web/app/&gt;web/"
	ServerName &lt;your-domain&gt;
	DirectoryIndex index.php
&lt;/VirtualHost&gt;
</code>
</pre>
<p>
	Restart the Apache service and make sure all is well by visiting your domain in a browser.
</p>
<h2>Local Development Setup</h2>
<p>
	If you're working with a local development setup, be sure to add a local domain to your 
	hosts file. This file exists whether you're on a Windows, Mac or Linux machine.
</p>
<p>
	For Windows, the path to the hosts file is typically something similar to 
	C:\WINDOWS\system32\drivers\etc. Also, if you're running Windows Vista, 7, or 9, be sure 
	to open the hosts file with administrative privileges or else the changes may not take place. 
</p>
<p>
	For Macs and Linux, the hosts file can typicaly be found at /etc/hosts but the command to 
	make changes to the file would be the following: sudo nano /etc/hosts.
</p>

<?php include '../inc/foot.php' ?>