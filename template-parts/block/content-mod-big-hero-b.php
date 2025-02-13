<?php
$fotos = get_field('imagenes_feature');
$rand = rand(1000,9999);
$bg = get_field('background');
$bg_type = $bg['type'];
$bg_image = $bg['image_background'];


?>
</div>
<section id="el-<?php echo $rand; ?>" class="hero mvp big-hero f-<?php echo get_field('diseno')['fondo']; ?>" <?php if($bg_type == 'image'): ?>style="background-image:url('<?php echo $bg_image['url'];?>')" <?php endif; ?> id="<?php echo get_field('block_slug'); ?>">
	<div class="test-imagen"></div>
	<?php if($bg_type == 'image' && !get_field('logo_mask') ): ?>
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
		<div class="contenedor-principal" data-anim=true data-scroll-speed=.5 style="background-image:url('<?php // echo $fotos['base']['url'];?>')">
			<h1 class="sub-mega"><?php echo get_field('titulo');?></h1>		
			<?php if(get_field('bajada')):?>
			<div class="bajada subtit-tres">
				<?php echo get_field('bajada'); ?>
					
				</div>
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
	<?php if(get_field('imagen_safe')):?> 
	<style type="text/css">
		#el-<?php echo $rand?>.safari{
			background-image: url('<?php echo get_field('imagen_safe')['url'];?>')!important;
		}
		#el-<?php echo $rand?>.safari .mascara-container{
			display: none;
		}
	</style>
	<?php endif; ?>
	<?php if($bg_type == 'image' && !get_field('logo_mask') ): ?>
	<script type="text/javascript">
		$(document).ready(function(){

			var _el = $('#el-<?php echo $rand?>');
			if(navigator.vendor ==  "Apple Computer, Inc."){
				_el.addClass('safari');	
			}
			_checkScroll(_el);
			$(document).scroll(function(){
				_checkScroll(_el);
			})
		});
		function _checkScroll(_el){
			
			var _per = ($(document).scrollTop()-_el.position().top)/(_el.outerHeight());
			if(_per<0) _per = 0;
			var _max = $('.mascara-container').outerHeight()*.55;
			var _val = -_max+_per*_max;
			
			gsap.to(_el.find('.imagen-mask'), {backgroundPosition:"50% "+(60+_per*40)+"%" ,ease:"power3.out",duration:1});
			var _move = _el.outerHeight()*(.5+.15*_per);
			gsap.to(_el.find('.mascara-container'), {top:_move ,ease:"power3.out",duration:.7});
		}
	</script>
	<?php endif; ?>
</section>
<div class="main-container">