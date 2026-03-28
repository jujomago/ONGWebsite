<?php
/**
 * Advanced Custom Fields - Configuración para FAS
 * 
 * Este archivo maneja la carga de campos ACF desde JSON
 */

function fas_acf_json_load_point($paths) {
    $paths[] = get_template_directory() . '/inc/acf-json';
    return $paths;
}
add_filter('acf/json/load_paths', 'fas_acf_json_load_point');

function fas_acf_init() {
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page([
            'page_title' => 'Opciones FAS',
            'menu_title' => 'Opciones FAS',
            'menu_slug' => 'fas-settings',
            'capability' => 'edit_posts',
            'redirect' => false,
            'position' => '59.9',
            'icon_url' => 'dashicons-heart',
        ]);
    }
}
add_action('acf/init', 'fas_acf_init');

function fas_acf_settings() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }
}
add_action('acf/init', 'fas_acf_settings');
