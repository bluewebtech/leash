<?php 

class Form {
	
	/**
	 * Returns the form action attribute
	 * 
	 * @param string action
	 * 
	 * return string
	*/
	public static function action( $action ) {
		return isset( $action ) ? ' action="' . $action . '"' : '';
	}

	/**
	 * Returns a button form field
	 * 
	 * @param array attr
	 * 
	 * return string
	*/
	public static function button( $attr = array() ) {
		$text = Form::label( $attr );
		$text .= "\t" . '<input type="button"' . Form::name( $attr[ 'name' ] ) . Form::id( $attr[ 'name' ] ) . Form::tabindex( $attr[ 'tabindex' ] ) . Form::value( $attr[ 'value' ] ) . ' />' . "\n";
		return Form::div( $text );
	}

	/**
	 * Returns a single or list of checkboxes
	 * 
	 * @param array attr
	 * 
	 * return string
	*/
	public static function checkbox( $attr = array() ) {
		$text = Form::label( $attr );

		if( !is_array( $attr[ 'values' ] ) ) {
			$attr[ 'values' ] = explode( ',', preg_replace( '/\s+/', '', $attr[ 'values' ] ) );
		} else {
			$attr[ 'values' ] = explode( ',', preg_replace( '/\s+/', '', $attr[ 'values' ][ 0 ] ) );
		}

		foreach( $attr[ 'values' ] as $key => $value ) {
			if( count( $attr[ 'values' ] ) != 1 ) {
				$text .= "\t" . '<input type="checkbox"' . Form::name( $attr[ 'name' ] . '[]' ) . Form::id( $attr[ 'name' ] . '[]' ) . Form::value( $value ) . ' /> ' . $value . "<br />\n";
			} else {
				$text .= "\t" . '<input type="checkbox"' . Form::name( $attr[ 'name' ] ) . Form::id( $attr[ 'name' ] ) . Form::value( $value ) . ' /> ' . $value . "<br />\n";
			}
		}
		
		return Form::div( $text );
	}

	/**
	 * Returns the closing form tag
	 * 
	 * return string
	*/
	public static function close() {
		return "</form>\n";
	}

	/**
	 * Returns the cols attribute for a textarea
	 * 
	 * @param string cols
	 * 
	 * return string
	*/
	public static function cols( $cols ) {
		return isset( $cols ) ? ' cols="' . $cols . '"' : '';
	}

	/**
	 * Returns a generated form based on all fields provided
	 * 
	 * @param array attr
	 * @param array fields
	 * 
	 * return string
	*/
	public static function create( $attr = array(), $fields = array() ) {
		$form = Form::open( $attr );

		foreach( $fields as $key => $value ) {
			$form .= $value;
		}

		$form .= Form::close();

		return $form;
	}

	/**
	 * Wraps all passed form elements into a div
	 * 
	 * @param string field
	 * 
	 * return string
	*/
	public static function div( $field ) {
		$text = '<div style="padding:5px;">' . "\n";
		$text .= $field;
		$text .= "</div>\n";
		return $text;
	}

	/**
	 * Returns the specified form enctype attribute
	 * 
	 * @param array attr
	 * 
	 * return string
	*/
	public static function enctype( $enctype ) {
		switch( $enctype ) {
			case 'application':
			case 'application/x-www-form-urlencoded':
				$type = 'application/x-www-form-urlencoded';
			break;

			case 'multipart':
			case 'multipart/form-data':
				$type = 'multipart/form-data';
			break;

			case 'text':
			case 'text/plain':
				$type = 'text/plain';
			break;
		}

		return isset( $type ) ? ' enctype="' . $type . '"' : '';
	}

