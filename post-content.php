<main class="blog-post">
	<div class="space"></div>
	<div class="space"></div>
	<div class="main-container texto">
		<div class="post-contents">
			<header class="post-header">
	
				<h1 class="tit-uno"><?php the_title(); ?></h1>
				<div class="space"></div>
				<div class="space"></div>
			</header>
			<?php the_content(); ?>
		</div>
		<header class="blog-nav">
			<h3 >Categories</h3>
			<?php wp_nav_menu('Blog menu'); ?>
		</header>
	</div>
	<div class="space"></div>
	<div class="space"></div>
	<div class="space"></div>
	<div class="space"></div>
</main>