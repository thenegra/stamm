<?php
$fotos = get_field('imagenes_feature');
$rand = rand(1000,9999);
/*$bg = get_field('background');
$bg_type = $bg['type'];
$bg_image = $bg['image_background'];*/

$id = generateRandomString(10);

?>
</div>

	<div class="hero-slider" id="<?php echo get_field('block_slug'); ?>">
			<div class="glide" id="gal-<?php echo $id; ?>">
  <div class="glide__track" data-glide-el="track">
    <ul class="glide__slides">
      
      
    
		

<?php foreach(get_field('slides') as $slide):
	$bg = $slide['background'];
	$bg_type = $bg['type'];
	$bg_image = $bg['image_background'];
	
	?>
	
<section id="el-<?php echo $rand; ?>" class="glide__slide hero mvp big-hero f-negro" <?php if($bg_type == 'image'): ?>style="background-image:url('<?php echo $bg_image['url'];?>')" <?php endif; ?>>
	<?php if($bg_type == 'image'): ?>
	<div class="mascara-container">
		<div class="imagen-mask" style="background-image:url('<?php echo $bg_image['url'];?>')"></div>
		</div>
	<svg >
		<defs>
		<clipPath id="mascara" clipPathUnits="objectBoundingBox">
			<path d="M0.95302777777778,1H0.046972222222222c-0.014990740740741,0-0.028916666666667-0.0077685185185185-0.036796296296296-0.020509259259259c-0.0078796296296296-0.012759259259259-0.0086018518518519-0.028694444444444-0.0018888888888889-0.042101851851852L0.46131481481481,0.031342592592593 C0.46863888888889,0.016685185185185,0.48362037037037,0.0074259259259259,0.5,0.0074259259259259s0.031361111111111,0.0092592592592593,0.038694444444444,0.023916666666667l0.45302777777778,0.90605555555556c0.0067037037037037,0.013407407407407,0.0059907407407407,0.029333333333333-0.0018888888888889,0.042092592592593 C0.98194444444444,0.99223148148148,0.96801851851852,1,0.95302777777778,1z M0.13931481481481,0.91348148148148h0.72137037037037c0.010268518518519,0,0.016935185185185-0.010805555555556,0.012351851851852-0.019981481481481L0.51235185185185,0.17212037037037 c-0.0050925925925926-0.010175925925926-0.019611111111111-0.010175925925926-0.024703703703704,0L0.12696296296296,0.8935C0.12237037037037,0.90267592592593,0.1290462962963,0.91348148148148,0.13931481481481,0.91348148148148z"/>
			<circle cx="0.107148148148148" cy="0.059703703703704" r="0.059703703703704"/>
			<circle cx="0.892861111111111" cy="0.059703703703704" r="0.059703703703704"/>
		</clipPath>
		</defs>
	</svg>
	<?php endif; ?>
	<?php if($bg_type == 'video'){
		//var_dump($bg['video']['url']);
		getVideoBackground($bg['video']);
	}?>
	<div class="main-container">
		<div class="contenedor-principal" style="background-image:url('<?php // echo $fotos['base']['url'];?>')">
			<h1 class="sub-mega"><?php echo $slide['titulo'];?></h1>		
			<?php if($slide['parrafo']):?>
			<div class="bajada subtit-tres">
				<?php echo $slide['parrafo']; ?>
					
				</div>
			<?php endif; ?>
			<?php
			getButton($slide['link']);
			?>
			
		</div>
		
	</div>
	<style type="text/css">
		#el-<?php echo $rand?>.safari{
			background-image: url('<?php echo get_field('imagen_safe')['url'];?>')!important;
		}
		#el-<?php echo $rand?>.safari .mascara-container{
			display: none;
		}
	</style>
	
</section>

<?php endforeach; ?>

		</ul>
  </div>
  <div class="glide__bullets" data-glide-el="controls[nav]">
  	<?php $ct = 0;
  	foreach(get_field('slides') as $slide): ?>
            <button class="slider__bullet glide__bullet" data-glide-dir="=<?php echo $ct; ?>"></button>
            <?php $ct++; endforeach;?> 
            
        </div>
</div>
		</div>
<script type="text/javascript">
			
	
		jQuery(document).ready(function(){
			
			
			console.log($('#gal-<?php echo $id; ?>'));
			var glide = new Glide('#gal-<?php echo $id; ?>', {
  type: 'slider',
  focusAt: 'center',
  perView: 1,
  autoplay: 3000
}).mount();
		});

	</script>
<div class="main-container">