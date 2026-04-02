<?php
/**
 * Template Name: Página de Equipo
 */

get_header();
?>

<main class="pt-20">
    <!-- Hero Section -->
    <section class="relative py-32 px-6 bg-fas-primary overflow-hidden min-h-[60vh] flex items-center">
        <!-- Decorativos -->
        <div class="absolute inset-0 pointer-events-none overflow-hidden">
            <div class="absolute top-1/4 -left-10 w-64 h-64 border-[30px] border-white/10 rounded-full" data-speed="0.1"></div>
            <div class="absolute bottom-1/4 right-10 w-48 h-48 border-[20px] border-fas-accent/20 rounded-full" data-speed="-0.1"></div>
            <div class="absolute inset-0 opacity-[0.05] pattern-dots text-white"></div>
        </div>
        
        <div class="max-w-4xl mx-auto text-center relative z-10">
            <span class="reveal inline-block text-fas-accent font-medium tracking-[0.25em] uppercase text-xs mb-6">Conócenos</span>
            <h1 class="reveal reveal-delay-1 font-display text-5xl md:text-6xl lg:text-7xl text-white mb-6 leading-[1.15]">Nuestro Equipo</h1>
            <p class="reveal reveal-delay-2 text-white/90 text-lg max-w-2xl mx-auto leading-relaxed font-light italic">
                "Detrás de cada sonrisa hay un equipo comprometido con transformar vidas. Conoce a las personas que hacen posible esta labor."
            </p>
        </div>
    </section>

    <!-- Team Grid -->
    <section class="py-32 px-6 bg-white relative overflow-hidden">
        <div class="gradient-mesh"></div>
        <div class="max-w-7xl mx-auto relative">
            <div class="text-center mb-16">
                <span class="reveal inline-block text-fas-accent font-medium tracking-[0.25em] uppercase text-xs mb-4">Nuestro equipo</span>
                <div class="reveal reveal-delay-1 w-16 h-px bg-gradient-to-r from-fas-accent to-fas-accent-warm mx-auto mb-6"></div>
                <h2 class="reveal reveal-delay-2 font-display text-4xl md:text-5xl text-gray-800">Personas que cambian vidas</h2>
            </div>

            <?php
            $miembros = new WP_Query([
                'post_type' => 'miembro',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC'
            ]);
            
            if ($miembros->have_posts()):
            ?>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php while ($miembros->have_posts()): $miembros->the_post(); 
                    $rol = get_field('miembro_rol');
                    $bio = get_field('miembro_bio');
                ?>
                <div class="reveal team-card group">
                    <div class="relative overflow-hidden rounded-[3rem] mb-6 aspect-[3/4] bg-white shadow-sm overflow-hidden border border-white/40">
                        <?php if (has_post_thumbnail()): ?>
                            <?php the_post_thumbnail('medium', ['class' => 'team-img w-full h-full object-cover']); ?>
                        <?php else: ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/personal/placeholder.jpg" alt="<?php the_title(); ?>" class="team-img w-full h-full object-cover">
                        <?php endif; ?>
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/60 via-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <?php if ($bio): ?>
                        <div class="absolute bottom-6 left-6 right-6 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                            <p class="text-white text-sm"><?php echo esc_html($bio); ?></p>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="text-center">
                        <h3 class="font-display text-xl text-gray-800 mb-1"><?php the_title(); ?></h3>
                        <?php if ($rol): ?>
                        <p class="text-fas-primary font-medium text-sm mb-2"><?php echo esc_html($rol); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
            <?php else: ?>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="reveal reveal-delay-3 team-card group">
                    <div class="relative overflow-hidden rounded-[3rem] mb-6 aspect-[3/4] bg-white shadow-sm border border-white/40">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/personal/1.jpeg" alt="Director Ejecutivo" class="team-img w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/60 via-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>
                    <div class="text-center">
                        <h3 class="font-display text-xl text-gray-800 mb-1">Carlos Mendoza</h3>
                        <p class="text-fas-primary font-medium text-sm mb-2">Director Ejecutivo</p>
                    </div>
                </div>

                <div class="reveal reveal-delay-4 team-card group">
                    <div class="relative overflow-hidden rounded-[3rem] mb-6 aspect-[3/4] bg-white shadow-sm border border-white/40">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/personal/2.jpeg" alt="Directora de Programas" class="team-img w-full h-full object-cover">
                    </div>
                    <div class="text-center">
                        <h3 class="font-display text-xl text-gray-800 mb-1">María Elena García</h3>
                        <p class="text-fas-primary font-medium text-sm mb-2">Directora de Programas</p>
                    </div>
                </div>

                <div class="reveal reveal-delay-5 team-card group">
                    <div class="relative overflow-hidden rounded-[3rem] mb-6 aspect-[3/4] bg-white shadow-sm border border-white/40">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/personal/3.jpeg" alt="Coordinador de Comunidades" class="team-img w-full h-full object-cover">
                    </div>
                    <div class="text-center">
                        <h3 class="font-display text-xl text-gray-800 mb-1">Roberto Tito</h3>
                        <p class="text-fas-primary font-medium text-sm mb-2">Coordinador de Comunidades</p>
                    </div>
                </div>

                <div class="reveal reveal-delay-6 team-card group">
                    <div class="relative overflow-hidden rounded-[3rem] mb-6 aspect-[3/4] bg-white shadow-sm border border-white/40">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/personal/4.jpeg" alt="Responsable de Salud" class="team-img w-full h-full object-cover">
                    </div>
                    <div class="text-center">
                        <h3 class="font-display text-xl text-gray-800 mb-1">Dra. Ana López</h3>
                        <p class="text-fas-primary font-medium text-sm mb-2">Responsable de Salud</p>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- JOIN CTA -->
    <section class="py-32 px-6 bg-fas-cream relative overflow-hidden">
        <div class="gradient-mesh-cream"></div>
        <div class="max-w-4xl mx-auto text-center relative">
            <h2 class="reveal font-display text-4xl md:text-5xl text-gray-800 mb-6">¿Quieres sumarte al equipo?</h2>
            <p class="reveal reveal-delay-1 text-gray-600 text-lg font-light mb-8">Siempre estamos buscando personas comprometidas con nuestra misión.</p>
            <a href="<?php echo get_permalink(get_page_by_path('contacto')); ?>" class="reveal reveal-delay-2 btn-fas px-9 py-4 bg-fas-primary text-white rounded-full font-medium">Contáctanos</a>
        </div>
    </section>
</main>

<?php get_footer(); ?>
