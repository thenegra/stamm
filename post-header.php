<header class="f-negro post-header">
	<div class="main-container">
		<div class="header-contents">
			<div class="space"></div>
			<div class="space"></div>
			<div class="space"></div>
			<div class="space"></div>
			<h2 class="tit-uno">Blog</h2>
			<div class="space"></div>
			<div class="space"></div>
			<div class="space"></div>
			<div class="space"></div>
			<h1 class="sub-mega"><?php the_title(); ?></h1>
			<?php $tags = get_the_category();
		if($tags):?>
			<div class="space"></div>
			<div class="space"></div>
		<nav class="categorias">
			<ul>
				<?php foreach($tags as $tag):?>
				<li class="subtit"><a href="<?php echo get_term_link($tag); ?>"><?php echo $tag->name; ?></a></li>
				<?php endforeach;?>
			</ul>
		</nav>
		<?php endif;?>
			<div class="space"></div>
			<div class="space"></div>
			<div class="space"></div>
			<div class="space"></div>
			<div class="space"></div>
			<div class="space"></div>
			<div class="space"></div>
		</div>
	</div>
</header>