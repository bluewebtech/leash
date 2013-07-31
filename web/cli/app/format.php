<?php

namespace CLI;

class Format {

	public static function error_style( $message ) {
		return '<span class="error">' . $message . '</span>';
	}

	public static function command_style( $message ) {
		return '<span class="command">' . $message . '</span>';
	}

	public static function time_style( $message ) {
		return '<span class="time">' . $message . '</span>';
	}

	public static function clean( $value ) {
		return preg_replace( '/[^a-z]/', '', $value );
	}
	
}