<?php
/**
 * Template Name: Homepage
 */

get_header();
?>

<!-- HERO SLIDER -->
<section id="inicio" class="relative min-h-screen flex items-center overflow-hidden">
    <!-- Parallax Background Elements -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="absolute top-1/4 -left-10 w-64 h-64 border-[30px] border-fas-primary/10 rounded-full" data-speed="0.1"></div>
        <div class="absolute bottom-1/4 right-10 w-48 h-48 border-[20px] border-fas-accent/15 rounded-full" data-speed="-0.1"></div>
        <div class="absolute top-1/3 right-1/4 w-24 h-24 bg-fas-primary/10 rotate-45 rounded-full" data-speed="0.15"></div>
        <div class="absolute top-1/2 left-1/4 w-3 h-3 bg-fas-accent/30 rounded-full" data-speed="0.2"></div>
        <div class="absolute bottom-1/3 right-1/3 w-2 h-2 bg-fas-primary/40 rounded-full" data-speed="-0.15"></div>
        <div class="absolute top-20 right-20 w-4 h-4 bg-fas-accent/20 rounded-full" data-speed="0.08"></div>
    </div>

    <?php
    global $post;
    $original_post = $post;
    
    $slides_query = new WP_Query([
        'post_type' => 'slide',
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC'
    ]);
    
    $slides_data = [];
    
    if ($slides_query->have_posts()) {
        while ($slides_query->have_posts()) {
            $slides_query->the_post();
            $label = get_field('slide_label');
            $title = get_field('slide_title');
            $title_accent = get_field('slide_title_accent');
            $subtitle = get_field('slide_subtitle');
            $image = get_the_post_thumbnail_url(get_the_ID(), 'full');
            
            if (!$title) {
                $title = get_the_title();
            }
            
            $slides_data[] = [
                'label' => $label,
                'title' => $title,
                'title_accent' => $title_accent,
                'subtitle' => $subtitle,
                'image' => $image
            ];
        }
        wp_reset_postdata();
    }
    
    $post = $original_post;
    setup_postdata($post);
    
    $hero_slides = $slides_data;
    ?>

    <?php if (!empty($hero_slides)): ?>
        <?php foreach ($hero_slides as $index => $slide): ?>
        <div class="hero-slide <?php echo $index === 0 ? 'active' : ''; ?> absolute inset-0" data-parallax="0.3" style="background-image: url('<?php echo esc_url($slide['image'] ?: 'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?w=1920&q=80'); ?>'); background-size: cover; background-position: center;">
            <div class="absolute inset-0 bg-gradient-to-r from-gray-900/80 via-gray-900/40 to-gray-900/10"></div>
            <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-8 py-32 w-full">
                <div class="max-w-3xl">
                    <div class="reveal inline-flex items-center gap-4 mb-6">
                        <span class="w-16 h-px bg-fas-accent"></span>
                        <span class="text-fas-accent font-medium tracking-[0.2em] uppercase text-xs"><?php echo esc_html($slide['label']); ?></span>
                    </div>
                    <h1 class="reveal reveal-delay-1 font-display text-5xl md:text-6xl lg:text-7xl text-white mb-6 leading-[1.15]">
                        <?php echo wp_kses_post($slide['title']); ?>
                    </h1>
                    <p class="reveal reveal-delay-2 text-xl text-white/80 mb-10 max-w-xl font-light leading-relaxed">
                        <?php echo esc_html($slide['subtitle']); ?>
                    </p>
                    <div class="reveal reveal-delay-3 flex flex-wrap gap-4">
                        <a href="#apoyanos" class="btn-fas px-9 py-4 bg-fas-primary text-white rounded-full font-medium shadow-xl shadow-fas-primary/25">Apóyanos</a>
                        <a href="#participa" class="px-9 py-4 border border-white/30 text-white rounded-full font-medium hover:bg-white/10 transition-colors">Participa</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="hero-slide active absolute inset-0" data-parallax="0.3" style="background-image: url('https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?w=1920&q=80'); background-size: cover; background-position: center;">
            <div class="absolute inset-0 bg-gradient-to-r from-gray-900/80 via-gray-900/40 to-gray-900/10"></div>
            <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-8 py-32 w-full">
                <div class="max-w-3xl">
                    <div class="reveal inline-flex items-center gap-4 mb-6">
                        <span class="w-16 h-px bg-fas-accent"></span>
                        <span class="text-fas-accent font-medium tracking-[0.2em] uppercase text-xs">Fundación Alimentando Sonrisas</span>
                    </div>
                    <h1 class="reveal reveal-delay-1 font-display text-5xl md:text-6xl lg:text-7xl text-white mb-6 leading-[1.15]">
                        Ayudamos a niños a tener un <span class="italic text-fas-accent">mejor futuro</span>
                    </h1>
                    <p class="reveal reveal-delay-2 text-xl text-white/80 mb-10 max-w-xl font-light leading-relaxed">
                        En FAS creemos que cada niño merece la oportunidad de sonar, aprender y crecer con dignidad.
                    </p>
                    <div class="reveal reveal-delay-3 flex flex-wrap gap-4">
                        <a href="#apoyanos" class="btn-fas px-9 py-4 bg-fas-primary text-white rounded-full font-medium shadow-xl shadow-fas-primary/25">Apóyanos</a>
                        <a href="#participa" class="px-9 py-4 border border-white/30 text-white rounded-full font-medium hover:bg-white/10 transition-colors">Participa</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Slider Controls -->
    <?php if ($hero_slides && count($hero_slides) > 1): ?>
    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 z-20 flex items-center gap-4">
        <button type="button" class="w-12 h-12 bg-white/10 backdrop-blur rounded-full flex items-center justify-center text-white hover:bg-white/20 transition-all hover:scale-110" onclick="changeSlide(-1)" aria-label="Anterior">
            <i class="fas fa-chevron-left"></i>
        </button>
        <div class="flex gap-2">
            <?php foreach ($hero_slides as $index => $slide): ?>
            <button type="button" class="slide-dot w-3 h-3 rounded-full <?php echo $index === 0 ? 'bg-white' : 'bg-white/40'; ?> transition-all" onclick="goToSlide(<?php echo $index; ?>)" aria-label="Slide <?php echo $index + 1; ?>"></button>
            <?php endforeach; ?>
        </div>
        <button type="button" class="w-12 h-12 bg-white/10 backdrop-blur rounded-full flex items-center justify-center text-white hover:bg-white/20 transition-all hover:scale-110" onclick="changeSlide(1)" aria-label="Siguiente">
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>
    <?php endif; ?>

    <!-- Scroll indicator -->
    <div class="absolute bottom-10 right-10 z-20 hidden md:flex flex-col items-center gap-2 text-white/50 scroll-indicator">
        <span class="text-xs tracking-widest uppercase">Scroll</span>
        <div class="w-px h-12 bg-gradient-to-b from-white/50 to-transparent"></div>
    </div>
