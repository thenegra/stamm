</div>
<section class="modulo-parrafos f-<?php echo get_field('diseno')['fondo']; ?>">
	<?php getBlockHeader(); ?>
	<div class="main-container">
		<div class="columns-container <?php echo get_field('columns'); ?>-cols">
			<?php foreach(get_field('paragraphs') as $content):?>
				<article class="column content-article <?php echo $content['columns']; ?>">
					<?php echo $content['content']; ?>
				</article>
			<?php endforeach;?>
		</div>
	</div>
</section>
<div class="main-container">