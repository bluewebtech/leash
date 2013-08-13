<?php

// -- TRY TO GET RID OF THE THIS SCOPED VARIABLES AND REFACTOR THE 
// -- TAGS CLASS TO CONTAIN NOTHING BUT STATIC METHODS.

class Tags {
   
    public $output;
    public $file;
    public $values = array();

    // -- Pre-defined tags
    public static $defined = array( 
        'assets', 
        'body', 
        'description', 
        'keywords', 
        'title' 
    );

    /**
     * Outputs the content of a defined tag
     * 
     * return void
     * 
     * @param string file
    */
    public function __construct( $file ) {
        if( !empty( $file ) ) {
            $this->file = $file;

            ob_start();
            include $this->file ;
            $this->output = ob_get_contents();
            ob_get_clean();
        }
    }

    /**
     * Gets and includes all tag files
     * 
     * return void
     * 
     * @param string tags
    */
    public static function get_tags( $tags ) {
        $dir   = scandir( TAGS_PATH );
        $files = array();

        foreach ( $dir as $key => $value ) {

            if( $value != '.' && $value != CD ) {
                array_push( $files, $value );
            }

        }

        foreach ( $files as $key => $value ) {

            if( $value != '.' && $value != CD ) {

                if( Tags::tag_val() ) {
                    require TAGS_PATH . $value;
                }
                
            }

        }
    }

    /**
     * Returns the content that a tag stores
     * 
     * return string
    */
    public function output() {
        foreach( $this->values as $key => $value ) {
            $replace = "[$key]";
            $this->output = str_replace( $replace, $value, $this->output );
        }
       
        return $this->output;
    }
    
    /**
     * Defined a new tag
     * 
     * return query
     * 
     * @param string key
     * @param string value
    */
    public function set( $key, $value ) {
        $this->values[ $key ] = $value;
    }

    /**
     * Checks all tags making sure none contain any pre-defined tag names
     * 
     * return boolean
    */
    public static function tag_val() {
        $dir   = scandir( TAGS_PATH );
        $files = array();

        foreach ( $dir as $key => $value ) {

            if( $value != '.' && $value != CD && strpos( $value, '.' ) != 0 ) {
                array_push( $files, $value );
            }

        }

        foreach ( $files as $key => $value ) {
            if( $value != '.' && $value != CD ) {

                $path = TAGS_PATH . $value;
                $file = $value;

                if( file_exists( $path ) ) {
                    $contents = file( $path );
                    $lines    = array();

                    foreach( $contents as $key => $value ) {
                        array_push( $lines, trim( strtolower( $value ) ) );
                    }

                    $list = implode( ',', str_replace( ' ', '', $lines ) );
                    $str  = substr( $list, strpos( $list, '$tags->set(' ), strlen( $list ) );
                    $item = str_replace( "\$tags->set('", '', str_replace( "','');", '', $str ) );
                    
                    try {

                        if( !in_array( $item, Tags::$defined ) ) {
                            return true;
                        } else {
                            throw new Exception( 'The tag residing in (' . $file . ') contains a pre-defined tag name of (' . $item . '). Rename this tag to correct this error. Other pre-defined tag names are: ' . implode( ', ', Tags::$defined ) . '.' );
                        }

                    } catch( Exception $e) {
                        Error::message( $e, 500 );
                    }

                }

            }
        }
    }

    /**
     * Returns a specified view template
     * 
     * return string
     * 
     * @param string file
     * @param array params
    */
    public function template( $file, $params = array() ) {
        if( !empty( $params ) ) {

            foreach ( $params as $key => $value ) {
                $$key = $value;
            }

        }
        
        ob_start();
        require str_replace( TAGS_PATH, VIEWS_PATH, TAGS_PATH) . $file . EXT_PHP;
        $template = ob_get_contents();
        ob_get_clean();

        return $template;
    }
   
}
