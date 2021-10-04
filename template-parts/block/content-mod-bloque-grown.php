</div>
<section class="modulo-grown <?php if(get_field('invertir')){ echo 'invertida'; }?> f-<?php echo get_field('diseno')['fondo']; ?>" style="background-image: url('<?php echo get_field('fondo')['fondo']['url']; ?>')">
	<!--div class="main-container header inner-padding" style="background-image: url('<?php echo get_field('fondo')['base']['url']; ?>')"-->
	<div class="main-container header " >
		<h3 class="tit-uno"><?php echo get_field('titulo'); ?></h3>
		<div class="contenido"><?php echo get_field('bajada'); ?></div>
	</div>
	<div class="main-container contenidos">
		<?php foreach(get_field('contenidos') as $content):?>
		<div class="columna col-texto inner-padding">
			<div class="grupo">
				<h3 class="tit-dos"><?php echo $content['titulo'];?></h3>

				<div class="space"></div>
				<div class="texto">
					<?php echo $content['contenido']; ?>
				</div>
			</div>
				<?php 

				if($content['boton']['url']):?>
					<a href="<?php echo $content['boton']['url']; ?>" <?php if($content['boton']['is_blank']):?>target="_blank"<?php endif;?> class="boton <?php if($content['boton']['outline'] ):?> outline <?php endif; ?>"><?php echo $content['boton']['texto']; ?></a>
				<?php endif;?>
			
		</div>
		<?php endforeach; ?>
		
	</div>
</section>
<div class="main-container">