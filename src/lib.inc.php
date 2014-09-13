<?php

    define( DEVELOPER_KEY, '35Np2QrZRfwxiAY' ); // define developer key constant
    define( DRIVER_LOC, 'http://guard-qpc23.cf/api/driver.php?key=' . DEVELOPER_KEY ); // define base for driver requests
    
    set_include_path( $_SERVER['DOCUMENT_ROOT'] );
    
    require_once( get_include_path() . '/src/tools/utility.php' );
    
    require_once( get_include_path() . '/src/modules/user.php' );
    require_once( get_include_path() . '/src/modules/app.php' );
    require_once( get_include_path() . '/src/modules/subscription.php' );

?>