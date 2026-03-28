<?php
/**
 * Template Name: Página de Equipo
 */

get_header();
?>

<main class="pt-20">
    <!-- Hero Section -->
    <section class="relative py-32 px-6 bg-white overflow-hidden">
        <div class="gradient-mesh"></div>
        <div class="max-w-4xl mx-auto text-center">
            <span class="reveal inline-block text-fas-accent font-medium tracking-[0.25em] uppercase text-xs mb-6">Conócenos</span>
            <h1 class="reveal reveal-delay-1 font-display text-5xl md:text-6xl lg:text-7xl text-gray-800 mb-6 leading-[1.15]">Nuestro Equipo</h1>
            <p class="reveal reveal-delay-2 text-gray-600 text-lg max-w-2xl mx-auto leading-relaxed font-light">
                Detrás de cada sonrisa hay un equipo comprometido con transformar vidas. Conoce a las personas que hacen posible esta labor.
            </p>
        </div>
    </section>

    <!-- Mission & Vision -->
    <section class="py-32 px-6 bg-fas-cream relative overflow-hidden">
        <div class="gradient-mesh"></div>
        <div class="max-w-6xl mx-auto relative">
            <div class="grid md:grid-cols-2 gap-8">
                <div class="reveal reveal-delay-2 bg-white rounded-[3rem] p-10 shadow-lg card-organic">
                    <div class="w-16 h-16 bg-fas-primary/10 rounded-2xl flex items-center justify-center mb-6">
                        <i class="fas fa-bullseye text-fas-primary text-2xl"></i>
                    </div>
                    <h3 class="font-display text-2xl text-gray-800 mb-4">Misión</h3>
                    <p class="text-gray-600 leading-relaxed font-light">
                        Transformar vidas mediante alimentación, educación, salud y emprendimiento, caminando junto a las comunidades más vulnerables de Bolivia.
                    </p>
                </div>
                <div class="reveal reveal-delay-3 bg-white rounded-[3rem] p-10 shadow-lg card-organic">
                    <div class="w-16 h-16 bg-fas-accent/10 rounded-2xl flex items-center justify-center mb-6">
                        <i class="fas fa-eye text-fas-accent text-2xl"></i>
                    </div>
                    <h3 class="font-display text-2xl text-gray-800 mb-4">Visión</h3>
                    <p class="text-gray-600 leading-relaxed font-light">
                        Un Bolivia donde cada niño tenga oportunidades reales de desarrollo y donde las comunidades puedan construir su propio futuro con dignidad.
                    </p>
                </div>
            </div>
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
            $equipo = get_field('equipo');
            if ($equipo):
            ?>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php foreach ($equipo as $miembro): ?>
                <div class="reveal team-card group">
                    <div class="relative overflow-hidden rounded-[3rem] mb-6 aspect-[3/4]">
                        <img src="<?php echo $miembro['foto']; ?>" alt="<?php echo $miembro['nombre']; ?>" class="team-img w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/60 via-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        <div class="absolute bottom-6 left-6 right-6 translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                            <p class="text-white text-sm"><?php echo $miembro['bio']; ?></p>
                        </div>
                    </div>
                    <div class="text-center">
                        <h3 class="font-display text-xl text-gray-800 mb-1"><?php echo $miembro['nombre']; ?></h3>
                        <p class="text-fas-primary font-medium text-sm mb-2"><?php echo $miembro['rol']; ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php else: ?>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="reveal reveal-delay-3 team-card group">
                    <div class="relative overflow-hidden rounded-[3rem] mb-6 aspect-[3/4]">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/personal/1.jpeg" alt="Director Ejecutivo" class="team-img w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/60 via-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>
                    <div class="text-center">
                        <h3 class="font-display text-xl text-gray-800 mb-1">Carlos Mendoza</h3>
                        <p class="text-fas-primary font-medium text-sm mb-2">Director Ejecutivo</p>
                    </div>
                </div>

                <div class="reveal reveal-delay-4 team-card group">
                    <div class="relative overflow-hidden rounded-[3rem] mb-6 aspect-[3/4]">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/personal/2.jpeg" alt="Directora de Programas" class="team-img w-full h-full object-cover">
                    </div>
                    <div class="text-center">
                        <h3 class="font-display text-xl text-gray-800 mb-1">María Elena García</h3>
                        <p class="text-fas-primary font-medium text-sm mb-2">Directora de Programas</p>
                    </div>
                </div>

                <div class="reveal reveal-delay-5 team-card group">
                    <div class="relative overflow-hidden rounded-[3rem] mb-6 aspect-[3/4]">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/personal/3.jpeg" alt="Coordinador de Comunidades" class="team-img w-full h-full object-cover">
                    </div>
                    <div class="text-center">
                        <h3 class="font-display text-xl text-gray-800 mb-1">Roberto Tito</h3>
                        <p class="text-fas-primary font-medium text-sm mb-2">Coordinador de Comunidades</p>
                    </div>
                </div>

                <div class="reveal reveal-delay-6 team-card group">
                    <div class="relative overflow-hidden rounded-[3rem] mb-6 aspect-[3/4]">
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
        <div class="gradient-mesh"></div>
        <div class="max-w-4xl mx-auto text-center relative">
            <h2 class="reveal font-display text-4xl md:text-5xl text-gray-800 mb-6">¿Quieres sumarte al equipo?</h2>
            <p class="reveal reveal-delay-1 text-gray-600 text-lg font-light mb-8">Siempre estamos buscando personas comprometidas con nuestra misión.</p>
            <a href="<?php echo get_permalink(get_page_by_path('contacto')); ?>" class="reveal reveal-delay-2 btn-fas px-9 py-4 bg-fas-primary text-white rounded-full font-medium">Contáctanos</a>
        </div>
    </section>
</main>

<?php get_footer(); ?>
