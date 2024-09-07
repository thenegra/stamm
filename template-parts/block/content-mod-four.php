
<?php 
$names = array('','two','two','three','four');
?>
</div>
<section class="modulo-four new-modules <?php if(get_field('invertir')){ echo 'invertida'; }?> f-<?php echo get_field('diseno')['fondo']; ?>" >
	
	<div class="main-container">
		<?php getBlockHeader(); ?>
	
	<div class=" contenidos column-container <?php echo $names[count(get_field('contents'))];?>">
		<?php foreach(get_field('contents') as $content):
			
			?>
		<div class="column col-texto ">
			<article class="module">
			<div class="contents  sec-bg" <?php if($content['background_image']):?>style="background-image:url(<?php echo $content['background_image']['url']; ?>)"<?php endif; ?>>
				<div class="container inner-padding <?php if($content['background_image']):?>on-img<?php endif; ?>">
				<h3 class="subtit-tres"><?php echo $content['title'];?></h3>
				<?php if($content['text']): ?>
				<div class="space small"></div>
				<div class="texto small-text">
					<?php echo $content['text']; ?>
				</div>
				<?php endif;?>
				</div>
			</div>
			</article>
			<?php ?>
			
		</div>
		<?php endforeach; ?>
		
	</div></div>
</section>
<div class="main-container">