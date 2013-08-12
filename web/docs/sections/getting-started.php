<h1>Getting Started</h1>
<p>
	This getting started section will help with understanding the basics of the framework that 
	should be known so that it is possible to get going with developing simple web sites or 
	applications.
</p>
<h2 id="requirements">&#43; Requirements</h2>
<p>
	The only requirement to get the framework up and running is an installation of a web server 
	that supports and has mod_rewrite enabled.
</p>
<h2 id="installation">&#43; Installation</h2>
<p>
	Unzip the framework into a new web root and set up a new host or virtual host. Be sure to 
	specify the <span class="path">/web/</span> directory as the default document root. Restart 
	the web server service and visit the new host in a browser.
</p>
<h2 id="local-development-setup">&#43; Local Development Setup</h2>
<p>
	If you're working with a local development setup, be sure to add a local domain to your 
	hosts file. This file exists whether you're on a Windows, Mac or Linux machine.
</p>
<p>
	For Windows, the path to the hosts file is typically something similar to 
	<span class="path">C:\WINDOWS\system32\drivers\etc</span>. Also, if you're running Windows 
	Vista, 7, or 9, be sure to open the hosts file with administrative privileges or else the 
	changes may not take place. 
</p>
<p>
	For Macs and Linux, the hosts file can typicaly be found at <span class="path">/etc/hosts</span> 
	but the command to make changes to the file would be the following: sudo nano <span class="path">/etc/hosts</span>.
</p>
<h2 id="framework-workflow">&#43; Framework Workflow</h2>
<p>
	The framework workflow is very much the same as all typical MVC frameworks. You have your 
	controllers, views and models which is the typical MVC application structure. Everything else 
	incorporated into all frameworks all just an added bonus. Below is a very sample directory and 
	file structure that would be used with this framework.
</p>
<pre>
<code>
/app/
	/controllers/
		index.php
		about.php
		contact.php
	/models/
		contact.php
	/views/
		/index/
			index.php
		/about/
			index.php
		/contact/
			index.php
</code>
</pre>
<h2 id="application-name">&#43; Application Name</h2>
<p>
	The name of the application can easily be changed by opening the framework main configuration 
	file located at <span class="path">/app/conf/config.php</span> and updating the APP_NAME setting 
	to something more meaningful. Save the configuration file and all changes will be made throughout 
	your application.
</p>
<h2 id="default-controller">&#43; Default Controller</h2>
<p>
	By default, a controller with a file name of index.php within <span class="path">/app/controllers/</span> 
	will be loaded and act as the index for the application. This default can be changed by opening the framework 
	main configuration file located at <span class="path">/app/conf/config.php</span> and updating the <span class="constant">DEFAULT_CONTROLLER</span> 
	setting to anything you would like. Be sure to rename the actual default file as well.
</p>
<h2 id="default-view">&#43; Default View</h2>
<p>
	By default, a view with a file name of index.php within the <span class="path">/app/views/&lt;controller&gt;/</span> 
	directory will be loaded once a controller is requested. This default can be changed by opening 
	the framework main configuration file located at <span class="path">/app/conf/config.php</span> and 
	updating the <span class="constant">DEFAULT_VIEW</span> setting to anything you would like. Be sure to rename all default view files 
	as well.
</p>
<h2 id="default-layout">&#43; Default Layout</h2>
<p>
	By default, a layout with a file name of main.php within the <span class="path">/app/views/layouts/</span> 
	directory will be used to display all view templates. This default can be changed by opening the 
	framework main configuration file located at <span class="path">/app/conf/config.php</span> and updating 
	the <span class="constant">LAYOUT</span> setting to anything you would like. Be sure to rename the default layout file of create a new 
	layout file and save it to the <span class="path">/app/views/layouts/</span> directory.
</p>
<h2 id="crud-sample">&#43; CRUD Sample</h2>
<p>
	By default, a simple CRUD application sample exists that could be used to get an understanding 
	of the general application workflow. This sample can also be used as a reference on how things 
	can be accomplished with the framework. The CRUD application sample can be viewed by clicking 
	<a href="/crud/">this</a>. The sample CRUD application utilizes many features of the framework 
	such as a controller, model, views, defining a datasource, database interactions, framework 
	class helpers and is almost completely done without the need to write any HTML.
</p>
