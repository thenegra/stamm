<?php 
$fotos = get_field('imagenes_feature'); 
$txt_color = (get_field('text_color')) ? get_field('text_color') : 'white';
$bg_type = get_field('background_type');
$id = generateRandomString(10);
?> 
</div>
<section class="hero phrase-hero <?php if(get_field('invertir')){ echo 'invertida'; }?> f-<?php echo get_field('diseno')['fondo']; ?>" <?php if($bg_type == 'image'): ?> style="background-image:url('<?php echo $fotos['fondo']['url'];?>')" <?php endif; ?> id="<?php echo get_field('block_slug'); ?>">
	<?php if($bg_type == "gallery"):?>
		<div class="background-gallery-container" >
			<div class="background-gallery glide" id="gal-<?php echo $id; ?>">
  <div class="glide__track" data-glide-el="track">
    <ul class="glide__slides">
      
      
    
		<?php foreach(get_field('gallery') as $image):?>
			<li class="glide__slide">
		<img alt="<?php echo $image['alt']; ?>" src="<?php echo $image['url']; ?>" width=<?php echo $image['width']; ?> height=<?php echo $image['height']; ?> />
			
			</li>
		<?php endforeach;?>
		</ul>
  </div>
  <div class="glide__bullets" data-glide-el="controls[nav]">
  	<?php $ct = 0;
  	foreach(get_field('gallery') as $image):?>
            <button class="slider__bullet glide__bullet" data-glide-dir="=<?php echo $ct; ?>"></button>
            <?php $ct++; endforeach;?> 
            
        </div>
</div>
		</div>



		
		<script type="text/javascript">
			jQuery(document).ready(function(){


			var glide = new Glide('#gal-<?php echo $id; ?>', {
  type: 'slider',
  focusAt: 'center',
  perView: 1,
  autoplay: 3000
}).mount();
		});
		</script>
	<?php endif;?>
	<div class="main-container">
		<div class="contenedor-principal highlighted-content inner-padding blurred-container <?php if(get_field('right')):?>right<?php endif;?> " <?php if($bg_type == 'image'): ?>  <?php if($fotos['base']):?>style="background-image:url('<?php echo $fotos['base']['url'];?>')" <?php endif; ?> <?php endif;?> data-anim=true data-scroll-speed=1>
			<div class="text ">
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
					<div class="cta-container">
				
			
					<a class="boton" onclick="openForm(<?php echo get_field('form')->ID;?>)"><?php echo get_field('button_text');?></a>
					</div>
					<?php
					break;
				case 'link':
				?>

					<a class="boton" href="<?php echo get_field('link')['url'];?>" target="<?php echo get_field('link')['targetx']; ?>"><?php echo get_field('link')['title'];?></a>
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
	<div class="contenedor-secundario blurred-container <?php if(get_field('right')):?>right<?php endif;?> " <?php if($bg_type == 'image'): ?>  <?php if($fotos['detalle']):?>style="background-image:url('<?php echo $fotos['detalle']['url'];?>')" <?php endif ?><?php endif; ?>  data-anim=true data-scroll-speed=.3></div>
</section>
<div class="main-container">
