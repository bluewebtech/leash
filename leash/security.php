<?php

class Security {

	public static $encrypt_types = array(
		'adler32', 
		'crc32b', 
		'crc32', 
		'haval128,3', 
		'haval160,3', 
		'haval192,3', 
		'haval224,3', 
		'haval256,3', 
		'haval128,4', 
		'haval160,4v', 
		'haval192,4', 
		'haval224,4', 
		'haval256,4', 
		'md4', 
		'md5', 
		'sha1', 
		'sha384', 
		'sha512', 
		'tiger128,3', 
		'tiger160,3', 
		'tiger192,3', 
		'tiger128,4', 
		'tiger160,4', 
		'tiger192,4'
	);

	/**
     * Returns a csrf hidden form field and defines a session value containing a matching 
     * csrf token string value
     *
     * return void
    */
	public static function csrf_generate() {
		// -- Check if csrf protection has been enabled in config.php and a csrf token 
		// -- name has been set.
		if( CSRF_PROTECT && strlen( CSRF_TOKEN_NAME ) > 0 ) {
			
			// -- Set a csrf token value
			$token = Security::csrf_token();

			if( !isset( $_SESSION[ CSRF_TOKEN_NAME ] ) ) {
				// -- Define the session csrf token value
				$_SESSION[ CSRF_TOKEN_NAME ] = $token;
			}

			if( isset( $_SESSION[ CSRF_TOKEN_NAME ] ) ) {
				// -- Return the csrf hidden form field
				echo '<input type="hidden" name="' . CSRF_TOKEN_NAME . '" id="' . CSRF_TOKEN_NAME . '" value="' . $_SESSION[ CSRF_TOKEN_NAME ] . '" />' . "\n";
			}

		}
	}

	/**
     * Returns a randomly generated csrf token string that also incorporates a csrf key 
     * string into the generate token if one is defined within config.php
     *
     * return string
    */
	public static function csrf_token() {
		return hash( ENCRYPTION_TYPE, uniqid( rand() ) . date( 'YmdHis' ) . CSRF_KEY );
	}

	/**
     * Checks whether the csrf hidden form field matches the defined session csrf token 
     * and returns a boolean
     *
     * return boolean
    */
	public static function csrf_val() {
		// -- Check if csrf protection has been enabled in config.php and a csrf token 
		// -- name has been set.
		if( CSRF_PROTECT && strlen( CSRF_TOKEN_NAME ) > 0 ) {
			
			// -- Define a csrf token value
			$csrf_token = Security::xss_clean( $_POST[ CSRF_TOKEN_NAME ] );

			// -- Check if both the session and hidden form field csrf tokens have been defined
			if( isset( $_SESSION[ CSRF_TOKEN_NAME ] ) && isset( $csrf_token )  ) {
				
				// -- Check if both the session and hidden form field csrf tokens match
				if( $_SESSION[ CSRF_TOKEN_NAME ] == $csrf_token ) {
					
					// -- Kill the session csrf token after the initial form submission
					unset( $_SESSION[ CSRF_TOKEN_NAME ] );

					return true;
				} else {
					return false;
				}
				
			} else {
				return false;
			}

		} else {
			return false;
		}
	}

	/**
     * Decode the $value param
     *
     * return string
     * 
     * @param string value
    */
	public static function decode( $value ) {
		try {

			if( strlen( ENCRYPTION_TYPE ) > 0 && in_array( ENCRYPTION_TYPE, Security::$encrypt_types) ) {

				if( !$value ) {
					return false;
				} else {
					$crypttext   = Security::safe_b64decode( $value );
					$iv_size     = mcrypt_get_iv_size( MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB );
					$iv          = mcrypt_create_iv( $iv_size, MCRYPT_RAND );
					$decrypttext = mcrypt_decrypt( MCRYPT_RIJNDAEL_256, ENCRYPTION_KEY, $crypttext, MCRYPT_MODE_ECB, $iv );
					
					return trim( $decrypttext );
				}

			} else {
				throw new Exception( 'Encryption type not provided in ' . APP_ROOT . 'config.php. Available types are: ' . implode( ', ', Security::$encrypt_types) );
			}

		} catch( Exception $e ) {
			Error::message( $e, 500 );
		}
	}

