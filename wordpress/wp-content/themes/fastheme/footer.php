<footer id="contacto" class="bg-gray-900 text-white py-24 px-6 relative overflow-hidden">
    <?php
    // ID de la página de ajustes (post=256)
    $options_id = 256;
    
    // Obtenemos los campos de la página de ajustes o usamos valores por defecto (Fallback)
    $whatsapp = get_field('theme_whatsapp', $options_id) ?: '+591 70000000';
    $email    = get_field('theme_email', $options_id)    ?: 'hola@fas.org.bo';
    ?>
    
    <div class="max-w-6xl mx-auto relative">
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-12 lg:gap-16 mb-12">
            <div>
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    ?>
                    <img src="<?php echo site_url('/static/images/logo_letrasBlancas.png'); ?>" alt="FAS" class="h-24 mb-8">
                    <?php
                }
                ?>
                <p class="text-gray-400 font-light">Fundación Alimentando Sonrisas</p>
                <p class="text-gray-400 font-light">Cochabamba, Bolivia</p>
            </div>
            
            <div>
                <h4 class="font-display text-xl mb-6">Ultimo Proyectos</h4>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'container' => false,
                    'items_wrap' => '<ul class="space-y-4 text-gray-400">%3$s</ul>',
                    'link_class' => 'hover:text-fas-accent transition-colors font-light',
                    'fallback_cb' => false
                ));
                ?>
            </div>
            
            <div>
                <h4 class="font-display text-xl mb-6">Contacto</h4>
                <ul class="space-y-5 text-gray-400">
                    <?php
                    if ($whatsapp) {
                        echo '<li class="flex items-center gap-4 font-light">';
                        echo '<span class="w-10 h-10 bg-fas-primary/30 rounded-full flex items-center justify-center flex-shrink-0">';
                        echo '<i class="fab fa-whatsapp text-fas-accent"></i>';
                        echo '</span>';
                        echo '<span>' . esc_html($whatsapp) . '</span>';
                        echo '</li>';
                    }
                    if ($email) {
                        echo '<li class="flex items-center gap-4 font-light">';
                        echo '<span class="w-10 h-10 bg-fas-primary/30 rounded-full flex items-center justify-center flex-shrink-0">';
                        echo '<i class="fas fa-envelope text-fas-accent"></i>';
                        echo '</span>';
                        echo '<span>' . esc_html($email) . '</span>';
                        echo '</li>';
                    }
                    ?>
                    <li class="flex items-center gap-4 font-light">
                        <span class="w-10 h-10 bg-fas-primary/30 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-map-marker-alt text-fas-accent"></i>
                        </span>
                        <span>Tarija</span>
                    </li>
                </ul>
            </div>
            
            <div>
                <h4 class="font-display text-xl mb-6">Síguenos</h4>
                <div class="flex gap-4">
                    <?php
                    $facebook  = get_field('theme_facebook', $options_id)  ?: '#';
                    $instagram = get_field('theme_instagram', $options_id) ?: '#';
                    $twitter   = get_field('theme_twitter', $options_id)   ?: '#';
                    $youtube   = get_field('theme_youtube', $options_id)   ?: '#';
                    
                    if ($facebook && $facebook !== '#') {
                        echo '<a href="' . esc_url($facebook) . '" target="_blank" class="w-12 h-12 bg-gray-800 rounded-full flex items-center justify-center hover:bg-fas-primary transition-all" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>';
                    }
                    if ($instagram && $instagram !== '#') {
                        echo '<a href="' . esc_url($instagram) . '" target="_blank" class="w-12 h-12 bg-gray-800 rounded-full flex items-center justify-center hover:bg-fas-primary transition-all" aria-label="Instagram"><i class="fab fa-instagram"></i></a>';
                    }
                    if ($twitter && $twitter !== '#') {
                        echo '<a href="' . esc_url($twitter) . '" target="_blank" class="w-12 h-12 bg-gray-800 rounded-full flex items-center justify-center hover:bg-fas-primary transition-all" aria-label="Twitter"><i class="fab fa-twitter"></i></a>';
                    }
                    if ($youtube && $youtube !== '#') {
                        echo '<a href="' . esc_url($youtube) . '" target="_blank" class="w-12 h-12 bg-gray-800 rounded-full flex items-center justify-center hover:bg-fas-primary transition-all" aria-label="YouTube"><i class="fab fa-youtube"></i></a>';
                    }
                    ?>
                </div>
            </div>
        </div>
        
        <div class="border-t border-white/10 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-white/50 text-sm">
                © <?php echo date('Y'); ?> Fundación Alimentando Sonrisas. Todos los derechos reservados.
            </p>
            <p class="text-white/50 text-sm">
                Desarrollado con ❤️ para ayudar a quienes más lo necesitan.
            </p>
        </div>
    </div>
    
    <!-- WhatsApp Float Button -->
    <?php if ($whatsapp): ?>
    <a href="https://wa.me/<?php echo esc_attr(str_replace([' ', '+', '-'], '', $whatsapp)); ?>"
        class="fixed bottom-6 right-6 w-14 h-14 bg-green-500 rounded-full flex items-center justify-center text-white shadow-lg hover:bg-green-600 transition-colors z-50"
        target="_blank"
        aria-label="Contactar por WhatsApp">
        <i class="fab fa-whatsapp text-2xl"></i>
    </a>
    <?php endif; ?>
</footer>

<?php wp_footer(); ?>
</body>

</html>
