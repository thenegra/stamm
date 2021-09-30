<?php $fotos = get_field('imagenes_feature'); ?> 
</div>
<section class="hero phrase-hero <?php if(get_field('invertir')){ echo 'invertida'; }?> f-<?php echo get_field('diseno')['fondo']; ?>" style="background-image:url('<?php echo $fotos['fondo']['url'];?>')">
	<div class="main-container">
		<div class="contenedor-principal inner-padding " style="background-image:url('<?php echo $fotos['base']['url'];?>')">
			<h2 class="tit-uno"><?php echo get_field('frase'); ?></h2>	
			<?php if(get_field('secundario')):?>
			<span class="mini-text"><?php echo get_field('secundario'); ?></span>
			<?php endif; ?>
		</div>
		<div class="contenedor-secundario" style="background-image:url('<?php echo $fotos['detalle']['url'];?>')"></div>
	</div>
	
</section>
<div class="main-container">