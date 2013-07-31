<?php

class File {

	// -- Actions
	public static $actions = array( 
		'append', 
		'copy', 
		'delete', 
		'move', 
		'read', 
		'rename', 
		'upload', 
		'write'
	);

	// -- Conflict actions
	public static $conflict = array(
		'overwrite', 
		'unique'
	);

	// -- Debugging
	public static $debug = false;

	// -- Params
	public static $params = array( 
		'action', 
		'field', 
		'accept', 
		'destination', 
		'source', 
		'size', 
		'conflict', 
		'content'
	);

	/**
     * Checks the file extensions of all files selected making sure which files 
     * contain the accepted file extensions provided in the accept param. The end 
     * result is that an array sorted by allowed and disallowed files with sizes.
     *
     * return array
     * 
     * @param array accept
    */
	public static function accept( $accept ) {
		$array        = $accept;	
		$files        = $accept[ 'field' ]->file[ 'name' ];
		$temp         = $accept[ 'field' ]->file[ 'tmp_name' ];
		$size         = $accept[ 'field' ]->file[ 'size' ];
		$allowed_size = $accept[ 'size' ];
		$accept       = $accept[ 'accept' ];

		// -- Check if the accept param was provided or is blank
		if( isset( $accept ) && strlen( $accept ) ) {

			// -- Check whether the accept param is a string
			if( is_string( $accept ) ) {

				// -- Convert the list of accepted file extensions to an array
				$accept = explode( ',', preg_replace( '/\s+/', '', $accept ) );

			}

			// -- Loop through all provided accepted file extensions
			foreach( $accept as $key => $value ) {

				// -- Make sure all provided file extensions have a dot infront of them. 
				if( !strstr( $value, '.' ) ) {

					// -- Add a dot to the beginning of the extension
					$accept[ $key ] = '.' . $value;

				}

			}

			// -- Define an array to store the accepted file information
			$accepted = array();

			// -- Define an array to store the rejected file information
			$rejected = array();

			// -- Loop through all file data to run some checks
			foreach( $files as $key => $value ) {

				// -- Start another loop to get specific key data
				foreach( $accept as $accept_key => $accept_value ) {

					// -- Check all file names for specified permitted file extensions
					if( strstr( $value, $accept_value ) ) {

						// -- Populate the accepted collection with new file data
						$accepted[ 'file' ][] = $value;
						$accepted[ 'temp' ][] = $temp[ $key ];
						$accepted[ 'size' ][] = number_format( $size[ $key ] / 1024, 2, '.', '' ); // -- Convert to KB
					
					} else {

						// -- Populate the rejected collection with new file data
						$rejected[ 'file' ][] = $value;
						$rejected[ 'temp' ][] = $temp[ $key ];
						$rejected[ 'size' ][] = number_format( $size[ $key ] / 1024, 2, '.', '' ); // -- Convert to KB
					
					}

				}

			}

			// -- Define an array to store the file information
			$sorted = array();

			// -- Check if the accepted collection contains any elements
			if( count( $accepted ) ) {

				// -- Add the accepted file information to the sorted array
				$sorted[ 'accepted' ] = $accepted;

			}

			// -- Check if any rejected files were detected. 
			// -- If not do not work on the clean up of any duplicates.
			if( count( $rejected ) && count( $accepted ) ) {

				// -- Check for similarities in the accepted and rejected file list
				$diff_file = array_diff( $rejected[ 'file' ], $accepted[ 'file' ] );
				
				// -- Check for similarities in the accepted and rejected size list
				$diff_size = array_diff( $rejected[ 'size' ], $accepted[ 'size' ] );

				// -- Check for similarities in the accepted and rejected temp list
				$diff_temp = array_diff( $rejected[ 'temp' ], $accepted[ 'temp' ] );

				// -- Remove any duplicate values in the rejected file list
				$rejected_file = array_unique( $diff_file );

				// -- Remove any duplicate values in the rejected size list
				$rejected_size = array_unique( $diff_size );

				// -- Remove any duplicate values in the rejected temp list
				$rejected_temp = array_unique( $diff_temp );

				// -- Add the rejected file information to the sorted array
				$sorted[ 'rejected' ][ 'file' ] = $rejected_file;

				// -- Add the rejected size information to the sorted array
				$sorted[ 'rejected' ][ 'size' ] = $rejected_size;

				// -- Add the rejected temp information to the sorted array
				$sorted[ 'rejected' ][ 'temp' ] = $rejected_temp;
			}

			// -- If no items exist in the rejected key of the sorted collection, 
			// -- remove the rejected key completely from the sorted collection.
			if( !count( $sorted[ 'rejected' ][ 'file' ] ) && 
				!count( $sorted[ 'rejected' ][ 'size' ] ) && 
				!count( $sorted[ 'rejected' ][ 'temp' ] ) ) {

				// -- Kill the rejected collection
				unset( $sorted[ 'rejected' ] );

			}

		} else {

			// -- If the accept param was not provided, add all the files to the accept list 
			// -- within the sorted array converting the size values to kilobytes.
			foreach( $files as $key => $value ) {

				$sorted[ 'accepted' ][ 'file' ][] = $value;
				$sorted[ 'accepted' ][ 'temp' ][] = $temp[ $key ];
				$sorted[ 'accepted' ][ 'size' ][] = number_format( $size[ $key ] / 1024, 2, '.', '' ); // -- Convert to KB
			
			}
			
		}

		// -- Check if the size param was provided in the passed array collection
		if( array_key_exists( 'size', $array ) ) {			

			// -- Check if a file size limit was provided as well as if any accepted 
			// -- and rejected files exist in both array collections.
			if( isset( $allowed_size ) || count( $rejected ) || count( $accepted ) ) {

				// -- Run a check for file size limits if one was specified
				$sorted = File::size( $sorted, $allowed_size );

			}

		}

		// -- Return the sorted array containing all file data
		return $sorted;
	}

