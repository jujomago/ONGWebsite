<?php
/**
 * Custom Menu Walker
 */

class FAS_Walker_Nav_Menu extends Walker_Nav_Menu {
    public function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class=\"pt-3 left-0 top-full absolute dropdown-content-wrapper\"><ul class=\"w-60 bg-white dropdown-content rounded-2xl shadow-2xl border border-fas-sand py-3\" role=\"menu\">\n";
    } 

    public function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul></div>\n";
    }

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'nav-item';

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $output .= $indent . '<li' . $class_names . ' role="menuitem">';

        $atts = array();
        $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target)     ? $item->target     : '';
        $atts['rel']    = !empty($item->xfn)        ? $item->xfn        : '';
        $atts['href']   = !empty($item->url)        ? $item->url        : '#';

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $title = apply_filters('the_title', $item->title, $item->ID);
        $title = apply_filters('nav_menu_item_title', $title, $item, $args, $depth);

        $item_output = $args->before;

        // Handle icon class
        $icon_class = get_post_meta($item->ID, '_menu_item_icon', true);
        $icon_html = '';
        if ($icon_class) {
            $icon_html = '<i class="' . esc_attr($icon_class) . '"></i> ';
        }

        // Different styling for depth 0 (main items) vs depth 1 (submenu items)
        if ($depth === 0) {
            // Main navigation items
            $is_button = in_array('menu-item-btn', $classes);
            $button_class = $is_button ? 'btn-fas ml-3 px-7 py-3.5 bg-fas-primary text-white rounded-full font-medium text-sm tracking-wide' : 'nav-link-underline px-4 py-2 nav-text text-gray-600 hover:text-fas-primary transition-colors rounded-lg flex items-center gap-1';

            $item_output .= '<a' . $attributes . ' class="' . $button_class . '" ';

            if (in_array('menu-item-has-children', $classes)) {
                $item_output .= ' role="button" aria-haspopup="true" aria-expanded="false"';
            }

            $item_output .= '>';
            
            // Add icon before text
            $item_output .= $icon_html;
            $item_output .= $args->link_before . $title . $args->link_after;
            
            // Add dropdown arrow for items with children (on the right)
            if (in_array('menu-item-has-children', $classes)) {
                $item_output .= '<svg class="w-4 h-4 transition-transform duration-300 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>';
            }
            
            $item_output .= '</a>';
        } else {
            // Submenu items (depth 1) - match index.html styling
            $item_output .= '<a' . $attributes . ' class="flex items-center gap-3 px-5 py-3 nav-text text-gray-600 hover:bg-fas-cream hover:text-fas-primary transition-colors" role="menuitem">';
            $item_output .= $icon_html;
            $item_output .= $args->link_before . $title . $args->link_after;
            $item_output .= '</a>';
        }
        
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    public function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= "</li>\n";
    }
}

function fas_nav_menu($location) {
    if ($location === 'primary') {
        wp_nav_menu([
            'theme_location' => 'primary',
            'container'      => false,
            'menu_class'     => 'hidden lg:flex items-center gap-1',
            'fallback_cb'    => false,
            'walker'         => new FAS_Walker_Nav_Menu(),
        ]);
    } else {
        wp_nav_menu([
            'theme_location' => $location,
            'container'     => false,
            'menu_class'    => 'space-y-2',
            'fallback_cb'   => false,
        ]);
    }
}

/**
 * Mobile Menu Walker - Simple walker for mobile navigation
 */
class FAS_Walker_Nav_Menu_Mobile extends Walker_Nav_Menu {
    public function start_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class=\"ml-4 mt-2 space-y-1 submenu-content hidden\">\n";
    }

    public function end_lvl(&$output, $depth = 0, $args = null) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</div>\n";
    }

    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $output .= $indent . '<div' . $class_names . '>';

        $atts = array();
        $atts['title']  = !empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = !empty($item->target)     ? $item->target     : '';
        $atts['rel']    = !empty($item->xfn)        ? $item->xfn        : '';
        $atts['href']   = !empty($item->url)        ? $item->url        : '#';

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $title = apply_filters('the_title', $item->title, $item->ID);
        $title = apply_filters('nav_menu_item_title', $title, $item, $args, $depth);

        $item_output = $args->before;

        // Check for button class
        $is_button = in_array('menu-item-btn', $classes);
        
        if ($depth === 0) {
            // Main items
            if (in_array('menu-item-has-children', $classes)) {
                // Has children - clickable to toggle submenu
                $item_output .= '<button type="button" class="w-full text-left block py-3 px-4 text-gray-700 rounded-lg hover:bg-fas-cream transition flex items-center justify-between" onclick="toggleMobileSubmenu(this)">';
                $item_output .= '<span>' . $title . '</span>';
                $item_output .= '<svg class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>';
                $item_output .= '</button>';
            } elseif ($is_button) {
                $item_output .= '<a' . $attributes . ' class="btn-fas block text-center py-3.5 bg-fas-primary text-white rounded-full font-medium">' . $title . '</a>';
            } else {
                $item_output .= '<a' . $attributes . ' class="block py-3 px-4 text-gray-700 rounded-lg hover:bg-fas-cream transition">' . $title . '</a>';
            }
        } else {
            // Submenu items
            $item_output .= '<a' . $attributes . ' class="block py-2 px-4 text-gray-600 rounded-lg hover:bg-fas-cream transition">' . $title . '</a>';
        }
        
        $item_output .= $args->after;
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    public function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= "</div>\n";
    }
}
