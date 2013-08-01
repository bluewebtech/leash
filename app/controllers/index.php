<?php

class IndexController {

	public function index() {
		HTML::description( 'Crazy easy PHP MVC framework' );
		HTML::title( APP_NAME );
		View::render( 'index' );
	}

}
