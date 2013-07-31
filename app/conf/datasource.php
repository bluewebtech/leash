<?php

// -- Supported database engines are: mariadb, mysql, postgresql, sqlsrv, sqlite
$datasource = array(

    // -- Development datasources
    'development' => array(

        'Sample' => array(
            'engine'   => 'sqlite',
            'database' => APP_ROOT . 'dbase/bands.sqlite'
        )
        
    ), 

    // -- Production datasources
    'production' => array(

        'Sample' => array(
            'engine'   => 'sqlite',
            'database' => APP_ROOT . 'dbase/bands.sqlite'
        )

    )

);
