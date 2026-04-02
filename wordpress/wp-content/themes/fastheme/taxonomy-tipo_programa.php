<?php
/**
 * Taxonomy Template: Tipo de Programa
 * Maneja la visualización de proyectos filtrados por un tipo de programa específico.
 */

get_header();

$current_term = get_queried_object();
$term_name    = $current_term->name;
$term_slug    = $current_term->slug;
$term_desc    = get_field('descripcion', $current_term) ?: $current_term->description;
$icono        = get_field('icono_element', $current_term) ?: 'fas fa-heart';

// Configuración visual dinámica según el programa
$color_class = 'fas-primary';
$gradient_class = 'from-fas-primary via-fas-primary-dark to-[#047a80]';

if ($term_slug === 'salud') {
    $color_class = 'fas-leaf';
    $gradient_class = 'from-fas-leaf via-[#5a8a69] to-[#4a7a59]';
} elseif ($term_slug === 'educacion') {
    $color_class = 'fas-accent';
    $gradient_class = 'from-fas-accent via-fas-accent-warm to-orange-600';
} elseif ($term_slug === 'emprendimiento') {
    $color_class = 'orange-500';
    $gradient_class = 'from-orange-500 via-orange-600 to-orange-700';
}
?>

<main class="pt-20">
    <!-- HERO SECTION -->
    <section class="relative min-h-[60vh] flex items-center overflow-hidden bg-gradient-to-br <?php echo $gradient_class; ?>">
        <div class="absolute inset-0 pointer-events-none overflow-hidden">
            <div class="absolute top-1/4 -left-10 w-64 h-64 border-[30px] border-white/10 rounded-full opacity-20"></div>
            <div class="absolute bottom-1/4 right-10 w-48 h-48 border-[20px] border-white/5 rounded-full opacity-10"></div>
            <div class="absolute top-10 right-1/4 w-32 h-32 bg-white/10 rounded-full blur-3xl"></div>
        </div>
        
        <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-8 py-32 w-full">
            <div class="max-w-3xl">
                <div class="reveal inline-flex items-center gap-4 mb-6">
                    <span class="w-16 h-px bg-fas-accent"></span>
                    <span class="text-fas-accent font-medium tracking-[0.2em] uppercase text-xs">Programas de Impacto</span>
                </div>
                <h1 class="reveal reveal-delay-1 font-display text-5xl md:text-6xl lg:text-7xl text-white mb-6 leading-[1.15]">
                    <?php echo esc_html($term_name); ?> <span class="italic text-fas-accent">con propósito</span>
                </h1>
                <p class="reveal reveal-delay-2 text-xl text-white/80 mb-10 max-w-xl font-light leading-relaxed">
                    <?php echo esc_html($term_desc); ?>
                </p>
                <div class="reveal reveal-delay-3 flex flex-wrap gap-4">
                    <a href="#proyectos-list" class="btn-fas px-9 py-4 bg-white text-gray-800 rounded-full font-medium shadow-xl hover:scale-105 transition-transform">Conocer Proyectos</a>
                    <a href="<?php echo get_permalink(get_page_by_path('apoyanos')); ?>" class="px-9 py-4 border border-white/30 text-white rounded-full font-medium hover:bg-white/10 transition-colors">¿Cómo puedo ayudar?</a>
                </div>
            </div>
        </div>
    </section>

    <!-- LISTADO DE PROYECTOS -->
    <section id="proyectos-list" class="py-32 px-6 bg-fas-cream relative overflow-hidden">
        <div class="gradient-mesh-cream"></div>
        <div class="max-w-7xl mx-auto relative">
            <div class="text-center mb-20">
                <div class="reveal w-24 h-24 bg-white rounded-[2rem] flex items-center justify-center mx-auto mb-8 shadow-xl text-<?php echo $color_class; ?> border border-fas-sand/30">
                    <i class="<?php echo esc_attr($icono); ?> text-4xl"></i>
                </div>
                <h2 class="reveal reveal-delay-1 font-display text-4xl md:text-5xl text-gray-800 mb-6">Proyectos en Curso</h2>
                <div class="reveal reveal-delay-2 w-16 h-px bg-gradient-to-r from-fas-accent to-fas-accent-warm mx-auto mb-6"></div>
                <p class="reveal reveal-delay-3 text-gray-500 font-light max-w-xl mx-auto">Impulsamos iniciativas concretas bajo el pilar de <strong><?php echo esc_html($term_name); ?></strong> para generar cambios sostenibles.</p>
            </div>

            <?php if (have_posts()) : ?>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
                    <?php 
                    $count = 0;
                    while (have_posts()) : the_post(); 
                    $count++;
                    $delay = ($count % 3) + 3;
                    ?>
                    <article class="reveal reveal-delay-<?php echo $delay; ?> group h-full flex flex-col bg-white rounded-[2.5rem] overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 card-organic">
                        <div class="relative aspect-[4/3] overflow-hidden">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('fas-card', ['class' => 'w-full h-full object-cover group-hover:scale-110 transition-transform duration-700']); ?>
                            <?php else : ?>
                                <div class="w-full h-full bg-fas-sand/30 flex items-center justify-center text-fas-primary/20">
                                    <i class="fas fa-heart text-5xl"></i>
                                </div>
                            <?php endif; ?>
                            <div class="absolute top-4 left-4">
                                <span class="px-4 py-1.5 bg-white/90 backdrop-blur-md rounded-full text-[10px] font-bold text-fas-primary uppercase tracking-widest shadow-sm border border-white/50">
                                    <?php echo esc_html($term_name); ?>
                                </span>
                            </div>
                        </div>
                        
                        <div class="p-8 flex-grow flex flex-col">
                            <h3 class="font-display text-2xl text-gray-800 mb-4 group-hover:text-fas-primary transition-colors duration-300">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>
                            <div class="text-gray-500 font-light leading-relaxed mb-8 flex-grow line-clamp-3">
                                <?php echo get_the_excerpt() ?: wp_trim_words(get_the_content(), 22); ?>
                            </div>
                            <div class="pt-6 border-t border-gray-100 mt-auto">
                                <a href="<?php the_permalink(); ?>" class="inline-flex items-center gap-3 text-fas-primary font-bold tracking-widest uppercase text-[10px] group/link">
                                    Explorar proyecto
                                    <span class="w-8 h-8 rounded-full bg-fas-primary/5 flex items-center justify-center group-hover/link:bg-fas-primary group-hover/link:text-white transition-all duration-300">
                                        <i class="fas fa-arrow-right text-[10px]"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </article>
                    <?php endwhile; ?>
                </div>

                <!-- PAGINACIÓN -->
                <div class="">
                    <?php 
                    the_posts_pagination([
                        'mid_size'  => 2,
                        'prev_text' => '<i class="fas fa-arrow-left"></i>',
                        'next_text' => '<i class="fas fa-arrow-right"></i>',
                    ]); 
                    ?>
                </div>

            <?php else : ?>
                <div class="text-center py-20 bg-white rounded-[3rem] shadow-sm border border-fas-sand/20">
                    <div class="w-20 h-20 bg-fas-sand/30 rounded-full flex items-center justify-center mx-auto mb-6 text-fas-primary/40">
                        <i class="fas fa-folder-open text-3xl"></i>
                    </div>
                    <h2 class="font-display text-3xl text-gray-800 mb-4">No hay proyectos todavía</h2>
                    <p class="text-gray-500 font-light max-w-md mx-auto">Estamos trabajando en nuevas iniciativas para este programa. ¡Vuelve pronto!</p>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- CALL TO ACTION FINAL -->
    <section class="py-32 px-6 bg-white overflow-hidden relative text-center">
        <div class="gradient-mesh"></div>
        <div class="absolute inset-0 opacity-30"
            style="background-image: radial-gradient(circle, #059ba3 1px, transparent 1px); background-size: 20px 20px;">
        </div>
        
        <div class="max-w-4xl mx-auto relative">
            <h2 class="reveal font-display text-4xl md:text-5xl lg:text-6xl text-gray-800 mb-8 leading-tight">Tu mano amiga <br>puede cambiar <span class="text-fas-accent">vidas</span></h2>
            <p class="reveal reveal-delay-1 text-gray-600 text-xl font-light mb-12 max-w-2xl mx-auto leading-relaxed">
                Cada donación e iniciativa nos permite llevar el programa de <strong><?php echo esc_html($term_name); ?></strong> a más comunidades que lo necesitan.
            </p>
            <div class="reveal reveal-delay-2 flex flex-wrap justify-center gap-6">
                <a href="<?php echo get_permalink(get_page_by_path('apoyanos')); ?>" class="btn-fas px-10 py-5 bg-fas-primary text-white rounded-full font-bold shadow-xl hover:scale-105 transition-transform">Deseo Colaborar</a>
                <a href="<?php echo get_permalink(get_page_by_path('contacto')); ?>" class="px-10 py-5 border-2 border-fas-primary text-fas-primary rounded-full font-bold hover:bg-fas-primary hover:text-white transition-all">Más Información</a>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
