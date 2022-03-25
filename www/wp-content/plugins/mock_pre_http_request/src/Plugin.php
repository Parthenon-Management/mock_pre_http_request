<?php

namespace mock_pre_http_request;

class Plugin {
	public function run_plugin() {
		$this->activation_upgrade_hooks();
		$this->register_rest_endpoints();
		$this->register_pre_http_hook();
        add_shortcode('test_shortcode321',function ($atts,$content){
            return 'TEST_'.$content.'_TEST';
        });
	}
	private function register_pre_http_hook(){
		
	}
	private function activation_upgrade_hooks(){
		
	}
	private function register_rest_endpoints(){

	}
}
$plugin = new Plugin();
$plugin->run_plugin();