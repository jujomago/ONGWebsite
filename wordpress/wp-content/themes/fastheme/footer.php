<footer id="contacto" class="bg-fas-dark text-white py-16 px-6 relative overflow-hidden">
    <div class="gradient-mesh"></div>
    
    <div class="max-w-7xl mx-auto relative">
        <div class="grid md:grid-cols-4 gap-12 mb-12">
            <div class="md:col-span-2">
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logoTrans.png" alt="FAS" class="h-20 mb-6">
                    <?php
                }
                ?>
                <p class="text-white/70 font-light leading-relaxed mb-6">
                    Fundación sin fines de lucro dedicada a mejorar la calidad de vida de comunidades vulnerables en Cochabamba, Bolivia.
                </p>
                <div class="flex gap-4">
                    <?php
                    $facebook = get_option('theme_facebook', '');
                    $instagram = get_option('theme_instagram', '');
                    if ($facebook) {
                        echo '<a href="' . esc_url($facebook) . '" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-fas-accent transition-colors" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>';
                    }
                    if ($instagram) {
                        echo '<a href="' . esc_url($instagram) . '" class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center hover:bg-fas-accent transition-colors" aria-label="Instagram"><i class="fab fa-instagram"></i></a>';
                    }
                    ?>
                </div>
            </div>
            
            <div>
                <h4 class="font-display text-lg mb-6">Enlaces rápidos</h4>
                <ul class="space-y-3">
                    <li><a href="<?php echo home_url(); ?>" class="text-white/70 hover:text-fas-accent transition-colors">Inicio</a></li>
                    <li><a href="<?php echo get_permalink(get_page_by_path('nosotros')); ?>" class="text-white/70 hover:text-fas-accent transition-colors">Quiénes somos</a></li>
                    <li><a href="<?php echo get_permalink(get_page_by_path('comunidades')); ?>" class="text-white/70 hover:text-fas-accent transition-colors">Comunidades</a></li>
                    <li><a href="<?php echo get_permalink(get_page_by_path('apoyanos')); ?>" class="text-white/70 hover:text-fas-accent transition-colors">Cómo ayudar</a></li>
                </ul>
            </div>
            
            <div>
                <h4 class="font-display text-lg mb-6">Contacto</h4>
                <ul class="space-y-3">
                    <?php
                    $whatsapp = get_option('theme_whatsapp', '');
                    $email = get_option('theme_email', '');
                    
                    if ($whatsapp) {
                        echo '<li class="flex items-center gap-3 text-white/70">';
                        echo '<i class="fab fa-whatsapp text-fas-accent"></i>';
                        echo '<a href="https://wa.me/' . esc_attr($whatsapp) . '" class="hover:text-fas-accent transition-colors">' . esc_html($whatsapp) . '</a>';
                        echo '</li>';
                    }
                    if ($email) {
                        echo '<li class="flex items-center gap-3 text-white/70">';
                        echo '<i class="fas fa-envelope text-fas-accent"></i>';
                        echo '<a href="mailto:' . esc_attr($email) . '" class="hover:text-fas-accent transition-colors">' . esc_html($email) . '</a>';
                        echo '</li>';
                    }
                    ?>
                    <li class="flex items-center gap-3 text-white/70">
                        <i class="fas fa-map-marker-alt text-fas-accent"></i>
                        <span>Cochabamba, Bolivia</span>
                    </li>
                </ul>
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
    <a href="https://wa.me/<?php echo esc_attr($whatsapp); ?>"
        class="fixed bottom-6 right-6 w-14 h-14 bg-green-500 rounded-full flex items-center justify-center text-white shadow-lg hover:bg-green-600 transition-colors z-50"
        aria-label="Contactar por WhatsApp">
        <i class="fab fa-whatsapp text-2xl"></i>
    </a>
    <?php endif; ?>
</footer>

<?php wp_footer(); ?>
</body>

</html>
