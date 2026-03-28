<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <?php wp_head(); ?>
</head>

<body <?php body_class('font-body text-gray-700 bg-fas-cream'); ?>>
    <div class="grain-overlay" aria-hidden="true"></div>
    <a href="#inicio" class="skip-link focus-visible">Saltar al contenido</a>

    <!-- NAVBAR -->
    <nav id="main-nav"
        class="fixed top-0 left-0 right-0 z-50 bg-white/85 backdrop-blur-lg border-b border-fas-sand/50 transition-all duration-500">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <a href="<?php echo home_url(); ?>" class="flex items-center gap-3 group h-[75px]">
                    <?php
                    if (has_custom_logo()) {
                        the_custom_logo();
                    } else {
                        ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logoTrans.png" alt="FAS - Fundación Alimentando Sonrisas" class="h-full w-auto">
                        <?php
                    }
                    ?>
                </a>

                <div class="hidden lg:flex items-center gap-1 main-navigation">
                    <?php
                    if (has_nav_menu('primary')) {
                        wp_nav_menu([
                            'theme_location' => 'primary',
                            'container'      => false,
                            'menu_class'     => 'flex items-center gap-1',
                            'fallback_cb'    => false,
                            'walker'         => new FAS_Walker_Nav_Menu(),
                        ]);
                    }
                    ?>
                </div>

                <button type="button" id="mobile-menu-btn"
                    class="lg:hidden p-3 text-gray-600 focus-visible rounded-lg hover:bg-fas-cream transition"
                    aria-label="Abrir menú" aria-expanded="false" aria-controls="mobile-menu">
                    <i class="fas fa-bars text-xl" aria-hidden="true"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden lg:hidden bg-white border-t border-fas-sand">
            <div class="px-6 py-4 space-y-2">
                <?php
                if (has_nav_menu('primary')) {
                    wp_nav_menu([
                        'theme_location' => 'primary',
                        'container'      => false,
                        'menu_class'    => 'mobile-nav space-y-2',
                        'fallback_cb'   => false,
                        'walker'        => new FAS_Walker_Nav_Menu_Mobile(),
                    ]);
                }
                ?>
            </div>
        </div>
    </nav>
