<!DOCTYPE html>
<html>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>PHPUnit Testing</title>
	<style type="text/css">
	@import url("http://fonts.googleapis.com/css?family=Roboto:100,300,600");
	* {
		margin: 0;
		padding: 0;
		font-family: Roboto, MS Sans Serif;
	}

	body {
		margin: 0;
		padding: 0;
	}

	pre { 
		margin: 10px;
		padding: 0 0 0 15px;
		font-size: 13px;
		border: 2px solid #e0e0e0;
		background: #ffffff;
		-webkit-border-radius: 10px;
		-moz-border-radius: 10px;
		border-radius: 10px;
	}

	code { 
		margin: 0;
		padding: 0;
		font-size: 13px;
		background: #ffffff;
		-webkit-border-radius: 10px;
		-moz-border-radius: 10px;
		border-radius: 10px;
	}

	table {
		margin: 5px 5px 5px 10px;
		padding: 0;
	}

	table th {
		margin: 0;
		padding: 2px;
		font-size: 12px;
		color: #ffffff;
		font-weight: normal;
		background: #1872AD;
	}

	table td {
		margin: 0;
		padding: 5px;
		font-size: 12px;
		color: #333333;
		font-weight: normal;
		background: #ffffff;
		border: 1px solid #C2C2C2;
	}

	.clear { clear: both; }

	#header {
		margin: 0;
		padding: 5px;
		width: 100%;
		background: #ececec;
		border-bottom: 1px solid #cccccc;
		position: fixed;
		top: 0;
		z-index: 999999999999;
	}

	#header #navigation ul {
		margin: 0;
		width: 600px;
		text-align: center;
		list-style-type: none;
		text-align: center;
		text-transform: uppercase;
	}

	#header #navigation a {
		font-size: 15px;
		padding: 5px 10px;
		float: left;
		text-decoration: none;
		color: #333333;
	}

	#header #navigation a:hover {
		font-size: 15px;
		padding: 5px 10px;
		color: #ffffff;
		background-color: #333333;
		-webkit-border-radius: 0 10px 0 0;
		-moz-border-radius: 0 10px 0 0;
		border-radius: 0 0 10px 0;
	}

	#header #navigation a:active {
		font-size: 15px;
		padding: 5px 10px;
		background-color: #0e7ee7;
		-webkit-border-radius: 0 10px 0 0;
		-moz-border-radius: 0 10px 0 0;
		border-radius: 0 0 10px 0;
	}

	#header #top {
		margin: 0 10px;
	    text-align: center;
	    padding: 5px;
	    cursor: pointer;
	    display: none;
	    color: #ffffff;
	    font-size: 14px;
	    background: url('images/bgTop.png') repeat;
	    width: 30px;
	    float: right;
	    -webkit-border-radius: 10px;
		-moz-border-radius: 10px;
		border-radius: 10px;
	}

	#container {
		margin: 47px 0 0 0;
		padding: 0;
		height: 100%;
	}

	#sidebar {
		margin: 0 5px 5px 5px;
		padding: 5px;
		width: 250px;
		background: #ececec;
		border: 1px solid #cccccc;
		-webkit-border-radius: 0 10px 0 0;
		-moz-border-radius: 0 10px 0 0;
		border-radius: 0 0 10px 0;
		float: left;
	}

	#sidebar ul {
		list-style: none;
		margin: 0;
		padding: 0;
	}

	#sidebar a, #sidebar h2 {
		display: block;
		margin: 0;
		padding: 5px 8px;
		text-decoration: none;
	}

	#sidebar h2 {
		font-size: 14px;
		font-weight: normal;
		padding: 0;
		border-bottom: 1px solid #ffffff;
	}

	#sidebar h2 a {
		color: #ffffff;
		background: #444444;
		border: none;
		font-size: 13px;
		font-weight: normal;
		text-decoration: none;
		padding: 5px 8px;
		text-transform: uppercase;
		-webkit-border-radius: 0 10px 0 0;
		-moz-border-radius: 0 10px 0 0;
		border-radius: 0 0 10px 0;
	}

	#sidebar h2 a:hover {
		color: #ffffff;
		background: #333333;
		border: none;
		font-size: 13px;
		font-weight: normal;
		text-decoration: none;
		padding: 5px 8px;
		text-transform: uppercase;
	}

	#sidebar ul li ul li a {
		font-size: 13px;
		font-weight: normal;
		color: #ffffff;
		background: #2364CC;
		padding: 5px 8px;
		text-decoration: none;
		text-indent: 10px;
		border-bottom: 1px solid #ffffff;
		-webkit-border-radius: 0 10px 0 0;
		-moz-border-radius: 0 10px 0 0;
		border-radius: 0 0 10px 0;
	}

	#sidebar a:hover {
		font-size: 13px;
		font-weight: normal;
		color: #ffffff;
		background: #2380CC;
		padding: 5px 8px;
		text-decoration: none;
		border-bottom: 1px solid #ffffff;
	}

	#sidebar li {
		position: relative;
	}

	#content_holder {
		margin: 0 5px 5px 275px;
		padding: 5px;
		background: #ececec;
		border: 1px solid #cccccc;
		-webkit-border-radius: 0 10px 0 0;
		-moz-border-radius: 0 10px 0 0;
		border-radius: 0 0 10px 0;
	}

	#content {
		padding: 0;
		background: #ffffff;
		-webkit-border-radius: 0 10px 0 0;
		-moz-border-radius: 0 10px 0 0;
		border-radius: 0 0 10px 0;
	}

	#content h1 {
		margin: 0;
		padding: 10px;
		background: #444444;
		border-bottom: 3px solid #666666;
		color: #ffffff;
		font-weight: normal;
		font-size: 17px;
		-webkit-border-radius: 0 10px 0 0;
		-moz-border-radius: 0 10px 0 0;
		border-radius: 0 0 10px 0;
	}

	#content h2 {
		margin: 5px;
		padding: 10px;
		background: #2380CC;
		border-bottom: 3px solid #1BB0FA;
		color: #ffffff;
		font-weight: normal;
		font-size: 15px;
		-webkit-border-radius: 0 10px 0 0;
		-moz-border-radius: 0 10px 0 0;
		border-radius: 0 0 10px 0;
	}

	#content h3 {
		margin: 5px;
		padding: 10px;
		background: #666666;
		border-bottom: 3px solid #cccccc;
		color: #ffffff;
		font-weight: normal;
		font-size: 15px;
		-webkit-border-radius: 0 10px 0 0;
		-moz-border-radius: 0 10px 0 0;
		border-radius: 0 0 10px 0;
	}

	#content h4 {
		margin: 0;
		padding: 5px;
		text-indent: 10px;
		font-weight: normal;
		color: #B300B0;
	}

	#content a:link, a:visited {
		color: #0e7ee7;
		text-decoration: none;
	}

	#content a:hover {
		text-decoration: none;
	}

	#content li {
		line-height: 25px;
		color: #666666;
	}

	#content p {
		margin: 0;
		padding: 10px;
		text-align: left;
		color: #333333;
		font-size: 13px;
		line-height: 25px;
	}

	#content #index_nav {
		margin: 20px;
		padding: 10px;
		color: #ffffff;
	}

	#content #index_nav a.link {
		margin: 1px;
		padding: 20px;
		width: 200px;
		height: auto;
		background: #003366;
		float: left;
		color: #ffffff;
		border-bottom: 2px solid #FF9100;
	}

	#content #index_nav a.link:hover {
		margin: 1px;
		padding: 20px;
		width: 200px;
		height: auto;
		background: #333333;
		float: left;
		color: #ffffff;
		border-bottom: 2px solid #E01B6A;
	}

	#pass { 
		margin:5px;
		padding:10px;
		background:#197D00;
		color:#ffffff;
		font-family:Arial;
		font-size:16px; 
		transition: background 1s, border 1s ease-out;
		-webkit-transition: background 1s, border 1s ease-out; /* Saf3.2+, Chrome */
		-moz-transition: background 1s, border 1s ease-out; /* Firefox 4+ */
		-ms-transition: background 1s, border 1s ease-out; /* IE10+ */
		-o-transition: background 1s, border 1s ease-out; /* Opera 10.5+ */
		-webkit-border-radius: 0 10px 0 0;
		-moz-border-radius: 0 10px 0 0;
		border-radius: 0 0 10px 0; 
		border-bottom: 3px solid #209E00;
	}

	#pass:hover { 
		margin:5px;
		padding:10px;
		background:#209E00;
		border-bottom: 3px solid #72E356;
		color:#ffffff;
		font-family:Arial;
		font-size:16px; 
		cursor:pointer; 
	}

	#fail { 
		margin:5px;
		padding:10px;
		background:#B50000;
		color:#ffffff;
		font-family:Arial;
		font-size:16px; 
		cursor:pointer; 
		transition: background 1s, border 1s ease-out;
		-webkit-transition: background 1s, border 1s ease-out; /* Saf3.2+, Chrome */
		-moz-transition: background 1s, border 1s ease-out; /* Firefox 4+ */
		-ms-transition: background 1s, border 1s ease-out; /* IE10+ */
		-o-transition: background 1s, border 1s ease-out; /* Opera 10.5+ */
		-webkit-border-radius: 0 10px 0 0;
		-moz-border-radius: 0 10px 0 0;
		border-radius: 0 0 10px 0; 
		border-bottom: 3px solid #E00000;
	}

	#fail:hover { 
		margin:5px;
		padding:10px;
		background:#E00000;
		border-bottom: 3px solid #FF7070;
		color:#ffffff;
		font-family:Arial;
		font-size:16px; 
	}
	</style>
