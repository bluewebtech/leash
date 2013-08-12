<?php 

/*
 * Created by: Peter Morrison
 * Date Created: 2013-02-20
 * Date Updated: 2013-08-12
 * Default framework view template.
 */

echo HTML::h1( APP_NAME ) . 
HTML::p( 
	APP_NAME . ' is a crazy easy PHP MVC framework that keeps the learning curve to a minimum, is flexible, featureful, and does not get in the way.' 
) . 
HTML::iframe( 
	array( 
		'src'               => '//www.youtube.com/embed/npAWkt_84QA', 
		'width'             => '640',
		'height'            => '360',
		'frameborder'       => '0',
		'allowfullscreen'   => true,
		'id'                => 'leash', 
		'allowtransparency' => true
	) 
);
