<article id="post-<?php the_ID(); ?>" <?php post_class('post-min'); ?>>
<header class="post-min-header">
	<div class="image" style="background-image: url('<?php echo get_the_post_thumbnail_url(false,'full'); ?>')">
		
	</div>
</header>
<main class="post-min-main">
	<div>
		<h3 class="tit-tres"><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h3>
		<?php $tags = get_the_category();
		if($tags):?>
		<nav class="categorias">
			<ul>
				<?php foreach($tags as $tag):?>
				<li><a href="<?php echo get_term_link($tag); ?>"><?php echo $tag->name; ?></a></li>
				<?php endforeach;?>
			</ul>
		</nav>
		<?php endif;?>
		<div class="texto small">
			<?php the_excerpt(); ?>
			<?php $tags = get_the_tags();
		if($tags):?>
		<nav class="tags">

			<ul>
				<span>Tags:</span>
				<?php foreach($tags as $tag):?><li><a href="<?php echo get_term_link($tag); ?>"><?php echo $tag->name; ?></a></li><?php endforeach;?>
			</ul>
		</nav>
		<?php endif;?>
		</div>	
	</div>
	<a href="<?php the_permalink(); ?>" class="boton " <?php //if(isexternal(get_the_permalink())): ?> target="_blank" <?php // endif;?>>Read more</a>
</main>
<?php
/* function isexternal($url) {
  $components = parse_url($url);
  if ( empty($components['host']) ) return false;  // we will treat url like '/relative.php' as relative
  if ( strcasecmp($components['host'], 'example.com') === 0 ) return false; // url host looks exactly like the local host
  return strrpos(strtolower($components['host']), '.example.com') !== strlen($components['host']) - strlen('.example.com'); // check if the url host is a subdomain
} */

 /* 
<?php if ( is_singular() ) { echo '<h1 class="entry-title" itemprop="headline">'; } else { echo '<h2 class="entry-title">'; } ?>
<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
<?php if ( is_singular() ) { echo '</h1>'; } else { echo '</h2>'; } ?>
<?php edit_post_link(); ?>
<?php if ( !is_search() ) { get_template_part( 'entry', 'meta' ); } ?>
</header>
<?php get_template_part( 'entry', ( is_front_page() || is_home() || is_front_page() && is_home() || is_archive() || is_search() ? 'summary' : 'content' ) ); ?>
<?php if ( is_singular() ) { get_template_part( 'entry-footer' ); } ?> 
 */ ?>
</article>