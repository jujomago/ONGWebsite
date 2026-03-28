<?php
/**
 * Template Name: Página de Alimentación
 */

get_header();
?>

<main class="pt-20">
    <!-- HERO SECTION -->
    <section class="relative min-h-[70vh] flex items-center overflow-hidden bg-gradient-to-br from-fas-primary via-fas-primary-dark to-[#047a80]">
        <div class="absolute inset-0 pointer-events-none overflow-hidden">
            <div class="absolute top-1/4 -left-10 w-64 h-64 border-[30px] border-white/10 rounded-full" data-speed="0.1"></div>
            <div class="absolute bottom-1/4 right-10 w-48 h-48 border-[20px] border-fas-accent/15 rounded-full" data-speed="-0.1"></div>
        </div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-8 py-32 w-full">
            <div class="max-w-3xl">
                <div class="reveal inline-flex items-center gap-4 mb-6">
                    <span class="w-16 h-px bg-fas-accent"></span>
                    <span class="text-fas-accent font-medium tracking-[0.2em] uppercase text-xs">Programa</span>
                </div>
                <h1 class="reveal reveal-delay-1 font-display text-5xl md:text-6xl lg:text-7xl text-white mb-6 leading-[1.15]">
                    Alimentación <span class="italic text-fas-accent">nutritiva</span> para todos
                </h1>
                <p class="reveal reveal-delay-2 text-xl text-white/80 mb-10 max-w-xl font-light leading-relaxed">
                    Creemos que una buena alimentación es la base para el desarrollo integral de cada niño y su familia.
                </p>
                <div class="reveal reveal-delay-3 flex flex-wrap gap-4">
                    <a href="#como-ayudamos" class="btn-fas px-9 py-4 bg-white text-fas-primary rounded-full font-medium shadow-xl">Cómo funcionamos</a>
                    <a href="<?php echo get_permalink(get_page_by_path('contacto')); ?>" class="px-9 py-4 border border-white/30 text-white rounded-full font-medium hover:bg-white/10 transition-colors">Contáctanos</a>
                </div>
            </div>
        </div>
    </section>

    <!-- STATS -->
    <section class="py-10 bg-white border-b border-fas-sand/50">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div>
                    <span class="block font-display text-4xl text-fas-primary mb-2">1000+</span>
                    <span class="text-gray-500 font-light">Familias beneficiadas</span>
                </div>
                <div>
                    <span class="block font-display text-4xl text-fas-primary mb-2">500+</span>
                    <span class="text-gray-500 font-light">Niños alimentados</span>
                </div>
                <div>
                    <span class="block font-display text-4xl text-fas-primary mb-2">4</span>
                    <span class="text-gray-500 font-light">Comunidades</span>
                </div>
                <div>
                    <span class="block font-display text-4xl text-fas-primary mb-2">5+</span>
                    <span class="text-gray-500 font-light">Años de trabajo</span>
                </div>
            </div>
        </div>
    </section>

    <!-- QUÉ HACEMOS -->
    <section id="como-ayudamos" class="py-32 px-6 bg-fas-cream relative overflow-hidden">
        <div class="gradient-mesh"></div>
        <div class="max-w-7xl mx-auto relative">
            <div class="text-center mb-20">
                <span class="reveal inline-block text-fas-accent font-medium tracking-[0.2em] uppercase text-xs mb-4">Nuestro enfoque</span>
                <div class="reveal reveal-delay-1 w-16 h-px bg-gradient-to-r from-fas-accent to-fas-accent-warm mx-auto mb-6"></div>
                <h2 class="reveal reveal-delay-2 font-display text-4xl md:text-5xl lg:text-6xl text-gray-800 mb-6">Qué hacemos</h2>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="reveal reveal-delay-3 bg-white rounded-[2.5rem] p-8 lg:p-10 shadow-lg hover:shadow-2xl transition-all card-organic">
                    <div class="w-16 h-16 bg-fas-primary/10 rounded-2xl flex items-center justify-center mb-6">
                        <i class="fas fa-utensils text-3xl text-fas-primary"></i>
                    </div>
                    <h3 class="font-display text-2xl text-gray-800 mb-4">Comedores escolares</h3>
                    <p class="text-gray-500 font-light leading-relaxed">Brindamos alimentación nutritiva a niños en edad escolar para que puedan aprender sin hambre.</p>
                </div>
                <div class="reveal reveal-delay-4 bg-white rounded-[2.5rem] p-8 lg:p-10 shadow-lg hover:shadow-2xl transition-all card-organic">
                    <div class="w-16 h-16 bg-fas-accent/10 rounded-2xl flex items-center justify-center mb-6">
                        <i class="fas fa-shopping-basket text-3xl text-fas-accent"></i>
                    </div>
                    <h3 class="font-display text-2xl text-gray-800 mb-4">Canastas familiares</h3>
                    <p class="text-gray-500 font-light leading-relaxed">Entregamos alimentos básicos a familias en situación de vulnerabilidad extrema.</p>
                </div>
                <div class="reveal reveal-delay-5 bg-white rounded-[2.5rem] p-8 lg:p-10 shadow-lg hover:shadow-2xl transition-all card-organic">
                    <div class="w-16 h-16 bg-fas-leaf/10 rounded-2xl flex items-center justify-center mb-6">
                        <i class="fas fa-seedling text-3xl text-fas-leaf"></i>
                    </div>
                    <h3 class="font-display text-2xl text-gray-800 mb-4">Huertos comunitarios</h3>
                    <p class="text-gray-500 font-light leading-relaxed">Capacitamos a comunidades para cultivar sus propios alimentos de forma sostenible.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- PROYECTOS RELACIONADOS -->
    <?php
    $proyectos = new WP_Query([
        'post_type' => 'proyecto',
        'posts_per_page' => 3,
        'tax_query' => [[
            'taxonomy' => 'tipo_programa',
            'field' => 'slug',
            'terms' => ['alimentacion']
        ]]
    ]);
    
    if ($proyectos->have_posts()): ?>
    <section class="py-32 px-6 bg-white relative overflow-hidden">
        <div class="gradient-mesh"></div>
        <div class="max-w-6xl mx-auto relative">
            <div class="text-center mb-16">
                <span class="reveal inline-block text-fas-accent font-medium tracking-[0.2em] uppercase text-xs mb-4">Proyectos</span>
                <div class="reveal reveal-delay-1 w-16 h-px bg-gradient-to-r from-fas-accent to-fas-accent-warm mx-auto mb-6"></div>
                <h2 class="reveal reveal-delay-2 font-display text-4xl md:text-5xl text-gray-800 mb-6">Proyectos de Alimentación</h2>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <?php while ($proyectos->have_posts()): $proyectos->the_post(); ?>
                <a href="<?php the_permalink(); ?>" class="reveal reveal-delay-3 bg-fas-cream rounded-[2.5rem] overflow-hidden shadow-lg hover:shadow-xl transition-all group">
                    <?php if (has_post_thumbnail()): ?>
                    <div class="aspect-video overflow-hidden">
                        <?php the_post_thumbnail('fas-card', ['class' => 'w-full h-full object-cover group-hover:scale-110 transition-transform duration-500']); ?>
                    </div>
                    <?php endif; ?>
                    <div class="p-6">
                        <h3 class="font-display text-xl text-gray-800 mb-2"><?php the_title(); ?></h3>
                        <p class="text-gray-500 text-sm font-light"><?php the_excerpt(); ?></p>
                    </div>
                </a>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- CTA -->
    <section class="py-32 px-6 bg-gradient-to-br from-fas-primary to-fas-primary-dark relative overflow-hidden">
        <div class="max-w-4xl mx-auto text-center relative">
            <h2 class="reveal font-display text-4xl md:text-5xl text-white mb-6">¿Quieres apoyar este programa?</h2>
            <p class="reveal reveal-delay-1 text-white/80 text-lg font-light mb-8">Tu apoyo nos ayuda a llegar a más familias.</p>
            <a href="<?php echo get_permalink(get_page_by_path('apoyanos')); ?>" class="reveal reveal-delay-2 btn-fas px-9 py-4 bg-white text-fas-primary rounded-full font-medium shadow-xl">Donar ahora</a>
        </div>
    </section>
</main>

<?php get_footer(); ?>