	/**
     * Makes sure the specified file exists and that content was provided then adds the new 
     * content to the existing file and returns the updated file content as an array.
     * 
     * return boolean
     * 
     * @param array files
    */
	public static function append( $file ) {
		// -- Define destination
		$destination = File::destination( $file );

		// -- Define content
		$content = File::content( $file );

		// --Check if the destination and content params check out then create the file 
		if( $destination && $content ) {

			// -- Append the contents to the specified file
			file_put_contents( $destination, $content, FILE_APPEND | LOCK_EX );

			// -- Return the destination and updated file as an array
			return array(
				'destination' => $destination, 
				'content'     => explode( "\n", file_get_contents( $destination ) )
			);

		} else {
			return false;
		}
	}

	/**
     * Checks whether the conflict param was provided and determines which action to take 
     * depending on the provided conflict param. If no conflict param is provided the default 
     * conflict type is overwrite which will overwrite any existing files matching the selected 
     * files for uploading.
     *
     * return boolean
     * 
     * @param array files
    */
	public static function conflict( $file ) {
		$conflict = $file[ 'conflict' ];

		// -- Check is the conflict param was provided in the files collection
		if( array_key_exists( 'conflict', $file ) ) {
			
			// -- Check if the provided conflict type is available in the list of conflict types
			if( in_array( $conflict, File::$conflict ) ) {
				
				// -- Determine what type of conflict type was specified.
				// -- The default conflict type is overwrite.
				if( $conflict == 'unique' ) {
					return true;
				} else {
					return false;
				}

			}

		} else {
			return false;
		}
	}

	/**
     * Checks whether the content key was provided in the files collection as well as checking 
     * to make sure the content param exists in the list of available params then returns a 
     * boolean value.
     *
     * return boolean
     * 
     * @param array files
    */
	public static function content( $file ) {
		try {

			// -- Check if the content param was provided in the files collection
			if( array_key_exists( 'content', $file ) ) {

				try {
					
					// -- Check if the content param exists in the list of available params
					if( in_array( 'content', File::$params ) ) {
						return $file[ 'content' ];
					} else {
						throw new Exception( 'The param (content) is not a valid param type.' );
						return false;
					}

				} catch( Exception $e ) {
					Error::message( $e, 500 );
				}

			} else {
				throw new Exception( 'A (content) param is required with the (write) action param.' );
				return false;
			}

		} catch( Exception $e ) {
			Error::message( $e, 500 );
		}
	}

	/**
     * Handles the copying of the specified files
     *
     * return boolean
     * 
     * @param array file
    */
	public static function copy( $file ) {
		// -- Define the source
		$source = File::source( $file );

		// -- Define the destination
		$destination = File::destination( $file );

		// -- Check if a source and a destination were provided
		if( $source && $destination ) {

			// -- Copy the specified file to the specified destination
			copy( $source, $destination );

			// -- Return the source and destination as an array
			return array( 
				'source'      => $source, 
				'destination' => $destination 
			);

		} else {
			return false;
		}
	}

	/**
     * Outputs all values in the $file array if debugging for the File class has been enabled.
     *
     * return boolean
     * 
     * @param array file
    */
	public static function debug( $file ) {
		// -- Check if debugging for the File class has been enabled and output the results.
		if( File::$debug ) {
			echo "<pre>\n";
				print_r( $file );
			echo "</pre>\n";
		}
	}

