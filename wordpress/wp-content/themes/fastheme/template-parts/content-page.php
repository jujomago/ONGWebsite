<?php
$page_slug = $post->post_name;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('page-template page-' . $page_slug); ?>>
    <?php
    the_content();
    ?>
</article>
