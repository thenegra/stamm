<?php 
	global $post;
    $post_slug = $post->post_name;

    
    ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="wrapper" class="hfeed">
	<?php if($post_slug != 'landing'):?>
<header id="header" role="banner">
	<div class="main-container">
		<div class="logo">
			<h1><a href="/"><img src="<?php echo get_template_directory_uri()?>/dist/img/st_logo_green.svg" alt="STÄMM"></a></h1>
		</div>
		<div class="nav">
			<a class="hamb">
				<i class="fa fa-bars"></i>
			</a>
			<div class="menu">
			<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'link_before' => '<span itemprop="name">', 'link_after' => '</span>' ) ); ?>
			</div>
		</div>
	</div>
	
	
	
</header>
<?php endif; ?>
<div id="container">
