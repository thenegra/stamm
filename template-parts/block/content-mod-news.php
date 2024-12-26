<?php 
$names = array('','two','two','three','four');
$block_id = $block["id"];

?>
</div>
<section class="modulo-news new-modules <?php if(get_field('invertir')){ echo 'invertida'; }?> f-<?php echo get_field('diseno')['fondo']; ?>" id="<?php echo get_field('block_slug'); ?>" >
	<?php getBlockHeader(); ?>
	<div class="main-container">
		
	
		<div class="glide news-container" id="glide_<?php echo $block_id; ?>">
  <div class="glide__track" data-glide-el="track">
    <ul class="glide__slides">
    	<?php foreach(get_field('contents') as $content):
				//var_dump($content['news'][0]);
				$post_id = $content['news'];
				$img = wp_get_attachment_image(get_post_thumbnail_id($content['news']),'full');
				
				?>
				<li class="glide__slide">
				<article class="latest-news-article " style="">
					<div class="article-inner">
						<?php echo $img; ?>
						<div class="contents f-negro">
							<h3 class="tit-tres"><?php echo get_the_title($post_id); ?></h3>
							<a href="<?php echo get_the_permalink($post_id);?>" class="boton small"><?php echo $GLOBALS['texts']['blog']['read_more'];?></a>
						</div>
					</div>
				</article>
			</li>
			<?php endforeach; ?>
      <!--li class="glide__slide">0</li>
      <li class="glide__slide">1</li>
      <li class="glide__slide">2</li-->
    </ul>
  </div>
  <div class="controls arrow-container main-container" data-glide-el="controls">
  
  <button data-glide-dir="&gt;" class="arrow-next" class="">
  	<i class="fa fa-chevron-right"></i></button>
</div>
</div>
	</div>
	<script type="text/javascript">

		var glide = new Glide('#glide_<?php echo $block_id; ?>', {
  type: 'carousel',
  perView: 2.5,
  focusAt: 0,
  breakpoints: {
    960: {
      perView: 1.8
    },
    600: {
      perView: 1.2
    }
  }
}).mount();
	</script>
</section>
<div class="main-container">