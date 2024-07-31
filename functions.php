<?php 

add_action('after_setup_theme','myfirstwordp_setup');
    function myfirstwordp_setup() {
       // add_theme_support('title-tag');
        add_theme_support('post-thumnail');
    }


add_action('wp_enqueue_scripts', 'myfirstwordp_files');

function myfirstwordp_files() {
    wp_enqueue_style('theme-style', get_stylesheet_uri());
}

//add_filter('excerpt_length', 'myfirstwordp_excerpt_length', 999);
//    function myfirstwordp_excerpt_length($length) {
//        return 20;
//    }
