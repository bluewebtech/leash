<?php

class Application {

	public static $classname = 'App';

	public static $server_doc_root = 'DOCUMENT_ROOT';

	public static $filename = 'app';

	public static function application_filename() {
		return Application::$filename;
	}

	public static function application_filename_ext() {
		return Application::application_filename() . EXT_PHP;
	}

	public static function application_file_path() {
		return $_SERVER[ Application::$server_doc_root ] . Application::application_filename_ext();
	}

	public static function application_file_exists() {
		if( file_exists( Application::application_file_path() ) ) {
			return true;
		} else {
			return false;
		}
	}

	public static function application_class_exists() {
		try {

			if ( class_exists( Application::$classname ) ) {
				return true;
			} else {
				throw new Exception( 'An app' . EXT_PHP . ' file exists but the App class was not defined.' );
				return false;
			}

		} catch( Exception $e ) {
            Error::message( $e, 500 );
        }
	}

	public static function on_application_start_exists() {
		if( method_exists( Application::$classname, 'onApplicationStart' ) ) {
			return true;
		} else {
			return false;
		}
	}

	public static function on_application_end_exists() {
		if( method_exists( Application::$classname, 'onApplicationEnd' ) ) {
			return true;
		} else {
			return false;
		}
	}

	public static function on_session_start_exists() {
		if( method_exists( Application::$classname, 'onSessionStart' ) ) {
			return true;
		} else {
			return false;
		}
	}

	public static function on_session_end_exists() {
		if( method_exists( Application::$classname, 'onSessionEnd' ) ) {
			return true;
		} else {
			return false;
		}
	}

	public static function on_request_start_exists() {
		if( method_exists( Application::$classname, 'onRequestStart' ) ) {
			return true;
		} else {
			return false;
		}
	}

	public static function on_request_end_exists() {
		if( method_exists( Application::$classname, 'onRequestEnd' ) ) {
			return true;
		} else {
			return false;
		}
	}

	public static function on_start() {
		if( Application::on_application_start_exists() ) {
			App::onApplicationStart();
		}

		if( Application::on_session_start_exists() ) {
			App::onSessionStart();
		}

		if( Application::on_request_start_exists() ) {
			App::onRequestStart();
		}
	}

	public static function on_end() {
		if( Application::on_application_end_exists() ) {
			App::onApplicationEnd();
		}

		if( Application::on_session_end_exists() ) {
			App::onSessionEnd();
		}

		if( Application::on_request_end_exists() ) {
			App::onRequestEnd();
		}
	}

}
