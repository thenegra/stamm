<?php
$fotos = get_field('imagenes_feature');
?>
</div>
<section class="hero big-hero f-<?php echo get_field('diseno')['fondo']; ?>" style="background-image:url('<?php echo $fotos['fondo']['url'];?>')">
	<div class="main-container">
		<div class="contenedor-principal inner-padding" style="background-image:url('<?php echo $fotos['base']['url'];?>')">
			<h1 class="mega"><?php echo get_field('titulo');?></h1>		
			<?php if(get_field('bajada')):?>
			<div class="bajada"><?php echo get_field('bajada'); ?></div>
			<?php endif; ?>
		</div>
		<div class="contenedor-secundario" style="background-image:url('<?php echo get_field('imagen')['url'];?>')"></div>
	</div>
	
</section>
<div class="main-container">