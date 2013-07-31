<?php

class Debugging {

	/**
     * Checks whether to return a string of Yes or No
     *
     * return string
     * 
     * @param boolean bool
    */
	public static function bool_string( $bool ) {
		if( $bool ) {
			return 'Yes';
		} else {
			return 'No';
		}
	}

	/**
     * Returns a list of params available within the url string.
     * If no params exists then a string of 'none' is returned
     *
     * return string
    */
	public static function params() {
		$params = Controller::params();

		if( count( $params ) > 0 ) {

			if( is_array( $params ) ) {
				return implode( ', ', $params );
			} else {
				return $params;
			}

		} else {
			return 'none';
		}
	}

	/**
     * Returns the debug bar and contents
     *
     * return string
    */
	public static function debug() {
		$debuggle = array(
			'uri'                  => Url::uri(), 
			'controller_directory' => Controller::controller_directory(), 
			'controller_default'   => Controller::controller_default(), 
			'controller_key_isset' => Debugging::bool_string( Url::url_controller_isset() ), 
			'controller_filename'  => Controller::controller_filename() . EXT_PHP, 
			'controller_classname' => Controller::controller_classname(), 
			'controller_path'      => Controller::controller_path(), 
			'controller_exists'    => Debugging::bool_string( Controller::controller_exists() ), 
			'view_directory'       => str_replace( APP_ROOT, '', Controller::view_directory() ), 
			'view_default'         => Controller::view_default(), 
			'view_key_isset'       => Debugging::bool_string( Url::url_action_isset() ), 
			'view_filename'        => Controller::action_filename() . EXT_PHP, 
			'view_path'            => Controller::action_file_path(), 
			'view_exists'          => Debugging::bool_string( Controller::action_file_exists() ), 
			'params'               => Debugging::params()			
		);

		$debugging = <<<DEBUGGING
		<!-- Debugging Block Start -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script language="javascript">
		(function(e){e.cookie=function(t,n,r){if(arguments.length>1&&(!/Object/.test(Object.prototype.toString.call(n))||n===null||n===undefined)){r=e.extend({},r);if(n===null||n===undefined){r.expires=-1}if(typeof r.expires==="number"){var i=r.expires,s=r.expires=new Date;s.setDate(s.getDate()+i)}n=String(n);return document.cookie=[encodeURIComponent(t),"=",r.raw?n:encodeURIComponent(n),r.expires?"; expires="+r.expires.toUTCString():"",r.path?"; path="+r.path:"",r.domain?"; domain="+r.domain:"",r.secure?"; secure":""].join("")}r=n||{};var o=r.raw?function(e){return e}:decodeURIComponent;var u=document.cookie.split("; ");for(var a=0,f;f=u[a]&&u[a].split("=");a++){if(o(f[0])===t)return o(f[1]||"")}return null}})(jQuery)
		function sidebarDisplay(sidebar,sidebarHolder) { var \$sidebar = $("#" + sidebar); \$sidebar.click(function() { $("#" + sidebarHolder).fadeToggle( 'fast' ); if($.cookie(sidebar) == "hidden") { $.cookie(sidebar, null); } else { $.cookie(sidebar, 'hidden'); } return false; }); if($.cookie(sidebar)) { $("#" + sidebarHolder).hide(); } }
		$(document).ready(function () {sidebarDisplay("debugging_link","debugging_holder");});
		</script>
		<style type="text/css">
		#debugging_class_holder { width: 100%; }
		#debugging_class_holder h3#debugging_link { margin: 0; padding: 10px; background: #094CAB; color: #ffffff; font-weight: normal; font-size:15px; text-align: center; cursor: pointer; }
		#debugging_class_holder #debugging_holder { margin: 0; padding: 0; font-family:Arial; border-left:1px solid #333333; border-right:1px solid #333333; border-bottom:1px solid #333333; }
		#debugging_class_holder #debugging_holder .title { margin: 0; padding: 5px; text-indent: 10px; background: #003366; color: #ffffff; font-family:Arial; font-size:15px; font-weight: normal; }
		#debugging_class_holder #debugging_holder #title { margin: 0; padding: 5px; background: #333333; color: #ffffff; font-family:Arial; font-size:15px; font-weight: normal; }
		#debugging_class_holder #debugging_holder p { margin: 0; padding: 5px; text-align: left; color: #333333; font-family:Arial; font-size: 15px; font-weight: normal; line-height: 30px; }
		#debugging_class_holder #debugging_holder b { color: #FF7300; font-family: Arial; }
		</style>
		<div id="debugging_class_holder">
		<h3 id="debugging_link">DEBUGGING</h3>
		<div id="debugging_holder" style="display:block">
			<h3 id="title">Url</h3>
			<p>
				<b>URI:</b> $debuggle[uri]<br />
			</p>
			<h3 id="title">Controller</h3>
			<p>
				<b>Controller Directory:</b> $debuggle[controller_directory]<br />
				<b>Controller Default:</b> $debuggle[controller_default]<br />
				<b>Controller Key Isset:</b> $debuggle[controller_key_isset]<br />
				<b>Controller File Name:</b> $debuggle[controller_filename]<br />
				<b>Controller Class Name:</b> $debuggle[controller_classname]<br />
				<b>Controller Path:</b> $debuggle[controller_path]<br />
				<b>Controller Exists:</b> $debuggle[controller_exists]<br />
			</p>
			<h3 id="title">View</h3>
			<p>
				<b>View Directory:</b> $debuggle[view_directory]<br />
				<b>View Default:</b> $debuggle[view_default]<br />
				<b>View Key Isset:</b> $debuggle[view_key_isset]<br />
				<b>View File Name:</b> $debuggle[view_filename]<br />
				<b>View Path:</b> $debuggle[view_path]<br />
				<b>View Exists:</b> $debuggle[view_exists]<br />
			</p>
			<h3 id="title">Params</h3>
			<p>
				<b>Params:</b> $debuggle[params]<br />
			</p>
		</div>
		</div>
		<div style="clear:both;"></div>
		<!-- Debugging Block End -->
DEBUGGING;

		return $debugging;
	}

}