</section>

<!-- PROBLEM SECTION -->
<section id="nosotros" class="relative py-32 px-6 bg-white overflow-hidden">
    <div class="gradient-mesh"></div>
    <div class="absolute inset-0 opacity-30" style="background-image: radial-gradient(circle, #059ba3 1px, transparent 1px); background-size: 20px 20px;"></div>
    
    <div class="absolute top-10 left-1/4 w-32 h-32 text-fas-primary/10" data-speed="0.1">
        <svg viewBox="0 0 24 24" fill="currentColor" class="w-full h-full">
            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
        </svg>
    </div>
    <div class="absolute bottom-10 right-10 w-32 h-32 border-[15px] border-fas-accent/10 rounded-full" data-speed="-0.1"></div>

    <div class="max-w-4xl mx-auto text-center relative">
        <span class="reveal inline-block text-fas-accent font-body font-medium tracking-[0.25em] uppercase text-xs mb-8">Nuestra razón de ser</span>
        <div class="reveal reveal-delay-1 w-16 h-px bg-gradient-to-r from-fas-accent to-fas-accent-warm mx-auto mb-8"></div>
        
        <?php if (get_field('nosotros_title')): ?>
        <h2 class="reveal reveal-delay-2 font-display text-4xl md:text-5xl lg:text-6xl text-gray-800 mb-10 leading-tight">
            <?php echo get_field('nosotros_title'); ?>
        </h2>
        <?php else: ?>
        <h2 class="reveal reveal-delay-2 font-display text-4xl md:text-5xl lg:text-6xl text-gray-800 mb-10 leading-tight">
            En Bolivia, miles de familias enfrentan el desafío diario de no tener suficientes alimentos
        </h2>
        <?php endif; ?>
        
        <?php if (get_field('nosotros_text')): ?>
        <p class="reveal reveal-delay-3 text-lg text-gray-600 leading-loose max-w-2xl mx-auto mb-6 font-light">
            <?php echo wp_kses_post(get_field('nosotros_text')); ?>
        </p>
        <?php else: ?>
        <p class="reveal reveal-delay-3 text-lg text-gray-600 leading-loose max-w-2xl mx-auto mb-6 font-light">
            Muchos niños crecen sin acceso a una alimentación adecuada, sin oportunidades de estudio y sin la posibilidad de soñar con un futuro diferente. En las comunidades más alejadas, la pobreza no es solo falta de dinero: es falta de esperanza.
        </p>
        <p class="reveal reveal-delay-4 text-lg text-gray-600 leading-loose max-w-2xl mx-auto font-light">
            Pero creemos que cada persona merece la oportunidad de construir una vida digna. Por eso nacimos: para caminar junto a las comunidades, no para dar limosna, sino para construir juntos un futuro mejor.
        </p>
        <?php endif; ?>
        
        <div class="reveal reveal-delay-5 mt-10">
            <?php $nosotros_link = get_field('nosotros_link'); ?>
            <a href="<?php echo $nosotros_link ? esc_url($nosotros_link) : get_permalink(get_page_by_path('nosotros')); ?>" class="btn-fas inline-flex items-center gap-2 px-6 py-3 border-2 border-fas-accent text-fas-accent rounded-full font-medium hover:bg-fas-accent hover:text-white transition-colors">
                Conoce nuestra historia
                <i class="fas fa-arrow-right text-sm"></i>
            </a>
        </div>
    </div>
</section>

