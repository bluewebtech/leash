<?php

require_once 'class.phpmailer.php';

class Mail {

	// -- Mail configuration file name
	public static $conf = 'mail';

	// -- Email format types
	public static $format = array(
		'html', 
		'text'
	);

	/**
     * Checks if authentication is necessary by checking if a username 
     * and password were provided within the mail configuration.
     * 
     * return boolean
     * 
     * @param array mail
    */
	public static function auth( $mail = array() ) {
		if( Mail::user( $mail ) && Mail::pass( $mail ) ) {
			return true;
		} else {
			return false;
		}
	}

	/**
     * Checks if the body attribute was provided and returns the body value.
     * 
     * return boolean
     * 
     * @param array attr
    */
	public static function body( $attr = array() ) {
		try {

			if( array_key_exists( 'body', $attr ) ) {
				return $attr[ 'body' ];
			} else {
				throw new Exception( 'A (body) attribute was not provided within Mail::sendMail().' );
				return false;
			}

		} catch( Exception $e ) {
			Error::message( $e, 500 );
		}
	}

	/**
     * Returns the mail configuration file name with the default system extension.
     * 
     * return string
    */
	public static function conf_file() {
		return Mail::$conf . SYSTEM_EXT;
	}

	/**
     * Returns the complete full path to the mail configuration file.
     * 
     * return string
    */
	public static function conf_full_path() {
		return CONF_PATH . Mail::conf_file();
	}

	/**
     * Checks if the mail configuration file exists.
     * 
     * return string
    */
	public static function conf_exists() {
		try {

			if( file_exists( Mail::conf_full_path() ) ) {
				return true;
			} else {
				throw new Exception( 'Mail configuration file (' . Mail::conf_file() . ') does not exist within (' . Mail::conf_path() . ')' );
				return false;
			}

		} catch( Exception $e ) {
			Error::message( $e, 500 );
		}
	}

	/**
     * Checks if the file attribute was provided and returns the file value.
     * 
     * return boolean
     * 
     * @param array attr
    */
	public static function file( $attr = array() ) {
		if( array_key_exists( 'file', $attr ) ) {

			try {

				if( is_array( $attr[ 'file' ] ) ) {
					return $attr[ 'file' ];
				} else {
					throw new Exception( 'The (file) attribute within Mail::sendMail() cannot be blank.' );
					return false;
				}

			} catch( Exception $e ) {
				Error::message( $e, 500 );
			}

		} else {
			return false;
		}
	}

	/**
     * Checks if the format attribute was provided and returns the format value.
     * 
     * return boolean
     * 
     * @param array attr
    */
	public static function format( $attr = array() ) {
		if( array_key_exists( 'format', $attr ) ) {

			try {

				if( in_array( $attr[ 'format' ], Mail::$format ) ) {
					return $attr[ 'format' ];
				} else {
					throw new Exception( 'The specified mail format (' . $attr[ 'format' ] . ') is not supported.' );
					return false;
				}

			} catch( Exception $e ) {
				Error::message( $e, 500 );
			}

		} else {
			return false;
		}
	}

	/**
     * Checks if the from attribute was provided and returns the from value.
     * 
     * return boolean
     * 
     * @param array attr
    */
	public static function from( $attr = array() ) {
		try {

			if( array_key_exists( 'from', $attr ) ) {

				try {

					if( strlen( $attr[ 'from' ] ) ) {
						return $attr[ 'from' ];
					} else {
						throw new Exception( 'The (from) attribute within Mail::sendMail() cannot be blank.' );
						return false;
					}

				} catch( Exception $e ) {
					Error::message( $e, 500 );
				}

			} else {
				throw new Exception( 'A (from) attribute was not provided within Mail::sendMail().' );
				return false;
			}

		} catch( Exception $e ) {
			Error::message( $e, 500 );
		}
	}

