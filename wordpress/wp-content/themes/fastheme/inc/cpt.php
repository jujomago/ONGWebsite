<?php
/**
 * Custom Post Types and Taxonomies
 */

function fas_register_post_types() {
    register_post_type('proyecto', [
        'labels' => [
            'name' => __('Proyectos', 'fas'),
            'singular_name' => __('Proyecto', 'fas'),
            'add_new' => __('Añadir Proyecto', 'fas'),
            'add_new_item' => __('Añadir Nuevo Proyecto', 'fas'),
            'edit_item' => __('Editar Proyecto', 'fas'),
            'new_item' => __('Nuevo Proyecto', 'fas'),
            'view_item' => __('Ver Proyecto', 'fas'),
            'search_items' => __('Buscar Proyectos', 'fas'),
            'not_found' => __('No se encontraron proyectos', 'fas'),
            'not_found_in_trash' => __('No hay proyectos en la papelera', 'fas'),
        ],
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'],
        'menu_icon' => 'dashicons-heart',
        'menu_position' => 6,
        'rewrite' => ['slug' => 'proyectos'],
        'show_in_menu' => true,
    ]);

    register_taxonomy('tipo_programa', ['proyecto'], [
        'labels' => [
            'name' => __('Tipos de Programa', 'fas'),
            'singular_name' => __('Tipo de Programa', 'fas'),
            'search_items' => __('Buscar Tipos', 'fas'),
            'all_items' => __('Todos los Tipos', 'fas'),
            'edit_item' => __('Editar Tipo', 'fas'),
            'update_item' => __('Actualizar Tipo', 'fas'),
            'add_new_item' => __('Añadir Nuevo Tipo', 'fas'),
            'new_item_name' => __('Nuevo Nombre de Tipo', 'fas'),
        ],
        'hierarchical' => true,
        'show_admin_column' => true,
        'rewrite' => ['slug' => 'tipo-programa'],
        'show_in_rest' => true,
    ]);

    $terms = ['alimentacion', 'salud', 'educacion', 'emprendimiento'];
    foreach ($terms as $term) {
        if (!term_exists($term, 'tipo_programa')) {
            wp_insert_term($term, 'tipo_programa', [
                'description' => ucfirst($term),
                'slug' => $term,
            ]);
        }
    }
}
add_action('init', 'fas_register_post_types');
