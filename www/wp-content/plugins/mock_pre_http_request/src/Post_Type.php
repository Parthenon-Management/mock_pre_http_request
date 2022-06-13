<?php

namespace mock_pre_http_request;

class Post_Type {
    const post_type_slug = 'mock_pre_http_request';
    public static function register(){
        $args = [];
        $args['public'] = false;
        $args['rest_controller_class'] = Rest_Controller::class;
        $args['supports'] = [];
        $args['supports'][] = 'title';
        $args['supports']['depends_on'] = 'id';
        $args['supports']['success'] = 'bool';
        $args['supports']['multiple'] = 'bool';
        $args['supports']['count'] = 'bool';
        $args['supports']['request'] = ['url','header','method','body','other'];
        $args['supports']['response'] = ['code','body','other'];
        register_post_type(self::post_type_slug,$args);
    }
}