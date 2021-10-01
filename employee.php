<article id="employee-<?php the_ID(); ?>" <?php post_class('employee'); ?>>
	<?php if ( has_post_thumbnail() ) : 
		the_post_thumbnail('feed-size');
	else:
	endif;
	?>
	<div class="inner-padding f-gris">
		<h3 class="titul-dos"><?php the_title(); ?></h3>
		<p class="subtit-dos"><?php echo get_field('cargo',get_the_ID()); ?></p>
	</div>
</article>