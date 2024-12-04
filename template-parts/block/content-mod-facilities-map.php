<?php 
$names = array('','two','two','three','four');
$block_id = $block["id"];
?>
</div>
<section class="modulo-facilities-map new-modules <?php if(get_field('invertir')){ echo 'invertida'; }?> f-<?php echo get_field('diseno')['fondo']; ?>" >
	<?php getBlockHeader(); ?>
		<!-- Header provisorio -->
	
	<!-- Header provisorio -->
	<!--div class="main-container"-->
		
		
	<main class="facilities-container">
		<div class="">
		<img alt="Map" src="<?php echo get_template_directory_uri(); ?>/dist/img/facilities-map.png" height=1080 width=1920 >
		<ul class="map-units">
			<?php foreach(get_field('facilities') as $facility):?>
			<li class="map-unit" style="left: <?php echo $facility['x_percentage'];?>%; top: <?php echo $facility['y_percentage'];?>%">
				<span class="logo"><?php getTriangleLogo(); ?></span>
				<div class="info">
					<h4 class="subtit"><?php echo $facility['city'];?>,</h4>
					<h4 class="subtit"><?php echo $facility['country'];?>.</h4>
					<p><?php echo $facility['address'];?></p>
				</div>
			</li>
			<?php endforeach; ?>
			
		</ul>
		</div>
		<div class="map-descriptions">
			<?php foreach(get_field('facilities') as $facility):?>
			<article class="description-unit" style="display: none;">
				
				<div class="info">
					<h4 class="subtit"><?php echo $facility['city'];?>, <?php echo $facility['country'];?>.</h4>
					<div class="description"><?php echo $facility['description'];?></div>
				</div>
			</article>
			<?php endforeach; ?>
		</div>
	</main>
	<!--/div-->
	<script type="text/javascript">
		var _curMap = -1;
		function openMap(_id){
			if(_curMap!=_id){
				$('.map-unit').removeClass('selected').eq(_id).addClass('selected');
				$('.map-descriptions .description-unit').hide().eq(_id).show();
			}
		}
		$(document).ready(function(){
			$('.map-unit').click(function(){
				openMap($(this).index());
			});
			openMap(0);	
		})
		
		$('.biorreactor-unit .btn-square').click(function(){
			if($(this).parent().hasClass('open')){
				$(this).parent().toggleClass('open');	
			} else{
				$('.biorreactor-unit').removeClass('open');
				$(this).parent().addClass('open');	
			}
			
		})
	</script>
</section>
<div class="main-container">