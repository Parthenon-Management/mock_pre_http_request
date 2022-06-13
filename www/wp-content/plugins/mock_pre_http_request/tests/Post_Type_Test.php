<?php

use mock_pre_http_request\Post_Type;

class Post_Type_Test extends WP_UnitTestCase {


	function test_create(){
        $create =  $this->factory->post->create([
            'post_title' => 'Chair',
            'post_status' => 'publish',
            'post_type' => Post_Type::post_type_slug,
        ]);

        $factoryPost = get_post($create);
        $this->assertEquals(4,$create);
        $this->assertInstanceOf(WP_Post::class, $factoryPost);
        $this->assertEquals(Post_Type::post_type_slug, $factoryPost->post_type);
    }
}