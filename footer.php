<?php //get_sidebar(); ?>
<?php 
	global $post;
    $post_slug = $post->post_name;

    
 if($post_slug != 'landing'):?>
<header id="header" role="banner">
</div>
<section class="full-contact f-blanco">
	<div class="main-container">
		<header>
			<h3 class="subtit c-verde">Contact us</h3>
			<span class="mega">Join the next biotech revolution</span>
		</header>
	</div>
</section>
<footer id="footer" role="contentinfo" class="f-negro"> 
	<div class="main-container">
		<div class="footer-contents">
			<ul class="addresses">
				<li class="address">
					<h4 class="subtit-dos">Buenos Aires HQ</h3>
					<div class="space"></div>
					<div class="space"></div>
					<p>939 Maipú St.</p>
					<p>Buenos Aires, Argentina</p>
				</li>
			</ul>
		</div>
		<div class="logo">
			<h1><a href="/"><img src="<?php echo get_template_directory_uri()?>/dist/img/st_logo_green.svg" alt="STÄMM"></a></h1>
		</div>
	</div>
</footer>
<?php endif;?>
</div>
</body>
</html>