<!-- PROGRAMS -->
<section id="programas" class="py-32 px-6 bg-fas-cream relative overflow-hidden">
    <div class="gradient-mesh" style="background: radial-gradient(ellipse 100% 60% at 50% 0%, rgba(255, 255, 255, 0.6) 0%, transparent 50%), radial-gradient(ellipse 60% 40% at 80% 100%, rgba(247, 171, 22, 0.08) 0%, transparent 50%);"></div>
    <div class="absolute inset-0 opacity-5" style="background: repeating-linear-gradient(45deg, transparent, transparent 10px, rgba(5, 155, 163, 0.5) 10px, rgba(5, 155, 163, 0.5) 11px);"></div>

    <div class="max-w-7xl mx-auto relative">
        <div class="text-center mb-20">
            <span class="reveal inline-block px-5 py-2 bg-fas-primary/10 text-fas-primary font-medium tracking-[0.2em] uppercase text-xs mb-6 rounded-full">Nuestro trabajo</span>
            <div class="reveal reveal-delay-1 flex items-center justify-center gap-4 mb-6">
                <div class="w-12 h-px bg-gradient-to-r from-transparent to-fas-accent"></div>
                <div class="w-2 h-2 bg-fas-accent rounded-full"></div>
                <div class="w-12 h-px bg-gradient-to-l from-transparent to-fas-accent"></div>
            </div>
            <h2 class="reveal reveal-delay-2 font-display text-4xl md:text-5xl lg:text-6xl text-gray-800 mb-6">Cómo ayudamos</h2>
            <p class="reveal reveal-delay-3 text-gray-600 max-w-xl mx-auto font-light leading-relaxed">4 pilares que transforman vidas</p>
        </div>

        <!-- Bento Grid -->
        <div class="grid md:grid-cols-4 gap-5">
            <?php
            $programas_terms = get_terms([
                'taxonomy'   => 'tipo_programa',
                'hide_empty' => false,
            ]);

            if (!empty($programas_terms) && !is_wp_error($programas_terms)) :
                $i = 0;
                foreach ($programas_terms as $term) :
                    // Obtener campos ACF del término
                    $icono = get_field('icono_element', $term);
                    $descripcion_acf = get_field('descripcion', $term);
                    // Usar el campo ACF 'descripcion' y si no existe, la descripción nativa del término
                    $descripcion = $descripcion_acf ?: $term->description;
                    $delay = 3 + ($i % 4); // Distribución de delay para la animación

                    // Posicion 0: Tarjeta Principal (Grande)
                    if ($i === 0) : ?>
                        <div class="reveal reveal-delay-<?php echo $delay; ?> md:col-span-2 md:row-span-2 group">
                            <a href="<?php echo get_term_link($term); ?>" class="block h-full bg-white rounded-[2.5rem] p-8 lg:p-10 shadow-lg hover:shadow-2xl transition-all duration-500 card-organic overflow-hidden relative">
                                <div class="absolute top-0 right-0 w-40 h-40 bg-fas-primary/5 rounded-full blur-3xl group-hover:bg-fas-primary/10 transition-all duration-500"></div>
                                <div class="relative z-10 h-full flex flex-col justify-between">
                                    <div class="w-18 h-18 bg-fas-primary rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                                        <i class="<?php echo esc_attr($icono ?: 'fas fa-utensils'); ?> text-2xl text-white"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-display text-3xl text-gray-800 mb-4"><?php echo esc_html($term->name); ?></h3>
                                        <p class="text-gray-500 leading-relaxed font-light text-lg"><?php echo esc_html($descripcion); ?></p>
                                    </div>
                                    <div class="mt-6 flex items-center gap-2 text-fas-primary font-medium">
                                        <span>Ver más</span>
                                        <i class="fas fa-arrow-right text-sm group-hover:translate-x-2 transition-transform"></i>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php 
                    // Posiciones 1 y 2: Tarjetas Pequeñas
                    elseif ($i === 1 || $i === 2) : ?>
                        <div class="reveal reveal-delay-<?php echo $delay; ?> group">
                            <a href="<?php echo get_term_link($term); ?>" class="block h-full bg-white rounded-[2rem] p-6 shadow-md hover:shadow-2xl transition-all duration-500 card-organic overflow-hidden relative">
                                <div class="absolute -top-10 -right-10 w-24 h-24 <?php echo ($i === 1) ? 'bg-fas-accent/10' : 'bg-fas-leaf/20'; ?> rounded-full blur-2xl"></div>
                                <div class="relative z-10">
                                    <div class="w-14 h-14 <?php echo ($i === 1) ? 'bg-gradient-to-br from-fas-accent to-fas-accent-warm' : 'bg-gradient-to-br from-fas-primary-light to-fas-leaf'; ?> rounded-xl flex items-center justify-center mb-5 group-hover:scale-110 transition-transform duration-300">
                                        <i class="<?php echo esc_attr($icono ?: ($i === 1 ? 'fas fa-heartbeat' : 'fas fa-graduation-cap')); ?> text-xl text-white"></i>
                                    </div>
                                    <h3 class="font-display text-xl text-gray-800 mb-2"><?php echo esc_html($term->name); ?></h3>
                                    <p class="text-gray-500 text-sm leading-relaxed font-light"><?php echo esc_html($descripcion); ?></p>
                                </div>
                            </a>
                        </div>
                    <?php 
                    // Posición 3: Tarjeta Destacada (Horizontal)
                    else : ?>
                        <div class="reveal reveal-delay-<?php echo $delay; ?> md:col-span-2 group">
                            <a href="<?php echo get_term_link($term); ?>" class="block h-full bg-gradient-to-br from-fas-primary to-fas-primary-dark rounded-[2rem] p-8 shadow-xl hover:shadow-2xl transition-all duration-500 overflow-hidden relative">
                                <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full blur-3xl"></div>
                                <div class="absolute bottom-0 left-0 w-32 h-32 bg-fas-accent/20 rounded-full blur-2xl"></div>
                                <div class="relative z-10 flex items-center gap-6">
                                    <div class="w-20 h-20 bg-white/15 backdrop-blur rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition-transform duration-300">
                                        <i class="<?php echo esc_attr($icono ?: 'fas fa-lightbulb'); ?> text-3xl text-white"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-display text-2xl text-white mb-2"><?php echo esc_html($term->name); ?></h3>
                                        <p class="text-white/75 leading-relaxed font-light"><?php echo esc_html($descripcion); ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php 
                    endif;
                    $i++;
                    // Limitamos a 4 programas para no romper el grid inicial, si hay más, se ignoran o se puede ajustar la lógica
                    if($i >= 4) break; 
                endforeach;
            endif;
            ?>

            <!-- Stats Card (Mantenido aparte) -->
            <div class="reveal reveal-delay-7 md:col-span-2 bg-white rounded-[2rem] p-6 shadow-md">
                <div class="grid grid-cols-3 gap-4 text-center">
                    <div>
                        <span class="block font-display text-3xl text-fas-primary">4</span>
                        <span class="text-gray-500 text-sm">Pilares</span>
                    </div>
                    <div>
                        <span class="block font-display text-3xl text-fas-primary">1000+</span>
                        <span class="text-gray-500 text-sm">Familias</span>
                    </div>
                    <div>
                        <span class="block font-display text-3xl text-fas-primary">5</span>
                        <span class="text-gray-500 text-sm">Años</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- COMMUNITIES -->
