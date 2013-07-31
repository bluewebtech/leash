<?php

/*
if( $_SERVER['SERVER_ADDR'] != '127.0.0.1' ) {
	header( 'Location: ../' );
}
*/

$_SERVER['SERVER_ADDR'] != '127.0.0.1' ? header( 'Location: ../' ) : '';

?>

<!DOCTYPE html>
<html>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="author" content="Peter Rjabanedelia 3rd - Blue Web tech" />
	<meta name="version" content="v-1.0:Pearl-Jam" />
	<title>Framework CLI</title>
	<link rel="stylesheet" type="text/css" href="/cli/assets/css/main/main.css" />
</head>
<body>
	<div id="sidebar">
		<div id="commands">
			<ul>
				<li>
					<h2>
						<a href="">Commands</a>
					</h2>
					<ul>
						<li>
							<a href="#" id="clear">Clear</a>
						</li>
						<li>
							<a href="#" id="config">Config</a>
						</li>
						<li>
							<a href="#" id="create_controller">Create Controller</a>
						</li>
						<li>
							<a href="#" id="create_model">Create Model</a>
						</li>
						<li>
							<a href="#" id="create_service">Create Service</a>
						</li>
						<li>
							<a href="#" id="create_view">Create View</a>
						</li>
						<li>
							<a href="#" id="create_unit_test">Create Unit Test</a>
						</li>
						<li>
							<a href="#" id="examples">Examples</a>
						</li>
						<li>
							<a href="#" id="generate_all">Generate All</a>
						</li>
						<li>
							<a href="#" id="help">Help</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<div id="terminal"></div>

	<script type="text/javascript" src="/cli/assets/javascript/libraries/jquery/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="/cli/assets/javascript/plugins/jquery.terminal/jquery.terminal.js"></script>
	<script type="text/javascript" src="/cli/assets/javascript/main.js"></script>
</body>
</html>
