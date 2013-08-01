<?php 

/*
Form::open( array( 'name' => 'contact', 'action' => '', 'method' => 'post' ) );
	Form::text( array( 'label' => 'First Name:',  'name' => 'first_name', 'size' => '30' ) );
	Form::text( array( 'label' => 'Last Name:',  'name' => 'last_name', 'size' => '30' ) );
	Form::checkbox( array( 'label' => 'Favorite Color:',  'name' => 'color', 'values' => 'Blue, Green, Black, Brown, Orange' ) );
	Form::radio( array( 'label' => 'Do you like beer?',  'name' => 'beer', 'values' => 'Yes, No' ) );
	Form::select( array( 'label' => 'Gender',  'name' => 'gender', 'values' => 'Male, Female, Alien, Zombie, Moose' ) );
	Form::textarea( array( 'label' => 'Comments:',  'name' => 'comments' ) );
	Form::submit( array( 'name' => 'process', 'value' => 'Process' ) );
	Form::hidden( array( 'name' => 'stuff', 'value' => 'Hammer' ) );
Form::close();
*/

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
		$text     = '';
		$name     = isset( $attr[ 'name' ] ) ? $attr[ 'name' ] : '';
		$tabindex = isset( $attr[ 'tabindex' ] ) ? $attr[ 'tabindex' ] : '';
		$value    = isset( $attr[ 'value' ] ) ? $attr[ 'value' ] : '';
		$text     = Form::label( $attr );
		$text    .= "\t" . '<input type="button"' . Form::name( $name ) . Form::id( $name ) . Form::tabindex( $tabindex ) . Form::value( $value ) . ' />' . "\n";
		echo $text;
	}

	/**
	 * Returns a single or list of checkboxes
	 * 
	 * @param array attr
	 * 
	 * return string
	*/
	public static function checkbox( $attr = array() ) {
		$name   = isset( $attr[ 'name' ] ) ? $attr[ 'name' ] : '';
		$values = isset( $attr[ 'values' ] ) ? $attr[ 'values' ] : '';
		$text   = Form::label( $attr );

		if( !is_array( $values ) ) {
			$values = explode( ',', preg_replace( '/\s+/', '', $values ) );
		} else {
			$values = explode( ',', preg_replace( '/\s+/', '', $values[ 0 ] ) );
		}

		foreach( $values as $key => $value ) {
			if( count( $value ) != 1 ) {
				$text .= "\t" . '<input type="checkbox"' . Form::name( $name . '[]' ) . Form::id( $name . '[]' ) . Form::value( $value ) . ' /> ' . $value . "<br />\n";
			} else {
				$text .= "\t" . '<input type="checkbox"' . Form::name( $name ) . Form::id( $name ) . Form::value( $value ) . ' /> ' . $value . "<br />\n";
			}
		}
		
		echo Form::div( $text );
	}

	/**
	 * Returns the closing form tag
	 * 
	 * return string
	*/
	public static function close() {
		echo "</form>\n";
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
		$text = "\t" . '<div style="padding:5px;">' . "\n";
		$text .= $field;
		$text .= "\t</div>\n";
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
		$name     = isset( $attr[ 'name' ] ) ? $attr[ 'name' ] : '';
		$tabindex = isset( $attr[ 'tabindex' ] ) ? $attr[ 'tabindex' ] : '';
		$multiple = isset( $attr[ 'multiple' ] ) ? $attr[ 'multiple' ] : '';
		$text     = Form::label( $attr );
		$text    .= "\t" . '<input type="file"' . Form::name( $name ) . Form::id( $name ) . Form::multiple( $multiple ) . Form::tabindex( $tabindex ) . "/>\n";
		echo Form::div( $text );
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
		echo $text;
	}

	/**
	 * Returns a form field label for the specified form element
	 * 
	 * @param string label
	 * 
	 * return string
	*/
	public static function label( $label = array() ) {
		if( !isset( $label[ 'name' ] ) ) {
			$text  = isset( $label[ 'label' ] ) ? "\t\t" . '<label for="' . $label[ 'label' ] . '">' . $label[ 'label' ] . '</label><br />' . "\n" : '';
			$text .= "\t\t" . $label[ 'value' ] . "\n";
			echo Form::div( $text );
		} else {
			return isset( $label[ 'label' ] ) ? "\t\t" . '<label for="' . $label[ 'label' ] . '">' . $label[ 'label' ] . '</label><br />' . "\n" : '';
		}
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
		$action  = isset( $attr[ 'action' ] ) ? $attr[ 'action' ] : '';
		$name    = isset( $attr[ 'name' ] ) ? $attr[ 'name' ] : '';
		$method  = isset( $attr[ 'method' ] ) ? $attr[ 'method' ] : '';
		$enctype = isset( $attr[ 'enctype' ] ) ? $attr[ 'enctype' ] : '';
		echo '<form' . Form::action( $action ) . Form::name( $name ) . Form::id( $name ) . Form::method( $method ) . Form::enctype( $enctype ) . '>' . " \n";
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
		echo Form::div( $text );
	}

	/**
	 * Returns a single or list of radio buttons
	 * 
	 * @param array attr
	 * 
	 * return string
	*/
	public static function radio( $attr = array() ) {
		$name     = isset( $attr[ 'name' ] ) ? $attr[ 'name' ] : '';
		$tabindex = isset( $attr[ 'tabindex' ] ) ? $attr[ 'tabindex' ] : '';
		$values   = isset( $attr[ 'values' ] ) ? $attr[ 'values' ] : '';
		$text     = Form::label( $attr );

		if( !is_array( $values ) ) {
			$values = explode( ',', preg_replace( '/\s+/', '', $values ) );
		} else {
			$values = explode( ',', preg_replace( '/\s+/', '', $values[ 0 ] ) );
		}

		foreach( $values as $key => $value ) {
			$text .= "\t" . '<input type="radio"' . Form::name( $name ) . Form::id( $name ) . Form::value( $value ) . ' /> ' . $value . "<br />\n";
		}
		
		echo Form::div( $text );
	}

	/**
	 * Returns a reset form field
	 * 
	 * @param array attr
	 * 
	 * return string
	*/
	public static function reset( $attr = array() ) {
		$text     = '';
		$name     = isset( $attr[ 'name' ] ) ? $attr[ 'name' ] : '';
		$tabindex = isset( $attr[ 'tabindex' ] ) ? $attr[ 'tabindex' ] : '';
		$value    = isset( $attr[ 'value' ] ) ? $attr[ 'value' ] : '';
		$text .= "\t" . '<input type="reset"' . Form::name( $name ) . Form::id( $name ) . Form::tabindex( $tabindex ) . Form::value( $value ) . ' />' . "\n";
		echo $text;
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
		$name     = isset( $attr[ 'name' ] ) ? $attr[ 'name' ] : '';
		$tabindex = isset( $attr[ 'tabindex' ] ) ? $attr[ 'tabindex' ] : '';
		$values   = isset( $attr[ 'values' ] ) ? $attr[ 'values' ] : '';
		$text     = Form::label( $attr );

		if( !is_array( $values ) ) {
			$values = explode( ',', preg_replace( '/\s+/', '', $values ) );
		} else {
			$values = explode( ',', preg_replace( '/\s+/', '', $values[ 0 ] ) );
		}

		$text .= "\t" . '<select' . Form::name( $name ) . Form::id( $name ) . Form::tabindex( $tabindex ) . ">\n";
		
		foreach( $values as $key => $value ) {
			$text .= "\t\t" . '<option' . Form::value( $value ) . '>' . $value  . "</option>\n";
		}

		$text .= "\t" . "</select>\n";
		
		echo Form::div( $text );
	}

	/**
	 * Returns the size attribute
	 * 
	 * @param string size
	 * 
	 * return string
	*/
	public static function size( $size ) {
		return isset( $size ) && !empty( $size ) ? ' size="' . $size . '"' : '';
	}

	/**
	 * Returns a submit button form field
	 * 
	 * @param array attr
	 * 
	 * return string
	*/
	public static function submit( $attr = array() ) {
		$name     = isset( $attr[ 'name' ] ) ? $attr[ 'name' ] : '';
		$tabindex = isset( $attr[ 'tabindex' ] ) ? $attr[ 'tabindex' ] : '';
		$value    = isset( $attr[ 'value' ] ) ? $attr[ 'value' ] : '';
		$text     = '';
		$text    .= "\t" . '<input type="submit"' . Form::name( $name ) . Form::id( $name ) . Form::tabindex( $tabindex ) . Form::value( $value ) . ' />' . "\n";
		echo $text;
	}

	/**
	 * Returns the tabindex attibute
	 * 
	 * @param string tabindex
	 * 
	 * return string
	*/
	public static function tabindex( $tabindex ) {
		return isset( $tabindex ) && !empty( $tabindex ) ? ' tabindex="' . $tabindex . '"' : '';
	}

	/**
	 * Returns a text form field
	 * 
	 * @param array attr
	 * 
	 * return string
	*/
	public static function text( $attr = array() ) {
		$name     = isset( $attr[ 'name' ] ) ? $attr[ 'name' ] : '';
		$size     = isset( $attr[ 'size' ] ) ? $attr[ 'size' ] : '';
		$tabindex = isset( $attr[ 'tabindex' ] ) ? $attr[ 'tabindex' ] : '';
		$value    = isset( $attr[ 'value' ] ) ? $attr[ 'value' ] : '';
		$text     = Form::label( $attr );
		$text    .= "\t\t" . '<input type="text"' . Form::name( $name ) . Form::id( $name ) . Form::size( $size ) . Form::tabindex( $tabindex ) . Form::value( $value ) . " />\n";
		echo Form::div( $text );
	}

	/**
	 * Returns a textarea form field
	 * 
	 * @param array attr
	 * 
	 * return string
	*/
	public static function textarea( $attr = array() ) {
		$name      = isset( $attr[ 'name' ] ) ? $attr[ 'name' ] : '';
		$columns   = isset( $attr[ 'columns' ] ) ? $attr[ 'columns' ] : '';
		$rows      = isset( $attr[ 'rows' ] ) ? $attr[ 'rows' ] : '';
		$tabindex  = isset( $attr[ 'tabindex' ] ) ? $attr[ 'tabindex' ] : '';
		$text      = Form::label( $attr );
		$text     .= "\t" . '<textarea' . Form::name( $name ) . Form::id( $name ) . Form::cols( $columns ) . Form::rows( $rows ) . Form::tabindex( $tabindex ) . '></textarea>' . "\n";
		echo Form::div( $text );
	}

	/**
	 * Returns the value attibute
	 * 
	 * @param string value
	 * 
	 * return string
	*/
	public static function value( $value ) {
		return isset( $value ) && !empty( $value ) ? ' value="' . $value . '"' : '';
	}

}
