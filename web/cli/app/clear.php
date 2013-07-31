<?php

namespace CLI;

class Clear {

	public static function clear( $command ) {
		print 'Clearing terminal...';
		echo '<script type="text/javascript">';
		echo 'window.location.reload()';
		echo '</script>';
	}

}
