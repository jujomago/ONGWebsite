<?php
/**
 * Single Template: Proyecto (Modern Narrative Version)
 * Un diseño inmersivo y visual para los proyectos sociales de FAS.
 */

get_header();

while (have_posts()) : the_post();
    // Obtener la taxonomía asociada
    $tipo_programa = get_the_terms(get_the_ID(), 'tipo_programa');
    $term = !empty($tipo_programa) ? $tipo_programa[0] : null;
    $term_name = $term ? $term->name : 'Proyecto';
    $ubicacion = get_field('ubicacion');
    $beneficiarios = get_field('beneficiarios');
?>

<main class="bg-fas-cream min-h-screen relative">
    <!-- Capas de fondo decorativas -->
    <div class="gradient-mesh-cream"></div>
    <div class="absolute inset-0 pointer-events-none pattern-dots"></div>

    <!-- 1. HERO SECTION: Impacto Visual -->
    <section class="relative pt-32 pb-20 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <nav class="reveal flex items-center gap-2 text-fas-primary/40 mb-12 text-[10px] uppercase tracking-[0.3em] font-bold">
                <a href="<?php echo home_url(); ?>" class="hover:text-fas-primary transition-all">Inicio</a>
                <i class="fas fa-chevron-right text-[7px] opacity-30"></i>
                <?php if ($term): ?>
                    <a href="<?php echo get_term_link($term); ?>" class="hover:text-fas-primary transition-all"><?php echo esc_html($term_name); ?></a>
                    <i class="fas fa-chevron-right text-[7px] opacity-30"></i>
                <?php endif; ?>
                <span class="text-gray-400 font-medium truncate"><?php the_title(); ?></span>
            </nav>

            <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
                <div class="reveal">
                    <?php if ($term): ?>
                        <span class="inline-block px-4 py-1.5 rounded-full bg-fas-primary/10 text-fas-primary text-[11px] font-bold uppercase tracking-widest mb-6">
                            <?php echo esc_html($term_name); ?>
                        </span>
                    <?php endif; ?>
                    
                    <h1 class="font-display text-5xl md:text-7xl xl:text-8xl text-gray-800 leading-[0.95] mb-8">
                        <?php the_title(); ?>
                    </h1>
                    
                    <div class="w-20 h-1.5 bg-fas-accent rounded-full mb-8"></div>
                    
                    <p class="text-xl text-gray-500 font-light max-w-lg leading-relaxed italic">
                        "Transformando realidades a través del compromiso y la acción social directa."
                    </p>
                </div>

                <div class="reveal reveal-delay-2 relative group">
                    <div class="absolute -inset-4 bg-fas-primary/5 rounded-[3rem] blur-2xl group-hover:bg-fas-primary/10 transition-colors duration-700"></div>
                    <?php if (has_post_thumbnail()): 
                        $full_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    ?>
                    <div class="relative rounded-[3rem] overflow-hidden shadow-2xl border-8 border-white group-hover:translate-y-[-10px] transition-transform duration-700" style="transform: translateZ(0);">
                        <a href="<?php echo esc_url($full_image_url); ?>" class="glightbox block relative overflow-hidden rounded-[2rem]">
                            <?php the_post_thumbnail('large', ['class' => 'w-full aspect-[4/5] object-cover rounded-[2.5rem] transform group-hover:scale-105 transition-transform duration-1000']); ?>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end justify-center pb-10">
                                <span class="text-white text-xs uppercase tracking-widest font-bold"><i class="fas fa-search-plus mr-2"></i> Ver Imagen</span>
                            </div>
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. DATA BAR: Bento Minimalista -->
    <section class="pb-24 relative z-20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Ubicación -->
                <div class="reveal reveal-delay-1 bg-white/60 backdrop-blur-md rounded-[2.5rem] p-8 border border-white/40 shadow-sm hover:shadow-md transition-all flex items-center gap-6 group">
                    <div class="w-14 h-14 rounded-2xl bg-fas-cream flex items-center justify-center text-fas-accent group-hover:bg-fas-accent group-hover:text-white transition-colors duration-500">
                        <i class="fas fa-location-dot text-xl"></i>
                    </div>
                    <div>
                        <span class="block text-[10px] uppercase tracking-widest text-gray-400 font-bold mb-1">Ubicación</span>
                        <span class="text-gray-800 font-medium text-lg leading-tight block"><?php echo $ubicacion ? esc_html($ubicacion) : 'Venezuela'; ?></span>
                    </div>
                </div>

                <!-- Impacto -->
                <div class="reveal reveal-delay-2 bg-white/60 backdrop-blur-md rounded-[2.5rem] p-8 border border-white/40 shadow-sm hover:shadow-md transition-all flex items-center gap-6 group">
                    <div class="w-14 h-14 rounded-2xl bg-fas-cream flex items-center justify-center text-fas-primary group-hover:bg-fas-primary group-hover:text-white transition-colors duration-500">
                        <i class="fas fa-heart text-xl"></i>
                    </div>
                    <div>
                        <span class="block text-[10px] uppercase tracking-widest text-gray-400 font-bold mb-1">Impacto Social</span>
                        <span class="text-gray-800 font-medium text-lg leading-tight block"><?php echo $beneficiarios ? esc_html($beneficiarios) : 'Comunidad local'; ?></span>
                    </div>
                </div>

                <!-- Compartir -->
                <div class="reveal reveal-delay-3 bg-white/60 backdrop-blur-md rounded-[2.5rem] p-8 border border-white/40 shadow-sm hover:shadow-md transition-all flex items-center justify-between group">
                    <div class="flex items-center gap-6">
                        <div class="w-14 h-14 rounded-2xl bg-fas-cream flex items-center justify-center text-gray-400 group-hover:bg-gray-800 group-hover:text-white transition-colors duration-500">
                            <i class="fas fa-share-nodes text-xl"></i>
                        </div>
                        <div>
                            <span class="block text-[10px] uppercase tracking-widest text-gray-400 font-bold mb-1">Proyecto</span>
                            <span class="text-gray-800 font-medium text-lg leading-tight block">Compartir</span>
                        </div>
                    </div>
                    <?php 
                        $share_url = urlencode(get_permalink());
                        $share_title = urlencode(get_the_title());
                    ?>
                    <div class="flex gap-2">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $share_url; ?>" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-full border border-gray-200 flex items-center justify-center text-gray-400 hover:bg-fas-primary hover:text-white transition-all shadow-sm" title="Compartir en Facebook">
                            <i class="fab fa-facebook-f text-xs"></i>
                        </a>
                        <a href="https://api.whatsapp.com/send?text=<?php echo $share_title . '%20' . $share_url; ?>" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-full border border-gray-200 flex items-center justify-center text-gray-400 hover:bg-fas-primary hover:text-white transition-all shadow-sm" title="Compartir por WhatsApp">
                            <i class="fab fa-whatsapp text-xs"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. CONTENT AREA: Tipografía Editorial -->
    <section class="pb-32 relative z-10">
        <div class="max-w-4xl mx-auto px-6">
            <div class="reveal reveal-delay-4 bg-white/40 backdrop-blur-sm rounded-[3.5rem] p-10 md:p-20 border border-white/30 shadow-sm">
                <div class="prose-content text-gray-600 text-lg md:text-xl font-light leading-relaxed space-y-8">
                    <?php the_content(); ?>
                </div>
            </div>
            


            <!-- BOTÓN VOLVER -->
            <div class="pt-24 text-center reveal">
                <a href="<?php echo get_post_type_archive_link('proyecto'); ?>" class="inline-flex items-center gap-4 px-10 py-5 rounded-full bg-gray-800 text-white font-medium hover:bg-fas-primary hover:-translate-y-1 transition-all duration-300 shadow-xl">
                    <i class="fas fa-arrow-left text-sm opacity-50"></i>
                    Explorar más proyectos
                </a>
            </div>
        </div>
    </section>
</main>

<?php 
endwhile;
get_footer(); 
?>
