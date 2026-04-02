<?php
/**
 * Template Name: Página de Contacto
 */

// Obtener datos de contacto de ACF (campos globales o de página)
$telefono_raw = get_field('theme_telefono') ?: '+591 70000000';
$email       = get_field('theme_email')    ?: 'hola@fas.org.bo';
$whatsapp_raw = get_field('theme_whatsapp') ?: '+591 70000000';

// Redes Sociales de ACF
$facebook  = get_field('theme_facebook') ?: '#';
$instagram = get_field('theme_instagram') ?: '#';
$twitter   = get_field('theme_twitter') ?: '#';
$youtube   = get_field('theme_youtube') ?: '#';

// Limpiar números para los enlaces (quitar espacios y signos)
$telefono_link = preg_replace('/[^0-9+]/', '', $telefono_raw);
$whatsapp_link = preg_replace('/[^0-9]/', '', $whatsapp_raw);

get_header();
?>

<main class="pt-20">
    <!-- MAP HERO - First Section (bg-fas-cream) -->
    <section class="relative h-[50vh] min-h-[400px] overflow-hidden bg-fas-cream">
        <div class="gradient-mesh opacity-50"></div>
        <div class="absolute top-10 left-10 w-20 h-20 text-fas-primary/10" data-speed="0.1">
            <svg viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
            </svg>
        </div>
        <div class="absolute bottom-10 right-10 w-24 h-24 border-[10px] border-fas-accent/10 rounded-full" data-speed="-0.1"></div>
        <div class="absolute inset-0">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d29387.1130303576!2d-64.733!3d-21.535!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2sbo!4v1711985500000!5m2!1ses!2sbo" 
                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
            </iframe>
            <div class="absolute inset-0 bg-gradient-to-t from-white via-white/10 to-transparent"></div>
        </div>
        
        <div class="relative z-10 h-full flex flex-col justify-end pb-16 px-6">
            <div class="max-w-4xl mx-auto text-center w-full">
                <span class="reveal inline-block text-gray-800 font-medium tracking-[0.2em] uppercase text-xs mb-4">Visítanos</span>
                <h1 class="reveal reveal-delay-1 font-display text-5xl md:text-6xl lg:text-7xl text-gray-800 mb-4 leading-[1.15]">Encuéntranos</h1>
                <p class="reveal reveal-delay-2 text-gray-600 text-lg max-w-xl mx-auto font-light">Tarija, Bolivia</p>
            </div>
        </div>
    </section>

    <!-- CONTACT CARDS -->
    <section class="py-32 px-6 -mt-10 relative z-20 overflow-hidden">
        <div class="gradient-mesh"></div>
        <div class="absolute inset-0 opacity-30" style="background-image: radial-gradient(circle, #059ba3 1px, transparent 1px); background-size: 20px 20px;"></div>
        <div class="absolute top-20 left-10 w-20 h-20 text-fas-primary/10" data-speed="0.1">
            <svg viewBox="0 0 24 24" fill="currentColor">
                <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
            </svg>
        </div>
        <div class="absolute bottom-20 right-10 w-24 h-24 border-[10px] border-fas-accent/10 rounded-full" data-speed="-0.1"></div>

        <div class="max-w-6xl mx-auto relative">
            <div class="grid md:grid-cols-3 gap-6">
                <!-- Phone -->
                <div class="reveal reveal-delay-2 bg-white rounded-[2.5rem] p-8 shadow-lg text-center group hover:shadow-xl transition-all card-organic">
                    <div class="w-16 h-16 bg-fas-primary/10 rounded-2xl flex items-center justify-center mx-auto mb-5 group-hover:bg-fas-primary group-hover:scale-110 transition-all">
                        <i class="fas fa-phone text-fas-primary text-2xl group-hover:text-white"></i>
                    </div>
                    <h3 class="font-display text-xl text-gray-800 mb-2">Teléfono</h3>
                    <p class="text-gray-500 mb-4 font-light">Lunes a viernes</p>
                    <a href="tel:<?php echo esc_attr($telefono_link); ?>" class="text-fas-primary font-medium hover:underline"><?php echo esc_html($telefono_raw); ?></a>
                </div>

                <!-- Email -->
                <div class="reveal reveal-delay-3 bg-white rounded-[2.5rem] p-8 shadow-lg text-center group hover:shadow-xl transition-all card-organic">
                    <div class="w-16 h-16 bg-fas-accent/10 rounded-2xl flex items-center justify-center mx-auto mb-5 group-hover:bg-fas-accent group-hover:scale-110 transition-all">
                        <i class="fas fa-envelope text-fas-accent text-2xl group-hover:text-white"></i>
                    </div>
                    <h3 class="font-display text-xl text-gray-800 mb-2">Email</h3>
                    <p class="text-gray-500 mb-4 font-light">Respondemos en 24h</p>
                    <a href="mailto:<?php echo esc_attr($email); ?>" class="text-fas-primary font-medium hover:underline"><?php echo esc_html($email); ?></a>
                </div>

                <!-- WhatsApp -->
                <div class="reveal reveal-delay-4 bg-white rounded-[2.5rem] p-8 shadow-lg text-center group hover:shadow-xl transition-all card-organic">
                    <div class="w-16 h-16 bg-[#25D366]/10 rounded-2xl flex items-center justify-center mx-auto mb-5 group-hover:bg-[#25D366] group-hover:scale-110 transition-all">
                        <i class="fab fa-whatsapp text-[#25D366] text-2xl group-hover:text-white"></i>
                    </div>
                    <h3 class="font-display text-xl text-gray-800 mb-2">WhatsApp</h3>
                    <p class="text-gray-500 mb-4 font-light">Chat rápido</p>
                    <a href="https://wa.me/<?php echo esc_attr($whatsapp_link); ?>" class="text-fas-primary font-medium hover:underline">Escríbenos</a>
                </div>
            </div>
        </div>
    </section>

    <!-- FORM SECTION - Third Section (Explicitly bg-white in HTML) -->
    <section class="py-32 px-6 bg-white relative overflow-hidden">
        <div class="gradient-mesh"></div>
        <div class="absolute top-10 right-1/4 w-16 h-16 bg-fas-primary/10 rounded-full" data-speed="0.1"></div>
        <div class="absolute bottom-10 left-1/4 w-20 h-20 border-[10px] border-fas-accent/10 rounded-full" data-speed="-0.1"></div>

        <div class="max-w-3xl mx-auto relative">
            <div class="text-center mb-12">
                <span class="reveal inline-block text-fas-accent font-medium tracking-[0.2em] uppercase text-xs mb-4">Escríbenos</span>
                <div class="reveal reveal-delay-1 w-16 h-px bg-gradient-to-r from-fas-accent to-fas-accent-warm mx-auto mb-6"></div>
                <h2 class="reveal reveal-delay-2 font-display text-4xl md:text-5xl text-gray-800 mb-4">Envíanos un mensaje</h2>
                <p class="reveal reveal-delay-3 text-gray-500 max-w-lg mx-auto font-light">¿Tienes preguntas sobre nuestra labor? ¿Quieres colaborar? Estamos aquí para ayudarte.</p>
            </div>

            <div class="reveal reveal-delay-4 bg-fas-cream/50 rounded-[3rem] p-10 md:p-12 border border-fas-sand/30 card-organic">
                <?php echo do_shortcode('[contact-form-7 id="a391fbd" title="Formulario de contacto"]'); ?>
            </div>
        </div>
    </section>

    <!-- SOCIAL SECTION - Final Section (bg-gradient from primary to dark) -->
    <section class="py-20 px-6 bg-gradient-to-br from-fas-primary to-fas-primary-dark">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="font-display text-3xl text-white mb-4">Síguenos en redes</h2>
            <p class="text-white/80 mb-10">Entérate de nuestras últimas actividades y campañas</p>

            <div class="flex justify-center gap-4">
                <?php if ($facebook && $facebook !== '#'): ?>
                <a href="<?php echo esc_url($facebook); ?>" target="_blank" class="w-14 h-14 bg-white/10 backdrop-blur rounded-2xl flex items-center justify-center hover:bg-white/20 hover:scale-110 transition-all">
                    <i class="fab fa-facebook-f text-white text-xl"></i>
                </a>
                <?php endif; ?>

                <?php if ($instagram && $instagram !== '#'): ?>
                <a href="<?php echo esc_url($instagram); ?>" target="_blank" class="w-14 h-14 bg-white/10 backdrop-blur rounded-2xl flex items-center justify-center hover:bg-white/20 hover:scale-110 transition-all">
                    <i class="fab fa-instagram text-white text-xl"></i>
                </a>
                <?php endif; ?>

                <?php if ($twitter && $twitter !== '#'): ?>
                <a href="<?php echo esc_url($twitter); ?>" target="_blank" class="w-14 h-14 bg-white/10 backdrop-blur rounded-2xl flex items-center justify-center hover:bg-white/20 hover:scale-110 transition-all">
                    <i class="fab fa-twitter text-white text-xl"></i>
                </a>
                <?php endif; ?>

                <?php if ($youtube && $youtube !== '#'): ?>
                <a href="<?php echo esc_url($youtube); ?>" target="_blank" class="w-14 h-14 bg-white/10 backdrop-blur rounded-2xl flex items-center justify-center hover:bg-white/20 hover:scale-110 transition-all">
                    <i class="fab fa-youtube text-white text-xl"></i>
                </a>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
