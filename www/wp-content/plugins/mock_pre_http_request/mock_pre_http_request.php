<?php
/**
 * @wordpress-plugin
 * Plugin Name: Mock Pre_HTTP_Request
 * Description: For mocking responses of remote requests.
 * Plugin URI: https://github.com/Parthenon-Management/mock_pre_http_request
 * Author: Gary Schechter
 * Author URI: https://garyschechter.com
 * Version: 0.0.0
 */
require_once 'src/vendor/autoload.php';
define('VERSION', '0.0.0');
define('mock_pre_http_request', 'mock_pre_http_request');

function run_plugin() {
    $myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
        'https://github.com/Parthenon-Management/mock_pre_http_request/',
        __FILE__,
        mock_pre_http_request
    );
    $myUpdateChecker->getVcsApi()->enableReleaseAssets();
	$mock_pre_http_request = new mock_pre_http_request\Plugin();
	$mock_pre_http_request->run_plugin();
}
run_plugin();
