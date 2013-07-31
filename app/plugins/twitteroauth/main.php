<?php

require_once 'twitteroauth.php';

class TwitterOAuthPlugin {
	
	public static function config_val( $config ) {
		if( isset( $config ) ) {
			return true;
		} else {
			return false;
		}
	}

	public static function twitteroauth( $count ) {
		require_once 'config.php';

		$connection = new TwitterOAuth( 
			$config[ 'CONSUMER_KEY' ], 
			$config[ 'CONSUMER_SECRET' ], 
			$config[ 'ACCESS_TOKEN' ], 
			$config[ 'ACCESS_TOKEN_SECRET' ] 
		);

		$connect = $connection->get( 
			'https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=' . $config[ 'USERNAME' ] . '&count=' . $count 
		);

		if( isset( $connect->errors[ 0 ]->code ) ) {
			$error = $connect->errors[ 0 ]->code;
		}

		try {

			if( TwitterOAuthPlugin::config_val( $config[ 'USERNAME' ] ) && $error != 34 ) {

				try {

					if( strlen( $config[ 'CONSUMER_KEY' ] ) && 
						strlen( $config[ 'CONSUMER_SECRET' ] ) && 
						strlen( $config[ 'ACCESS_TOKEN_SECRET' ] ) && 
						$error != 32 ) {

						try {

							if( strlen( $config[ 'ACCESS_TOKEN' ] ) && $error != 89 ) {
								return $connect;
							} else {
								throw new Exception( 'TwitterOAuth Plugin : Access Token undefined or invalid.' );
							}

						} catch( Exception $e ) {
							Error::message( $e, 500 );
						}

					} else {
						throw new Exception( 'TwitterOAuth Plugin : Consumer Key, Consumer Secret or Access Token Secret undefined or invalid.' );
					}

				} catch( Exception $e ) {
					Leash\Error::message( $e, 500 );
				}

			} else {
				throw new Exception( 'TwitterOAuth Plugin : Username undefined or invalid.' );
			}

		} catch( Exception $e ) {
			Error::message( $e, 500 );
		}
	}

}

/*
echo json_encode($tweets);

echo "<pre>\n";
$tweets = twitteroauth( 1 );
print_r( $tweets[ 0 ]->text );
echo "</pre>\n";
*/

function twitteroauth( $count ) {  return TwitterOAuthPlugin::twitteroauth( $count ); }
