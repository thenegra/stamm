</div>
<section class="modulo-numeros f-<?php echo get_field('diseno')['fondo']; ?>">
	<div class="main-container">
		<ul class="numeros">
			<?php foreach(get_field('contenidos') as $cont):?>
			<li>
				<span class="tit-uno"><?php echo $cont['numero'];?></span>
				<div class="space"></div>
				<div class="space"></div>
				<div class="bajada"><?php echo $cont['bajada'];?></div>
			</li>
			<?php endforeach;?>
		</ul>
	</div>
</section>
<div class="main-container">