	/**
     * Decrypt the $value param
     *
     * return string
     * 
     * @param string value
    */
	public static function decrypt( $value ) {
		return Security::decode( $value );
	}

	/**
     * Encode the $value param
     *
     * return string
     * 
     * @param string value
    */
	public static function encode( $value ) {
		try {

			if( strlen( ENCRYPTION_TYPE ) > 0 && in_array( ENCRYPTION_TYPE, Security::$encrypt_types) ) {

				if( !$value ) {
					return false;
				} else {
					$text      = $value;
					$iv_size   = mcrypt_get_iv_size( MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB );
					$iv        = mcrypt_create_iv( $iv_size, MCRYPT_RAND );
					$crypttext = mcrypt_encrypt( MCRYPT_RIJNDAEL_256, ENCRYPTION_KEY, $text, MCRYPT_MODE_ECB, $iv );
					
					return trim( Security::safe_b64encode( $crypttext ) );
				}

			} else {
				throw new Exception( 'Encryption type not provided in ' . APP_ROOT . 'config.php. Available types are: ' . implode( ', ', Security::$encrypt_types) );
			}

		} catch( Exception $e ) {
			Error::message( $e, 500 );
		}
	}

	/**
     * Encrypt the $value param
     *
     * return string
     * 
     * @param string value
    */
	public static function encrypt( $value ) {
		return Security::encode( $value );
	}

	/**
     * Loop over the $value param the provided $total times hashing the passed param $value
     *
     * return string
     * 
     * @param string value
    */
	public static function hash_loop( $value, $total ) {
		$hash = hash( ENCRYPTION_TYPE, $value );

		if( $total == 0 ) {
			$hash = hash( ENCRYPTION_TYPE, $hash );
		} else {

			for( $a = 0; $a < $total; $a++ ) {
				$hash = hash( ENCRYPTION_TYPE, $hash );
			}

		}

		return $hash;
	}

	/**
     * Hash the provided string $value
     *
     * return string
     * 
     * @param string value
    */
	public static function hash( $value, $total = 0 ) {
		try {
	
			if( strlen( ENCRYPTION_TYPE ) > 0 && in_array( ENCRYPTION_TYPE, Security::$encrypt_types) ) {

				if( strlen( ENCRYPTION_KEY ) > 0 ) {
					return Security::hash_loop( $value . ENCRYPTION_KEY, $total );
				} else {
					return Security::hash_loop( $value, $total );
				}

			} else {
				throw new Exception( 'Encryption type not provided in ' . APP_ROOT . 'config.php. Available types are: ' . implode( ', ', Security::$encrypt_types) );
			}

		} catch( Exception $e ) {
			Error::message( $e, 500 );
		}
	}

	/**
     * Returns a string with HTML tags stripped
     *
     * return string
     * 
     * @param string value
    */
	public static function html_clean( $values ) {
		return strip_tags( $values );
	}

	/**
     * Returns a boolean pending if the param is a valid int
     *
     * return boolean
     * 
     * @param string value
    */
	public static function isint( $value ) {
		if( filter_var( $value, FILTER_VALIDATE_INT ) ) {
			return true;
		} else {
			return false;
		}
	}

	/**
     * Returns a boolean pending if the param is a valid string
     *
     * return boolean
     * 
     * @param string value
    */
	public static function isstring( $value ) {
		if( is_string( $value ) ) {
			return true;
		} else {
			return false;
		}
	}

	/**
     * Returns a boolean pending if the param is a valid boolean
     *
     * return boolean
     * 
     * @param string value
    */
	public static function isboolean( $value ) {
		if( filter_var( $value, FILTER_VALIDATE_BOOLEAN ) ) {
			return true;
		} else {
			return false;
		}
	}

	/**
     * Returns a boolean pending if the param is a valid float
     *
     * return boolean
     * 
     * @param string value
    */
	public static function isfloat( $value ) {
		if( filter_var( $value, FILTER_VALIDATE_FLOAT ) ) {
			return true;
		} else {
			return false;
		}
	}

