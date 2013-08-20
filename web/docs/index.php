<?php 
require 'templates/header.php';

$url = explode( '/', $_SERVER[ 'REQUEST_URI' ] );

switch( $url[ 2 ] ) {

	case 'controllers':
		require 'sections/controllers.php';
	break;

	case 'database':
		require 'sections/database.php';
	break;

	case 'file':
		require 'sections/file.php';
	break;

	case 'forms':
		require 'sections/forms.php';
	break;

	case 'getting-started':
		require 'sections/getting-started.php';
	break;

	case 'models':
		require 'sections/models.php';
	break;

	case 'reference':
		require 'sections/reference.php';
	break;

	case 'reference-classes':
		require 'sections/reference-classes.php';
	break;

	case 'reference-configuration':
		require 'sections/reference-configuration.php';
	break;

	case 'routes':
		require 'sections/routes.php';
	break;

	case 'search':
		require 'sections/search.php';
	break;

	case 'tags':
		require 'sections/tags.php';
	break;

	case 'views':
		require 'sections/views.php';
	break;

	default:
		require 'sections/main.php';
	break;
}

require 'templates/footer.php';
