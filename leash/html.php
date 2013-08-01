<?php

class HTML {

	/**
     * Returns a linked <a href></a> url based on the provided parameters
     *
     * return string
     * 
     * @param string text
     * @param string url
     * @param string title
     * @param string target
    */
	public static function ahref( $text = null, $url = null, $title = null, $target = null ) {
		$target_types = array( '_blank', '_parent', '_self', '_top' );

		if( empty( $target ) ) {
			return '<a href="' . $url . '" title="' . $title . '">' . $text . '</a>';
		} else {
			return '<a href="' . $url . '" title="' . $title . '" target="' . $target . '">' . $text . '</a>';
		}
	}

	/**
     * Returns the provided parameter string in bold <b></b> text
     *
     * return string
     * 
     * @param string value
    */
	public static function bold( $value = null ) {
		return "<b>" . $value . "</b>\n";
	}

	/**
     * Returns the provided parameter string in bold <b></b> text
     *
     * return string
     * 
     * @param string value
    */
	public static function b( $value = null ) {
		return HTML::bold( $value );
	}

	/**
     * Returns the provided parameter with a single or multiple breaks <br />
     *
     * return string
     * 
     * @param string value
     * @param int total
    */
	public static function br( $value, $total ) {
		echo $value;

		if( empty( $total ) ) {
			echo "<br />\n";
		} else {

			for( $a = 1; $a <= $total; $a++ ) {
				echo "<br />\n";
			}

		}
	}

	/**
     * Returns the provided parameter wrapped in <meta name="description" content="" /> 
     * to be used as a layout [description] tag
     *
     * return string
     * 
     * @param string description
    */
	public static function description( $description ) {
		return $GLOBALS[ 'meta_description' ] = '<meta name="description" content="' . $description . '" />';
	}

	/**
     * Returns the provided parameters formatted in <dl></dl> tags
     *
     * return string
     * 
     * @param string value
    */
	public static function dl( $value ) {
		$html = '';
		$html .= "<dl>\n";
		if( is_array( $value ) ) {
			foreach( $value as $key ) {
				$html .= "\t<dt>" . $key . "</dt>\n";
			}
		} else {
			$html .= "<dt>" . $value . "</dt>\n";
		}
		$html .= "</dl>\n";
		return $html;
	}

	/**
     * Returns the provided parameter formatted as a header tag based on the provided 2nd parameter
     *
     * return string
     * 
     * @param string value
     * @param int num
    */
	public static function heading( $value, $num ) {
		if( !empty( $num ) && is_numeric( $num ) ) {
			return '<h' . $num . '>' . $value . '</h' . $num . '>' . "\n";
		} else {
			return '<p style="color:#C90000;font-weight:bold;">The heading() is missing a numeric 2nd argument.</p>';
		}
	}

	/**
     * Returns the provided parameters formatted in <h1></h1> tags
     *
     * return string
     * 
     * @param string value
    */
	public static function h1( $value ) {
		return "<h1>" . $value . "</h1>\n";
	}

	/**
     * Returns the provided parameters formatted in <h2></h2> tags
     *
     * return string
     * 
     * @param string value
    */
	public static function h2( $value ) {
		return "<h2>" . $value . "</h2>\n";
	}

	/**
     * Returns the provided parameters formatted in <h3></h3> tags
     *
     * return string
     * 
     * @param string value
    */
	public static function h3( $value ) {
		return "<h3>" . $value . "</h3>\n";
	}

	/**
     * Returns the provided parameters formatted in <h4></h4> tags
     *
     * return string
     * 
     * @param string value
    */
	public static function h4( $value ) {
		return "<h4>" . $value . "</h4>\n";
	}

	/**
     * Returns the provided parameters formatted in <h5></h5> tags
     *
     * return string
     * 
     * @param string value
    */
	public static function h5( $value ) {
		return "<h5>" . $value . "</h5>\n";
	}

	/**
     * Returns the provided parameters formatted in <iframe></iframe> tags
     *
     * return string
     * 
     * @param string value
    */
	public static function iframe( $attr ) {
		$src        = isset( $attr[ 'src' ] ) ? $attr[ 'src' ] : '';
		$width      = isset( $attr[ 'width' ] ) ? $attr[ 'width' ] : '';
		$height     = isset( $attr[ 'height' ] ) ? $attr[ 'height' ] : '';
		$border     = isset( $attr[ 'frameborder' ] ) ? $attr[ 'frameborder' ] : '';
		$fullscreen = isset( $attr[ 'allowfullscreen' ] ) ? $attr[ 'allowfullscreen' ] : '';
		$id         = isset( $attr[ 'id' ] ) ? $attr[ 'id' ] : '';
		$iframe     = '<iframe width="' . $width . '" height="' . $height . '" src="' . $src . '" frameborder="' . $border . '" allowfullscreen="' . $fullscreen . '" id="' . $id . '"></iframe>' . "\n";
		return $iframe;
	}

	/**
     * Returns the provided parameters formatted in <i></i> tags
     *
     * return string
     * 
     * @param string value
    */
	public static function italic( $value ) {
		return "<i>" . $value . "</i>\n";
	}

