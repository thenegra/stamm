<section class="modulo-uno">
	<div class="columna col-texto">
		<h3 class="tit-uno"><?php echo get_field('titulo');?></h3>
		<div class="space"></div>
		<div class="texto">
			<?php echo get_field('contenido'); ?>
		</div>
	</div>
	<div class="columna foto">
		<img src="<?php echo get_field('foto')['url']; ?>" alt="<?php echo get_field('titulo');?>">
	</div>
</section>