	/**
     * Returns a boolean pending if the param is a valid email address
     *
     * return boolean
     * 
     * @param string value
    */
	public static function isemail( $value ) {
		if( filter_var( $value, FILTER_VALIDATE_EMAIL ) ) {
			return true;
		} else {
			return false;
		}
	}

	/**
     * Returns a boolean pending if the param is a valid ip address
     *
     * return boolean
     * 
     * @param string value
    */
	public static function isipaddress( $value ) {
		if( filter_var( $value, FILTER_VALIDATE_IP ) ) {
			return true;
		} else {
			return false;
		}
	}

	/**
     * Returns a boolean pending if param 2 is of the type of param 1
     *
     * return boolean
     * 
     * @param string type
     * @param string value
    */
	public static function isvalid( $type, $value ) {
		$types = 'boolean, email, float, int, ipaddress, string';

		try {

			if( in_array( $type, $types) ) {

				switch( $type ) {
					case 'boolean':
						return Security::is_boolean( $value );
					break;

					case 'email':
						return Security::is_email( $value );
					break;

					case 'float':
						return Security::is_float( $value );
					break;

					case 'int':
						return Security::is_int( $value );
					break;

					case 'ipaddress':
						return Security::is_ipaddress( $value );
					break;

					case 'string':
						return Security::is_string( $value );
					break;
				}

			} else {
				throw new Exception( 'The provided type of (' . $type . '), is not supported by this function.' );
			}

		} catch( Exception $e ) {
			Error::message( $e, 500 );
		}
	}

	/**
     * Returns a boolean value based on whether the provided string value is greater 
     * than, less than or equal to the from and to params.
     *
     * return boolean
     * 
     * @param string value
     * @param int from
     * @param int to
    */
	public static function islength( $value, $from = null, $to = null ) {
		try {

			if( strlen( $value ) != 0 && Security::is_string( $value ) ) {

				try {

					if( $from != 0 && Security::is_int( $from )  ) {

						try {

							if( $to != 0 && Security::is_int( $to )  ) {

								if( strlen( $value ) >= $from && strlen( $value ) <= $to ) {
									return true;
								} else {
									return false;
								}
								
							} else {
								throw new Exception( Security::is_length() . ' - param 3 (to) was not provided or is not an int.' );
								return false;
							}

						} catch( Exception $e ) {
							Error::message( $e, 500 );
						}

					} else {
						throw new Exception( Security::is_length() . ' - param 2 (from) was not provided or is not an int.' );
						return false;
					}

				} catch( Exception $e ) {
					Error::message( $e, 500 );
				}

			} else {
				throw new Exception( Security::is_length() . ' - param 1 (value) was not provided or is not a string.' );
				return false;
			}

		} catch( Exception $e ) {
			Error::message( $e, 500 );
		}
	}

	/**
     * Add back the base64 characters to the $string param and decode the string
     *
     * return string
     * 
     * @param string value
    */
	public static function safe_b64decode( $string ) {
		$data = str_replace( array( '-', '_' ), array( '+', '/' ), $string );
		$mod4 = strlen( $data ) % 4;
		
		if( $mod4 ) {
			$data .= substr( '====', $mod4 );
		}

		return base64_decode($data);
	}

	/**
     * Encode the $string param to base64 and remove all characters from the result
     *
     * return string
     * 
     * @param string value
    */
	public static function safe_b64encode( $string ) {
		$data = base64_encode( $string );
		$data = str_replace( array( '+', '/', '=' ), array( '-', '_', '' ), $data );
		
		return $data;
	}

	/**
     * Returns a string with all special characters converted to HTML entities which 
     * is used to help with cleansing data from possible XSS attacks
     *
     * return string
     * 
     * @param string value
    */
	public static function xss_clean( $value ) {
		// -- Define a list of xss filters
		$naughty = 'alert|applet|audio|basefont|base|behavior|bgsound|blink|body|embed|expression|form|frameset|frame|head|html|ilayer|iframe|input|isindex|layer|link|meta|object|plaintext|style|script|textarea|title|video|xml|xss';

		return htmlspecialchars( $value );
	}

}
