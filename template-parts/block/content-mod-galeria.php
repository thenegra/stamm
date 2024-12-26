<?php 
$galeria = get_field('galeria');
$id = generateRandomString(10);
?>
</div>
<section class="mod-galeria f-<?php echo get_field('diseno')['fondo']; ?>" id="<?php echo get_field('block_slug'); ?>">
	<?php if(get_field('titulo')):?>
	<div class="main-container">
		
		<h3 class="tit-uno"><?php echo get_field('titulo');?></h3>

	</div>
	<?php endif;?>
	<div class="main-container f-negro  mob-full">

		<div class="galeria" >
			<div class="glide" id="gal-<?php echo $id; ?>">
  <div class="glide__track" data-glide-el="track">
    <ul class="glide__slides">
      
      
    
		<?php foreach($galeria as $foto):?>
			<li class="glide__slide">
		<?php echo wp_get_attachment_image($foto['ID'],'foto-hq'); ?>
			</li>
		<?php endforeach;?>
		</ul>
  </div>
  <div class="glide__bullets" data-glide-el="controls[nav]">
  	<?php $ct = 0;
  	foreach($galeria as $foto):?>
            <button class="slider__bullet glide__bullet" data-glide-dir="=<?php echo $ct; ?>"></button>
            <?php $ct++; endforeach;?> 
            
        </div>
</div>
		</div>
	</div>
</section>
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
<div class="main-container">