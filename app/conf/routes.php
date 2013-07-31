<?php

// -- STILL IN DEVELOPMENT AND NOT IN USE

$routes = array(

	/**
	 * Examples:
	 * 'zombie-stuff' => 'zombie', 
	 * 'zombie-stuff/brains' => 'zombie/stuff', 
	 * 'zombie-stuff/brains' => 'zombie/stuff', 
	 * 
	 * Available param types: all, string, int
	 */

	'hello-world' => 'test', 
	'hello-world/hi-there' => 'test/hello', 
	'hello-world/hi-there/(:string)' => 'test/hello/$1', 
	'hello-world/hi-there/(:all)' => 'test/hello/$1', 
	'hello-world/(:all)' => 'test/hello/$1', 
	'hello-world/hi-there/(:int)' => 'test/hello/$1', 
	'monkey-poo/banana/(:all)' => 'monkey/hello/$1', 
	'zombie-stuff/brains/(:all)' => 'zombie/stuff/$1'

);
