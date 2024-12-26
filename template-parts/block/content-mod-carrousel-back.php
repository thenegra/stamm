</div>
<section class="modulo-uno <?php if(get_field('invertir')){ echo 'invertida'; }?> f-negro" id="<?php echo slugify(get_field('titulo'));?>" id="<?php echo get_field('block_slug'); ?>">
	<div class="mob-full column-container two block-carrousell no-gut">
		<div class="columna column col-texto" data-anim=true data-scroll-speed=.6>
			<div class="text-contents">
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
		</div>
		<div class="carrousel-back">
			<div class="carrousel-container">
			<?php 
				$galeria = get_field('foto');
				for($i=0;$i<5;$i++):
				
					?>
					
					<div class="inner-carrousel modulo-carrousel">
						<?php foreach($galeria as $foto):?>
							<div class="foto">
								<div class="img-container">
		<?php echo wp_get_attachment_image($foto['ID'],'foto-hq'); ?>
							</div>
							</div>
		<?php endforeach;?>
					</div>
					
					
<?php endfor; ?>
			</div>
		</div>
	</div>
</section>
<div class="main-container">