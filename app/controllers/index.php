<?php

class IndexController {

	public function index() {
		description( APP_NAME );
		title( APP_NAME );
		View::render( 'index', $values );
	}

}
