</div>
<section class="modulo-dos <?php if(get_field('invertir')){ echo 'invertida'; }?> f-<?php echo get_field('diseno')['fondo']; ?>" id="<?php echo get_field('block_slug'); ?>">
	<div class="main-container">
		<?php foreach(get_field('contenidos') as $content):?>
		<div class="columna col-texto">
			<h3 class="tit-uno"><?php echo $content['titulo'];?></h3>

			<div class="space"></div>
			<div class="texto">
				<h4 class="subtit"><?php echo $content['subtitulo']; ?></h4>
				
				<?php echo $content['contenido']; ?>
				<?php 

				if($content['boton']['url']):?>
					<a href="<?php echo $content['boton']['url']; ?>" <?php if($content['boton']['is_blank']):?>target="_blank"<?php endif;?> class="boton <?php if(get_field('diseno')['outline'] ):?> outline <?php endif; ?>"><?php echo $content['boton']['texto']; ?></a>
				<?php endif;?>
			</div>
		</div>
		<?php endforeach; ?>
		
	</div>
</section>
<div class="main-container">