<section id="comunidades" class="py-32 px-6 bg-white relative overflow-hidden">
    <div class="gradient-mesh"></div>
    <div class="absolute inset-0 opacity-30" style="background-image: radial-gradient(circle, #d79363 1px, transparent 1px); background-size: 20px 20px;"></div>

    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-20">
            <span class="reveal inline-block text-fas-accent font-body font-medium tracking-[0.25em] uppercase text-xs mb-4">Donde trabajamos</span>
            <div class="reveal reveal-delay-1 w-16 h-px bg-gradient-to-r from-fas-accent to-fas-accent-warm mx-auto mb-6"></div>
            <h2 class="reveal reveal-delay-2 font-display text-4xl md:text-5xl lg:text-6xl text-gray-800 mb-6">Comunidades que acompañamos</h2>
            <p class="reveal reveal-delay-3 text-gray-600 max-w-xl mx-auto font-light">Estamos presentes en comunidades Guaraníes de Chuquisaca y Tarija, Bolivia.</p>
        </div>

        <?php
        $comunidades_query = new WP_Query([
            'post_type'      => 'comunidad',
            'posts_per_page' => -1,
            'orderby'        => 'menu_order',
            'order'          => 'ASC'
        ]);
        
        if ($comunidades_query->have_posts()):
        ?>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php 
            $i = 0;
            while ($comunidades_query->have_posts()): $comunidades_query->the_post(); 
                $delay = 3 + ($i % 3);
                $thumb = get_the_post_thumbnail_url(get_the_ID(), 'full');
                // Alternamos colores de badges para dinamismo visual
                $badge_class = ($i % 2 === 0) ? 'bg-fas-primary' : 'bg-fas-accent';
                if ($i % 3 === 2) $badge_class = 'bg-fas-primary-light';
            ?>
            <a href="<?php the_permalink(); ?>" class="reveal reveal-delay-<?php echo $delay; ?> community-card group block">
                <div class="relative overflow-hidden rounded-[2rem] mb-5">
                    <?php if ($thumb): ?>
                        <img src="<?php echo esc_url($thumb); ?>" alt="<?php the_title(); ?>" class="community-img w-full h-80 object-cover" width="600" height="320" loading="lazy">
                    <?php else: ?>
                        <div class="w-full h-80 bg-fas-sand flex items-center justify-center">
                            <i class="fas fa-map-marker-alt text-4xl text-fas-accent"></i>
                        </div>
                    <?php endif; ?>
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-900/70 via-gray-900/10 to-transparent"></div>
                    <div class="absolute bottom-6 left-6">
                        <span class="px-4 py-2 <?php echo $badge_class; ?> text-white text-sm rounded-full font-medium">
                            <?php the_title(); ?>
                        </span>
                    </div>
                </div>
                <div class="text-gray-500 leading-relaxed font-light pl-2 mb-2">
                    <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                </div>
                <!-- <span class="text-fas-primary text-sm font-medium pl-2 group-hover:translate-x-2 inline-flex items-center gap-1 transition-transform">
                    Leer más <i class="fas fa-arrow-right text-xs"></i>
                </span> -->
            </a>
            <?php 
                $i++;
            endwhile; 
            wp_reset_postdata();
            ?>
        </div>
        <?php else: ?>
            <div class="text-center py-20 bg-fas-cream/50 rounded-[3rem] border-2 border-dashed border-fas-sand">
                <i class="fas fa-map-marked-alt text-4xl text-fas-accent/30 mb-4"></i>
                <p class="text-gray-500">Próximamente publicaremos más detalles sobre nuestras comunidades.</p>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- STORY -->
