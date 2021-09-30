<?php
$fotos = get_field('imagenes_feature');
?>
</div>
<section class="hero normal-hero f-<?php echo get_field('diseno')['fondo']; ?>" style="background-image:url('<?php echo $fotos['fondo']['url'];?>')">
	<div class="main-container">
		<div class="contenedor-principal inner-padding" style="background-image:url('<?php echo $fotos['base']['url'];?>')">
			<h1 class="tit-uno"><?php echo get_field('frase'); ?></h1>		
			<?php if(get_field('secundario')):?>
			<span class="mini-text"><?php echo get_field('secundario'); ?></span>
			<?php endif; ?>
		</div>
		<div class="contenedor-secundario" style="background-image:url('<?php echo $fotos['detalle']['url'];?>')"></div>
	</div>
	
</section>
<div class="main-container">