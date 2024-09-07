</div>
<section class="modulo-uno <?php if(get_field('invertir')){ echo 'invertida'; }?> f-<?php echo get_field('diseno')['fondo']; ?>" id="<?php echo slugify(get_field('titulo'));?>">
	<div class="main-container mob-full">
		<div class="columna col-texto" data-anim=true data-scroll-speed=.6>
			<h3 class="tit-dos"><?php echo get_field('titulo');?></h3>
			<!--div class="space"></div-->
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
				$galeria = get_field('foto');
				if(count($galeria)>1):
					?>
					<div class="inner-galeria modulo-galeria">
						<?php foreach($galeria as $foto):?>
							<div class="foto">
								<div class="img-container">
		<?php echo wp_get_attachment_image($foto['ID'],'foto-hq'); ?>
							</div>
							</div>
		<?php endforeach;?>
					</div>
					<!--
					<img src="<?php echo get_field('foto')['url']; ?>" alt="<?php echo get_field('titulo');?>" -->
					<?php
				else:
					?>
					<img src="<?php echo $galeria[0]['url']; ?>" alt="<?php echo get_field('titulo');?>">
					<?php
				endif;
					break;
				
				default:
				
					?>
					<div class="video-container">
						<video loop="loop" autoplay="" playsinline="" muted="" id="mejs_6204682393310839_html5" preload="none" src="<?php echo get_field('video')['url']; ?>">
							<source type="video/mp4" src="html5" preload="none" src="<?php echo get_field('video')['url']; ?>">
				
						</video>
					</div>
				
					<?php
					break;
			} ?>
			
		</div>
	</div>
</section>
<div class="main-container">