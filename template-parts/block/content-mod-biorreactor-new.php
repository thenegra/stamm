<?php 
$names = array('','two','two','three','four');
$block_id = $block["id"];
?>
</div>
<section class="modulo-biorreactor-new new-modules <?php if(get_field('invertir')){ echo 'invertida'; }?> f-<?php echo get_field('diseno')['fondo']; ?>" id="<?php echo get_field('block_slug'); ?>">
	<?php getBlockHeader();
	/* ?>
		<!-- Header provisorio -->
	<header class=" block-header " >
		<div class="main-container">

		<h2 class="tit-dos"><?php echo get_field('title'); ?></h2>
		
		<?php if(get_field('header_has_link') && get_field('header_link')):?>
		<div class="cta-container">
			
			<a href="<?php echo get_field('header_link')['url']; ?>" target="<?php echo get_field('header_link')['target']; ?>" class="boton"><?php echo get_field('header_link')['title'];?></a>
		</div>
		<?php endif;?>
		</div>
	</header>
	<!-- Header provisorio -->
	*/ ?>
	<div class="main-container">
		
		
	<main class="biorreactor-select">
		<div class="biorreactor-mask">
		<img alt="Biorreactor" src="<?php echo get_template_directory_uri(); ?>/dist/img/biorreactor_modules_c.jpg" height=1080 width=1920 >
		<ul class="biorreactor-units">
			<?php foreach(get_field('bioprocessor_units') as $unit):?>
				<li class="biorreactor-unit" style="left: <?php echo $unit['left']; ?>%; top: <?php echo $unit['top']; ?>%">
				<a class="btn-open btn-square">+</a>
				<a class="btn-close btn-square">-</a>
				<div class="contents">
					<h4><?php echo $unit['title']; ?></h4>
					<div>
						<?php echo $unit['text']; ?>
					</div>
				</div>
			</li>
			<?php endforeach;?>
			<?php /*
			<li class="biorreactor-unit" style="left: 20%; top: 20%">
				<a class="btn-open btn-square">+</a>
				<a class="btn-close btn-square">-</a>
				<div class="contents">
					<h4>Local user interface.</h4>
					<p>Custom software to provide all the necessary information about the ongoing bioprocess and maintenance routine.</p>
				</div>
			</li>
			<li class="biorreactor-unit" style="left: 22%; top: 42%">
				<a class="btn-open btn-square">+</a>
				<a class="btn-close btn-square">-</a>
				<div class="contents">
					<h4>Inoculation module.</h4>
					<p>Optional device designed for the initial introduction and continuous flow of fresh cells into the production module in certain operation modes</p>
				</div>
			</li>
			<li class="biorreactor-unit" style="left: 40%; top: 33%">
				<a class="btn-open btn-square">+</a>
				<a class="btn-close btn-square">-</a>
				<div class="contents">
					<h4>Production module.</h4>
					<p>Sealed cabin for environmental control & monitoring that hosts the bubble-free bioreactor, where cells grow in microchannels with continuous laminar flow.</p>
				</div>
			</li>
			<li class="biorreactor-unit right" style="left: 80%; top: 50%">
				<a class="btn-open btn-square">+</a>
				<a class="btn-close btn-square">-</a>
				<div class="contents">
					<h4>Harvest module.</h4>
					<p>Integrated cell counting and sampling system to carry out daily harvests and maintain output in optimal conditions before downstream.</p>
				</div>
			</li>
			*/ ?>
		</ul>
		</div>
	</main>
	</div>
	<script type="text/javascript">
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