	/**
     * Checks if the host configuration attribute was provided and returns the host value.
     * 
     * return boolean
     * 
     * @param array mail
    */
	public static function host( $mail = array() ) {
		try {

			if( array_key_exists( 'host', $mail ) ) {
				return $mail[ 'host' ];
			} else {
				throw new Exception( 'A host was not specified within the mail configuration (' . Mail::conf_full_path() . ').' );
				return false;
			}

		} catch( Exception $e ) {
			Error::message( $e, 500 );
		}
	}

	/**
     * Checks if the image attribute was provided and returns the image value.
     * 
     * return boolean
     * 
     * @param array attr
    */
	public static function image( $attr = array() ) {
		if( array_key_exists( 'image', $attr ) ) {

			try {

				if( is_array( $attr[ 'image' ] ) ) {
					return $attr[ 'image' ];
				} else {
					throw new Exception( 'The (image) attribute within Mail::sendMail() cannot be blank.' );
					return false;
				}

			} catch( Exception $e ) {
				Error::message( $e, 500 );
			}

		} else {
			return false;
		}
	}

	/**
     * Checks if the password configuration attribute was provided and returns the password value.
     * 
     * return boolean
     * 
     * @param array mail
    */
	public static function pass( $mail = array() ) {
		if( array_key_exists( 'password', $mail ) ) {

			try {

				if( strlen( $mail[ 'password' ] ) ) {
					return $mail[ 'password' ];
				} else {
					throw new Exception( 'A password was not specified within the mail configuration (' . Mail::conf_full_path() . ').' );
					return false;
				}

			} catch( Exception $e ) {
				Error::message( $e, 500 );
			}

		} else {
			return false;
		}
	}

	/**
     * Checks if the port configuration attribute was provided and returns the post value.
     * If a port was not specified within the mail configuration, a default port of 25 will 
     * be used.
     * 
     * return boolean
     * 
     * @param array mail
    */
	public static function port( $mail = array() ) {
		if( array_key_exists( 'port', $mail ) ) {
			return $mail[ 'port' ];
		} else {
			return 25;
		}
	}

	/**
     * Build and send the email or text message.
     * 
     * return boolean
     * 
     * @param array attr
    */
	public static function send( $attr = array() ) {
		// -- Make sure the mail conf file exists before proceeding
		if( Mail::conf_exists() ) {

			// -- Call the mail conf file
			require_once( Mail::conf_full_path() );

			// -- Get the current environment type
			$env = Environment::type();

			// -- Load the mail settings based on environment type
			$mail = $mail[ $env ][ 'mail' ];

			// -- Validate and define all mail values
			$host    = Mail::host( $mail );
			$port    = Mail::port( $mail );
			$auth    = Mail::auth( $mail );
			$to      = Mail::to( $attr );
			$from    = Mail::from( $attr );
			$subject = Mail::subject( $attr );
			$body    = Mail::body( $attr );
			$format  = Mail::format( $attr );
			$file    = Mail::file( $attr );
			$image   = Mail::image( $attr );

			// -- Create an instance of the PHPMailer object
			$sendmail = new PHPMailer();

			// -- Specify the SMTP param
			$sendmail->IsSMTP();

			// -- Set the SMTP host and port params
			// -- The default port is automatically set to 25
			$sendmail->Host = $host . ':' . $port;

			// -- Define the SMTP auth boolean value
			$sendmail->SMTPAuth = $auth;

			// -- If authentication is needed, define the username and password
			if( $auth ) {
				$sendmail->Username = Mail::user( $mail );
				$sendmail->Password = Mail::pass( $mail );
			}
			
			// -- Define the email from params
			$sendmail->From     = $from;
			$sendmail->FromName = $from;

			// -- Check if the email format is HTML
			if( $format == 'html' ) {
				$sendmail->IsHTML( true );
			}

			// -- Define the body param
			$sendmail->Body = $body;

			// -- Define the subject param
			$sendmail->Subject = $subject;

			// -- Define the to param
			$sendmail->AddAddress( $to );

			// -- Check if any images were attached and loop through all of them 
			// -- specifying their name attribute and image file path in the 
			// -- $sendmail->AddEmbeddedImage( $value, $key ) method.
			if( $image ) {
				foreach( $image as $key => $value ) {
					$sendmail->AddEmbeddedImage( $value, $key );
				}
			}

			// -- Check if any files were attached and loop through all of them 
			// -- specifying their name attribute and file path in the 
			// -- $sendmail->AddAttachment( $value ) method.
			if( $file ) {
				foreach( $file as $key => $value ) {
					$sendmail->AddAttachment( $value );
				}
			}

			try {

				// -- Send the message and return a boolean of true if successful.
				// -- Otherwise return false and an exception message.
				if( $sendmail->Send() ) {
					return true;
				} else {
					return false;
					throw new Exception( 'Mailer Error: ' . $sendmail->ErrorInfo );
				}

			} catch( Exception $e ) {
				Error::message( $e, 500 );
			}
	    }    
	}

