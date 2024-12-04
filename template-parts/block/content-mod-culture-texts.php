<?php 
$names = array('','two','two','three','four');
$block_id = $block["id"];
?>
</div>
<section class="modulo-culture-texts <?php if(get_field('invertir')){ echo 'invertida'; }?> f-<?php echo get_field('diseno')['fondo']; ?>" >
	<?php //getBlockHeader(); ?>
	<div class="images-container">
			<?php foreach(get_field('contents') as $time):?>
				<div class="img-container">
					<?php if($time['image']):?>
						<img class="<?php if($time['image']['height']>$time['image']['width']) echo 'small'; ?>" src="<?php echo $time['image']['url'];?>" />
					<?php endif;?>
				</div>
				
			<?php endforeach;?>
		</div>
	<div class="main-container">
		<div class="verticals-container">
			<ul class="vertical-list">
				<?php foreach(get_field('contents') as $ct):?>
					<li class="vertical-unit vertical-unit-el mega"><?php echo $ct['title']; ?></li>
				<?php endforeach;?>
				
				<?php if(get_field('fixed_text')):?>
				<li class="vertical-unit selected blocked mega"><?php echo get_field('fixed_text'); ?></li>
			<?php endif; ?>
			</ul>
		</div>
		
		<div class="verticals-overlay-container" >
			<?php foreach(get_field('contents') as $ct):?>
			<div class="contents">
				<?php echo $ct['content']; 
				getCTA($ct['cta']);
				?>
				<a onclick="closeCultureText();" class="close-btn"><i class="fa fa-close"></i></a>
			</div>
			<?php endforeach;?>
			
		</div>
	</div>
	<script>
		$('.vertical-unit-el').click(function(){
			if(!$(this).hasClass('selected')){
				var _i = $(this).index();
				openCultureText(_i);
			} else{
				closeCultureText();
			}
			

		});
		openCultureText(0);
		function closeCultureText(){
			$('.vertical-unit-el').removeClass('selected');
			$('.verticals-overlay-container .contents').fadeOut();
			$('.images-container .img-container').fadeOut();
		}
		function openCultureText(_i){
			$('.vertical-unit-el.selected').removeClass('selected');
				$('.vertical-unit-el').eq(_i).addClass('selected');
				$('.verticals-overlay-container .contents').fadeOut().eq(_i).fadeIn();
				$('.images-container .img-container').fadeOut().eq(_i).fadeIn();
		}
		
	</script>
</section>
	