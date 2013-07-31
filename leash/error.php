<?php

class Error {

	public static $not_found = 404;
	
	public static $internal  = 500;

	/**
     * Sets and returns the HTTP status code
     * 
     * return string
     * 
     * @param string code
    */
	public static function http_code( $code = null ) {
		// -- Check if a status code was defined
		if( $code !== null ) {

			// -- Get the proper HTTP status code
			switch( $code ) {
				case 100: $text = 'Continue'; break;
				case 101: $text = 'Switching Protocols'; break;
				case 200: $text = 'OK'; break;
				case 201: $text = 'Created'; break;
				case 202: $text = 'Accepted'; break;
				case 203: $text = 'Non-Authoritative Information'; break;
				case 204: $text = 'No Content'; break;
				case 205: $text = 'Reset Content'; break;
				case 206: $text = 'Partial Content'; break;
				case 300: $text = 'Multiple Choices'; break;
				case 301: $text = 'Moved Permanently'; break;
				case 302: $text = 'Moved Temporarily'; break;
				case 303: $text = 'See Other'; break;
				case 304: $text = 'Not Modified'; break;
				case 305: $text = 'Use Proxy'; break;
				case 400: $text = 'Bad Request'; break;
				case 401: $text = 'Unauthorized'; break;
				case 402: $text = 'Payment Required'; break;
				case 403: $text = 'Forbidden'; break;
				case 404: $text = 'Not Found'; break;
				case 405: $text = 'Method Not Allowed'; break;
				case 406: $text = 'Not Acceptable'; break;
				case 407: $text = 'Proxy Authentication Required'; break;
				case 408: $text = 'Request Time-out'; break;
				case 409: $text = 'Conflict'; break;
				case 410: $text = 'Gone'; break;
				case 411: $text = 'Length Required'; break;
				case 412: $text = 'Precondition Failed'; break;
				case 413: $text = 'Request Entity Too Large'; break;
				case 414: $text = 'Request-URI Too Large'; break;
				case 415: $text = 'Unsupported Media Type'; break;
				case 500: $text = 'Internal Server Error'; break;
				case 501: $text = 'Not Implemented'; break;
				case 502: $text = 'Bad Gateway'; break;
				case 503: $text = 'Service Unavailable'; break;
				case 504: $text = 'Gateway Time-out'; break;
				case 505: $text = 'HTTP Version not supported'; break;
				default:
					exit( 'Unknown http status code "' . htmlentities( $code ) . '"' );
				break;
			}

			$protocol = ( isset( $_SERVER[ 'SERVER_PROTOCOL' ] ) ? $_SERVER[ 'SERVER_PROTOCOL' ] : 'HTTP/1.0' );

			header($protocol . ' ' . $code . ' ' . $text);

			$GLOBALS[ 'http_response_code' ] = $code;

		} else {
			$code = ( isset( $GLOBALS[ 'http_response_code' ] ) ? $GLOBALS[ 'http_response_code' ] : 200 );
		}

		return $code;
	}

