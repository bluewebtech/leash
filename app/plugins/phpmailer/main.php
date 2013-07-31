<?php

require_once 'class.phpmailer.php';

function sendMailView( $filename, $model = array() ) {
	$request     = $_SERVER[ 'REQUEST_URI' ];
	$requestList = explode( '/', $request );
	$url         = array_filter( $requestList );
	$urlItem     = $url[ 1 ];
	$urlScrub    = preg_replace( '/[^a-z]/', ' ', $urlItem );
	$urlCase     = ucwords( $urlScrub );
	$urlFormat   = str_replace( ' ', '', $urlCase );
	$path        = VIEWS_PATH . $GLOBALS[ 'controller' ] . '/' . $filename . EXT_PHP;
	
	extract( $model );

	if( !empty( $model ) ) {
		foreach ( $model as $key => $value ) {
			$$key = $value;
		}
	}

	if ( is_file( $path ) ) {
		ob_start();
		include( $path );
		return ob_get_clean();
	}

	return false;
}

function sendMail( $to, $from, $subject, $body, $format = null, $image = null ) {
    $mail = $GLOBALS[ 'mail' ];

    if($_SERVER[ 'SERVER_ADDR' ] == '127.0.0.1') {
        $type = 'development';
    } else {
        $type = 'production';
    }

    try{

        $host     = $mail[ $type ][ 'mail' ][ 'host' ];
        $port     = $mail[ $type ][ 'mail' ][ 'port' ];
        $username = $mail[ $type ][ 'mail' ][ 'username' ];
        $password = $mail[ $type ][ 'mail' ][ 'password' ];

        $sendmail = new PHPMailer();
		$sendmail->IsSMTP();
		$sendmail->Host = $host . ':' . $port;
		if( !empty( $username ) && !empty( $password ) ) {
			$sendmail->SMTPAuth = true;
		}
		$sendmail->Username = $username;
		$sendmail->Password = $password;
		$sendmail->From     = $from;
		$sendmail->FromName = $from;

		if( !empty( $format ) ) {
			if( $format == 'html' ) {
				$sendmail->IsHTML( true );
			}
		}

		if( !empty( $image ) ) {
			$sendmail->AddEmbeddedImage( $image[ 0 ], $image[ 1 ] );
		}

		$sendmail->Body    = $body;
		$sendmail->Subject = $subject;
		$sendmail->AddAddress( $to );

		if( !$sendmail->Send() ) {
		   echo "<p>Message was not sent<br/ >\n";
		   echo "Mailer Error: " . $sendmail->ErrorInfo . "</p>\n";
		} else {
		   //echo "<p>Message has been sent</p>";
		}

    } catch( PDOException $e ) {
        echo $e->getMessage();
    }
    
}
