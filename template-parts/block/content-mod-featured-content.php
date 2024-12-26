
</div>
<section class="modulo-uno featured <?php if(get_field('invertir')){ echo 'invertida'; }?> f-<?php echo get_field('diseno')['fondo']; ?>" id="<?php echo get_field('block_slug'); ?>">
	<div class="main-container mob-full f-<?php echo get_field('diseno')['fondo']; ?>">
		<div class="columna inner-padding big-padding col-texto">
			
			<div class="texto">
				<h3 class="tit-uno"><?php echo get_field('titulo');?></h3>
				
			<div class="space"></div>
			
				<?php echo get_field('contenido'); ?>
				
			</div>
			<?php 

				if(get_field('boton')['url']):?>
					<a href="<?php echo get_field('boton')['url']; ?>" <?php if(get_field('boton')['is_blank']):?>target="_blank"<?php endif;?> class="boton <?php if(get_field('diseno')['outline'] ):?> outline <?php endif; ?>"><?php echo get_field('boton')['texto']; ?></a>
				<?php endif;?>
		</div>
		<div class="columna foto">
			<?php
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
				?>
		</div>
	</div>
</section>
<div class="main-container">