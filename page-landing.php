<?php get_header(); ?>
<main id="content" role="main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<section class="coming-soon f-gris">
<div class="main-container">
	<div class="contenido-marca">
		<h1 class="logo">
			<img src="<?php echo get_template_directory_uri()?>/dist/img/st_logo_green.svg" alt="STÄMM">
		</h1>
	</div>
	<div class="contenido-marca">
		
		<h2 class="destacado">We are working<br>on a brand<br>new website</h2>
		<p class="subtit">Come back soon</p>
	</div>
	
</div>
</section>
</article>

<?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>