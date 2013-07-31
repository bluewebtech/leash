<?php

namespace CLI;

use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class VersionControl {

	public static function vc_command_isset( $command ) {
		if( array_key_exists( 1, $command ) ) {
			return true;
		} else {
			return false;
		}
	}

	public static function version_control( $command ) {
		if( VersionControl::vc_command_isset( $command ) ) {

			$di       = new RecursiveDirectoryIterator( '../../');
			$host     = "";
			$username = "";
			$password = "";

			foreach( new RecursiveIteratorIterator( $di ) as $filename => $file ) {	
				$path        = str_replace( '../..', '', $file->getPath() );
				$file        = str_replace( '..\\', '/', $file->getFilename() );
				$file_path   = str_replace( '\\', '/', $path . '\\' . $file );
				$local_file  = @fopen( '../../' . $file_path,'r' );
				$local_read  = @stream_get_contents( $local_file );
				$remote_file = @fopen( 'ftp://' . $username . ':' . $password . '@' . $host . $file_path, 'r' );
				$remote_read = @stream_get_contents( $remote_file );
				
				if( $local_read == $remote_read ) {
					print '<span style="color:#00BD06;">' . $file_path . "</span>\n";
				} else {
					print '<span style="color:#DB0000;">' . $file_path . "</span>\n";
				}
			}

		} else {

			$di       = new RecursiveDirectoryIterator( '../../');
			$host     = "";
			$username = "";
			$password = "";

			foreach( new RecursiveIteratorIterator( $di ) as $filename => $file ) {	
				$path        = str_replace( '../..', '', $file->getPath() );
				$file        = str_replace( '..\\', '/', $file->getFilename() );
				$file_path   = str_replace( '\\', '/', $path . '\\' . $file );
				$local_file  = @fopen( '../../' . $file_path,'r' );
				$local_read  = @stream_get_contents( $local_file );
				$remote_file = @fopen( 'ftp://' . $username . ':' . $password . '@' . $host . $file_path, 'r' );
				$remote_read = @stream_get_contents( $remote_file );
				
				if( $local_read == $remote_read ) {
					print '<span style="color:#00BD06;">' . $file_path . "</span>\n";
				} else {
					print '<span style="color:#DB0000;">' . $file_path . "</span>\n";
				}
			}
			
		}
	}

}