	/**
     * Outputs a formatted error message to the screen
     * 
     * return void
     * 
     * @param array error
     * @param string code
    */
	public static function trace( $error, $code ) {		
		// -- Define a collection of Exception messages
		$error = array(
			'message' => $error->getMessage(), 
			'file'    => $error->getFile(), 
			'line'    => $error->getLine(), 
			'code'    => $code, 
			'trace'   => $error->getTraceAsString()
		);

		// -- Build the error message block
		$err = <<<ERROR
		<!-- Error Block Start -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script language="javascript">
		(function(e){e.cookie=function(t,n,r){if(arguments.length>1&&(!/Object/.test(Object.prototype.toString.call(n))||n===null||n===undefined)){r=e.extend({},r);if(n===null||n===undefined){r.expires=-1}if(typeof r.expires==="number"){var i=r.expires,s=r.expires=new Date;s.setDate(s.getDate()+i)}n=String(n);return document.cookie=[encodeURIComponent(t),"=",r.raw?n:encodeURIComponent(n),r.expires?"; expires="+r.expires.toUTCString():"",r.path?"; path="+r.path:"",r.domain?"; domain="+r.domain:"",r.secure?"; secure":""].join("")}r=n||{};var o=r.raw?function(e){return e}:decodeURIComponent;var u=document.cookie.split("; ");for(var a=0,f;f=u[a]&&u[a].split("=");a++){if(o(f[0])===t)return o(f[1]||"")}return null}})(jQuery)
		function sidebarDisplay(sidebar,sidebarHolder) { var \$sidebar = $("#" + sidebar); \$sidebar.click(function() { $("#" + sidebarHolder).fadeToggle( 'fast' ); if($.cookie(sidebar) == "hidden") { $.cookie(sidebar, null); } else { $.cookie(sidebar, 'hidden'); } return false; }); if($.cookie(sidebar)) { $("#" + sidebarHolder).hide(); } }
		$(document).ready(function () {sidebarDisplay("error_link","error_holder");});
		</script>
		<style type="text/css">
		#error_class_holder { width: 100%; }
		#error_class_holder h3#error_link { margin: 0; padding: 10px; background: #B50000; color: #ffffff; font-family:Arial; font-weight: normal; font-size:15px; text-align: center; cursor: pointer; }
		#error_class_holder #error_holder { margin: 0; padding: 0; font-family:Arial; }
		#error_class_holder #error_holder #title { margin: 0; padding: 10px; background: #333333; color: #ffffff; font-family:Arial; font-size:15px; font-weight: normal; text-align: left; }
		#error_class_holder #error_holder p { margin: 0; padding: 5px; text-align: left; color: #333333; font-family:Arial; font-size: 15px; font-weight: normal; line-height: 30px; }
		#error_class_holder #error_holder b { color: #FF7300; font-family: Arial; }
		#error_class_holder #error_holder table { margin: 0; padding: 0; width: 100%; }
		#error_class_holder #error_holder th { margin: 0; padding: 10px; background: #333333; color: #ffffff; font-size:15px; font-weight: normal; text-align: right; }
		#error_class_holder #error_holder td { margin: 0; padding: 10px; background: #ffffff; color: #333333; font-size:15px; text-align: left; }
		</style>
		<div id="error_class_holder">
			<h3 id="error_link">ERROR</h3>
			<div id="error_holder" style="display:block">
				<table>
					<tr>
						<th colspan="2" id="title">The following $code error has occured</th>
					</tr>
					<tr>
						<th>Message:</th>
						<td>$error[message]</td>
					</tr>
					<tr>
						<th>File:</th>
						<td>$error[file]</td>
					</tr>
					<tr>
						<th>Line:</th>
						<td>$error[line]</td>
					</tr>
					<tr>
						<th>Trace:</th>
						<td>$error[trace]</td>
					</tr>
				</table>
			</div>
		</div>
		<!-- Error Block End -->
ERROR;
		
		// -- Output the error message
		echo $err . "\n";

		// -- Output the proper error template
		Error::type( $code );

		// -- Kill all other processes
		exit;
	}

	/**
     * Checks if a 404 page exists and displays it to the screen. Otherwise
     * a simple text message is printed.
     * 
     * return void
    */
	public static function missing() {
		// -- Construct the 404 error template path
		$file = APP_ROOT . 'errors' . DS . Error::$not_found . EXT_PHP;

		// -- Check if the 404 error template exists. 
		// -- If it does, require it to the screen. 
		// -- Otherwise, display a simple text message.
		if( file_exists( $file ) ) {
			require_once $file;
		} else {
			echo Error::$not_found . ' : Internal Error!';
		}

		exit;
	}

	/**
     * Checks if a 500 page exists and displays it to the screen. Otherwise
     * a simple text message is printed.
     * 
     * return void
    */
	public static function internal() {
		// -- Construct the 500 error template path
		$file = APP_ROOT . 'errors' . DS . Error::$internal . EXT_PHP;

		// -- Check if the 500 error template exists. 
		// -- If it does, require it to the screen. 
		// -- Otherwise, display a simple text message.
		if( file_exists( $file ) ) {
			require_once $file;
		} else {
			echo Error::$internal . ' : Internal Error!';
		}

		exit;
	}

	/**
     * Checks the HTTP status code and returns the proper message
     * 
     * return string
     * 
     * @param string code
    */
	public static function type( $code ) {
		// -- Get the proper message based on HTTP status code
		switch( $code ) {
			case Error::$not_found: 
				return Error::missing(); 
			break;

			case Error::$internal: 
				return Error::internal(); 
			break;
		}
	}

	/**
     * Checks if the application is in development mode and returns the proper error message. 
     * If the application is in development mode, the trace message will be displayed along 
     * with the proper error message.
     * 
     * return string
     * 
     * @param array error
     * @param string code (default is 404)
    */
	public static function message( $error, $code = null ) {
		// -- Check if a status code was defined, if not use a 404 status code
		if( $code == null ) {
			$code = Error::$not_found;
		}

		// -- Set the HTTP status code
		$code = Error::http_code( $code );

		// -- Make sure a log path is defined in the configuration
		if( LOGS_PATH ) {

			// -- Check if logging is enabled
			if( LOGGING ) {

				// -- Log the error before it is thrown
				Logging::error_log( $error, $code );
			}

		}

		// -- Check if the application is in development mode and return the proper error
		if( Environment::is_development( Environment::type() ) ) {
			return Error::trace( $error, $code );
		} else {
			return Error::type( $code );
		}

	}

}
