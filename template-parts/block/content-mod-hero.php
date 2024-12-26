<?php
$fotos = get_field('imagenes_feature');
$txt_color = (get_field('text_color')) ? get_field('text_color') : 'white';
?>
</div>
<section class="hero normal-hero f-<?php echo get_field('diseno')['fondo']; ?>" style="background-image:url('<?php echo $fotos['fondo']['url'];?>')" id="<?php echo get_field('block_slug'); ?>">
	<div class="main-container c-<?php echo $txt_color;?>" >
		<div class="contenedor-principal inner-padding" style="background-image:url('<?php echo $fotos['base']['url'];?>')" data-anim=true data-scroll-speed=.3>
			<h1 class="tit-uno"><?php echo get_field('frase'); ?></h1>		
			<?php if(get_field('secundario')):?>
			<span class="mini-text"><?php echo get_field('secundario'); ?></span>
			<?php endif; ?>
		</div>
		
	</div>
		<div class="contenedor-secundario" style="background-image:url('<?php echo $fotos['detalle']['url'];?>')" data-anim=true></div>
</section>
<div class="main-container">