	/**
     * Checks if the subject attribute was provided and returns the subject value.
     * 
     * return boolean
     * 
     * @param array attr
    */
	public static function subject( $attr = array() ) {
		try {

			if( array_key_exists( 'subject', $attr ) ) {

				try {

					if( strlen( $attr[ 'subject' ] ) ) {
						return $attr[ 'subject' ];
					} else {
						throw new Exception( 'The (subject) attribute within Mail::sendMail() cannot be blank.' );
						return false;
					}

				} catch( Exception $e ) {
					Error::message( $e, 500 );
				}

			} else {
				throw new Exception( 'A (subject) attribute was not provided within Mail::sendMail().' );
				return false;
			}

		} catch( Exception $e ) {
			Error::message( $e, 500 );
		}
	}

	/**
     * Checks if the to attribute was provided and returns the to value.
     * 
     * return boolean
     * 
     * @param array attr
    */
	public static function to( $attr = array() ) {
		try {

			if( array_key_exists( 'to', $attr ) ) {

				try {

					if( strlen( $attr[ 'to' ] ) ) {
						return $attr[ 'to' ];
					} else {
						throw new Exception( 'The (to) attribute within Mail::sendMail() cannot be blank.' );
						return false;
					}

				} catch( Exception $e ) {
					Error::message( $e, 500 );
				}

			} else {
				throw new Exception( 'A (to) attribute was not provided within Mail::sendMail().' );
				return false;
			}

		} catch( Exception $e ) {
			Error::message( $e, 500 );
		}
	}

	/**
     * Checks if the username configuration attribute was provided and returns the username value.
     * 
     * return boolean
     * 
     * @param array mail
    */
	public static function user( $mail = array() ) {
		if( array_key_exists( 'username', $mail ) ) {

			try {

				if( strlen( $mail[ 'username' ] ) ) {
					return $mail[ 'username' ];
				} else {
					throw new Exception( 'A username was not specified within the mail configuration (' . Mail::conf_full_path() . ').' );
					return false;
				}

			} catch( Exception $e ) {
				Error::message( $e, 500 );
			}

		} else {
			return false;
		}
	}

	/**
     * Return the email template view that the user specified along with any values that 
     * may have been provided as well.
     * 
     * return boolean
     * 
     * @param string filename
     * @param array model
    */
	public static function view( $filename, $model = array() ) {
		$url       = array_filter( explode( '/', $_SERVER[ 'REQUEST_URI' ] ) );
		$urlFormat = str_replace( ' ', '', ucwords( preg_replace( '/[^a-z]/', ' ', $url[ 1 ] ) ) );
		$path      = VIEWS_PATH . $GLOBALS[ 'controller' ] . '/' . $filename . EXT_PHP;
		
		extract( $model );

		if( !empty( $model ) ) {
			foreach( $model as $key => $value ) {
				$$key = $value;
			}
		}

		if ( is_file( $path ) ) {
			ob_start();
			require_once $path;
			return ob_get_clean();
		}

		return false;
	}

}
