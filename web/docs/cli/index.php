<?php include '../inc/head.php' ?>

<h1>CLI</h1>
<p>
	The following information describes all available CLI commands in detail from expected 
	result after successful execution and command short hands.
</p>
<h2>CLI Installation</h2>
<p>
	The download, installation, and use, of the CLI is optional. To install the CLI, simply 
	unzip the contents of the CLI zip under the /web/ directory. To access the CLI via web 
	browse, go to http://&lt;your-doman&gt;/cli/ and begin using the CLI.
</p>
<h2>Command Reference [/cli/]</h2>
<table width="98%" cellpadding="0" cellspacing="2" border="0">
	<tr>
		<th>
			COMMAND
		</th>
		<th>
			SHORT HAND
		</th>
		<th>
			PARAMS
		</th>
		<th>
			RESULT
		</th>
	</tr>
	<tr>
		<td align="left">
			clear
		</td>
		<td align="left">
			clr
		</td>
		<td align="center">
			none
		</td>
		<td align="center">
			Clears out the command window
		</td>
	</tr>
	<tr>
		<td align="left">
			refresh
		</td>
		<td align="left">
			none
		</td>
		<td align="center">
			none
		</td>
		<td align="center">
			Refreshes the browser
		</td>
	</tr>
	<tr>
		<td align="left">
			config
		</td>
		<td align="left">
			conf
		</td>
		<td align="center">
			[setting] [value]
		</td>
		<td align="center">
			Updates a configuration setting within /app/conf/config.php
		</td>
	</tr>
	<tr>
		<td align="left">
			create-controller
		</td>
		<td align="left">
			c-ctrl
		</td>
		<td align="center">
			[controller name]
		</td>
		<td align="center">
			Creates a new controller in the /app/controllers/ directory
		</td>
	</tr>
	<tr>
		<td align="left">
			create-model
		</td>
		<td align="left">
			c-mod
		</td>
		<td align="center">
			[model name]
		</td>
		<td align="center">
			Creates a new model in the /app/models/ directory
		</td>
	</tr>
	<tr>
		<td align="left">
			create-service
		</td>
		<td align="left">
			c-srv
		</td>
		<td align="center">
			[serice name]
		</td>
		<td align="center">
			Creates a new service in the /app/services/ directory
		</td>
	</tr>
	<tr>
		<td align="left">
			create-view
		</td>
		<td align="left">
			c-view
		</td>
		<td align="center">
			[controller name] [view name]
		</td>
		<td align="center">
			Creates a new view in the /app/views/ directory
		</td>
	</tr>
	<tr>
		<td align="left">
			create-unit-test
		</td>
		<td align="left">
			c-unit
		</td>
		<td align="center">
			[unit test name]
		</td>
		<td align="center">
			Creates a new unit test in the /app/unit-tests/ directory
		</td>
	</tr>
	<tr>
		<td align="left">
			examples
		</td>
		<td align="left">
			ex
		</td>
		<td align="center">
			none
		</td>
		<td align="center">
			Displays examples of command usage
		</td>
	</tr>
	<tr>
		<td align="left">
			generate-all
		</td>
		<td align="left">
			gen-all
		</td>
		<td align="center">
			[controller name]
		</td>
		<td align="center">
			Generates a new controller, model, default view, and unit-test based on the 
			given controller name
		</td>
	</tr>
	<tr>
		<td align="left">
			help
		</td>
		<td align="left">
			?
		</td>
		<td align="center">
			none
		</td>
		<td align="center">
			Displays a complete list of available commands
		</td>
	</tr>
</table>

<?php include '../inc/foot.php' ?>