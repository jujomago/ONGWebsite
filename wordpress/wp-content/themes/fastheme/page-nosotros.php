<?php
/**
 * Template Name: Página de Nosotros
 */

// Leer campos ACF de la página
$resumen        = get_field('resumen_quienes_somos') ?: 'Fundación Alimentando Sonrisas (FAS) es una organización sin fines de lucro que trabaja para transformar la vida de familias en comunidades vulnerables de Bolivia.';
$mision         = get_field('mision')         ?: 'Transformar vidas mediante alimentación, educación, salud y emprendimiento, caminando junto a las comunidades más vulnerables de Bolivia para construir un futuro digno.';
$vision         = get_field('vision')         ?: 'Un Bolivia donde cada niño tenga oportunidades reales de desarrollo y donde las comunidades puedan construir su propio futuro con dignidad, esperanza y herramientas para crecer.';
$compromiso     = get_field('compromiso')     ?: 'Estamos comprometidos con cada familia, cada niño, cada comunidad.';
$trabajo_equipo = get_field('trabajo_equipo') ?: 'Creemos en la fuerza de la comunidad y en construir juntos.';
$sostenibilidad = get_field('sostenibilidad') ?: 'Buscamos soluciones que perduren y generen autonomía.';
$primary_image  = get_the_post_thumbnail_url(get_the_ID(), 'full') ?: get_template_directory_uri() . '/assets/images/girlKids.png';

get_header();
?>