<section class="py-32 px-6 bg-gradient-to-br from-fas-cream via-white to-fas-sand/50 relative overflow-hidden">
    <div class="gradient-mesh"></div>
    <div class="absolute top-10 right-20 text-fas-primary/10 text-9xl font-display" data-speed="0.1">"</div>
    <div class="absolute bottom-10 left-10 w-16 h-16 text-fas-accent/15" data-speed="-0.1">
        <svg viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
        </svg>
    </div>
    <div class="absolute top-1/2 right-1/3 w-2 h-2 bg-fas-primary/20 rounded-full" data-speed="0.15"></div>
    <div class="absolute bottom-1/3 left-1/4 w-3 h-3 bg-fas-accent/20 rounded-full" data-speed="-0.08"></div>

    <div class="max-w-4xl mx-auto relative">
        <div class="reveal bg-white rounded-[3rem] p-12 md:p-16 shadow-2xl shadow-fas-primary/5 border border-fas-sand/50">
            <div class="flex flex-col md:flex-row items-center gap-10">
                <div class="relative flex-shrink-0">
                    <img src="https://images.unsplash.com/photo-1519451241324-20b4ea2c4220?w=300&q=80" alt="María, madre de familia" class="w-36 h-36 rounded-full object-cover shadow-xl" width="144" height="144">
                    <div class="absolute -bottom-2 -right-2 w-12 h-12 bg-fas-accent rounded-full flex items-center justify-center shadow-lg">
                        <i class="fas fa-quote-right text-white text-sm" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="text-center md:text-left">
                    <i class="fas fa-quote-left text-6xl text-fas-primary/10 mb-2" aria-hidden="true"></i>
                    <p class="text-xl md:text-2xl text-gray-700 italic mb-6 leading-relaxed font-display">
                        "Antes mis hijos no podían ir a la escuela porque no tenían qué comer. Ahora, gracias a FAS, reciben alimentación en la escuela y pueden aprender. Yo también recibí capacitación y ahora tengo mi pequeño negocio."
                    </p>
                    <p class="font-display text-xl text-gray-800">— María, madre de familia de Tentayape</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- HOW TO HELP -->
