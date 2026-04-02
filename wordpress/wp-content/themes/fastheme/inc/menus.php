<?php
/**
 * Custom Menu Walker
 */

/**
 * Agregar campo de icono en el admin de menús
 */
function fas_menu_icon_field($item_id, $item) {
    $icon = get_post_meta($item_id, '_menu_item_icon', true);
    ?>
    <div class="field-menu-icon description-wide" style="margin: 10px 0;">
        <label for="menu-item-icon-<?php echo $item_id; ?>">
            Icono (FontAwesome)<br>
            <input type="text" 
                   id="menu-item-icon-<?php echo $item_id; ?>" 
                   name="menu-item-icon[<?php echo $item_id; ?>]" 
                   value="<?php echo esc_attr($icon); ?>" 
                   placeholder="fas fa-heart"
                   style="width: 100%; margin-top: 5px;">
            <span style="font-size: 12px; color: #666;">Ej: fas fa-utensils, fas fa-heartbeat</span>
        </label>
    </div>
    <?php
}
add_action('wp_nav_menu_item_custom_fields', 'fas_menu_icon_field', 10, 2);

/**
 * Agregar campo anchor_home en el admin de menús
 */
function fas_anchor_home_field($item_id, $item) {
    $anchor = get_post_meta($item_id, '_menu_item_anchor_home', true);
    ?>
    <div class="field-anchor-home description-wide" style="margin: 10px 0;">
        <label for="menu-item-anchor-home-<?php echo $item_id; ?>">
            Anchor Home<br>
            <input type="text" 
                   id="menu-item-anchor-home-<?php echo $item_id; ?>" 
                   name="menu-item-anchor-home[<?php echo $item_id; ?>]" 
                   value="<?php echo esc_attr($anchor); ?>" 
                   placeholder="#participa"
                   style="width: 100%; margin-top: 5px;">
        </label>
    </div>
    <?php
}
add_action('wp_nav_menu_item_custom_fields', 'fas_anchor_home_field', 10, 2);

/**
 * Guardar el icono del menú
 */
function fas_save_menu_icon($menu_id, $menu_item_db_id) {
    if (isset($_POST['menu-item-icon'][$menu_item_db_id])) {
        update_post_meta($menu_item_db_id, '_menu_item_icon', sanitize_text_field($_POST['menu-item-icon'][$menu_item_db_id]));
    } else {
        delete_post_meta($menu_item_db_id, '_menu_item_icon');
    }
}
add_action('wp_update_nav_menu_item', 'fas_save_menu_icon', 10, 2);

/**
 * Guardar el anchor_home del menú
 */
function fas_save_anchor_home($menu_id, $menu_item_db_id) {
    if (isset($_POST['menu-item-anchor-home'][$menu_item_db_id])) {
        update_post_meta($menu_item_db_id, '_menu_item_anchor_home', sanitize_text_field($_POST['menu-item-anchor-home'][$menu_item_db_id]));
    } else {
        delete_post_meta($menu_item_db_id, '_menu_item_anchor_home');
    }
}
add_action('wp_update_nav_menu_item', 'fas_save_anchor_home', 10, 2);

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
        // Hide "Participa" if not on home page
        if ($item->title === 'Participa' && !is_front_page()) {
            return;
        }

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

        // Logic for anchor_home only on front page
        if (is_front_page()) {
            $anchor_home_val = get_post_meta($item->ID, '_menu_item_anchor_home', true);
            if (!empty($anchor_home_val)) {
                $atts['href'] = $anchor_home_val;
            }
        }

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
            $is_current = in_array('current-menu-item', $classes);
            
            $text_color = $is_current ? 'text-fas-primary' : 'text-gray-600';
            
            $active_class = $is_current ? ' nav-active' : '';
            $button_class = $is_button ? 'btn-fas ml-3 px-7 py-3.5 bg-fas-primary text-white rounded-full font-medium text-sm tracking-wide' : 'nav-link-underline px-4 py-2 nav-text hover:text-fas-primary transition-colors rounded-lg flex items-center gap-1 ' . $text_color . $active_class;

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
        // Hide "Participa" if not on home page
        if ($item->title === 'Participa' && !is_front_page()) {
            return;
        }

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

        // Logic for anchor_home only on front page
        if (is_front_page()) {
            $anchor_home_val_mob = get_post_meta($item->ID, '_menu_item_anchor_home', true);
            if (!empty($anchor_home_val_mob)) {
                $atts['href'] = $anchor_home_val_mob;
            }
        }

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
                $is_current = in_array('current-menu-item', $classes);
                $mobile_text_color = $is_current ? 'text-fas-primary' : 'text-gray-700';
                $item_output .= '<a' . $attributes . ' class="block py-3 px-4 rounded-lg hover:bg-fas-cream transition ' . $mobile_text_color . '">' . $title . '</a>';
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
