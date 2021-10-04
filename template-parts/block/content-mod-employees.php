<?php 
$areas = get_terms('area');

?>
</div>
<section class="mod-employees">
	<div class="main-container">
		<?php 
		foreach($areas as $area):
			getAreaEmployees($area);
			?>
		
		<?php endforeach;?>
		
	</div>
</section>
<div class="main-container">