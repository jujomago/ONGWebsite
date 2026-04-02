<?php
/**
 * FAS Theme Functions
 */

if (!defined('ABSPATH')) {
    exit;
}

define('FAS_THEME_VERSION', '1.0.0');

require_once get_template_directory() . '/inc/enqueue.php';
require_once get_template_directory() . '/inc/menus.php';
require_once get_template_directory() . '/inc/cpt.php';
require_once get_template_directory() . '/inc/acf.php';

function fas_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);
    add_theme_support('custom-logo');
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');

    register_nav_menus([
        'primary' => __('Menú Principal', 'fas'),
        'footer' => __('Menú Footer', 'fas'),
    ]);

    add_image_size('fas-hero', 1920, 1080, true);
    add_image_size('fas-card', 600, 400, true);
    add_image_size('fas-thumbnail', 300, 300, true);
}
add_action('after_setup_theme', 'fas_theme_setup');

// Hide admin bar for all users
add_filter('show_admin_bar', '__return_false');

// Remove "Posts" from admin menu
function fas_remove_default_post_type() {
    remove_menu_page('edit.php');
}
add_action('admin_menu', 'fas_remove_default_post_type');

// Remove "New Post" from admin bar
function fas_remove_default_post_type_menu_bar($wp_admin_bar) {
    $wp_admin_bar->remove_node('new-post');
}
add_action('admin_bar_menu', 'fas_remove_default_post_type_menu_bar', 999);

function fas_widgets_init() {
    register_sidebar([
        'name'          => __('Footer', 'fas'),
        'id'            => 'footer',
        'description'   => __('Widgets del footer', 'fas'),
        'before_widget' => '<div class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-title">',
        'after_title'   => '</h4>',
    ]);
}
add_action('widgets_init', 'fas_widgets_init');
