<?php
/**
 * Enqueue Scripts and Styles
 */

function fas_scripts() {
    wp_enqueue_style('fas-google-fonts', 'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Outfit:wght@300;400;500;600;700&display=swap', [], null);
    wp_enqueue_style('fas-font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', [], '6.4.0');
    wp_enqueue_script('fas-tailwind', 'https://cdn.tailwindcss.com', [], null, false);
    wp_enqueue_style('fas-style', get_stylesheet_uri(), [], FAS_THEME_VERSION);
    wp_enqueue_style('fas-custom', get_template_directory_uri() . '/assets/css/styles.css', [], FAS_THEME_VERSION);
    wp_enqueue_style('fas-glightbox', 'https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css', [], '3.2.0');

    wp_enqueue_script('fas-tailwind-config', get_template_directory_uri() . '/assets/js/tailwind-config.js', ['fas-tailwind'], FAS_THEME_VERSION, true);
    wp_enqueue_script('fas-glightbox-js', 'https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js', [], '3.2.0', true);
    wp_enqueue_script('fas-main', get_template_directory_uri() . '/assets/js/main.js', ['jquery', 'fas-glightbox-js'], FAS_THEME_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'fas_scripts');
