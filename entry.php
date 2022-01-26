<article id="post-<?php the_ID(); ?>" <?php post_class('post-min'); ?>>
<header class="post-min-header">
	<div class="image"></div>
</header>
<main class="post-min-main">
	<h3 class="tit-dos"><?php the_title(); ?></h3>
	<div class="texto">
		<?php the_excerpt(); ?>
		<a href="<?php the_permalink(); ?>" class="boton outline">Read more</a>
	</div>
</main>
<?php /* 
<?php if ( is_singular() ) { echo '<h1 class="entry-title" itemprop="headline">'; } else { echo '<h2 class="entry-title">'; } ?>
<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
<?php if ( is_singular() ) { echo '</h1>'; } else { echo '</h2>'; } ?>
<?php edit_post_link(); ?>
<?php if ( !is_search() ) { get_template_part( 'entry', 'meta' ); } ?>
</header>
<?php get_template_part( 'entry', ( is_front_page() || is_home() || is_front_page() && is_home() || is_archive() || is_search() ? 'summary' : 'content' ) ); ?>
<?php if ( is_singular() ) { get_template_part( 'entry-footer' ); } ?> 
 */ ?>
</article>