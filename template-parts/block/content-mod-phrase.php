<?php 
$fotos = get_field('imagenes_feature'); 
$txt_color = (get_field('text_color')) ? get_field('text_color') : 'white';
?> 
</div>
<section class="hero phrase-hero <?php if(get_field('invertir')){ echo 'invertida'; }?> f-<?php echo get_field('diseno')['fondo']; ?>" style="background-image:url('<?php echo $fotos['fondo']['url'];?>')">
	<div class="main-container">
		<div class="contenedor-principal highlighted-content inner-padding blurred-container <?php if(get_field('right')):?>right<?php endif;?> c-<?php echo $txt_color; ?>" <?php if($fotos['base']):?>style="background-image:url('<?php echo $fotos['base']['url'];?>')" <?php endif;?> data-anim=true data-scroll-speed=1>
			<div class="text">
				<h2 class="tit-uno"><?php echo get_field('frase'); ?></h2>
				<?php
				if(get_field('contents')):
				
					echo get_field('contents');
				endif; 
				?>	
			</div>
			
			<?php if(get_field('secundario')):?>
			<span class="mini-text"><?php echo get_field('secundario'); ?></span>
			<?php endif; ?>
			<?php
			if(get_field('has_link')):
			switch (get_field('link_type')) {
				case 'contact':
					?>

					<a class="boton" href="#footer"><?php echo get_field('button_text');?></a>
					<?php
					break;
				case 'link':
				?>

					<a class="boton" href="<?php echo get_field('link')['url'];?>"><?php echo get_field('link')['title'];?></a>
					<?php
					break;
				default:
					?>
					<?php
					break;
			}
			endif;
			?>
		</div>
		
	</div>
	<div class="contenedor-secundario blurred-container <?php if(get_field('right')):?>right<?php endif;?> c-<?php echo $txt_color; ?>" <?php if($fotos['detalle']):?>style="background-image:url('<?php echo $fotos['detalle']['url'];?>')"<?php endif; ?>  data-anim=true data-scroll-speed=.3></div>
</section>
<div class="main-container">
