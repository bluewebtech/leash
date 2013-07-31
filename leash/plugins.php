<?php

class Plugins {

	public static function get() {
		$dir   = scandir( PLUGINS_PATH );
		$files = array();

		foreach ( $dir as $key => $value ) {
			if( $value != '.' && $value != CD ) {
				array_push( $files, $value );
			}
		}

		foreach ( $files as $key => $value ) {
			if( $value != '.' && $value != CD ) {
				include PLUGINS_PATH . $value . DS . 'main' . SYSTEM_EXT;
			}
		}
	}

}