	/**
     * Handles the deleting of the specified files and returns the path of the deleted file(s).
     *
     * return boolean
     * 
     * @param array file
    */
	public static function delete( $file ) {
		// -- Define the source
		$source = File::source( $file );

		// -- Check if a source was provided
		if( $source ) {

			// -- Delete the specified file
			unlink( $source );

			// -- Return the path of the deleted file
			return $source;

		} else {
			return false;
		}
	}

	/**
     * Checks whether the destination path specified exists.
     *
     * return boolean
     * 
     * @param array destination
    */
	public static function destination( $file ) {
		try {

			// -- Make sure the destination param was provided in the file collection
			if( array_key_exists( 'destination', $file ) ) {

				try {

					// -- Format the provided destination path to be cross platform
					$path = str_replace( '/', DS, $file[ 'destination' ] );

					// -- Convert the path value to an array
					$explode = explode( DS, $path );

					// -- Get the last element in the explode array which should be the file name
					$file = $explode[ count( $explode ) - 1 ];

					// -- Redefine the path value with the new file name
					$path = str_replace( $file, '', $path );

					// -- Make sure the path exists
					if( is_dir( $path ) ) {

						// -- Check if a file name exists in the destination string
						if( strlen( $file ) ) {
							return $path . $file;
						} else {
							return $path;
						}
						
					} else {
						throw new Exception( 'The directory path (' . $path . ') does not exist.' );
						return false;
					}

				} catch( Exception $e ) {
					Error::message( $e, 500 );
				}

			} else {
				throw new Exception( 'A destination was not provided for the file method.' );
				return false;
			}

		} catch( Exception $e ) {
			Error::message( $e, 500 );
		}
	}

	/**
     * Checks whether the field param was defined and if the provided field type is 
     * available in the list of params.
     *
     * return boolean
     * 
     * @param array file
    */
	public static function field( $field ) {
		try {

			// -- Make sure that an action param was provided and is a valid param type
			if( array_key_exists( File::$params[ 1 ], $field ) ) {
				return true;
			} else {
				throw new Exception( 'A (field) param is required.' );
				return false;
			}

		} catch( Exception $e ) {
			Error::message( $e, 500 );
		}
	}
	
	/**
     * Makes a file name unique by adding an undelimited timestamp to the beginning of 
     * the file name separated by an underscore.
     *
     * return array
     * 
     * @param array values
     * @param string size
    */
	public static function make_unique( $file ) {
		return date( 'YmdHis' ) . '_' . $file;
	}

	/**
     * Handles the moving of the specified files
     *
     * return boolean
     * 
     * @param array file
    */
	public static function move( $file ) {
		// -- Define the source
		$source = File::source( $file );

		// -- Define the destination
		$destination = File::destination( $file );

		// -- Check if a source and a destination were provided
		if( $source && $destination ) {
			
			// -- Move the specified source to the specified destination
			rename( $source, $destination );
			
			// -- Return the source and destination as an array
			return array( 
				'source'      => $source, 
				'destination' => $destination
			);

		} else {
			return false;
		}
	}

	/**
     * Handles the reading of the specified files
     *
     * return array
     * 
     * @param array file
    */
	public static function read( $file ) {
		// -- Define the source
		$source = File::source( $file );

		// -- Check if a source was provided then read the specified file 
		// -- returning the output as an array.
		if( $source ) {

			// -- Return the source and content of the specified source
			return array(
				'source'  => $source, 
				'content' => explode( "\n", file_get_contents( $source ) )
			);

		} else {
			return false;
		}
	}

	/**
     * Handles the renaming of the specified files
     *
     * return boolean
     * 
     * @param array file
    */
	public static function rename( $file ) {
		// -- Define the source
		$source = File::source( $file );

		// -- Define the destination
		$destination = File::destination( $file );

		// -- Check if a source and a destination were provided then rename 
		// -- the specified file.
		if( $source && $destination ) {

			// -- Rename the specified source as the specified destination
			rename( $source, $destination );

			// -- Return the source and destination as an array
			return array(
				'source'      => $source, 
				'destination' => $destination
			);

		} else {
			return false;
		}
	}

