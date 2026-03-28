<?php
/**
 * Template Name: Página de Nosotros
 */

get_header();


?>

<main class="pt-20">
    <!-- Hero Section -->
    <section class="relative py-32 px-6 bg-white overflow-hidden">
        <div class="gradient-mesh"></div>
        
        <div class="max-w-4xl mx-auto text-center">
            <span class="reveal inline-block text-fas-accent font-medium tracking-[0.25em] uppercase text-xs mb-6">Nuestra historia</span>
            <h1 class="reveal reveal-delay-1 font-display text-5xl md:text-6xl lg:text-7xl text-gray-800 mb-6 leading-[1.15]">
                Quiénes <span class="italic text-fas-accent">somos</span>
            </h1>
            <p class="reveal reveal-delay-2 text-gray-600 text-lg max-w-2xl mx-auto leading-relaxed font-light">
                Una fundación comprometida con transformar vidas en las comunidades más vulnerables de Bolivia.
            </p>
        </div>
    </section>

    <!-- Historia -->
    <section class="py-32 px-6 bg-fas-cream relative overflow-hidden">
        <div class="gradient-mesh"></div>
        <div class="max-w-6xl mx-auto relative">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div>
                    <span class="reveal inline-block text-fas-accent font-medium tracking-[0.25em] uppercase text-xs mb-4">Nuestra historia</span>
                    <div class="reveal reveal-delay-1 w-16 h-px bg-gradient-to-r from-fas-accent to-fas-accent-warm mb-6"></div>
                    <h2 class="reveal reveal-delay-2 font-display text-4xl md:text-5xl text-gray-800 mb-6">Caminando junto a las comunidades</h2>
                    <div class="reveal reveal-delay-3 space-y-4 text-gray-600 font-light leading-relaxed">
                        <p>Fundación Alimentando Sonrisas (FAS) nació con la convicción de que cada persona merece la oportunidad de construir una vida digna.</p>
                        <p>Comenzamos nuestro trabajo en las comunidades Guaraníes de Cochabamba, Bolivia, donde la pobreza no es solo falta de dinero: es falta de esperanza.</p>
                        <p>Hoy, después de años de trabajo constante, seguimos caminando junto a las comunidades, no para dar limosna, sino para construir juntos un futuro mejor.</p>
                    </div>
                </div>
                <div class="reveal reveal-delay-4 grid grid-cols-2 gap-4">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/community.jpeg" alt="Comunidad" class="rounded-3xl shadow-xl" loading="lazy">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/children.jpeg" alt="Niños" class="rounded-3xl shadow-xl mt-8" loading="lazy">
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision -->
    <section class="py-32 px-6 bg-white relative overflow-hidden">
        <div class="gradient-mesh"></div>
        <div class="max-w-6xl mx-auto relative">
            <div class="grid md:grid-cols-2 gap-8">
                <div class="reveal reveal-delay-2 bg-fas-cream rounded-[3rem] p-10 shadow-lg card-organic">
                    <div class="w-16 h-16 bg-fas-primary/10 rounded-2xl flex items-center justify-center mb-6">
                        <i class="fas fa-bullseye text-fas-primary text-2xl"></i>
                    </div>
                    <h3 class="font-display text-2xl text-gray-800 mb-4">Misión</h3>
                    <p class="text-gray-600 leading-relaxed font-light">
                        Transformar vidas mediante alimentación, educación, salud y emprendimiento, caminando junto a las comunidades más vulnerables de Bolivia.
                    </p>
                </div>
                <div class="reveal reveal-delay-3 bg-fas-cream rounded-[3rem] p-10 shadow-lg card-organic">
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

    <!-- Valores -->
    <section class="py-32 px-6 bg-fas-cream relative overflow-hidden">
        <div class="gradient-mesh"></div>
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
                    <p class="text-gray-500 font-light text-sm">Estamos comprometidos con cada familia, cada niño, cada comunidad.</p>
                </div>
                <div class="reveal reveal-delay-4 bg-white rounded-[2.5rem] p-8 text-center shadow-lg">
                    <div class="w-14 h-14 bg-fas-accent/10 rounded-2xl flex items-center justify-center mx-auto mb-5">
                        <i class="fas fa-users text-fas-accent text-xl"></i>
                    </div>
                    <h3 class="font-display text-xl text-gray-800 mb-3">Trabajo en equipo</h3>
                    <p class="text-gray-500 font-light text-sm">Creemos en la fuerza de la comunidad y en construir juntos.</p>
                </div>
                <div class="reveal reveal-delay-5 bg-white rounded-[2.5rem] p-8 text-center shadow-lg">
                    <div class="w-14 h-14 bg-fas-leaf/10 rounded-2xl flex items-center justify-center mx-auto mb-5">
                        <i class="fas fa-seedling text-fas-leaf text-xl"></i>
                    </div>
                    <h3 class="font-display text-xl text-gray-800 mb-3">Sostenibilidad</h3>
                    <p class="text-gray-500 font-light text-sm">Buscamos soluciones que perduren y generen autonomía.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-32 px-6 bg-white relative overflow-hidden">
        <div class="gradient-mesh"></div>
        <div class="max-w-4xl mx-auto text-center relative">
            <h2 class="reveal font-display text-4xl md:text-5xl text-gray-800 mb-6">¿Quieres ser parte de esta misión?</h2>
            <p class="reveal reveal-delay-1 text-gray-600 text-lg font-light mb-8">Cada apoyo cuenta para seguir transformando vidas.</p>
            <a href="<?php echo get_permalink(get_page_by_path('apoyanos')); ?>" class="reveal reveal-delay-2 btn-fas px-9 py-4 bg-fas-primary text-white rounded-full font-medium">Únete a nuestra causa</a>
        </div>
    </section>
</main>

<?php get_footer(); ?>