<section id="participa" class="py-32 px-6 bg-white relative overflow-hidden">
    <div class="gradient-mesh"></div>
    <!-- Subtle dot pattern -->
    <div class="absolute inset-0 opacity-30" style="background-image: radial-gradient(circle, #059ba3 1px, transparent 1px); background-size: 20px 20px;"></div>

    <!-- Parallax elements - Hands helping -->
    <div class="absolute top-0 left-10 w-20 h-20 text-fas-primary/10" data-speed="0.1">
        <svg viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
        </svg>
    </div>
    <div class="absolute bottom-10 right-10 w-24 h-24 text-fas-accent/10" data-speed="-0.1">
        <svg viewBox="0 0 24 24" fill="currentColor">
            <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z" />
        </svg>
    </div>
    <div class="absolute top-1/3 right-1/4 w-4 h-4 bg-fas-primary/20 rounded-full" data-speed="0.15"></div>
    <div class="absolute bottom-1/4 left-1/3 w-3 h-3 bg-fas-accent/30 rounded-full" data-speed="-0.12"></div>

    <div class="max-w-5xl mx-auto relative">
        <div class="text-center mb-20">
            <span class="reveal inline-block text-fas-accent font-body font-medium tracking-[0.25em] uppercase text-xs mb-4">Únete a nuestra causa</span>
            <div class="reveal reveal-delay-1 w-16 h-px bg-gradient-to-r from-fas-accent to-fas-accent-warm mx-auto mb-6"></div>
            <h2 class="reveal reveal-delay-2 font-display text-4xl md:text-5xl lg:text-6xl text-gray-800 mb-6">Cómo puedes ayudar</h2>
            <p class="reveal reveal-delay-3 text-gray-600 max-w-xl mx-auto font-light">Tu apoyo puede hacer la diferencia en la vida de muchas familias.</p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <!-- Card Donar -->
            <div class="reveal reveal-delay-3 group relative overflow-hidden rounded-[3rem] bg-gradient-to-br from-fas-primary via-fas-primary-dark to-[#047a80] p-10 md:p-14 text-center">
                <!-- Decorativo -->
                <div class="absolute -top-20 -right-20 w-64 h-64 bg-white/5 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-fas-accent/20 rounded-full blur-2xl"></div>
                <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%23ffffff\" fill-opacity=\"0.05\"%3E%3Cpath d=\"M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-30"></div>

                <div class="relative z-10">
                    <div class="relative inline-block mb-8">
                        <div class="w-24 h-24 bg-white/10 backdrop-blur-xl rounded-[2rem] flex items-center justify-center mx-auto border border-white/20 shadow-2xl group-hover:scale-110 transition-transform duration-500">
                            <i class="fas fa-heart text-4xl text-white"></i>
                        </div>
                        <div class="absolute -bottom-2 -right-2 w-8 h-8 bg-fas-accent rounded-full flex items-center justify-center shadow-lg">
                            <i class="fas fa-plus text-white text-xs"></i>
                        </div>
                    </div>

                    <h3 class="font-display text-3xl md:text-4xl text-white mb-4">Donar</h3>
                    <p class="text-white/75 mb-8 leading-relaxed font-light max-w-xs mx-auto">Tu contribución mensual ayuda a que más niños reciban alimentación, educación y oportunidades.</p>

                 <!--    <div class="relative inline-block mb-6">
                        <div class="bg-white rounded-[2rem] p-5 shadow-2xl transform group-hover:scale-105 transition-transform duration-300">
                            <p class="text-xs text-gray-400 mb-2 font-medium uppercase tracking-wider">Escanea para donar</p>
                            <div class="w-36 h-36 bg-gray-50 rounded-xl flex items-center justify-center">
                                <i class="fas fa-qrcode text-7xl text-gray-300"></i>
                            </div>
                        </div>
                    </div> -->

                    <a href="<?php echo get_permalink(get_page_by_path('apoyanos')); ?>" class="btn-fas inline-flex items-center gap-2 px-10 py-5 bg-white text-fas-primary rounded-full text-base font-semibold tracking-wide shadow-xl hover:shadow-2xl hover:scale-105 transition-all">
                        Apóyanos ahora
                        <i class="fas fa-arrow-right text-sm"></i>
                    </a>
                </div>
            </div>

            <!-- Card Participar -->
            <div class="reveal reveal-delay-4 group relative overflow-hidden rounded-[3rem] bg-gradient-to-br from-fas-cream to-[#e8dcc8] p-10 md:p-14 text-center border border-fas-sand/50">
                <!-- Decorativo -->
                <div class="absolute -top-20 -left-20 w-64 h-64 bg-fas-primary/5 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-fas-accent/10 rounded-full blur-2xl"></div>
                <div class="absolute top-0 right-0 w-32 h-32 border-[20px] border-fas-primary/5 rounded-full mr-8 mt-8"></div>

                <div class="relative z-10">
                    <div class="relative inline-block mb-8">
                        <div class="w-24 h-24 bg-gradient-to-br from-fas-primary to-fas-primary-dark rounded-[2rem] flex items-center justify-center mx-auto shadow-xl group-hover:scale-110 transition-transform duration-500">
                            <i class="fas fa-hands-helping text-4xl text-white"></i>
                        </div>
                        <div class="absolute -bottom-2 -left-2 w-8 h-8 bg-fas-accent rounded-full flex items-center justify-center shadow-lg">
                            <i class="fas fa-user-plus text-white text-xs"></i>
                        </div>
                    </div>

                    <h3 class="font-display text-3xl md:text-4xl text-gray-800 mb-4">Participar</h3>
                    <p class="text-gray-600 mb-8 leading-relaxed font-light max-w-xs mx-auto">Únete como voluntario. Tu tiempo y habilidades pueden transformar vidas.</p>

                    <ul class="space-y-4 mb-10 max-w-xs mx-auto text-left">
                        <li class="flex items-center gap-4 text-gray-700 group-hover:translate-x-2 transition-transform duration-300">
                            <span class="w-10 h-10 bg-fas-primary/10 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-fas-primary group-hover:text-white transition-all duration-300">
                                <i class="fas fa-check text-fas-primary text-sm group-hover:text-white"></i>
                            </span>
                            <span class="font-light">Voluntariado presencial</span>
                        </li>
                        <li class="flex items-center gap-4 text-gray-700 group-hover:translate-x-2 transition-transform duration-300" style="transition-delay: 50ms">
                            <span class="w-10 h-10 bg-fas-primary/10 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-fas-primary group-hover:text-white transition-all duration-300">
                                <i class="fas fa-check text-fas-primary text-sm group-hover:text-white"></i>
                            </span>
                            <span class="font-light">Mentoría profesional</span>
                        </li>
                        <li class="flex items-center gap-4 text-gray-700 group-hover:translate-x-2 transition-transform duration-300" style="transition-delay: 100ms">
                            <span class="w-10 h-10 bg-fas-primary/10 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-fas-primary group-hover:text-white transition-all duration-300">
                                <i class="fas fa-check text-fas-primary text-sm group-hover:text-white"></i>
                            </span>
                            <span class="font-light">Colaboración en eventos</span>
                        </li>
                    </ul>

                    <a href="<?php echo get_permalink(get_page_by_path('contacto')); ?>" class="btn-fas inline-flex items-center gap-2 px-10 py-5 bg-fas-primary text-white rounded-full text-base font-semibold tracking-wide shadow-lg hover:shadow-xl hover:scale-105 transition-all">
                        Quiero participar
                        <i class="fas fa-user-plus text-sm"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- TEAM -->
