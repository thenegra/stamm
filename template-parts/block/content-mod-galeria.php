<?php 
$galeria = get_field('galeria');

?>
</div>
<section class="mod-galeria f-<?php echo get_field('diseno')['fondo']; ?>">
	<div class="main-container f-negro">
		<div class="galeria">
		<?php foreach($galeria as $foto):?>
		<?php echo wp_get_attachment_image($foto['ID'],'foto-hq'); ?>
		
		<?php endforeach;?>
		</div>
	</div>
</section>
<script type="text/javascript">
		jQuery(document).ready(function(){

			jQuery('.galeria').slick({dots:true,arrows:false,autoplay:true,speed:300,adaptiveHeight:true});
		});
	</script>
<div class="main-container">