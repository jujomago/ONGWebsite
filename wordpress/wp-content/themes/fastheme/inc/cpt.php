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

    register_post_type('miembro', [
        'labels' => [
            'name' => __('Miembros del Equipo', 'fas'),
            'singular_name' => __('Miembro', 'fas'),
            'add_new' => __('Añadir Miembro', 'fas'),
            'add_new_item' => __('Añadir Nuevo Miembro', 'fas'),
            'edit_item' => __('Editar Miembro', 'fas'),
            'new_item' => __('Nuevo Miembro', 'fas'),
            'view_item' => __('Ver Miembro', 'fas'),
            'search_items' => __('Buscar Miembros', 'fas'),
            'not_found' => __('No se encontraron miembros', 'fas'),
            'not_found_in_trash' => __('No hay miembros en la papelera', 'fas'),
        ],
        'public' => true,
        'has_archive' => false,
        'show_in_rest' => true,
        'supports' => ['title', 'editor', 'thumbnail', 'custom-fields'],
        'menu_icon' => 'dashicons-groups',
        'menu_position' => 7,
        'rewrite' => ['slug' => 'miembros'],
        'show_in_menu' => true,
    ]);

    register_post_type('comunidad', [
        'labels' => [
            'name' => __('Comunidades', 'fas'),
            'singular_name' => __('Comunidad', 'fas'),
            'add_new' => __('Añadir Comunidad', 'fas'),
            'add_new_item' => __('Añadir Nueva Comunidad', 'fas'),
            'edit_item' => __('Editar Comunidad', 'fas'),
            'new_item' => __('Nueva Comunidad', 'fas'),
            'view_item' => __('Ver Comunidad', 'fas'),
            'search_items' => __('Buscar Comunidades', 'fas'),
            'not_found' => __('No se encontraron comunidades', 'fas'),
            'not_found_in_trash' => __('No hay comunidades en la papelera', 'fas'),
        ],
        'public' => true,
        'has_archive' => false,
        'show_in_rest' => true,
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'],
        'menu_icon' => 'dashicons-location-alt',
        'menu_position' => 8,
        'rewrite' => ['slug' => 'comunidades'],
        'show_in_menu' => true,
    ]);

    register_post_type('slide', [
        'labels' => [
            'name' => __('Slides del Hero', 'fas'),
            'singular_name' => __('Slide', 'fas'),
            'add_new' => __('Añadir Slide', 'fas'),
            'add_new_item' => __('Añadir Nuevo Slide', 'fas'),
            'edit_item' => __('Editar Slide', 'fas'),
            'new_item' => __('Nuevo Slide', 'fas'),
            'view_item' => __('Ver Slide', 'fas'),
            'search_items' => __('Buscar Slides', 'fas'),
            'not_found' => __('No se encontraron slides', 'fas'),
            'not_found_in_trash' => __('No hay slides en la papelera', 'fas'),
        ],
        'public' => true,
        'show_in_menu' => true,
        'supports' => ['title', 'thumbnail', 'custom-fields'],
        'menu_icon' => 'dashicons-images-alt2',
        'menu_position' => 5,
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
