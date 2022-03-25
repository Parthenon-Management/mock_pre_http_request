<?php

if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}
define( 'WP_AUTO_UPDATE_CORE', false);
define( 'WP_ALLOW_MULTISITE', false);

define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', true );

// ** MySQL settings ** //
$table_prefix = 'mphrdev_';
define( 'DB_NAME'       , getenv( 'WP_DB_NAME' ) ?: 'test_db' );
define( 'DB_USER'       , getenv( 'WP_DB_USER' ) ?: 'test' );
define( 'DB_PASSWORD'   , getenv( 'WP_DB_PASS' ) ?: 'test' );
define( 'DB_HOST'       , getenv( 'WP_DB_HOST' ) ?: 'mysql' );
define( 'DB_CHARSET'    , 'utf8' );
define( 'DB_COLLATE'    , '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 */
define( 'AUTH_KEY',         'put your unique phrase here' );
define( 'SECURE_AUTH_KEY',  'put your unique phrase here' );
define( 'LOGGED_IN_KEY',    'put your unique phrase here' );
define( 'NONCE_KEY',        'put your unique phrase here' );
define( 'AUTH_SALT',        'put your unique phrase here' );
define( 'SECURE_AUTH_SALT', 'put your unique phrase here' );
define( 'LOGGED_IN_SALT',   'put your unique phrase here' );
define( 'NONCE_SALT',       'put your unique phrase here' );

/** Sets up WordPress vars and included files. */
if(!defined('PHPUNIT_mock_pre_http_request_TESTSUITE')){
    require_once ABSPATH . 'wp-settings.php';
}
