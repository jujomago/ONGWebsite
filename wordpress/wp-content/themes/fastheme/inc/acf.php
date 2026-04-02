<?php
/**
 * Advanced Custom Fields - Configuración para FAS
 */

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