	/**
     * Returns the provided parameter wrapped in <meta name="keywords" content="" /> 
     * to be used as a layout [keywords] tag
     *
     * return string
     * 
     * @param string keywords
    */
	public static function keywords( $keywords ) {
		return $GLOBALS[ 'meta_keywords' ] = '<meta name="keywords" content="' . $keywords . '" />';
	}

	/**
     * Returns an email mailto link <a href="mailto:"></a> based on the provided parameters
     *
     * return string
     * 
     * @param string text
     * @param string url
     * @param string title
    */
	public static function mailto( $text, $link, $title) {
		return '<a href="mailto:' . $link . '" title="' . $title . '">' . $text . '</a>';
	}

	/**
     * Returns the provided parameters with a new line \n character
     *
     * return string
     * 
     * @param string value
    */
	public static function nl( $value ) {
		return $value . "\n";
	}

	/**
     * Returns the provided parameters formatted in <ol></ol> tags
     *
     * return string
     * 
     * @param string value
    */
	public static function ol( $value ) {
		$html = '';
		$html .= "<ol>\n";
		if( is_array( $value ) ) {
			foreach( $value as $key ) {
				$html .= "\t<li>" . $key . "</li>\n";
			}
		} else {
			$html .= "<li>" . $value . "</li>\n";
		}
		$html .= "</ol>\n";
		return $html;
	}

	/**
     * Returns the provided parameters formatted in <p></p> tags and styling
     *
     * return string
     * 
     * @param string value
     * @param string style
     * @param string type
    */
	public static function paragraph( $value, $style = null, $type = null ) {
		$style_type = array( 'class', 'id' );

		if( empty( $value ) ) {
			return "<p>&nbsp;</p>\n";
		} else {

			if( empty( $style ) ) {
				return "<p>" . $value . "</p>\n";
			} else {

				if( empty( $type ) ) {
					return '<p class="' . $style . '">' . $value . "</p>\n";
				} else {
					
					if( in_array( $type, $style_type ) ) {
						return '<p ' . $type . '="' . $style . '">' . $value . "</p>\n";
					} else {
						return '<p class="' . $style . '">' . $value . "</p>\n";
					}

				}
			}

		}
	}

	public static function p( $value, $style = null, $type = null ) {
		return HTML::paragraph( $value, $style, $type );
	}

	/**
     * Outputs the provided parameter using the print_r()
     *
     * return string
     * 
     * @param string value
    */
	public static function pre( $value ) {
		echo "<pre>\n";
			print_r( $value );
		echo "</pre>\n";
	}

	/**
     * Returns the provided parameters formatted with a space before and after the string
     *
     * return string
     * 
     * @param string value
    */
	public static function space( $value ) {
		return "&nbsp;" . $value . "&nbsp;";
	}

	/**
     * Returns the provided parameters formatted in <span></span> tags and styling
     *
     * return string
     * 
     * @param string value
     * @param string style
     * @param string type
    */
	public static function span( $value, $style, $type ) {
		$style_type = array( 'class', 'id' );

		if( empty( $style ) ) {
			return "<span>" . $value . "</span>\n";
		} else {

			if( empty( $type ) ) {
				return '<span class="' . $style . '">' . $value . "</span>\n";
			} else {
				
				if( in_array( $type, $style_type ) ) {
					return '<span ' . $type . '="' . $style . '">' . $value . "</span>\n";
				} else {
					return '<span class="' . $style . '">' . $value . "</span>\n";
				}

			}
		}
	}

	/**
     * Returns the provided parameters formatted in <strike></strike> tags
     *
     * return string
     * 
     * @param string value
    */
	public static function strike( $value ) {
		return "<strike>" . $value . "</strike>\n";
	}

	/**
     * Returns the provided parameters formatted in <strong></strong> tags
     *
     * return string
     * 
     * @param string value
    */
	public static function strong( $value ) {
		return "<strong>" . $value . "</strong>\n";
	}

	/**
     * Returns the provided parameter with a single or multiple tabs
     *
     * return string
     * 
     * @param string value
     * @param int total
    */
	public static function tab( $value, $total ) {
		echo $value;

		if( empty( $total ) ) {
			echo "\t";
		} else {

			for( $a = 1; $a <= $total; $a++ ) {
				echo "\t";
			}

		}
	}

	/**
     * Returns the provided parameter wrapped in <title></title> to be used 
     * as a layout [title] tag
     *
     * return string
     * 
     * @param string title
    */
	public static function title( $title ) {
		return $GLOBALS[ 'meta_title' ] = '<title>' . $title . '</title>';
	}

	/**
     * Returns the provided parameters formatted in <ul></ul> tags
     *
     * return string
     * 
     * @param string value
    */
	public static function ul( $value ) {
		$html = '';
		$html .= "<ul>\n";
		if( is_array( $value ) ) {
			foreach( $value as $key ) {
				$html .= "\t<li>" . $key . "</li>\n";
			}
		} else {
			$html .= "<li>" . $value . "</li>\n";
		}
		$html .= "</ul>\n";
		return $html;
	}

	/**
     * Returns the provided parameters formatted in <u></u> tags
     *
     * return string
     * 
     * @param string value
    */
	public static function underline( $value ) {
		return "<u>" . $value . "</u>\n";
	}

}
