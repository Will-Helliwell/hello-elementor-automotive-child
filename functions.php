<?php

// Enqueue stylesheets
add_action('wp_enqueue_scripts', 'hello_elementor_automotive_child_enqueue_styles');
function hello_elementor_automotive_child_enqueue_styles() {
    // Enqueue the parent theme's stylesheet
    $parent_style_url = get_template_directory_uri() . '/style.css';
    wp_enqueue_style('hello-elementor-parent-style', $parent_style_url);
    
    // Enqueue the child theme's stylesheet
    $child_style_url = get_stylesheet_directory_uri() . '/style.css';
    wp_enqueue_style('hello-elementor-automotive-child-style', $child_style_url, array('hello-elementor-parent-style'));

}

// Load all shortcodes from child theme
add_action('init', 'hello_elementor_automotive_child_load_shortcodes');
function hello_elementor_automotive_child_load_shortcodes() {
    foreach (glob(get_stylesheet_directory() . '/shortcodes/*.php') as $shortcode_file) {
        include_once $shortcode_file;
    }
}