<section id="equipo" class="py-32 px-6 bg-fas-cream relative overflow-hidden">
    <div class="gradient-mesh" style="background: radial-gradient(ellipse 100% 60% at 50% 0%, rgba(255, 255, 255, 0.6) 0%, transparent 50%), radial-gradient(ellipse 60% 40% at 80% 100%, rgba(247, 171, 22, 0.08) 0%, transparent 50%);"></div>
    <div class="absolute inset-0 opacity-5" style="background: repeating-linear-gradient(45deg, transparent, transparent 10px, rgba(5, 155, 163, 0.5) 10px, rgba(5, 155, 163, 0.5) 11px);"></div>
    
    <div class="absolute -bottom-20 -left-20 w-32 h-32 text-fas-primary/10" data-speed="0.08">
        <svg viewBox="0 0 24 24" fill="currentColor">
            <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z" />
        </svg>
    </div>
    <div class="absolute top-20 right-10 w-20 h-20 text-fas-accent/10" data-speed="-0.08">
        <svg viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm0-14c-3.31 0-6 2.69-6 6s2.69 6 6 6 6-2.69 6-6-2.69-6-6-6zm0 10c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm0-6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z" />
        </svg>
    </div>
    <div class="absolute top-1/2 left-1/4 w-3 h-3 bg-fas-primary/20 rounded-full" data-speed="0.12"></div>
    <div class="absolute bottom-1/3 right-1/4 w-2 h-2 bg-fas-accent/30 rounded-full" data-speed="-0.1"></div>

    <div class="max-w-6xl mx-auto relative">
        <div class="grid lg:grid-cols-2 gap-20 items-center">
            <div class="reveal">
                <span class="inline-block text-fas-accent font-body font-medium tracking-[0.25em] uppercase text-xs mb-4">Conoce nuestro equipo</span>
                <div class="w-16 h-px bg-gradient-to-r from-fas-accent to-fas-accent-warm mb-8"></div>
                <h2 class="font-display text-4xl md:text-5xl lg:text-6xl text-gray-800 mb-8">Nuestro equipo</h2>
                
                <?php 
                $seccion_equipo = get_field('seccion_equipo');
                $texto_equipo = ($seccion_equipo && !empty($seccion_equipo['nuestro'])) ? $seccion_equipo['nuestro'] : 'Somos un equipo de personas comprometidas con Bolivia. No trabajamos desde una oficina: trabajamos en las comunidades, caminando junto a las familias, escuchando sus necesidades y construyendo juntos.';
                $texto_mision = ($seccion_equipo && !empty($seccion_equipo['mision'])) ? $seccion_equipo['mision'] : 'Transformar vidas mediante alimentación, educación, salud y emprendimiento.';
                $texto_vision = ($seccion_equipo && !empty($seccion_equipo['vision'])) ? $seccion_equipo['vision'] : 'Una Bolivia donde cada niño tenga oportunidades reales de desarrollo.';
                ?>

                <p class="text-lg text-gray-600 mb-12 leading-loose font-light">
                    <?php echo wp_kses_post($texto_equipo); ?>
                </p>

                <div class="grid grid-cols-2 gap-6">
                    <div class="bg-white rounded-3xl p-8 shadow-lg shadow-fas-primary/5 hover:shadow-xl transition-shadow">
                        <i class="fas fa-bullseye text-4xl text-fas-primary mb-5" aria-hidden="true"></i>
                        <h4 class="font-display text-2xl text-gray-800 mb-3">Misión</h4>
                        <p class="text-gray-500 font-light leading-relaxed"><?php echo esc_html($texto_mision); ?></p>
                    </div>
                    <div class="bg-white rounded-3xl p-8 shadow-lg shadow-fas-primary/5 hover:shadow-xl transition-shadow">
                        <i class="fas fa-eye text-4xl text-fas-accent mb-5" aria-hidden="true"></i>
                        <h4 class="font-display text-2xl text-gray-800 mb-3">Visión</h4>
                        <p class="text-gray-500 font-light leading-relaxed"><?php echo esc_html($texto_vision); ?></p>
                    </div>
                </div>

                <div class="mt-10">
                    <a href="<?php echo get_permalink(get_page_by_path('equipo')); ?>" class="btn-fas inline-flex items-center gap-2 px-6 py-3 border-2 border-fas-accent text-fas-accent rounded-full font-medium hover:bg-fas-accent hover:text-white transition-colors">
                        Ver equipo completo
                        <i class="fas fa-arrow-right text-sm"></i>
                    </a>
                </div>
            </div>

            <div class="reveal reveal-delay-2 grid grid-cols-2 gap-5">
                <?php 
                $img1 = ($seccion_equipo && !empty($seccion_equipo['imagen1'])) ? $seccion_equipo['imagen1'] : get_template_directory_uri() . '/assets/images/personal2.jpeg';
                $img2 = ($seccion_equipo && !empty($seccion_equipo['imagen2'])) ? $seccion_equipo['imagen2'] : get_template_directory_uri() . '/assets/images/personal1.jpeg';
                $img3 = ($seccion_equipo && !empty($seccion_equipo['imagen3'])) ? $seccion_equipo['imagen3'] : get_template_directory_uri() . '/assets/images/girlKids.png';
                $img4 = ($seccion_equipo && !empty($seccion_equipo['imagen4'])) ? $seccion_equipo['imagen4'] : get_template_directory_uri() . '/assets/images/community.jpeg';
                ?>
                <div class="space-y-5">
                    <img src="<?php echo esc_url($img1); ?>" alt="Miembro del equipo FAS 1" class="rounded-3xl shadow-2xl shadow-fas-primary/10 w-full" width="400" height="300" loading="lazy">
                    <img src="<?php echo esc_url($img2); ?>" alt="Miembro del equipo FAS 2" class="rounded-3xl shadow-2xl shadow-fas-primary/10 w-full mt-10" width="400" height="300" loading="lazy">
                </div>
                <div class="space-y-5 pt-12">
                    <img src="<?php echo esc_url($img3); ?>" alt="Miembro del equipo FAS 3" class="rounded-3xl shadow-2xl shadow-fas-primary/10 w-full" width="400" height="300" loading="lazy">
                    <img src="<?php echo esc_url($img4); ?>" alt="Miembro del equipo FAS 4" class="rounded-3xl shadow-2xl shadow-fas-primary/10 w-full" width="400" height="300" loading="lazy">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FINAL CTA -->
