<?php
/**
 * Archive Template: Proyectos
 * Un listado limpio y funcional de los proyectos de FAS.
 */

get_header(); ?>

<main class="bg-fas-cream min-h-screen pt-32 pb-32 relative">
    <!-- Fondo sutil con puntos -->
    <div class="absolute inset-0 opacity-[0.03] pointer-events-none pattern-dots"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <!-- HEADER SIMPLE -->
        <header class="mb-20">
            <nav class="reveal flex items-center gap-2 text-fas-primary/40 mb-8 text-[10px] uppercase tracking-[0.3em] font-bold">
                <a href="<?php echo home_url(); ?>" class="hover:text-fas-primary transition-all">Inicio</a>
                <i class="fas fa-chevron-right text-[7px] opacity-30"></i>
                <span class="text-gray-400 font-medium">Todos los Proyectos</span>
            </nav>
            
            <h1 class="reveal reveal-delay-1 font-display text-5xl md:text-6xl text-gray-800 leading-none">
                Nuestros Proyectos <span class="text-fas-primary italic">Sociales</span>
            </h1>
        </header>

        <?php if (have_posts()) : ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 lg:gap-12">
                <?php 
                while (have_posts()) : the_post(); 
                    // Obtener la taxonomía asociada
                    $tipo_programa = get_the_terms(get_the_ID(), 'tipo_programa');
                    $term = !empty($tipo_programa) ? $tipo_programa[0] : null;
                    $term_name = $term ? $term->name : 'Proyecto';

                    // Lógica de colores dinámicos para Badges
                    $badge_class = 'bg-fas-primary/10 text-fas-primary'; // Default
                    if ($term) {
                        switch ($term->slug) {
                            case 'salud':
                                $badge_class = 'bg-fas-primary text-white';
                                break;
                            case 'alimentacion':
                                $badge_class = 'bg-[#f7ab16] text-white';
                                break;
                            case 'educacion':
                                $badge_class = 'bg-[#6b9b7a] text-white';
                                break;
                            case 'emprendimiento':
                                $badge_class = 'bg-[#bb4a2f] text-white';
                                break;
                        }
                    }
                ?>
                    <article class="reveal group bg-white rounded-[2.5rem] overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 border border-fas-sand/30 flex flex-col h-full hover:-translate-y-2" style="transform: translateZ(0);">
                        <!-- Imagen con Badge -->
                        <div class="relative overflow-hidden aspect-[4/3] rounded-t-[2.5rem] isolation-auto">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>" class="block h-full overflow-hidden rounded-t-[2.5rem]">
                                    <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105 rounded-t-[2.5rem]']); ?>
                                </a>
                            <?php else : ?>
                                <div class="w-full h-full bg-fas-cream flex items-center justify-center">
                                    <i class="fas fa-image text-4xl text-fas-sand"></i>
                                </div>
                            <?php endif; ?>

                            <!-- Badge sobre la imagen -->
                            <?php if ($term) : ?>
                                <div class="absolute top-6 left-6 z-20">
                                    <span class="inline-block px-4 py-1.5 rounded-full backdrop-blur-md <?php echo $badge_class; ?> text-[10px] font-bold uppercase tracking-widest shadow-md">
                                        <?php echo esc_html($term_name); ?>
                                    </span>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Contenido -->
                        <div class="p-8 md:p-10 flex flex-col flex-grow">
                            <h2 class="font-display text-2xl md:text-3xl text-gray-800 mb-6 group-hover:text-fas-primary transition-colors">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            
                            <div class="text-gray-500 font-light text-sm line-clamp-3 mb-10 overflow-hidden leading-relaxed">
                                <?php echo get_the_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), 20); ?>
                            </div>

                            <div class="mt-auto pt-6 border-t border-fas-sand/40 flex justify-between items-center">
                                <a href="<?php the_permalink(); ?>" class="text-[11px] uppercase tracking-widest font-bold text-gray-800 flex items-center gap-2 group-hover:gap-4 transition-all">
                                    Ver Proyecto <i class="fas fa-arrow-right text-fas-accent"></i>
                                </a>
                                
                                <div class="flex items-center gap-1.5">
                                    <div class="w-1 h-1 rounded-full bg-fas-accent"></div>
                                    <div class="w-1 h-1 rounded-full bg-fas-accent/40"></div>
                                    <div class="w-1 h-1 rounded-full bg-fas-accent/10"></div>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <!-- Paginación Simple -->
            <div class="mt-24 reveal">
                <?php
                the_posts_pagination([
                    'mid_size'  => 2,
                    'prev_text' => '<i class="fas fa-chevron-left"></i>',
                    'next_text' => '<i class="fas fa-chevron-right"></i>',
                    'class'     => 'pagination-wrapper'
                ]);
                ?>
            </div>

        <?php else : ?>
            <div class="text-center py-20 bg-white rounded-[3rem] border-2 border-dashed border-fas-sand/50">
                <i class="fas fa-folder-open text-fas-sand text-5xl mb-6"></i>
                <p class="text-gray-500 font-light italic">No se encontraron proyectos publicados actualmente.</p>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
