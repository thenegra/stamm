<main id="content" role="main">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header class="f-negro">
	<div class="main-container">
		<div class="space"></div>
		<div class="space"></div>
		<div class="space"></div>
		
		<h2 class="sub-mega">Blog</h2>
		<div class="space"></div>
		<div class="space"></div>
	</div>
</header>
<main class="main-blog">
	<div class="space"></div>
	<div class="space"></div>
	<div class="main-container">
		
		<div class="post-container">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php get_template_part( 'entry' ); ?>
	<?php //comments_template(); ?>
	<?php endwhile; endif; ?>
		</div>
		<header class="blog-nav">
			<h3 >Categories</h3>
			<?php wp_nav_menu('Blog menu'); ?>
		</header>
	</div>
	<div class="space"></div>
	<div class="space"></div>
</main>