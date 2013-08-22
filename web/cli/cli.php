<?php

define( 'SYSTEM_EXT', '.php' );

define( 'CLI', 'cli' );

require '../paths' . SYSTEM_EXT;
require CD . DS . CONF;
require CD . DS . CD . DS . SYSTEM . DS . 'constants' . SYSTEM_EXT;
require APP . DS . CLI . SYSTEM_EXT;
CLI::main( $_POST[ 'command' ] );
