<?php

define('BASE', '/docs/');
define('INC', BASE . 'inc/');
define('EXT', '.php');

function head() {
	include INC . 'head' . EXT;
}

function foot() {
	include INC . 'foot' . EXT;
}

?>