</head>
<body>
	
	<div id="header">
		<div id="navigation">
			<ul>
				<li>
					<a href="/">Home</a>
				</li>
				<li>
					<a href="/docs/">Docs</a>
				</li>
				<li>
					<a href="/cli/">CLI</a>
				</li>
			</ul>
		</div>
		<div id="top">TOP</div>
	</div>

	<div id="container">

		<?php if( count( Unit::list_tests() ) ) { ?>
		<div id="sidebar">
			<ul>
				<li>
					<?php foreach( Unit::list_tests() as $key => $value ) { ?>
					<h2>
						<?php echo '<a href="/' . Unit::$url . '/?test=' . $value[ 'url' ] . '">' . $value[ 'class' ] . "</a>\n"; ?>
					</h2>
					<?php } ?>
				</li>
			</ul>
		</div>
		<?php } ?>

		<div id="content_holder">

			<div id="content">
				<h1>PHPUnit Testing</h1>
				<?php 

				if( count( $array ) ) {

					foreach( $array as $key => $value ) {

						if( isset( $value->tests ) ) {
							$output .= '<h2>' . "\n";
								$output .= 'A total of ' . $value->tests . ' tests were completed for testing class ' . $value->suite . '.';
							$output .= "</h2>\n";
						} else {

							if( isset( $value->status ) ) {
								$output .= '<div id="pass">' . "\n";
							} else {
								$output .= '<div id="fail">' . "\n";
							}
								$output .= $value->test;
							$output .= "</div>\n";
						}
					}

					$output .= "\t" . '<div id="clear"></div>' . "\n";

					echo $output;

					Unit::delete_temp_file();

				} elseif( count( Unit::list_tests() ) ) {
					echo "<p>Select a test from the sidebar.</p>\n";
				} else {
					echo "<p>No tests available.</p>\n";
				}

				?>
			</div>

		</div>
		
		<div class="clear"></div>
	</div>

</body>
</html>
