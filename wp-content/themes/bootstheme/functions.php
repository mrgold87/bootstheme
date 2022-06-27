<?php
//Carbon_Fields
use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action('after_setup_theme', 'crb_load');
function crb_load()
{
    require_once('vendor/autoload.php');
    \Carbon_Fields\Carbon_Fields::boot();
}

add_action('carbon_fields_register_fields', 'bootstheme_register_custom_fields');
function bootstheme_register_custom_fields()
{
    require_once __DIR__ . '/inc/custom-fields/news-meta.php';
    require_once __DIR__ . '/inc/custom-fields/product-meta.php';
}

function bootstheme_support_title()
{
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'bootstheme_support_title');
// css / js
function bootstheme_scripts()
{
    wp_enqueue_style('bootstheme-bootstrapcss', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('bootstheme-style', get_stylesheet_uri());

    wp_enqueue_script('bootstheme-bootstrap.bundle', get_template_directory_uri() . '/js/bootstrap.bundle.min.js');
}

add_action('wp_enqueue_scripts', 'bootstheme_scripts');

//CPT
add_action('init', 'bootstheme_register_post_type_init');

function bootstheme_register_post_type_init()
{
    $labels = [
        'name' => __('News', 'BootSTheme'),
        'singular_name' => __('News','BootSTheme'),
        'add_new' => __('Add News','BootSTheme'),
        'add_new_item' => __('Add News','BootSTheme'),
        'edit_item' => __('Edit News','BootSTheme'),
        'new_item' => __('New News','BootSTheme'),
        'all_items' => __('All News','BootSTheme'),
        'search_items' => __('Search News','BootSTheme'),
        'not_found' => __(' No news was found for the specified criteria.','BootSTheme'),
        'menu_name' => __('News','BootSTheme'),
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'news'],
        'supports' => ['title'],
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
    ];

    register_post_type('news', $args);

    unset($args);
    unset($labels);

    $labels = [
        'name' => __('Products','BootSTheme'),
        'singular_name' =>  __('Product','BootSTheme'),
        'add_new' =>  __('Add product','BootSTheme'),
        'add_new_item' => __('Add Product','BootSTheme'),
        'edit_item' => __('Edit Product','BootSTheme'),
        'new_item' => __('New Product','BootSTheme'),
        'all_items' => __('All Products','BootSTheme'),
        'search_items' => __('Search Product','BootSTheme'),
        'not_found' => __(' No products was found for the specified criteria.','BootSTheme'),
        'menu_name' => __('Product','BootSTheme'),
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'product'],
        'supports' => ['title'],
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
    ];

    register_post_type('product', $args);

}

//menu
require_once __DIR__ . '/inc/class-bootstrap-menu.php';
register_nav_menu('main-menu', 'Main menu');
//langs
add_action('after_setup_theme', 'bootstheme_load_theme_textdomain');

function bootstheme_load_theme_textdomain(){
    load_theme_textdomain( 'BootSTheme', get_template_directory() . '/lang' );
}