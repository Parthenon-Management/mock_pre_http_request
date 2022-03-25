<?php

class Basic_Test extends WP_UnitTestCase {

	function test_wordpress_and_plugin_are_loaded() {
		$this->assertTrue( function_exists( 'do_action' ) );
		$this->assertTrue( class_exists( mock_pre_http_request\Plugin::class) );
	}

	function test_wp_phpunit_is_loaded_via_composer() {
        $huh = __DIR__;
        $sep = DIRECTORY_SEPARATOR;
        $thing = getenv( 'WP_PHPUNIT__DIR' );
		$this->assertStringContainsString(
            getenv( 'WP_PHPUNIT__DIR' ),
			dirname( __DIR__ ) . DIRECTORY_SEPARATOR .'tests'.DIRECTORY_SEPARATOR
		);

		$this->assertStringContainsString(
            dirname( __DIR__ ) . DIRECTORY_SEPARATOR .'src'.DIRECTORY_SEPARATOR .'vendor'.DIRECTORY_SEPARATOR,
            ( new ReflectionClass( 'WP_UnitTestCase' ) )->getFileName()
		);
	}
	
	function test_test_shortcode123(){
		add_shortcode('test_shortcode123',function ($atts,$content){
			return 'TEST_'.$content.'_TEST';
		});
		$result = do_shortcode('[test_shortcode123] This is a successful test[/test_shortcode123]');
		$this->assertEquals('TEST_ This is a successful test_TEST',$result);
	}

	function test_test_shortcode321(){
        $result = do_shortcode('[test_shortcode321] This is a successful test[/test_shortcode321]');
        $this->assertEquals('TEST_ This is a successful test_TEST',$result);
	}
}