<main class="pt-20">

    <!-- HERO -->
    <section class="relative py-32 px-6 bg-white overflow-hidden">
        <div class="gradient-mesh"></div>
        <div class="absolute inset-0 opacity-30"
            style="background-image: radial-gradient(circle, #059ba3 1px, transparent 1px); background-size: 20px 20px;">
        </div>
        <div class="absolute top-10 right-10 w-32 h-32 text-fas-primary/10" data-speed="0.1">
            <svg viewBox="0 0 24 24" fill="currentColor" class="w-full h-full">
                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
            </svg>
        </div>
        <div class="absolute bottom-10 left-10 w-24 h-24 border-[12px] border-fas-accent/10 rounded-full" data-speed="-0.1"></div>
        <div class="absolute top-1/3 right-1/4 w-4 h-4 bg-fas-primary/20 rounded-full" data-speed="0.15"></div>

        <div class="max-w-4xl mx-auto text-center relative">
            <span class="reveal inline-block text-fas-accent font-medium tracking-[0.25em] uppercase text-xs mb-6">Nuestra razón de ser</span>
            <h1 class="reveal reveal-delay-1 font-display text-5xl md:text-6xl lg:text-7xl text-gray-800 mb-8 leading-[1.15]">
                Quiénes Somos</h1>
            <p class="reveal reveal-delay-2 text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed font-light">
                <?php echo esc_html($resumen); ?>
            </p>
        </div>
    </section>

    <!-- HISTORIA -->
    <section class="py-32 px-6 bg-fas-cream relative overflow-hidden">
        <div class="gradient-mesh-cream"></div>
        <div class="absolute top-20 left-10 w-24 h-24 text-fas-primary/10" data-speed="0.1">
            <svg viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
            </svg>
        </div>
        <div class="absolute bottom-20 right-10 w-20 h-20 border-[10px] border-fas-accent/10 rounded-full" data-speed="-0.1"></div>

        <div class="max-w-6xl mx-auto relative">
            <div class="grid md:grid-cols-2 gap-16 items-center">
                <div class="reveal">
                    <span class="inline-block text-fas-accent font-medium tracking-[0.2em] uppercase text-xs mb-4">Nuestra historia</span>
                    <div class="w-16 h-px bg-gradient-to-r from-fas-accent to-fas-accent-warm mb-6"></div>
                    <h2 class="font-display text-4xl md:text-5xl text-gray-800 mb-6">Nacimos con una misión</h2>
                    <div class="space-y-4 text-gray-600 leading-relaxed font-light entry-content">
                        <?php the_content(); ?>
                    </div>
                </div>
                <div class="reveal reveal-delay-2 relative">
                    <div class="aspect-[4/3] rounded-[3rem] overflow-hidden shadow-2xl">
                        <img src="<?php echo esc_url($primary_image); ?>" alt="Niños en comunidad" class="w-full h-full object-cover" loading="lazy">
                    </div>
                    <div class="absolute -bottom-6 -left-6 w-24 h-24 bg-fas-accent rounded-3xl flex items-center justify-center shadow-xl">
                        <i class="fas fa-heart text-white text-2xl"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MISIÓN Y VISIÓN -->
    <section class="py-32 px-6 bg-white relative overflow-hidden">
        <div class="gradient-mesh"></div>
        <div class="absolute inset-0 opacity-30"
            style="background-image: radial-gradient(circle, #059ba3 1px, transparent 1px); background-size: 20px 20px;">
        </div>
        <div class="absolute top-10 left-1/4 w-16 h-16 bg-fas-primary/10 rounded-full" data-speed="0.1"></div>
        <div class="absolute bottom-10 right-1/4 w-20 h-20 bg-fas-accent/10 rounded-full" data-speed="-0.1"></div>

        <div class="max-w-6xl mx-auto relative">
            <div class="text-center mb-16">
                <span class="reveal reveal-delay-4 inline-block text-fas-accent font-medium tracking-[0.2em] uppercase text-xs mb-4">Nuestra esencia</span>
                <div class="reveal reveal-delay-5 w-16 h-px bg-gradient-to-r from-fas-accent to-fas-accent-warm mx-auto mb-6"></div>
                <h2 class="reveal reveal-delay-6 font-display text-4xl md:text-5xl text-gray-800">Misión y Visión</h2>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <div class="reveal reveal-delay-7 bg-fas-cream rounded-[3rem] p-10 text-center card-organic">
                    <div class="w-16 h-16 bg-fas-primary/10 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-bullseye text-fas-primary text-2xl"></i>
                    </div>
                    <h3 class="font-display text-2xl text-gray-800 mb-4">Misión</h3>
                    <p class="text-gray-600 leading-relaxed font-light"><?php echo esc_html($mision); ?></p>
                </div>
                <div class="reveal reveal-delay-8 bg-fas-cream rounded-[3rem] p-10 text-center card-organic">
                    <div class="w-16 h-16 bg-fas-accent/10 rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-eye text-fas-accent text-2xl"></i>
                    </div>
                    <h3 class="font-display text-2xl text-gray-800 mb-4">Visión</h3>
                    <p class="text-gray-600 leading-relaxed font-light"><?php echo esc_html($vision); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Valores -->
    <section class="py-32 px-6 bg-fas-cream relative overflow-hidden">
        <div class="gradient-mesh-cream"></div>
        <div class="max-w-6xl mx-auto relative">
            <div class="text-center mb-16">
                <span class="reveal inline-block text-fas-accent font-medium tracking-[0.25em] uppercase text-xs mb-4">Nuestros valores</span>
                <div class="reveal reveal-delay-1 w-16 h-px bg-gradient-to-r from-fas-accent to-fas-accent-warm mx-auto mb-6"></div>
                <h2 class="reveal reveal-delay-2 font-display text-4xl md:text-5xl text-gray-800">Lo que nos define</h2>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="reveal reveal-delay-3 bg-white rounded-[2.5rem] p-8 text-center shadow-lg">
                    <div class="w-14 h-14 bg-fas-primary/10 rounded-2xl flex items-center justify-center mx-auto mb-5">
                        <i class="fas fa-heart text-fas-primary text-xl"></i>
                    </div>
                    <h3 class="font-display text-xl text-gray-800 mb-3">Compromiso</h3>
                    <p class="text-gray-500 font-light text-sm"><?php echo esc_html($compromiso); ?></p>
                </div>
                <div class="reveal reveal-delay-4 bg-white rounded-[2.5rem] p-8 text-center shadow-lg">
                    <div class="w-14 h-14 bg-fas-accent/10 rounded-2xl flex items-center justify-center mx-auto mb-5">
                        <i class="fas fa-users text-fas-accent text-xl"></i>
                    </div>
                    <h3 class="font-display text-xl text-gray-800 mb-3">Trabajo en equipo</h3>
                    <p class="text-gray-500 font-light text-sm"><?php echo esc_html($trabajo_equipo); ?></p>
                </div>
                <div class="reveal reveal-delay-5 bg-white rounded-[2.5rem] p-8 text-center shadow-lg">
                    <div class="w-14 h-14 bg-fas-leaf/10 rounded-2xl flex items-center justify-center mx-auto mb-5">
                        <i class="fas fa-seedling text-fas-leaf text-xl"></i>
                    </div>
                    <h3 class="font-display text-xl text-gray-800 mb-3">Sostenibilidad</h3>
                    <p class="text-gray-500 font-light text-sm"><?php echo esc_html($sostenibilidad); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-32 px-6 bg-white relative overflow-hidden">
        <div class="gradient-mesh"></div>
        <div class="absolute inset-0 opacity-30"
            style="background-image: radial-gradient(circle, #059ba3 1px, transparent 1px); background-size: 20px 20px;">
        </div>
        <div class="max-w-4xl mx-auto text-center relative">
            <h2 class="reveal font-display text-4xl md:text-5xl text-gray-800 mb-6">¿Quieres ser parte de esta misión?</h2>
            <p class="reveal reveal-delay-1 text-gray-600 text-lg font-light mb-8">Cada apoyo cuenta para seguir transformando vidas.</p>
<?php 
            $unete_url = get_field('unete_link') ?: get_permalink(get_page_by_path('apoyanos'));
            ?>
            <a href="<?php echo esc_url($unete_url); ?>" class="reveal reveal-delay-2 btn-fas px-9 py-4 bg-fas-primary text-white rounded-full font-medium">Únete a nuestra causa</a>
        </div>
    </section>
</main>

<?php get_footer(); ?>
