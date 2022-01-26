<?php get_header(); ?>
<main id="content" role="main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'post-header' ); ?>
<?php get_template_part( 'post-content' ); ?>
<?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>