<?php //get_sidebar(); ?>
<?php 
	global $post;
     $post_slug = '';
  if($post){
  	$post_slug = $post->post_name;
  }

    
 if($post_slug != 'landing'):?>
</div>
<?php /* ?>
<section class="full-contact f-blanco" id="contact">
	<div class="main-container">
		<header>
			<h3 class="subtit c-verde">Contact us</h3>
			<span class="sub-mega" style="display: block; max-width: 13em;">Reach out today</span>
		</header>
		<div class="form">
			<?php echo do_shortcode('[contact-form-7 id="421" title="contact"]');?>
		</div>
	</div>
</section>
<?php */ ?>
<footer id="footer" role="contentinfo" class="f-negro"> 
	<div class="main-container">
		<div class="column-container two">
			<div class="column menu-footer small-text">
				<?php
				$menu = wp_get_nav_menu_object("Footer menu" );

				
				 wp_nav_menu( array( 'menu' => $menu->term_id ) ); ?>
			</div>
			<div class="column">
			<div class="brand-footer">
				<h1><a href="/"><img src="<?php echo get_template_directory_uri()?>/dist/img/st_logo_green.svg" alt="STÄMM"></a></h1>
				<?php
				

				?>
				<ul class="redes">
					<span>Follow us:</span>
					<?php foreach(get_field('social','options') as $social) : ?>
					<li><a href="<?php echo $social['url']; ?>" target="_blank" alt="<?php echo $social['name']; ?>"><i class="fa-brands fa-<?php echo $social['icon']; ?>"></i></a></li>
					<?php endforeach; ?>
					<!--li><a href="https://www.linkedin.com/company/stammbiotech/" target="_blank"><i class="fa-brands fa-linkedin"></i></a></li>
					<li><a href="https://twitter.com/stammbio" target="_blank"><i class="fa fa-twitter"></i></a></li>
					
					<li><a href="https://m.facebook.com/stammbiotech/" target="_blank"><i class="fa fa-facebook"></i></a></li-->
				</ul>
			</div>
			<ul class="footer-offices addresses column-container three">
				<li class="address column small-text">
					<h4 class="subtit-dos">United States HQ</h4>
					<div class="space"></div>
					<div class="space"></div>
					<p>220, Halleck St.</p>
					<p>San Francisco, USA</p>
				</li>
				<li class="address column small-text">
					<h4 class="subtit-dos">Argentina</h4>
					<div class="space"></div>
					<div class="space"></div>
					<p>939, Maipú St.</p>
					<p>Buenos Aires, Argentina</p>
				</li>
				<li class="address column small-text">
					<h4 class="subtit-dos">Switzerland</h4>
					<div class="space"></div>
					<div class="space"></div>
					<p>Rte de l'Ile-au-Bois 1A.</p>
					<p>Monthey, Switzerland</p>
				</li>
			</ul>
			
		</div>
		</div>
		
		
	</div>

</footer>
<?php endif;?>
</div>
<?php 

$posts = get_posts([
  'post_type' => 'wpforms',
  'post_status' => 'publish',
  'numberposts' => -1
  // 'order'    => 'ASC'
]);

foreach ($posts as $form): 
	
	getFormPopup($form);
endforeach; 
?>
<?php wp_footer(); ?>
</body>
</html>