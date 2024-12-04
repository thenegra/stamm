<?php 
	global $post;
	
  $post_slug = '';
  if($post){
  	$post_slug = $post->post_name;
  }


    
    ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<?php wp_head(); ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-7H7JT68P7K"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-7H7JT68P7K');
</script>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="wrapper" class="hfeed">
	<?php if($post_slug != 'landing'):?>
<header id="header" class="blurred-container" role="banner">
	<div class="main-container">
		<div class="logo">
			<h1><a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_template_directory_uri()?>/dist/img/st_logo_green.svg" alt="STÄMM"></a></h1>
		</div>
		<div class="nav">
			

			<div class="menu">
			<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'link_before' => '<span itemprop="name">', 'link_after' => '</span>' ) ); ?>
			</div>
			<a onclick="openForm(3801)" class="boton outline ">Contact us</a>
			<a class="hamb">
				<i class="fa fa-bars"></i>
			</a>
		</div>

	</div>
	
	
	
</header>
<?php endif; ?>
<div id="container">
