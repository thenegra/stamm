</div>
<section class="modulo-slider <?php if(get_field('invertir')){ echo 'invertida'; }?> f-<?php echo get_field('diseno')['fondo']; ?> id="<?php echo get_field('block_slug'); ?>"">
	<div class="main-container">
		<header>
			<h2 class="tit-uno"><?php echo get_field('titulo');?></h2>
			<!--h4 ><?php echo get_field('subtitulo');?></h4-->
		</header>
		<main class="tech-slider">
		<?php foreach(get_field('contenidos') as $content):?>
		<div class="tech-slide">
			<div class="slide-contents">
			<header>
				<h3><?php echo $content['titulo'];?></h3>
				<?php if($content['subtitulo']):?>
				<h4 class="subtit"><?php echo $content['subtitulo']; ?></h4>
				<?php endif;?>
			</header>
		
			<div class="texto">
				
				<?php echo $content['contenidos']; ?>
				<?php 

				if($content['boton']['url']):?>
					<a href="<?php echo $content['boton']['url']; ?>" <?php if($content['boton']['is_blank']):?>target="_blank"<?php endif;?> class="boton <?php if(get_field('diseno')['outline'] ):?> outline <?php endif; ?>"><?php echo $content['boton']['texto']; ?></a>
				<?php endif;?>
			</div>
			</div>
		</div>
		<?php endforeach; ?>
		</main>
		
	</div>
	<script type="text/javascript">
		jQuery(document).ready(function(){

			jQuery('.tech-slider').slick({dots:true,arrows:false,autoplay:true,speed:0});
		});
	</script>
</section>
<div class="main-container">