<section id="apoyanos" class="py-32 px-6 bg-gradient-to-br from-fas-primary via-fas-primary-dark to-fas-primary relative overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 24px 24px;"></div>
    <div class="gradient-mesh opacity-30"></div>

    <div class="absolute top-1/4 left-10 w-24 h-24 text-white/10" data-speed="0.1">
        <svg viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
        </svg>
    </div>
    <div class="absolute bottom-1/4 right-10 w-20 h-20 border-[12px] border-white/10 rounded-full" data-speed="-0.08"></div>
    <div class="absolute top-1/3 right-1/4 w-3 h-3 bg-white/20 rounded-full" data-speed="0.15"></div>
    <div class="absolute bottom-1/3 left-1/4 w-2 h-2 bg-white/30 rounded-full" data-speed="-0.12"></div>
    <div class="absolute top-20 right-1/3 w-2 h-2 bg-white/20 rounded-full" data-speed="0.08"></div>

    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-fas-accent/50 to-transparent"></div>
    <div class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-fas-accent/50 to-transparent"></div>

    <div class="max-w-3xl mx-auto text-center relative">
        <h2 class="reveal font-display text-4xl md:text-5xl lg:text-6xl text-white mb-8 leading-tight">Cada pequeño gesto puede cambiar una vida</h2>
        <p class="reveal reveal-delay-1 text-xl text-white/85 mb-12 leading-relaxed font-light max-w-xl mx-auto">No necesitamos grandes cosas. Necesitamos personas que decidan caminar junto a nosotros.</p>
        <a href="<?php echo get_permalink(get_page_by_path('contacto')); ?>" class="reveal reveal-delay-2 btn-fas inline-block bg-white text-fas-primary px-12 py-6 rounded-full text-lg font-semibold tracking-wide shadow-2xl hover:shadow-3xl">Contáctanos para apoyar</a>
    </div>
</section>

<script>
    // Hero Slider
    let currentSlide = 0;
    const slides = document.querySelectorAll('.hero-slide');
    const dots = document.querySelectorAll('.slide-dot');

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.remove('active');
            if (dots[i]) {
                dots[i].classList.remove('bg-white');
                dots[i].classList.add('bg-white/40');
            }
        });

        slides[index].classList.add('active');
        if (dots[index]) {
            dots[index].classList.remove('bg-white/40');
            dots[index].classList.add('bg-white');
        }

        const activeSlide = slides[index];
        activeSlide.querySelectorAll('.reveal').forEach(el => {
            el.classList.remove('active');
            setTimeout(() => el.classList.add('active'), 100);
        });
    }

    function changeSlide(direction) {
        currentSlide = (currentSlide + direction + slides.length) % slides.length;
        showSlide(currentSlide);
    }

    function goToSlide(index) {
        currentSlide = index;
        showSlide(currentSlide);
    }

    // Only set interval if there's more than 1 slide
    if (slides.length > 1) {
        setInterval(() => changeSlide(1), 6000);
    }

    // Parallax effect
    const parallaxElements = document.querySelectorAll('[data-speed]');

    function applyParallax() {
        const scrollY = window.scrollY;
        const windowHeight = window.innerHeight;

        parallaxElements.forEach(el => {
            const speed = parseFloat(el.dataset.speed);
            const rect = el.getBoundingClientRect();
            const sectionTop = el.offsetTop;

            if (scrollY + windowHeight > sectionTop && scrollY < sectionTop + rect.height) {
                const yPos = (scrollY - sectionTop) * speed;
                el.style.transform = `translateY(${yPos}px)`;
            }
        });
    }

    window.addEventListener('scroll', applyParallax, { passive: true });

    // Navbar scroll effect
    const mainNav = document.getElementById('main-nav');
    const navLogo = document.getElementById('nav-logo');

    function handleNavScroll() {
        const scrollY = window.scrollY;
        const navTexts = mainNav.querySelectorAll('.nav-text');
        const navBtn = mainNav.querySelector('.btn-fas');
        const dropdownContent = mainNav.querySelector('.dropdown-content');
        
        if (scrollY > 50) {
            mainNav.classList.add('navbar-scrolled');
            mainNav.classList.remove('bg-white/85', 'backdrop-blur-lg', 'border-fas-sand/50');
            mainNav.classList.add('bg-fas-dark/95', 'backdrop-blur-md', 'border-transparent');
            navTexts.forEach(el => {
                el.classList.remove('text-gray-600', 'text-gray-700', 'text-gray-800');
                el.classList.add('text-white');
            });
            if (dropdownContent) {
                dropdownContent.classList.remove('bg-white');
                dropdownContent.classList.add('bg-fas-dark', 'border-fas-dark');
            }
            if (navBtn) {
                navBtn.classList.remove('bg-fas-primary', 'text-white');
                navBtn.classList.add('bg-fas-accent', 'text-fas-dark');
            }
            // Logo: bg-dark → letras blancas
            if (navLogo && navLogo.dataset.logoDark) {
                navLogo.src = navLogo.dataset.logoDark;
            }
        } else {
            mainNav.classList.remove('navbar-scrolled');
            mainNav.classList.add('bg-white/85', 'backdrop-blur-lg', 'border-fas-sand/50');
            mainNav.classList.remove('bg-fas-dark/95', 'backdrop-blur-md', 'border-transparent');
            navTexts.forEach(el => {
                el.classList.add('text-gray-600', 'text-gray-700', 'text-gray-800');
                el.classList.remove('text-white');
            });
            if (dropdownContent) {
                dropdownContent.classList.add('bg-white');
                dropdownContent.classList.remove('bg-fas-dark', 'border-fas-dark');
            }
            if (navBtn) {
                navBtn.classList.add('bg-fas-primary', 'text-white');
                navBtn.classList.remove('bg-fas-accent', 'text-fas-dark');
            }
            // Logo: bg-white → letras negras
            if (navLogo && navLogo.dataset.logoLight) {
                navLogo.src = navLogo.dataset.logoLight;
            }
        }
    }

    window.addEventListener('scroll', handleNavScroll, { passive: true });
    handleNavScroll();
</script>

<?php get_footer(); ?>