	/**
     * Handles file size limits
     *
     * return array
     * 
     * @param array values
     * @param string size
    */
	public static function size( $values, $size ) {
		$files = $values[ 'accepted' ][ 'file' ];
		$sizes = $values[ 'accepted' ][ 'size' ];
		$temp  = $values[ 'accepted' ][ 'temp' ];

		// -- Loop through all values using $files as the reference
		foreach( $files as $key => $value ) {

			// -- Check if the files size of all currently accepted files are not greater 
			// -- than the specifie file size limit if one was defined.
			if( $sizes[ $key ] > $size ) {

				// -- Add all accepted values to the rejected list if they are larger than 
				// -- the specified size limit if one was defined.
				$values[ 'rejected' ][ 'file' ][] = $value;
				$values[ 'rejected' ][ 'size' ][] = $sizes[ $key ];
				$values[ 'rejected' ][ 'temp' ][] = $temp[ $key ];

				// -- Remove the accepted values from the accepted list if they are larger 
				// -- than the specified size limit if one was defined.
				unset( $values[ 'accepted' ][ 'file' ][ $key ] );
				unset( $values[ 'accepted' ][ 'size' ][ $key ] );
				unset( $values[ 'accepted' ][ 'temp' ][ $key ] );

			}

		}

		// -- Do some clean up. Check if any values in the accept list exist for both the 
		// -- file and size keys and kill the accepted list if none exist.
		if( !count( $values[ 'accepted' ][ 'file' ] ) && !count( $values[ 'accepted' ][ 'size' ] ) ) {
			
			// -- Kill the accepted collection
			unset( $values[ 'accepted' ] );

		}

		// -- Return all values
		return $values;
	}

	/**
     * Checks whether the source path specified exists.
     * 
     * return boolean
     * 
     * @param array file
    */
	public static function source( $file ) {
		try {

			// -- Check if the source param was provided. 
			// -- If not, output exception message to the screen.
			if( array_key_exists( 'source', $file ) ) {

				try {

					// -- Rebuild the file path to use the directory separator which 
					// -- will allow for cross platform file handling.
					$path = str_replace( '/', DS, $file[ 'source' ] );

					// -- Check if the file exists. 
					// -- If not, output exception message to the screen.
					if( file_exists( $path ) ) {
						return $path;
					} else {
						throw new Exception( 'The path to file (' . $path . ') does not exist or may be incorrect.' );
						return false;
					}

				} catch( Exception $e ) {
					Error::message( $e, 500 );
				}

			} else {
				throw new Exception( 'A source was not provided for the file method.' );
				return false;
			}

		} catch( Exception $e ) {
			Error::message( $e, 500 );
		}
	}

	/**
     * Handles the uploading of the specified files
     *
     * return boolean
     * 
     * @param array file
    */
	public static function upload( $file ) {
		// -- Validate the existance of the field element and that a destination 
		// -- was provided as well as exists.
		if( File::field( $file ) && File::destination( $file ) ) {

			// -- Get a new list of file information based on accept checks
			$accept = File::accept( $file );

			// -- Define a holder for the file names
			$files = $accept[ 'accepted' ][ 'file' ];

			// -- Check if any elements exist in the files collection
			if( count( $files ) ) {

				// -- Loop through all files in the files collection
				foreach( $files as $key => $value ) {

					// -- Get the temp file name from the file collection param
					$temp = $accept[ 'accepted' ][ 'temp' ][ $key ];

					// -- Check if the conflict param was defined in the file collection param
					if( File::conflict( $file ) ) {

						// -- Rename the file making it unique
						$file_name = File::make_unique( $accept[ 'accepted' ][ 'file' ][ $key ] );

						// -- Update the file name in the file collection param
						$accept[ 'accepted' ][ 'file' ][ $key ] = $file_name;

					} else {

						// -- Keep the file name the same in the file collection param
						$file_name = $accept[ 'accepted' ][ 'file' ][ $key ];

					}

					// -- Build the complete file path that is to be uploaded
					$path = File::destination( $file ) . $file_name;

					// -- Upload the file(s) to the specified path
					move_uploaded_file( $temp, $path );

				}

				// -- Return the collection of accepted and rejected file information
				return $accept;

			} else {
				return false;
			}

		} else {
			return false;
		}
	}

	/**
     * Handles the writing of a new text file
     *
     * return array
     * 
     * @param array file
    */
	public static function write( $file ) {
		$destination = File::destination( $file );

		// -- Define content
		$content = File::content( $file );

		// --Check if the destination and content params check out then create the file 
		// -- writing the specified contents to the file.
		if( $destination && $content ) {
			
			// -- Write the contents to the specified file
			file_put_contents( $destination, $content );

			// -- Return the destination and updated file as an array
			return array(
				'destination' => $destination, 
				'content'     => explode( "\n", file_get_contents( $destination ) )
			);

		} else {
			return false;
		}
	}

}
