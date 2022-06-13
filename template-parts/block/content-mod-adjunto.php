</div>
<section class="modulo-adjunto f-<?php echo get_field('diseno')['fondo']; ?>">
	<div class="main-container">
		<div class="col">
			<h2 class="tit-dos"><?php echo get_field('titulo'); ?></h2>	
			<?php //var_dump(get_field('bajada'));
			if(get_field('bajada')):?><p class="subtit"><?php echo get_field('bajada');?></p><?php endif; ?>
		</div>
		<div class="col inner-padding big-padding">
			<a href="<?php echo get_field('boton')['archivo']; ?>" class="boton" target="_blank"><?php echo get_field('boton')['texto']; ?></a>
		</div>

	</div>
</section>
<div class="main-container">