</div>
<section class="modulo-adjunto f-<?php echo get_field('diseno')['fondo']; ?>">
	<div class="main-container">
		<div class="col text">
			<h2 class="tit-tres"><?php echo get_field('titulo'); ?></h2>	
			<?php //var_dump(get_field('bajada'));
			if(get_field('bajada')):?><p class="subtit-dos"><?php echo get_field('bajada');?></p><?php endif; ?>
		</div>
		<div class="col">
			<a href="<?php echo get_field('boton')['archivo']; ?>" class="boton" target="_blank"><i class="fa fa-download"></i> <?php echo get_field('boton')['texto']; ?></a>
		</div>

	</div>
</section>
<div class="main-container">