	/**
	 * Returns a file form field
	 * 
	 * @param array attr
	 * 
	 * return string
	*/
	public static function file( $attr = array() ) {
		$text = Form::label( $attr );
		$text .= "\t" . '<input type="file"' . Form::name( $attr[ 'name' ] ) . Form::id( $attr[ 'name' ] ) . Form::multiple( $attr[ 'multiple' ] ) . Form::tabindex( $attr[ 'tabindex' ] ) . "/>\n";
		return Form::div( $text );
	}

	/**
	 * Returns the form field id attribute
	 * 
	 * @param string id
	 * 
	 * return string
	*/
	public static function id( $id ) {
		return isset( $id ) ? ' id="' . $id . '"' : '';
	}

	/**
	 * Returns a hidden form field
	 * 
	 * @param array attr
	 * 
	 * return string
	*/
	public static function hidden( $attr = array() ) {
		$text = "\t" . '<input type="hidden"' . Form::name( $attr[ 'name' ] ) . Form::id( $attr[ 'name' ] ) . Form::value( $attr[ 'value' ] ) . ' />' . "\n";
		return $text;
	}

	/**
	 * Returns a form field label for the specified form element
	 * 
	 * @param string label
	 * 
	 * return string
	*/
	public static function label( $label ) {
		return isset( $label[ 'label' ] ) ? "\t" . '<label>' . $label[ 'label' ] . '</label><br />' . "\n" : '';
	}

	/**
	 * Returns the form method attribute
	 * 
	 * @param string method
	 * 
	 * return string
	*/
	public static function method( $method ) {
		return isset( $method ) ? ' method="' . $method . '"' : '';
	}

	/**
	 * Returns the multiple attribute for the file form field
	 * 
	 * @param boolean multiple
	 * 
	 * return string
	*/
	public static function multiple( $multiple ) {
		return $multiple ? ' multiple="multiple"' : '';
	}

	/**
	 * Returns the name attribute
	 * 
	 * @param string name
	 * 
	 * return string
	*/
	public static function name( $name ) {
		return isset( $name ) ? ' name="' . $name . '"' : '';
	}

	/**
	 * Returns the opening form tags with all specified atrributes
	 * 
	 * @param array attr
	 * 
	 * return string
	*/
	public static function open( $attr = array() ) {
		return '<form' . Form::action( $attr[ 'action' ] ) . Form::name( $attr[ 'name' ] ) . Form::id( $attr[ 'name' ] ) . Form::method( $attr[ 'method' ] ) . Form::enctype( $attr[ 'enctype' ] ) . '>' . " \n";
	}

	/**
	 * Returns a password form field
	 * 
	 * @param array attr
	 * 
	 * return string
	*/
	public static function password( $attr = array() ) {
		$text = Form::label( $attr );
		$text .= "\t" . '<input type="password"' . Form::name( $attr[ 'name' ] ) . Form::id( $attr[ 'name' ] ) . Form::size( $attr[ 'size' ] ) . Form::tabindex( $attr[ 'tabindex' ] ) . ' value="" />' . "\n";
		return Form::div( $text );
	}

	/**
	 * Returns a single or list of radio buttons
	 * 
	 * @param array attr
	 * 
	 * return string
	*/
	public static function radio( $attr = array() ) {
		$text = Form::label( $attr );

		if( !is_array( $attr[ 'values' ] ) ) {
			$attr[ 'values' ] = explode( ',', preg_replace( '/\s+/', '', $attr[ 'values' ] ) );
		} else {
			$attr[ 'values' ] = explode( ',', preg_replace( '/\s+/', '', $attr[ 'values' ][ 0 ] ) );
		}

		foreach( $attr[ 'values' ] as $key => $value ) {
			$text .= "\t" . '<input type="radio"' . Form::name( $attr[ 'name' ] ) . Form::id( $attr[ 'name' ] ) . Form::value( $value ) . ' /> ' . $value . "<br />\n";
		}
		
		return Form::div( $text );
	}

