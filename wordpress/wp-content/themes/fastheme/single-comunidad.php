<?php
/**
 * Single Template: Comunidad
 * Diseño inmersivo para mostrar el impacto y la vida en las comunidades atendidas por FAS.
 */

get_header();

while (have_posts()) : the_post();
    // Campos ACF
    $ubicacion = get_field('ubicacion'); // Por si se usa diferente al título
    $familias = get_field('numero_familias');
    $ninos = get_field('numero_ninos');
    $programas_activos = get_field('programas_activos'); // Array o texto
    $galeria = get_field('galeria_comunidad');
    $frase_comunidad = get_field('frase_comunidad');
?>

<main class="bg-fas-cream min-h-screen relative">
    <!-- Capas de fondo decorativas -->
    <div class="gradient-mesh-cream"></div>
    <div class="absolute inset-0 pointer-events-none pattern-dots"></div>

    <!-- 1. HERO SECTION: Identidad de la Comunidad -->
    <section class="relative pt-32 pb-20 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <nav class="reveal flex items-center gap-2 text-fas-primary/40 mb-12 text-[10px] uppercase tracking-[0.3em] font-bold">
                <a href="<?php echo home_url(); ?>" class="hover:text-fas-primary transition-all">Inicio</a>
                <i class="fas fa-chevron-right text-[7px] opacity-30"></i>
                <a href="<?php echo get_permalink(get_page_by_path('comunidades')); ?>" class="hover:text-fas-primary transition-all">Comunidades</a>
                <i class="fas fa-chevron-right text-[7px] opacity-30"></i>
                <span class="text-gray-400 font-medium truncate"><?php the_title(); ?></span>
            </nav>

            <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
                <div class="reveal">
                    <span class="inline-block px-4 py-1.5 rounded-full bg-fas-accent/10 text-fas-accent text-[11px] font-bold uppercase tracking-widest mb-6">
                        Comunidad Vital
                    </span>
                    
                    <h1 class="font-display text-5xl md:text-7xl xl:text-8xl text-gray-800 leading-[0.95] mb-8">
                        <?php the_title(); ?>
                    </h1>
                    
                    <div class="w-20 h-1.5 bg-fas-primary rounded-full mb-8"></div>
                    
                    <?php if ($frase_comunidad): ?>
                    <p class="text-xl text-gray-500 font-light max-w-lg leading-relaxed italic">
                        "<?php echo esc_html($frase_comunidad); ?>"
                    </p>
                    <?php else: ?>
                    <p class="text-xl text-gray-500 font-light max-w-lg leading-relaxed italic">
                        Un territorio de esperanza donde el trabajo conjunto siembra un futuro mejor para cada familia.
                    </p>
                    <?php endif; ?>
                </div>

                <div class="reveal reveal-delay-2 relative group">
                    <div class="absolute -inset-4 bg-fas-accent/5 rounded-[3rem] blur-2xl group-hover:bg-fas-accent/10 transition-colors duration-700"></div>
                    <?php if (has_post_thumbnail()): 
                        $full_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    ?>
                    <div class="relative rounded-[3rem] overflow-hidden shadow-2xl border-8 border-white group-hover:translate-y-[-10px] transition-transform duration-700" style="transform: translateZ(0);">
                        <a href="<?php echo esc_url($full_image_url); ?>" class="glightbox block relative overflow-hidden rounded-[2rem]">
                            <?php the_post_thumbnail('large', ['class' => 'w-full aspect-[4/5] object-cover rounded-[2.5rem] transform group-hover:scale-105 transition-transform duration-1000']); ?>
                            <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end justify-center pb-10">
                                <span class="text-white text-xs uppercase tracking-widest font-bold"><i class="fas fa-search-plus mr-2"></i> Ver Paisaje</span>
                            </div>
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. DATOS COMUNITARIOS: Bento Grid -->
    <section class="pb-24 relative z-20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Familias -->
                <div class="reveal reveal-delay-1 bg-white/60 backdrop-blur-md rounded-[2.5rem] p-8 border border-white/40 shadow-sm hover:shadow-md transition-all flex items-center gap-6 group">
                    <div class="w-14 h-14 rounded-2xl bg-fas-cream flex items-center justify-center text-fas-primary group-hover:bg-fas-primary group-hover:text-white transition-colors duration-500">
                        <i class="fas fa-home text-xl"></i>
                    </div>
                    <div>
                        <span class="block text-[10px] uppercase tracking-widest text-gray-400 font-bold mb-1">Población</span>
                        <span class="text-gray-800 font-medium text-lg leading-tight block"><?php echo $familias ? esc_html($familias) : 'Varias'; ?> Familias</span>
                    </div>
                </div>

                <!-- Niños -->
                <div class="reveal reveal-delay-2 bg-white/60 backdrop-blur-md rounded-[2.5rem] p-8 border border-white/40 shadow-sm hover:shadow-md transition-all flex items-center gap-6 group">
                    <div class="w-14 h-14 rounded-2xl bg-fas-cream flex items-center justify-center text-fas-accent group-hover:bg-fas-accent group-hover:text-white transition-colors duration-500">
                        <i class="fas fa-child text-xl"></i>
                    </div>
                    <div>
                        <span class="block text-[10px] uppercase tracking-widest text-gray-400 font-bold mb-1">Futuro</span>
                        <span class="text-gray-800 font-medium text-lg leading-tight block"><?php echo $ninos ? esc_html($ninos) : 'Muchos'; ?> Niños</span>
                    </div>
                </div>

                <!-- Ubicación -->
                <div class="reveal reveal-delay-3 bg-white/60 backdrop-blur-md rounded-[2.5rem] p-8 border border-white/40 shadow-sm hover:shadow-md transition-all flex items-center gap-6 group">
                    <div class="w-14 h-14 rounded-2xl bg-fas-cream flex items-center justify-center text-gray-400 group-hover:bg-gray-800 group-hover:text-white transition-colors duration-500">
                        <i class="fas fa-map-pin text-xl"></i>
                    </div>
                    <div>
                        <span class="block text-[10px] uppercase tracking-widest text-gray-400 font-bold mb-1">Ubicación</span>
                        <span class="text-gray-800 font-medium text-lg leading-tight block"><?php echo $ubicacion ? esc_html($ubicacion) : 'Cochabamba'; ?></span>
                    </div>
                </div>

                <!-- Programas -->
                <div class="reveal reveal-delay-4 bg-white/60 backdrop-blur-md rounded-[2.5rem] p-8 border border-white/40 shadow-sm hover:shadow-md transition-all flex items-center gap-6 group">
                    <div class="w-14 h-14 rounded-2xl bg-fas-cream flex items-center justify-center text-fas-primary-light group-hover:bg-fas-primary-light group-hover:text-white transition-colors duration-500">
                        <i class="fas fa-seedling text-xl"></i>
                    </div>
                    <div>
                        <span class="block text-[10px] uppercase tracking-widest text-gray-400 font-bold mb-1">Acción</span>
                        <span class="text-gray-800 font-medium text-lg leading-tight block">Programas Activos</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. HISTORIA Y TRABAJO -->
    <section class="pb-32 relative z-10">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid lg:grid-cols-12 gap-12">
                <!-- Columna Texto -->
                <div class="lg:col-span-8">
                    <div class="reveal reveal-delay-4 bg-white/40 backdrop-blur-sm rounded-[3.5rem] p-10 md:p-20 border border-white/30 shadow-sm">
                        <div class="prose-content text-gray-600 text-lg md:text-xl font-light leading-relaxed space-y-8">
                            <h2 class="font-display text-3xl text-gray-800 mb-6 italic">Nuestra huella en <?php the_title(); ?></h2>
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>

                <!-- Columna Sidebar / Info extra -->
                <div class="lg:col-span-4 space-y-6">
                    <div class="reveal reveal-delay-5 bg-fas-dark text-white rounded-[2.5rem] p-10 shadow-2xl relative overflow-hidden group">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-fas-accent/20 rounded-full -mr-16 -mt-16 blur-3xl group-hover:bg-fas-accent/30 transition-all duration-700"></div>
                        <h3 class="font-display text-2xl mb-6">Programas en marcha</h3>
                        <ul class="space-y-4">
                            <?php 
                            // Simulando programas si no hay campo ACF
                            $programs = $programas_activos ?: ['Seguridad Alimentaria', 'Salud Comunitaria', 'Educación Integral'];
                            foreach($programs as $p): ?>
                            <li class="flex items-center gap-3 text-white/80 font-light">
                                <span class="w-2 h-2 rounded-full bg-fas-accent"></span>
                                <?php echo esc_html($p); ?>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="mt-10">
                            <a href="<?php echo get_post_type_archive_link('proyecto'); ?>" class="text-fas-accent text-sm font-bold uppercase tracking-widest hover:text-white transition-colors inline-flex items-center gap-2">
                                Ver proyectos relacionados <i class="fas fa-arrow-right text-[10px]"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Botón Volver -->
                    <div class="reveal reveal-delay-6">
                        <a href="<?php echo get_permalink(get_page_by_path('comunidades')); ?>" class="flex items-center justify-center gap-4 w-full py-6 rounded-[2rem] bg-white border border-gray-100 text-gray-600 font-medium hover:bg-gray-50 hover:border-fas-primary/20 transition-all duration-300">
                            <i class="fas fa-th-large text-sm opacity-50"></i>
                            Todas las comunidades
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. GALERÍA / IMPACTO VISUAL (Opcional si hay ACF) -->
    <?php if ($galeria): ?>
    <section class="pb-32 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <?php foreach($galeria as $img_id): 
                    $img_url = wp_get_attachment_image_url($img_id, 'large');
                    $full_img = wp_get_attachment_image_url($img_id, 'full');
                ?>
                <a href="<?php echo esc_url($full_img); ?>" class="glightbox reveal overflow-hidden rounded-[2rem] aspect-square group">
                    <img src="<?php echo esc_url($img_url); ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" />
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>
</main>

<?php 
endwhile;
get_footer(); 
?>
