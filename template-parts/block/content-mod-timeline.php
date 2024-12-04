</div>
<?php
function cmp($a, $b) {
    return strcmp($a['year'], $b['year']);
}
$tl = get_field('timeline');
usort($tl, fn($a, $b) => strcmp($a['year'], $b['year']));

?>
<section class="modulo-timeline f-<?php echo get_field('diseno')['fondo']; ?>">
	<?php getBlockHeader(); ?>
	<div class="main-container">
		<div class="timeline-nav">
			<nav>
				<ul>
				<?php 

				$ybase = $tl[0]['year'];
				$yactual = date("Y");
				$dif = $yactual-$ybase;
				foreach($tl as $time):
					$cur = $time['year'] - $ybase;
					$porc = round($cur/$dif*1000)/10;
					?>
					<li class="<?php if($time['year'] == $yactual) echo 'last'; ?>" style="left: <?php echo $porc; ?>%">
						<a href="#time-<?php echo $time['year']; ?>">
						<span class="year">
							<?php echo $time['year'];?>
						</span>
						</a>
					</li>
				<?php endforeach; ?>		
				</ul>
			</nav>
			

		</div>
		
		<div class="timeline-contiainer">
			<?php foreach($tl as $time):?>
				<article class="timeline-unit" id="time-<?php echo $time['year'];?>">
					<div class="year only-desk "><?php echo $time['year']; ?></div>
					<div class="image" data-anim=true data-scroll-speed=.2 >
						<img class="<?php if($time['image']['height']>$time['image']['width']) echo 'small'; ?>" src="<?php echo $time['image']['url'];?>">
					</div>
					<div class="content" data-anim=true data-scroll-speed=-.2 >
						<div class="year-mob only-mob"><?php echo $time['year']; ?></div>
						<div class="inner-content ">
							<?php foreach($time['milestones'] as $timem):?>
								<div class="milestone">
									<h3 class="subtit"><?php echo $timem['title']; ?></h3>
									<div class="content-inner">
										<?php echo $timem['content']; ?>
										<?php getCTA($timem['cta']); ?>
									</div>
								</div>
							<?php endforeach;?>
						</div>
						
					</div>
					
				</article>
			<?php endforeach;?>
		</div>
	</div>
</section>
<div class="main-container">