	/**
	 * Returns a reset form field
	 * 
	 * @param array attr
	 * 
	 * return string
	*/
	public static function reset( $attr = array() ) {
		$text .= "\t" . '<input type="reset"' . Form::name( $attr[ 'name' ] ) . Form::id( $attr[ 'name' ] ) . Form::tabindex( $attr[ 'tabindex' ] ) . Form::value( $attr[ 'value' ] ) . ' />' . "\n";
		return Form::div( $text );
	}

	/**
	 * Returns the rows attribute for a textarea form field
	 * 
	 * @param string rows
	 * 
	 * return string
	*/
	public static function rows( $rows ) {
		return isset( $rows ) ? ' rows="' . $rows . '"' : '';
	}

	/**
	 * Returns a select menu form field
	 * 
	 * @param array attr
	 * 
	 * return string
	*/
	public static function select( $attr = array() ) {
		$text = Form::label( $attr );

		if( !is_array( $attr[ 'values' ] ) ) {
			$attr[ 'values' ] = explode( ',', preg_replace( '/\s+/', '', $attr[ 'values' ] ) );
		} else {
			$attr[ 'values' ] = explode( ',', preg_replace( '/\s+/', '', $attr[ 'values' ][ 0 ] ) );
		}

		$text .= "\t" . '<select' . Form::name( $attr[ 'name' ] ) . Form::id( $attr[ 'name' ] ) . Form::tabindex( $attr[ 'tabindex' ] ) . ">\n";
		
		foreach( $attr[ 'values' ] as $key => $value ) {
			$text .= "\t\t" . '<option' . Form::value( $value ) . '>' . $value  . "</option>\n";
		}

		$text .= "\t" . "</select>\n";
		
		return Form::div( $text );
	}

	/**
	 * Returns the size attribute
	 * 
	 * @param string size
	 * 
	 * return string
	*/
	public static function size( $size ) {
		return isset( $size ) ? ' size="' . $size . '"' : '';
	}

	/**
	 * Returns a submit button form field
	 * 
	 * @param array attr
	 * 
	 * return string
	*/
	public static function submit( $attr = array() ) {
		$text = Form::label( $attr );
		$text .= "\t" . '<input type="submit"' . Form::name( $attr[ 'name' ] ) . Form::id( $attr[ 'name' ] ) . Form::tabindex( $attr[ 'tabindex' ] ) . Form::value( $attr[ 'value' ] ) . ' />' . "\n";
		return Form::div( $text );
	}

	/**
	 * Returns the tabindex attibute
	 * 
	 * @param string tabindex
	 * 
	 * return string
	*/
	public static function tabindex( $tabindex ) {
		return isset( $tabindex ) ? ' tabindex="' . $tabindex . '"' : '';
	}

	/**
	 * Returns a text form field
	 * 
	 * @param array attr
	 * 
	 * return string
	*/
	public static function text( $attr = array() ) {
		$text = Form::label( $attr );
		$text .= "\t" . '<input type="text"' . Form::name( $attr[ 'name' ] ) . Form::id( $attr[ 'name' ] ) . Form::size( $attr[ 'size' ] ) . Form::tabindex( $attr[ 'tabindex' ] ) . ' value="" />' . "\n";
		return Form::div( $text );
	}

	/**
	 * Returns a textarea form field
	 * 
	 * @param array attr
	 * 
	 * return string
	*/
	public static function textarea( $attr = array() ) {
		$text = Form::label( $attr );
		$text .= "\t" . '<textarea' . Form::name( $attr[ 'name' ] ) . Form::id( $attr[ 'name' ] ) . Form::cols( $attr[ 'columns' ] ) . Form::rows( $attr[ 'rows' ] ) . Form::tabindex( $attr[ 'tabindex' ] ) . '></textarea>' . "\n";
		return Form::div( $text );
	}

	/**
	 * Returns the value attibute
	 * 
	 * @param string value
	 * 
	 * return string
	*/
	public static function value( $value ) {
		return isset( $value ) ? ' value="' . $value . '"' : '';
	}

}
