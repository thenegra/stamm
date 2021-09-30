</div>
<section class="modulo-uno <?php if(get_field('invertir')){ echo 'invertida'; }?> f-<?php echo get_field('diseno')['fondo']; ?>">
	<div class="main-container mob-full">
		<div class="columna col-texto">
			<h3 class="tit-uno"><?php echo get_field('titulo');?></h3>
			<div class="space"></div>
			<div class="space"></div>
			<div class="texto">
				<?php echo get_field('contenido'); ?>
				<?php 

				if(get_field('boton')['url']):?>
					<a href="<?php echo get_field('boton')['url']; ?>" <?php if(get_field('boton')['is_blank']):?>target="_blank"<?php endif;?> class="boton <?php if(get_field('diseno')['outline'] ):?> outline <?php endif; ?>"><?php echo get_field('boton')['texto']; ?></a>
				<?php endif;?>
			</div>
		</div>
		<div class="columna foto">
			<?php switch (get_field('tipo')) {
				case 'foto':
					?>
					<img src="<?php echo get_field('foto')['url']; ?>" alt="<?php echo get_field('titulo');?>">
					<?php
					break;
				
				default:
				
					?>
					<div class="video-container">
						<video loop="loop" autoplay="" playsinline="" muted="" id="mejs_6204682393310839_html5" preload="none" src="<?php echo get_field('video')['url']; ?>">
					</div>
				<source type="video/mp4" src="https://www.zymergen.com/wp-content/uploads/2020/12/LD_Zymergen_Near_Far_Product-Montage_Generic.mp4">
				
			</video>
					<?php
					break;
			} ?>
			
		</div>
	</div>
</section>
<div class="main-container">