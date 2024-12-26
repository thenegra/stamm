<?php 
$names = array('','two','two','three','four');
$block_id = $block["id"];
?>
</div>
<section class="modulo-biorreactor-new new-modules <?php if(get_field('invertir')){ echo 'invertida'; }?> f-<?php echo get_field('diseno')['fondo']; ?>" id="<?php echo get_field('block_slug'); ?>">
	<?php getBlockHeader(); ?>

	<div class="main-container">
		
		
	<main class="">
		
		<img alt="Biorreactor" src="<?php echo get_field('image')['url']; ?>" height=<?php echo get_field('image')['height']; ?> width=<?php echo get_field('image')['width']; ?> alt="<?php echo get_field('image')['alt']; ?>" >
		
	</main>
	</div>
	
</section>
<div class="main-container">