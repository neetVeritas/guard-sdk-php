<?php

    define( DEVELOPER_KEY, '*' ); // define developer key constant
    define( DRIVER_LOC, 'https://guard-qpc23.cf/apps.driver?key=' . DEVELOPER_KEY ); // define base for driver requests
    
    set_include_path( $_SERVER['DOCUMENT_ROOT'] );
    
    require_once( get_include_path() . '/src/tools/utility.php' );
    
    require_once( get_include_path() . '/src/modules/user.php' );
    require_once( get_include_path() . '/src/modules/app.php' );
    require_once( get_include_path() . '/src/modules/subscription.php' );

?>
