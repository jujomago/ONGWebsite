<?php
/**
 * Template Name: Página de Comunidades
 */

get_header();
?>

<main class="pt-20">
    <!-- HERO SECTION -->
    <section class="relative min-h-[70vh] flex items-center overflow-hidden bg-fas-dark">
        <div class="absolute inset-0 pointer-events-none overflow-hidden">
            <div class="absolute top-1/4 -left-10 w-64 h-64 border-[30px] border-fas-primary/10 rounded-full" data-speed="0.1"></div>
            <div class="absolute bottom-1/4 right-10 w-48 h-48 border-[20px] border-fas-accent/15 rounded-full" data-speed="-0.1"></div>
        </div>
        
        <div class="absolute inset-0 bg-gradient-to-br from-fas-dark via-fas-dark/95 to-fas-primary-dark/30"></div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-8 py-32 w-full">
            <div class="max-w-3xl">
                <div class="reveal inline-flex items-center gap-4 mb-6">
                    <span class="w-16 h-px bg-fas-accent"></span>
                    <span class="text-fas-accent font-medium tracking-[0.2em] uppercase text-xs">Nuestro impacto</span>
                </div>
                <h1 class="reveal reveal-delay-1 font-display text-5xl md:text-6xl lg:text-7xl text-white mb-6 leading-[1.15]">
                    Comunidades que <span class="italic text-fas-accent">transformamos</span> juntos
                </h1>
                <p class="reveal reveal-delay-2 text-xl text-white/80 mb-10 max-w-xl font-light leading-relaxed">
                    Trabajamos en las comunidades Guaraníes de Cochabamba, Bolivia, donde cada familia tiene una historia de resiliencia y esperanza.
                </p>
            </div>
        </div>
    </section>

    <!-- STATS BAR -->
    <section class="py-12 bg-white border-b border-fas-sand/50">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div>
                    <span class="block font-display text-4xl text-fas-primary mb-2">4</span>
                    <span class="text-gray-500 font-light">Comunidades</span>
                </div>
                <div>
                    <span class="block font-display text-4xl text-fas-primary mb-2">1000+</span>
                    <span class="text-gray-500 font-light">Familias</span>
                </div>
                <div>
                    <span class="block font-display text-4xl text-fas-primary mb-2">500+</span>
                    <span class="text-gray-500 font-light">Niños</span>
                </div>
                <div>
                    <span class="block font-display text-4xl text-fas-primary mb-2">5+</span>
                    <span class="text-gray-500 font-light">Años de trabajo</span>
                </div>
            </div>
        </div>
    </section>

    <!-- COMMUNITIES GRID -->
    <section id="comunidades" class="py-32 px-6 bg-fas-cream relative overflow-hidden">
        <div class="gradient-mesh"></div>
        <div class="max-w-7xl mx-auto relative">
            <div class="text-center mb-16">
                <span class="reveal inline-block text-fas-accent font-medium tracking-[0.25em] uppercase text-xs mb-4">Dónde trabajamos</span>
                <div class="reveal reveal-delay-1 w-16 h-px bg-gradient-to-r from-fas-accent to-fas-accent-warm mx-auto mb-6"></div>
                <h2 class="reveal reveal-delay-2 font-display text-4xl md:text-5xl text-gray-800 mb-6">Nuestras Comunidades</h2>
            </div>

            <?php
            $comunidades = new WP_Query([
                'post_type' => 'comunidad',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC'
            ]);
            
            if ($comunidades->have_posts()):
            ?>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php while ($comunidades->have_posts()): $comunidades->the_post(); 
                    $descripcion = get_field('comunidad_descripcion');
                ?>
                <a href="<?php the_permalink(); ?>" class="reveal community-card group block">
                    <div class="relative overflow-hidden rounded-[2.5rem] mb-6 aspect-[4/3]">
                        <?php if (has_post_thumbnail()): ?>
                            <?php the_post_thumbnail('medium', ['class' => 'community-img w-full h-full object-cover', 'loading' => 'lazy']); ?>
                        <?php else: ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/comunidad-placeholder.jpg" alt="<?php the_title(); ?>" class="community-img w-full h-full object-cover" loading="lazy">
                        <?php endif; ?>
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/70 via-gray-900/10 to-transparent"></div>
                        <div class="absolute bottom-6 left-6">
                            <span class="px-4 py-2 bg-fas-primary text-white text-sm rounded-full font-medium"><?php the_title(); ?></span>
                        </div>
                    </div>
                    <?php if ($descripcion): ?>
                    <p class="text-gray-500 leading-relaxed font-light"><?php echo esc_html($descripcion); ?></p>
                    <?php endif; ?>
                </a>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
            <?php else: ?>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <a href="/comunidades/tentayape" class="reveal reveal-delay-3 community-card group block">
                    <div class="relative overflow-hidden rounded-[2.5rem] mb-6 aspect-[4/3]">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/comunidadNinas.png" alt="Tentayape" class="community-img w-full h-full object-cover" loading="lazy">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/70 via-gray-900/10 to-transparent"></div>
                        <div class="absolute bottom-6 left-6">
                            <span class="px-4 py-2 bg-fas-primary text-white text-sm rounded-full font-medium">Tentayape</span>
                        </div>
                    </div>
                    <p class="text-gray-500 leading-relaxed font-light">Comunidad agrícola donde trabajamos programas de alimentación y educación.</p>
                </a>

                <a href="/comunidades/sotos" class="reveal reveal-delay-4 community-card group block">
                    <div class="relative overflow-hidden rounded-[2.5rem] mb-6 aspect-[4/3]">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/comunidadSenoras.png" alt="Sotos" class="community-img w-full h-full object-cover" loading="lazy">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/70 via-gray-900/10 to-transparent"></div>
                        <div class="absolute bottom-6 left-6">
                            <span class="px-4 py-2 bg-fas-accent text-white text-sm rounded-full font-medium">Sotos</span>
                        </div>
                    </div>
                    <p class="text-gray-500 leading-relaxed font-light">Pequeña comunidad donde hemos implementado huertos comunitarios.</p>
                </a>

                <a href="/comunidades/ytapembia" class="reveal reveal-delay-5 community-card group block">
                    <div class="relative overflow-hidden rounded-[2.5rem] mb-6 aspect-[4/3]">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/comunidadSenorasAncianas.png" alt="Ytapembia" class="community-img w-full h-full object-cover" loading="lazy">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/70 via-gray-900/10 to-transparent"></div>
                        <div class="absolute bottom-6 left-6">
                            <span class="px-4 py-2 bg-fas-primary-light text-white text-sm rounded-full font-medium">Ytapembia</span>
                        </div>
                    </div>
                    <p class="text-gray-500 leading-relaxed font-light">Comunidad donde enfocamos nuestro trabajo en emprendimiento femenino.</p>
                </a>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- CTA SECTION -->
    <section class="py-32 px-6 bg-white relative overflow-hidden">
        <div class="gradient-mesh"></div>
        <div class="max-w-4xl mx-auto text-center relative">
            <h2 class="reveal font-display text-4xl md:text-5xl text-gray-800 mb-6">¿Quieres visitar una comunidad?</h2>
            <p class="reveal reveal-delay-1 text-gray-600 text-lg font-light mb-8">Puedes ser parte de nuestras visitas institucionales y conocer de cerca el impacto de tu apoyo.</p>
            <a href="<?php echo get_permalink(get_page_by_path('contacto')); ?>" class="reveal reveal-delay-2 btn-fas px-9 py-4 bg-fas-primary text-white rounded-full font-medium shadow-xl">Contáctanos</a>
        </div>
    </section>
</main>

<?php get_footer(); ?>
