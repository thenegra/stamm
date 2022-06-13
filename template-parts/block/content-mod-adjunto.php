</div>
<section class="modulo-adjunto f-<?php echo get_field('diseno')['fondo']; ?>">
	<div class="main-container">
		<div class="columna inner-padding big-padding">
			<h2 class="tit-dos"><?php echo get_field('titulo'); ?></h2>	
			<?php //var_dump(get_field('bajada'));
			if(get_field('bajada')):?><p class="sbutit"><?php echo get_field('bajada');?></p><?php endif; ?>
		</div>
		<div class="columna inner-padding big-padding boton">
			<a href="<?php echo get_field('boton')['archivo']; ?>" class="boton" target="_blank"><?php echo get_field('boton')['texto']; ?></a>
		</div>

	</div>
</section>
<div class="main-container">