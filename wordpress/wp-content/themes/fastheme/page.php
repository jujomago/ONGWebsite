<?php get_header(); ?>

<main class="pt-20">
    <?php
    while (have_posts()) :
        the_post();
    ?>
    <article <?php post_class('max-w-4xl mx-auto px-6 py-20'); ?>>
        <?php if (!is_front_page()): ?>
        <header class="mb-12 text-center">
            <h1 class="font-display text-4xl md:text-5xl lg:text-6xl text-gray-800 mb-6">
                <?php the_title(); ?>
            </h1>
            <?php if (has_excerpt()): ?>
            <p class="text-xl text-gray-600 font-light max-w-2xl mx-auto">
                <?php the_excerpt(); ?>
            </p>
            <?php endif; ?>
        </header>
        <?php endif; ?>

        <div class="prose prose-lg max-w-none">
            <?php the_content(); ?>
        </div>
    </article>
    <?php
    endwhile;
    ?>
</main>

<?php get_footer(); ?>
