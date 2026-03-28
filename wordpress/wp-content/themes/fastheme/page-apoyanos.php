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

    <!-- WAYS TO HELP -->
    <section class="py-32 px-6 bg-fas-cream relative overflow-hidden">
        <div class="gradient-mesh"></div>
        <div class="max-w-6xl mx-auto relative">
            <div class="text-center mb-16">
                <span class="reveal inline-block text-fas-accent font-medium tracking-[0.2em] uppercase text-xs mb-4">Cómo puedes ayudar</span>
                <div class="reveal reveal-delay-1 w-16 h-px bg-gradient-to-r from-fas-accent to-fas-accent-warm mx-auto mb-6"></div>
                <h2 class="reveal reveal-delay-2 font-display text-4xl md:text-5xl text-gray-800 mb-6">Tu apoyo marca la diferencia</h2>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <!-- Donar -->
                <div class="reveal reveal-delay-3 bg-white rounded-[2.5rem] p-10 shadow-xl">
                    <div class="text-center">
                        <div class="w-20 h-20 bg-fas-primary rounded-2xl flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-heart text-3xl text-white"></i>
                        </div>
                        <h3 class="font-display text-2xl text-gray-800 mb-4">Donar</h3>
                        <p class="text-gray-600 font-light mb-6">Tu contribución económica nos ayuda a seguir llevando alimentos, educación y salud a las comunidades que más lo necesitan.</p>
                        <ul class="text-left space-y-3 mb-8 text-gray-500">
                            <li class="flex items-center gap-3">
                                <i class="fas fa-check text-fas-primary"></i>
                                <span class="font-light">Donación única</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <i class="fas fa-check text-fas-primary"></i>
                                <span class="font-light">Donación mensual</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <i class="fas fa-check text-fas-primary"></i>
                                <span class="font-light">Patrocinio de proyectos</span>
                            </li>
                        </ul>
                        <button class="btn-fas px-8 py-4 bg-fas-primary text-white rounded-full font-medium w-full">Donar ahora</button>
                    </div>
                </div>

                <!-- Participar -->
                <div class="reveal reveal-delay-4 bg-white rounded-[2.5rem] p-10 shadow-xl">
                    <div class="text-center">
                        <div class="w-20 h-20 bg-fas-accent rounded-2xl flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-hands-helping text-3xl text-white"></i>
                        </div>
                        <h3 class="font-display text-2xl text-gray-800 mb-4">Participar</h3>
                        <p class="text-gray-600 font-light mb-6">Únete como voluntario. Tu tiempo y habilidades pueden hacer la diferencia en la vida de muchos niños.</p>
                        <ul class="text-left space-y-3 mb-8 text-gray-500">
                            <li class="flex items-center gap-3">
                                <i class="fas fa-check text-fas-accent"></i>
                                <span class="font-light">Voluntariado presencial</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <i class="fas fa-check text-fas-accent"></i>
                                <span class="font-light">Mentoría profesional</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <i class="fas fa-check text-fas-accent"></i>
                                <span class="font-light">Colaboración en eventos</span>
                            </li>
                        </ul>
                        <a href="<?php echo get_permalink(get_page_by_path('participa')); ?>" class="px-8 py-4 border-2 border-fas-accent text-fas-accent rounded-full font-medium w-full inline-block text-center hover:bg-fas-accent hover:text-white transition-colors">Ser voluntario</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- QR / DONATION INFO -->
    <section class="py-32 px-6 bg-white relative overflow-hidden">
        <div class="gradient-mesh"></div>
        <div class="max-w-4xl mx-auto relative">
            <div class="text-center mb-12">
                <h2 class="reveal font-display text-3xl md:text-4xl text-gray-800 mb-6">Información para donate</h2>
            </div>
            <div class="reveal reveal-delay-2 bg-fas-cream rounded-[2.5rem] p-10 shadow-xl text-center">
                <div class="grid md:grid-cols-2 gap-8 items-center">
                    <div>
                        <p class="text-xs text-gray-500 mb-3">Escanea para donate</p>
                        <div class="w-48 h-48 bg-white rounded-2xl flex items-center justify-center mx-auto shadow-inner">
                            <i class="fas fa-qrcode text-8xl text-fas-primary/30"></i>
                        </div>
                    </div>
                    <div class="text-left">
                        <h3 class="font-display text-xl text-gray-800 mb-4">Datos bancarios</h3>
                        <ul class="space-y-3 text-gray-600 font-light">
                            <li><strong>Banco:</strong> Banco Mercantil Santa Cruz</li>
                            <li><strong>Cuenta:</strong> 1234567890</li>
                            <li><strong>CCI:</strong> 12345678901234567890</li>
                            <li><strong>Titular:</strong> Fundación Alimentando Sonrisas</li>
                        </ul>
                        <div class="mt-6 p-4 bg-fas-primary/10 rounded-xl">
                            <p class="text-sm text-fas-primary font-medium">Tu donante es deducible de impuestos</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CONTACT -->
    <section class="py-32 px-6 bg-fas-cream relative overflow-hidden">
        <div class="gradient-mesh"></div>
        <div class="max-w-2xl mx-auto text-center relative">
            <h2 class="reveal font-display text-4xl md:text-5xl text-gray-800 mb-6">¿Tienes preguntas?</h2>
            <p class="reveal reveal-delay-1 text-gray-600 font-light mb-8">Escríbenos y te explicamos cómo puedes ayudar de la mejor forma.</p>
            <a href="<?php echo get_permalink(get_page_by_path('contacto')); ?>" class="reveal reveal-delay-2 btn-fas px-9 py-4 bg-fas-primary text-white rounded-full font-medium">Contáctanos</a>
        </div>
    </section>
</main>

<?php get_footer(); ?>
