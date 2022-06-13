<?php
/**
 * PHPUnit bootstrap file
 */
require_once dirname(__DIR__ ,4). getenv( 'WP_PHPUNIT__TESTS_CONFIG' );
// Composer autoloader must be loaded before WP_PHPUNIT__DIR will be available
require_once dirname(__DIR__ ). '/src/vendor/autoload.php';

// Give access to tests_add_filter() function.
require_once dirname(__DIR__ ) . '/src/vendor/gschechter/wp-phpunit/includes/functions.php';
tests_add_filter( 'muplugins_loaded', function() {
    // test set up, plugin activation, etc.
    require dirname(__DIR__ ). '/mock_pre_http_request.php';
} );


// Start up the WP testing environment.
require dirname(__DIR__ ) . '/src/vendor/gschechter/wp-phpunit/includes/bootstrap.php';
