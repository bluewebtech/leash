<?php

// -- Core view functions
function render( $view, $model = array() ) { View::render( $view, $model ); }
function view( $view, $model = array() ) { View::get( $view, $model ); }

// -- Core HTML functions
function ahref( $text = null, $url = null, $title = null, $target = null ) { return HTML::ahref( $text, $url, $title, $target ); }
function b( $value = null ) { return HTML::bold( $value ); }
function bold( $value = null ) { return HTML::bold( $value ); }
function br( $value = null, $total = null ) { return HTML::br( $value, $total ); }
function dl( $value = null ) { return HTML::dl( $value ); }
function description( $description = null ) { return HTML::description( $description ); }
function heading( $value = null, $num = null ) { return HTML::heading( $value, $num ); }
function h1( $value = null ) { return HTML::h1( $value ); }
function h2( $value = null ) { return HTML::h2( $value ); }
function h3( $value = null ) { return HTML::h3( $value ); }
function h4( $value = null ) { return HTML::h4( $value ); }
function h5( $value = null ) { return HTML::h5( $value ); }
function i( $value = null ) { return HTML::italic( $value ); }
function italic( $value = null ) { return HTML::italic( $value ); }
function keywords( $keywords = null ) { return HTML::keywords( $keywords ); }
function mailto( $text = null, $url = null, $title = null ) { return HTML::mailto( $text, $url, $title ); }
function nl( $value = null ) { return HTML::nl( $value ); }
function ol( $value = null ) { return HTML::ol( $value ); }
function p( $value = null, $style = null, $type = null ) { return HTML::paragraph( $value, $style, $type ); }
function paragraph( $value = null, $style = null, $type = null ) { return HTML::paragraph( $value, $style, $type ); }
function pre( $value = null ) { return HTML::pre( $value ); }
function space( $value = null ) { return HTML::space( $value ); }
function span( $value = null, $style = null, $type = null ) { return HTML::span( $value, $style, $type ); }
function strike( $value = null ) { return HTML::strike( $value ); }
function strong( $value = null ) { return HTML::strong( $value ); }
function tab( $value = null, $total = null ) { return HTML::tab( $value, $total ); }
function title( $title = APP_NAME ) { return HTML::title( $title ); }
function ul( $value = null ) { return HTML::ul( $value ); }
function u( $value = null ) { return HTML::underline( $value ); }
function underline( $value = null ) { return HTML::underline( $value ); }

// -- Mobile core functions
function is_mobile() { return Mobile::is_mobile(); }

// -- Request core functions
function cookies() { return Request::cookies(); }
function domain() { return Request::domain(); }
function files() { return Request::files(); }
function get() { return Request::get(); }
function ipaddress() { return Request::ipaddress(); }
function post() { return Request::post(); }
function redirect( $url = null ) { return Request::redirect( $url ); }
function request() { return Request::request(); }
function server() { return Request::server(); }
function uuid() { return Request::uuid(); }

// -- Response core functions
function output( $value = null ) { return Response::output( $value ); }
function out( $value = null ) { return Response::out( $value ); }

// -- Session core functions
function session_end() { return Session::session_end(); }

// -- String core functions
function clean_telephone( $value ) { return Strings::clean_telephone( $value ); }
function format_dollars( $value ) { return Strings::format_dollars( $value ); }
function format_money( $value ) { return Strings::format_money( $value ); }
function format_number( $value ) { return Strings::format_number( $value ); }
function format_telephone( $value ) { return Strings::format_telephone( $value ); }
function lowercase( $value ) { return Strings::lowercase( $value ); }
function lowercase_first( $value ) { return Strings::lowercase_first( $value ); }
function lowercase_words( $value ) { return Strings::lowercase_words( $value ); }
function remove_chars( $value ) { return Strings::remove_chars( $value ); }
function remove_whitespace( $value ) {return Strings::remove_whitespace( $value );  }
function search_start( $needle, $haystack, $occurrence ) { return Strings::search_start( $needle, $haystack, $occurrence ); }
function search_end( $needle, $haystack, $occurrence ) { return Strings::search_end( $needle, $haystack, $occurrence ); }
function string_strip( $value ) { return Strings::string_strip( $value ); }
function to_array( $value ) { return Strings::to_array( $value ); }
function to_boolean( $value ) { return Strings::to_boolean( $value ); }
function to_float( $value ) { return Strings::to_float( $value ); }
function to_integer($value  ) { return Strings::to_integer( $value ); }
function to_null( $value ) { return Strings::to_null( $value ); }
function to_object( $value ) { return Strings::to_object( $value ); }
function to_string( $value ) { return Strings::to_string( $value ); }
function uppercase( $value ) { return Strings::uppercase( $value ); }
function uppercase_first( $value ) { return Strings::uppercase_first( $value ); }
function uppercase_words( $value ) { return Strings::uppercase_words( $value ); }

// -- Security and validation core functions
function csrf_token() { return Security::csrf_token(); }
function csrf_generate() { echo Security::csrf_generate(); }
function csrf_val() { return Security::csrf_val(); }
function decode( $value ) { return Security::decode( $value ); }
function decrypt( $value ) { return Security::decrypt( $value ); }
function encode( $value ) { return Security::encode( $value ); }
function encrypt( $value ) { return Security::encrypt( $value ); }
function hash_value( $value, $total = 0 ) { return Security::hash( $value, $total ); }
function html_clean( $value ) { return Security::remove_tags( $value ); }
function isint( $value ) { return Security::isint( $value ); }
function isstring( $value ) { return Security::isstring( $value ); }
function isboolean( $value ) { return Security::isboolean( $value ); }
function isfloat( $value ) { return Security::isfloat( $value ); }
function isemail( $value ) { return Security::isemail( $value ); }
function isipaddress( $value ) { return Security::isipaddress( $value ); }
function isvalid( $type, $value ) { return Security::isvalid( $type, $value ); }
function islength( $value, $from = null, $to = null ) { return Security::isvalid( $value, $from = null, $to = null ); }
function xss_clean( $value ) { return Security::search_start( $value ); }

// -- Application core functions
function list_all() { return System::list_all(); }
function list_controllers() { return System::list_controllers(); }
function list_models() { return System::list_models(); }
function list_plugins() { return System::list_plugins(); }
function list_services() { return System::list_services(); }
function list_tags() { return System::list_tags(); }
