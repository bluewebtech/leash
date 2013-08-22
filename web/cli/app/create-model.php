<?php

class CreateModel {

	public static $outfix = 'Model';

	/**
     * Checks whether the model name param was provided
     *
     * return boolean
     * 
     * @param array command
    */
	public static function model_name_isset( $command ) {
		if( array_key_exists( 1, $command ) ) {
			return true;
		} else {
			return false;
		}
	}

	/**
     * Return model name if model name param was provided
     *
     * return string
     * 
     * @param string command
    */
	public static function model_name( $command ) {
		if( CreateModel::model_name_isset( $command ) ) {
			return Format::clean( $command[ 1 ] );
		} else {
			return false;
		}
	}

	/**
     * Return model file name with default file extension
     *
     * return string
    */
	public static function model_file_ext( $name ) {
		return $name . EXT_PHP;
	}

	/**
     * Return model name with the first letter uppercased
     *
     * return string
     * 
     * @param string name
    */
	public static function model_class_name( $name ) {
		return ucfirst( $name ) . CreateModel::$outfix;
	}

	/**
     * Return the complete path to the models directory
     *
     * return string
    */
	public static function model_default_directory() {
		$model_path = str_replace( CD . DS . APP . DS, '', MODELS_PATH );
		$path = str_replace( DS . WEB . DS . CLI . DS . APP, DS . APP . DS, __DIR__ );
		return str_replace( '/', DS, $path ) . str_replace( '/', DS, $model_path );
	}

	/**
     * Return the complete model path with file name
     *
     * return string
     * 
     * @param string name
    */
	public static function model_file_path( $name ) {
		return CreateModel::model_default_directory() . $name;
	}

	/**
     * Check if model file exists
     *
     * return boolean
     * 
     * @param string file
    */
	public static function model_file_exists( $file ) {
		return file_exists( $file );
	}

	/**
     * Return model file contents
     *
     * return string
     * 
     * @param string class
    */
	public static function model_file_contents( $class ) {
		$content = <<<MODEL
<?php

class $class {

}
MODEL;
		return $content;
	}

	/**
     * Generate model file and populate with contents
     *
     * return boolean
     * 
     * @param string file
     * @param string contents
    */
	public static function model_make( $file, $contents ) {
		$f = fopen( $file, 'w' );
		chmod( $file, 0777 );
		fwrite( $f, $contents );
		return fclose( $f );
	}

	public static function main( $command ) {
		// -- Check if a model name was provided
		if( CreateModel::model_name_isset( $command ) ) {

			// -- Model variable definitions
			$model_name              = CreateModel::model_name( $command );
			$model_class_name        = CreateModel::model_class_name( $model_name );
			$model_default_directory = CreateModel::model_default_directory();
			$model_file_ext          = CreateModel::model_file_ext( $model_name );
			$model_file_path         = CreateModel::model_file_path( $model_file_ext );
			$model_file_contents     = CreateModel::model_file_contents( $model_class_name );

			// -- Check if model already exists
			if( CreateModel::model_file_exists( $model_file_path ) ) {
				print 'Model ' . Format::command_style( $model_name ) . " already exists.\n";
			} else {

				// -- DEBUGGING START
				/*
				print $model_name . "\n";
				print $model_class_name . "\n";
				print $model_default_directory . "\n";
				print $model_file_ext . "\n";
				print $model_file_path . "\n";
				print $model_file_contents . "\n";
				*/
				// -- DEBUGGING END

				// -- Generate the new model file
				CreateModel::model_make( $model_file_path, $model_file_contents );

				print 'Model ' . Format::command_style( $model_name ) . " created successfully.\n";
			}

		} else {
			print Format::error_style( 'Please provided a name for your new model.' ) . "\n";
			print 'Example: ' . Format::command_style( 'create-model zombie' ) . "\n";
		}
	}

}
