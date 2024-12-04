<?php
$fotos = get_field('imagenes_feature');
$txt_color = (get_field('text_color')) ? get_field('text_color') : 'white';
?>
</div>

<section class="hero featured-content f-<?php echo get_field('diseno')['fondo']; ?>" style="">
	<img src="<?php echo $fotos['fondo']['url'];?>" alt="background-image" class="background-image">
	<div class="main-container">
		<div class="contenedor-principal highlighted-content inner-padding blurred-container <?php if(get_field('right')):?>right <?php endif;?> c-<?php echo $txt_color; ?>" <?php if($fotos['base']):?>style="background-image:url('<?php echo $fotos['base']['url'];?>')"<?php endif; ?> data-anim=true >
			<div class="text-content">
				
				<?php if(get_field('contents')):?>
				<div class="text">
					<h1 class="tit-uno"><?php echo get_field('frase'); ?></h1>
					<?php echo get_field('contents'); ?>
			
				</div>
				<?php endif; ?>
				
			</div>
			<?php
			if(get_field('has_link')):
				var_dump(get_field('link_type'));
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

			<?php if(get_field('secundario')):?>
			<span class="mini-text"><?php echo get_field('secundario'); ?></span>
			<?php endif; ?>
		</div>
		<div class="secondary-content column-container two c-<?php echo $txt_color; ?>" data-anim=true data-scroll-speed=.5>
		
		<?php foreach(get_field('secondary') as $content):
			?>
		<article class="column inner-padding " data-anim=true data-scroll-speed=.4 >
			<div class="content-test">
				<h3 class="subtit-dos c-verde"><?php echo $content['title'];?></h3>
				<div class="text"><?php echo $content['text']; ?></div>
			</div>
		</article>
		<?php endforeach;?>
		</div>
		<!--div class="contenedor-secundario blurred-container" style="background-image:url('<?php echo $fotos['detalle']['url'];?>')"></div-->
		
	</div>
	
</section>
<div class="main-container">