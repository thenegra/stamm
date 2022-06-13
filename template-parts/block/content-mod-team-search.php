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

	$custom_terms = get_terms('area');

foreach($custom_terms as $custom_term) {
    wp_reset_query();
    $args = array('post_type' => 'busqueda',
        'tax_query' => array(
            array(
                'taxonomy' => 'area',
                'field' => 'slug',
                'terms' => $custom_term->slug,
            ),
        ),
     );

     $loop = new WP_Query($args);
     if($loop->have_posts()) {
        echo '<h2>'.$custom_term->name.'</h2>';

        while($loop->have_posts()) : $loop->the_post();
            echo '<a href="'.get_permalink().'">'.get_the_title().'</a><br>';
        endwhile;
     }
}
?>