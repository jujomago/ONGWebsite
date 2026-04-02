<?php
/**
 * Template Name: Página de Apoyanos
 */

get_header();
?>

<main class="pt-20">
    <!-- HERO -->
    <section class="relative py-32 px-6 bg-gradient-to-br from-fas-primary to-fas-primary-dark relative overflow-hidden">
        <div class="absolute inset-0 pointer-events-none overflow-hidden">
            <div class="absolute top-1/4 -left-10 w-64 h-64 border-[30px] border-white/10 rounded-full" data-speed="0.1"></div>
            <div class="absolute bottom-1/4 right-10 w-48 h-48 border-[20px] border-fas-accent/15 rounded-full" data-speed="-0.1"></div>
        </div>
        
        <div class="max-w-4xl mx-auto text-center relative">
            <span class="reveal inline-block text-fas-accent font-medium tracking-[0.2em] uppercase text-xs mb-6">Únete a nuestra causa</span>
            <h1 class="reveal reveal-delay-1 font-display text-5xl md:text-6xl lg:text-7xl text-white mb-6 leading-[1.15]">
                Ayúdanos a <span class="italic text-fas-accent">transformar</span> vidas
            </h1>
            <p class="reveal reveal-delay-2 text-xl text-white/80 mb-10 max-w-xl mx-auto font-light leading-relaxed">
                Cada pequeño gesto puede cambiar una vida. No necesitamos grandes cosas, necesitamos personas que decidan caminar junto a nosotros.
            </p>
        </div>
    </section>

    <!-- DONATION AND HELP SECTION -->
    <section class="py-32 px-6 bg-fas-cream relative overflow-hidden">
        <div class="gradient-mesh"></div>
        <div class="absolute inset-0 opacity-30" style="background-image: radial-gradient(circle, #059ba3 1px, transparent 1px); background-size: 20px 20px;"></div>
        
        <div class="max-w-6xl mx-auto relative content-reveal">
            <div class="text-center mb-16">
                <span class="reveal inline-block text-fas-accent font-medium tracking-[0.2em] uppercase text-xs mb-4">Cómo puedes ayudar</span>
                <div class="reveal reveal-delay-1 w-16 h-px bg-gradient-to-r from-fas-accent to-fas-accent-warm mx-auto mb-6"></div>
                <h2 class="reveal reveal-delay-2 font-display text-4xl md:text-5xl text-gray-800 mb-6">Tu apoyo marca la diferencia</h2>
            </div>

            <div class="grid md:grid-cols-2 gap-8 mb-16">
                <!-- Donar -->
                <div class="reveal reveal-delay-3 bg-white rounded-[2.5rem] p-10 shadow-xl flex flex-col justify-between">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-fas-primary/10 rounded-2xl flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-heart text-2xl text-fas-primary"></i>
                        </div>
                        <h3 class="font-display text-2xl text-gray-800 mb-4">Donar</h3>
                        <p class="text-gray-600 font-light mb-8">Tu contribución económica nos ayuda a seguir llevando alimentos, educación y salud a las comunidades que más lo necesitan.</p>
                    </div>
                    <div class="space-y-4">
                        <?php 
                        $paypal_url = get_field('donate_paypal') ?: 'https://www.paypal.com/donate?hosted_button_id=YOUR_ID'; 
                        ?>
                        <a href="<?php echo esc_url($paypal_url); ?>" target="_blank" class="btn-fas flex items-center justify-center gap-3 px-8 py-4 bg-fas-primary text-white rounded-full font-medium w-full hover:scale-105 transition-all">
                            <i class="fab fa-paypal text-xl"></i>
                            Donar por PayPal
                        </a>
                    </div>
                </div>

                <!-- Participar -->
                <div class="reveal reveal-delay-4 bg-white rounded-[2.5rem] p-10 shadow-xl flex flex-col justify-between">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-fas-accent/10 rounded-2xl flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-hands-helping text-2xl text-fas-accent"></i>
                        </div>
                        <h3 class="font-display text-2xl text-gray-800 mb-4">Participar</h3>
                        <p class="text-gray-600 font-light mb-8">Únete como voluntario. Tu tiempo y habilidades pueden hacer la diferencia en la vida de muchos niños y familias.</p>
                    </div>
                    <a href="<?php echo get_permalink(get_page_by_path('contacto')); ?>" class="px-8 py-4 border-2 border-fas-accent text-fas-accent rounded-full font-medium w-full inline-block text-center hover:bg-fas-accent hover:text-white transition-colors">Ser voluntario</a>
                </div>
            </div>

            <!-- Datos Bancarios & QR -->
            <div class="reveal reveal-delay-5 bg-white rounded-[3.5rem] p-12 md:p-16 shadow-2xl relative overflow-hidden group">
                <!-- Decorative background elements inside the card -->
                <div class="absolute -top-24 -right-24 w-64 h-64 bg-fas-primary/5 rounded-full blur-3xl transition-all group-hover:bg-fas-primary/10"></div>
                
                <div class="grid md:grid-cols-2 gap-16 items-center relative z-10">
                    <div class="text-left">
                        <div class="inline-flex items-center gap-3 px-4 py-2 bg-fas-primary/10 rounded-full mb-8">
                            <i class="fas fa-university text-fas-primary text-sm"></i>
                            <span class="text-xs font-bold text-fas-primary uppercase tracking-widest">Información Oficial</span>
                        </div>
                        
                        <h3 class="font-display text-3xl text-gray-900 mb-8 leading-tight">Transferencia Directa</h3>
                        
                        <div class="space-y-6">
                            <div class="group/item">
                                <p class="text-[10px] text-fas-accent font-bold uppercase tracking-[0.2em] mb-1">Entidad Bancaria</p>
                                <p class="text-xl text-gray-800 font-medium"><?php echo esc_html(get_field('donate_entidad') ?: 'Banco Mercantil Santa Cruz'); ?></p>
                                <div class="w-12 h-1 bg-fas-primary/20 mt-2 transition-all group-hover/item:w-full"></div>
                            </div>
                            
                            <div class="group/item">
                                <p class="text-[10px] text-fas-accent font-bold uppercase tracking-[0.2em] mb-1">Número de Cuenta</p>
                                <p class="text-2xl text-fas-primary font-bold tracking-tight"><?php echo esc_html(get_field('donate_cuenta') ?: '1234567890'); ?></p>
                                <div class="w-12 h-1 bg-fas-primary/20 mt-2 transition-all group-hover/item:w-full"></div>
                            </div>
                            
                            <div class="group/item">
                                <p class="text-[10px] text-fas-accent font-bold uppercase tracking-[0.2em] mb-1">Titular de la Cuenta</p>
                                <p class="text-lg text-gray-800 font-medium"><?php echo esc_html(get_field('donate_titular') ?: 'Fundación Alimentando Sonrisas'); ?></p>
                                <div class="w-12 h-1 bg-fas-primary/20 mt-2 transition-all group-hover/item:w-full"></div>
                            </div>
                        </div>

                        <div class="mt-12 p-5 bg-fas-sand/30 rounded-2xl border border-fas-sand flex items-start gap-4">
                            <div class="w-10 h-10 bg-white rounded-xl shadow-sm flex items-center justify-center shrink-0">
                                <i class="fas fa-shield-alt text-fas-primary text-sm"></i>
                            </div>
                            <p class="text-xs text-gray-600 leading-relaxed font-light mt-1">
                                <strong class="text-gray-800 block mb-1">Donación Segura</strong>
                                Todas las transacciones son directas a nuestra cuenta institucional y pueden ser certificadas para beneficios fiscales.
                            </p>
                        </div>
                    </div>

                    <div class="flex flex-col items-center">
                        <div class="relative">
                            <!-- Glowing animations behind QR -->
                            <div class="absolute -inset-4 bg-gradient-to-tr from-fas-primary to-fas-accent opacity-20 blur-2xl rounded-full animate-pulse"></div>
                            
                            <div class="relative bg-white p-8 rounded-[3rem] shadow-xl border border-gray-100 transition-transform hover:scale-105 duration-500">
                                <div class="w-56 h-56 bg-white rounded-2xl flex items-center justify-center overflow-hidden">
                                    <?php 
                                    $qr_image = get_field('donate_qr');
                                    if($qr_image): 
                                        $url = is_array($qr_image) ? $qr_image['url'] : $qr_image;
                                    ?>
                                        <img src="<?php echo esc_url($url); ?>" alt="QR Donación" class="w-full h-full object-contain">
                                    <?php else: ?>
                                        <i class="fas fa-qrcode text-[10rem] text-fas-primary/10"></i>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="absolute -bottom-4 left-1/2 -translate-x-1/2 bg-fas-primary text-white py-2 px-6 rounded-full text-[10px] font-bold uppercase tracking-widest shadow-lg whitespace-nowrap">
                                    QR Simple Bancario
                                </div>
                            </div>
                        </div>
                        <p class="mt-12 text-[10px] text-gray-400 font-bold uppercase tracking-[0.3em]">Escanea y ayuda hoy</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- OTHER WAYS TO HELP -->
    <section class="py-32 px-6 bg-white relative overflow-hidden">
        <div class="gradient-mesh"></div>
        <div class="absolute inset-0 opacity-30" style="background-image: radial-gradient(circle, #059ba3 1px, transparent 1px); background-size: 20px 20px;"></div>
        <div class="absolute top-20 left-10 w-20 h-20 text-fas-primary/10" data-speed="0.1">
            <svg viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
            </svg>
        </div>
        <div class="absolute bottom-20 right-10 w-24 h-24 border-[10px] border-fas-accent/10 rounded-full" data-speed="-0.1"></div>

        <div class="max-w-6xl mx-auto relative">
            <div class="text-center mb-16">
                <span class="reveal inline-block text-fas-accent font-medium tracking-[0.25em] uppercase text-xs mb-4">Otras formas de ayudar</span>
                <div class="reveal reveal-delay-1 w-16 h-px bg-gradient-to-r from-fas-accent to-fas-accent-warm mx-auto mb-6"></div>
                <h2 class="reveal reveal-delay-2 font-display text-4xl md:text-5xl text-gray-800 mb-4">Más que dinero</h2>
                <p class="reveal reveal-delay-3 text-gray-600 max-w-xl mx-auto font-light leading-relaxed">Tu apoyo no solo se limita a donaciones económicas. Hay muchas formas de contribuir.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Volunteer -->
                <div class="reveal reveal-delay-3 group relative overflow-hidden rounded-[3rem] bg-gradient-to-br from-fas-cream to-[#e8dcc8] p-10 text-center border border-fas-sand/50 card-organic">
                    <div class="absolute -top-20 -right-20 w-40 h-40 bg-fas-primary/5 rounded-full blur-3xl"></div>
                    <div class="relative z-10">
                        <div class="w-20 h-20 bg-fas-primary rounded-[2rem] flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                            <i class="fas fa-hands-helping text-3xl text-white"></i>
                        </div>
                        <h3 class="font-display text-2xl text-gray-800 mb-3">Voluntariado</h3>
                        <p class="text-gray-600 mb-6 font-light">Únete como voluntario y conoce de cerca nuestra labor.</p>
                        <a href="<?php echo get_permalink(get_page_by_path('participa')); ?>" class="btn-fas inline-block px-8 py-4 bg-fas-primary text-white rounded-full font-medium">Aplicar</a>
                    </div>
                </div>

                <!-- Corporate -->
                <div class="reveal reveal-delay-4 group relative overflow-hidden rounded-[3rem] bg-gradient-to-br from-fas-primary to-fas-primary-dark p-10 text-center card-organic">
                    <div class="absolute -top-20 -right-20 w-40 h-40 bg-white/10 rounded-full blur-3xl"></div>
                    <div class="relative z-10">
                        <div class="w-20 h-20 bg-white/10 backdrop-blur rounded-[2rem] flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                            <i class="fas fa-building text-3xl text-white"></i>
                        </div>
                        <h3 class="font-display text-2xl text-white mb-3">Alianzas corporativas</h3>
                        <p class="text-white/80 mb-6 font-light">Empresas pueden apadrinar programas o comunidades.</p>
                        <a href="<?php echo get_permalink(get_page_by_path('contacto')); ?>" class="btn-fas inline-block px-8 py-4 bg-white text-fas-primary rounded-full font-medium">Contactar</a>
                    </div>
                </div>

                <!-- In Kind -->
                <div class="reveal reveal-delay-5 group relative overflow-hidden rounded-[3rem] bg-gradient-to-br from-fas-cream to-[#e8dcc8] p-10 text-center border border-fas-sand/50 card-organic">
                    <div class="absolute -top-20 -right-20 w-40 h-40 bg-fas-accent/10 rounded-full blur-3xl"></div>
                    <div class="relative z-10">
                        <div class="w-20 h-20 bg-fas-accent rounded-[2rem] flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                            <i class="fas fa-box-open text-3xl text-white"></i>
                        </div>
                        <h3 class="font-display text-2xl text-gray-800 mb-3">Donaciones en especie</h3>
                        <p class="text-gray-600 mb-6 font-light">Alimentos, ropa, útiles, medicamentos.</p>
                        <a href="<?php echo get_permalink(get_page_by_path('contacto')); ?>" class="btn-fas inline-block px-8 py-4 bg-fas-accent text-white rounded-full font-medium">Ver lista</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
