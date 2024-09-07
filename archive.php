<?php get_header(); ?>
<main id="content" role="main">
<header class="header">
<h1 class="entry-title" itemprop="name"><?php the_archive_title(); ?></h1>
<div class="archive-meta" itemprop="description"><?php if ( '' != the_archive_description() ) { echo esc_html( the_archive_description() ); } ?></div>
</header>
<?php /* if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'entry' ); ?>
<?php endwhile; endif; */?>

</main>
<main id="content" role="main">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header class="f-negro">
	<div class="main-container">
		<div class="space"></div>
		<div class="space"></div>
		<div class="space"></div>
		
		<h2 class="sub-mega"><?php the_archive_title(); ?></h2>
		<div class="archive-meta" itemprop="description"><?php if ( '' != the_archive_description() ) { echo esc_html( the_archive_description() ); } ?></div>
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
	<?php 
	wp_pagenavi();
	//get_template_part( 'nav', 'below' );  ?>
	<div class="space"></div>

	<div class="space"></div>
</main>
<?php get_footer(); ?>