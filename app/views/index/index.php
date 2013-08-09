<?php 

/*
 * Created by: Peter Morrison
 * Date Created: 2013-02-20
 * Date Updated: 2013-08-01
 * Default framework view template.
 */

$links = array( 
	HTML::ahref( 'Documentation', '/docs/', 'Documentation' ), 
	HTML::ahref( 'CLI', '/cli/', 'CLI' ) 
);

$iframe = array( 
	'src' => '//www.youtube.com/embed/npAWkt_84QA', 
	'width' => '640',
	'height' => '360',
	'frameborder' => '0',
	'allowfullscreen' => true,
	'id' => 'leash',
);

echo HTML::h1( APP_NAME );
echo HTML::p( HTML::iframe( $iframe ) );

/*
echo HTML::ul( $links );
echo System::list_controllers();
echo System::list_models();
echo System::list_plugins();
echo System::list_services();
echo System::list_tags();
*/
