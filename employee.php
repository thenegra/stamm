<article id="employee-<?php the_ID(); ?>" <?php post_class('employee'); ?>>
	<div class="foto">
	<?php if ( has_post_thumbnail() ) : 
		the_post_thumbnail('feed-size',['title'=>get_the_title()]);
	else:
	endif;
	?>
	</div>
	<div class="inner-padding f-gris contenido">
		<h3 class="subtit-dos"><?php the_title(); ?></h3>
		<p class=""><?php echo get_field('cargo',get_the_ID()); ?></p>
	</div>
</article>