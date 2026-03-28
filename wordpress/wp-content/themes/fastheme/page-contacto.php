<?php
/**
 * Template Name: Página de Contacto
 */

get_header();
?>

<main class="pt-20">
    <!-- MAP HERO -->
    <section class="relative h-[50vh] min-h-[400px] overflow-hidden bg-fas-cream">
        <div class="gradient-mesh opacity-50"></div>
        <div class="absolute inset-0">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3796.798874066685!2d-66.14518768485233!3d-17.38949798786363!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93e3736f%3A0x5a5a5a5a5a5a5a5a!2sCochabamba%2C%20Bolivia!5e0!3m2!1ses!2sbo!4v1700000000000!5m2!1ses!2sbo" 
                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
            </iframe>
            <div class="absolute inset-0 bg-gradient-to-t from-white via-white/10 to-transparent"></div>
        </div>
        
        <div class="relative z-10 h-full flex flex-col justify-end pb-16 px-6">
            <div class="max-w-4xl mx-auto text-center w-full">
                <span class="reveal inline-block text-gray-800 font-medium tracking-[0.2em] uppercase text-xs mb-4">Visítanos</span>
                <h1 class="reveal reveal-delay-1 font-display text-5xl md:text-6xl lg:text-7xl text-gray-800 mb-4 leading-[1.15]">Encuéntranos</h1>
                <p class="reveal reveal-delay-2 text-gray-600 text-lg max-w-xl mx-auto font-light">Cochabamba, Bolivia</p>
            </div>
        </div>
    </section>

    <!-- CONTACT CARDS -->
    <section class="py-32 px-6 -mt-10 relative z-20 overflow-hidden">
        <div class="gradient-mesh"></div>
        <div class="max-w-6xl mx-auto relative">
            <div class="grid md:grid-cols-3 gap-6">
                <!-- Phone -->
                <div class="reveal reveal-delay-2 bg-white rounded-[2.5rem] p-8 shadow-lg text-center group hover:shadow-xl transition-all card-organic">
                    <div class="w-16 h-16 bg-fas-primary/10 rounded-2xl flex items-center justify-center mx-auto mb-5 group-hover:bg-fas-primary group-hover:scale-110 transition-all">
                        <i class="fas fa-phone text-fas-primary text-2xl group-hover:text-white"></i>
                    </div>
                    <h3 class="font-display text-xl text-gray-800 mb-2">Teléfono</h3>
                    <p class="text-gray-500 mb-4 font-light">Lunes a viernes</p>
                    <a href="tel:+59170000000" class="text-fas-primary font-medium hover:underline">+591 70000000</a>
                </div>

                <!-- Email -->
                <div class="reveal reveal-delay-3 bg-white rounded-[2.5rem] p-8 shadow-lg text-center group hover:shadow-xl transition-all card-organic">
                    <div class="w-16 h-16 bg-fas-accent/10 rounded-2xl flex items-center justify-center mx-auto mb-5 group-hover:bg-fas-accent group-hover:scale-110 transition-all">
                        <i class="fas fa-envelope text-fas-accent text-2xl group-hover:text-white"></i>
                    </div>
                    <h3 class="font-display text-xl text-gray-800 mb-2">Email</h3>
                    <p class="text-gray-500 mb-4 font-light">Respondemos en 24h</p>
                    <a href="mailto:hola@fas.org.bo" class="text-fas-primary font-medium hover:underline">hola@fas.org.bo</a>
                </div>

                <!-- WhatsApp -->
                <div class="reveal reveal-delay-4 bg-white rounded-[2.5rem] p-8 shadow-lg text-center group hover:shadow-xl transition-all card-organic">
                    <div class="w-16 h-16 bg-[#25D366]/10 rounded-2xl flex items-center justify-center mx-auto mb-5 group-hover:bg-[#25D366] group-hover:scale-110 transition-all">
                        <i class="fab fa-whatsapp text-[#25D366] text-2xl group-hover:text-white"></i>
                    </div>
                    <h3 class="font-display text-xl text-gray-800 mb-2">WhatsApp</h3>
                    <p class="text-gray-500 mb-4 font-light">Chat rápido</p>
                    <a href="https://wa.me/59170000000" class="text-fas-primary font-medium hover:underline">Escríbenos</a>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTACT FORM -->
    <section class="py-32 px-6 bg-fas-cream relative overflow-hidden">
        <div class="gradient-mesh"></div>
        <div class="max-w-3xl mx-auto relative">
            <div class="text-center mb-16">
                <span class="reveal inline-block text-fas-accent font-medium tracking-[0.25em] uppercase text-xs mb-4">Escríbenos</span>
                <div class="reveal reveal-delay-1 w-16 h-px bg-gradient-to-r from-fas-accent to-fas-accent-warm mx-auto mb-6"></div>
                <h2 class="reveal reveal-delay-2 font-display text-4xl md:text-5xl text-gray-800 mb-6">Envíanos un mensaje</h2>
                <p class="reveal reveal-delay-3 text-gray-600 font-light">Estamos aquí para ayudarte. Cuéntanos cómo quieres colaborar.</p>
            </div>

            <div class="reveal reveal-delay-4 bg-white rounded-[3rem] p-10 shadow-xl">
                <?php echo do_shortcode('[contact-form-7 id="000" title="Formulario de Contacto"]'); ?>
                
                <form class="space-y-6" action="#" method="POST">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label for="nombre" class="block text-sm font-medium text-gray-700 mb-2">Nombre</label>
                            <input type="text" id="nombre" name="nombre" class="w-full px-6 py-4 rounded-2xl border border-fas-sand focus:border-fas-primary focus:ring-2 focus:ring-fas-primary/20 outline-none transition-all" required>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email" id="email" name="email" class="w-full px-6 py-4 rounded-2xl border border-fas-sand focus:border-fas-primary focus:ring-2 focus:ring-fas-primary/20 outline-none transition-all" required>
                        </div>
                    </div>
                    <div>
                        <label for="asunto" class="block text-sm font-medium text-gray-700 mb-2">Asunto</label>
                        <input type="text" id="asunto" name="asunto" class="w-full px-6 py-4 rounded-2xl border border-fas-sand focus:border-fas-primary focus:ring-2 focus:ring-fas-primary/20 outline-none transition-all" required>
                    </div>
                    <div>
                        <label for="mensaje" class="block text-sm font-medium text-gray-700 mb-2">Mensaje</label>
                        <textarea id="mensaje" name="mensaje" rows="6" class="w-full px-6 py-4 rounded-2xl border border-fas-sand focus:border-fas-primary focus:ring-2 focus:ring-fas-primary/20 outline-none transition-all resize-none" required></textarea>
                    </div>
                    <button type="submit" class="btn-fas w-full px-9 py-4 bg-fas-primary text-white rounded-full font-medium shadow-lg hover:shadow-xl transition-all">
                        Enviar mensaje
                    </button>
                </form>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
