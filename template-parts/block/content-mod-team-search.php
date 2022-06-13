<?php 
$busquedas = get_field('positions');

?>
</div>
<section class="mod-team-search f-<?php echo get_field('diseno')['fondo']; ?>">
	<div class="main-container">
		<p class="c-verde subtit">We're looking for:</p>
		<?php 
		foreach($busquedas as $busqueda):
			?>
		<article class="job">
			<div class="contents">
				<h3 class="tit-uno"><?php echo $busqueda['titulo'];?></h3>
				<!--?php if($busqueda['bajada']):?><h4><?php echo $busqueda['bajada']; ?></h4--><!--?php endif; ?-->
			</div>
			<a href="<?php echo $busqueda['url']; ?>" class="boton" target="_blank">Apply now</a>
		</article>
		<?php endforeach;?>
	</div>
</section>
<div class="main-container">
	<?php

	$tax = get_object_taxonomies('busqueda');
	var_dump($tax);
?>