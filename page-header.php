<?php
/*
Template Name: Big title page
Template Post Type: post, page */ 
?>

<?php get_header(); ?>
<main id="content" class="f-negro" role="main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header class="">
	<div class="main-container">
		<div class="space"></div>
		<div class="space"></div>
		<div class="space"></div>
		<div class="space"></div>
		<div class="space"></div>
		<div class="space"></div>
		<h2 class="mega"><?php echo the_title(); ?></h2>
		<div class="space"></div>
		<div class="space"></div>
	</div>
</header>
<div class="main-container">

<?php the_content(); ?>
</div>
</article>

<?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>