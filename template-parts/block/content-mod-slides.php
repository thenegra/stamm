<?php 
$names = array('','two','two','three','four');
$block_id = $block["id"];
?>
</div>
<section class="modulo-news modulo-slides new-modules <?php if(get_field('invertir')){ echo 'invertida'; }?> f-<?php echo get_field('diseno')['fondo']; ?>" id="<?php echo get_field('block_slug'); ?>">
	<?php getBlockHeader(); ?>
	<div class="main-container">
		
	
		<div class="glide news-container slides-container" id="glide_<?php echo $block_id; ?>">
  <div class="glide__track" data-glide-el="track">
    <ul class=" <?php if(count(get_field('contents'))>2):?> glide__slides <?php else: ?>column-container two<?php endif; ?>">
    	<?php 
    	$ct = 0;
    	foreach(get_field('contents') as $content):
    		$ct++;
				//var_dump($content['news'][0]);
				/*$post_id = $content['news'][0]->ID;
				$img = wp_get_attachment_image(get_post_thumbnail_id($content['news'][0]->ID),'full');*/
				$img = $content['image'];
				
				
				?>
				<li class="<?php if(count(get_field('contents'))>2):?> glide__slide <?php else: ?>column <?php endif; ?>">
				<article class="latest-news-article slides-single " style="">
					<div class="slider-inner">
						<?php if($img):?>
						<div class="image">
							<img alt="<?php echo $img['alt']; ?>" src="<?php echo $img['url']; ?>"	/>
						</div>
					<?php endif; ?>
						
						<div class="contents">
							
							
							<header>
								<span class="small-text" style="font-size:.6em; display:block; margin-bottom: 1em;">0<?php echo $ct; ?></span>
							<h3 class="tit-four"><?php echo $content['title']; ?></h3>
							<div class="content">
								<?php echo $content['content']; ?>
							</div>
						</header>
							<?php getButton($content['link'],'small')?>
					
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
  <?php if(count(get_field('contents'))>2):?>
  <div class="controls arrow-container main-container" data-glide-el="controls">
	  <button data-glide-dir="&gt;" class="arrow-next" class=""><i class="fa fa-chevron-right"></i></button>
	</div>
	<?php endif; ?>
</div>
	</div>
	<?php 

	if(count(get_field('contents'))>2):?>
	<script type="text/javascript">

		var glide = new Glide('#glide_<?php echo $block_id; ?>', {
			<?php if(get_field('content_type') == 'carousel'):?>
  type: 'carousel',
  perView: 2.5,
  autoplay: 3500,
<?php else:?>
	type: 'slider',
	perView: 1.6,  
<?php endif; ?> 

  focusAt: 0,
  breakpoints: {
    960: {
      perView: 1.4
    },
    600: {
      perView: 1
    }
  }
}).mount();
	</script>
<?php endif; ?>
</section>
<div class="main-container">