<?php


add_action( 'after_setup_theme', 'blankslate_setup' );
function blankslate_setup() {
load_theme_textdomain( 'blankslate', get_template_directory() . '/languages' );
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'responsive-embeds' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'html5', array( 'search-form' ) );
global $content_width;
if ( !isset( $content_width ) ) { $content_width = 1920; }
register_nav_menus( array( 'main-menu' => esc_html__( 'Main Menu', 'blankslate' ) ) );
}
add_action( 'admin_notices', 'blankslate_admin_notice' );
function blankslate_admin_notice() {
$user_id = get_current_user_id();
if ( !get_user_meta( $user_id, 'blankslate_notice_dismissed_3' ) && current_user_can( 'manage_options' ) )
echo '<div class="notice notice-info"><p>' . __( '<big><strong>BlankSlate</strong>:</big> Help keep the project alive! <a href="?notice-dismiss" class="alignright">Dismiss</a> <a href="https://calmestghost.com/donate" class="button-primary" target="_blank">Make a Donation</a>', 'blankslate' ) . '</p></div>';
}
add_action( 'admin_init', 'blankslate_notice_dismissed' );
function blankslate_notice_dismissed() {
$user_id = get_current_user_id();
if ( isset( $_GET['notice-dismiss'] ) )
add_user_meta( $user_id, 'blankslate_notice_dismissed_3', 'true', true );
}
add_action( 'wp_enqueue_scripts', 'blankslate_enqueue' );
function blankslate_enqueue() {
	wp_enqueue_style( 'reset', get_stylesheet_uri() );
	    wp_register_style( 'Font_Awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' );
wp_enqueue_style('Font_Awesome');
	wp_enqueue_style('style',get_template_directory_uri().'/dist/css/styles.css?v=14112024');
	
	wp_enqueue_style('glide-core',get_template_directory_uri().'/dist/css/glide.core.min.css');
	wp_enqueue_style('glide-theme',get_template_directory_uri().'/dist/css/glide.theme.min.css');
	wp_enqueue_script( 'jquer','https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js' );
	wp_enqueue_script( 'paral',get_template_directory_uri().'/dist/js/_paral.js');
	wp_enqueue_script( 'main',get_template_directory_uri().'/dist/js/main.js');
	
	wp_enqueue_script( 'glide','https://cdn.jsdelivr.net/npm/@glidejs/glide' );
	wp_enqueue_script('fontawesome','https://kit.fontawesome.com/9f1dbd0974.js');
	wp_enqueue_script('gs','https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js');

}
add_action( 'wp_footer', 'blankslate_footer' );
function blankslate_footer() {
?>
<script>
jQuery(document).ready(function($) {
var deviceAgent = navigator.userAgent.toLowerCase();
if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
$("html").addClass("ios");
}
if (navigator.userAgent.search("MSIE") >= 0) {
$("html").addClass("ie");
}
else if (navigator.userAgent.search("Chrome") >= 0) {
$("html").addClass("chrome");
}
else if (navigator.userAgent.search("Firefox") >= 0) {
$("html").addClass("firefox");
}
else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
$("html").addClass("safari");
}
else if (navigator.userAgent.search("Opera") >= 0) {
$("html").addClass("opera");
}
});
</script>
<?php
}
add_filter( 'document_title_separator', 'blankslate_document_title_separator' );
function blankslate_document_title_separator( $sep ) {
$sep = '|';
return $sep;
}
add_filter( 'the_title', 'blankslate_title' );
function blankslate_title( $title ) {
if ( $title == '' ) {
return '...';
} else {
return $title;
}
}
add_filter( 'nav_menu_link_attributes', 'blankslate_schema_url', 10 );
function blankslate_schema_url( $atts ) {
$atts['itemprop'] = 'url';
return $atts;
}
if ( !function_exists( 'blankslate_wp_body_open' ) ) {
function blankslate_wp_body_open() {
do_action( 'wp_body_open' );
}
}
add_action( 'wp_body_open', 'blankslate_skip_link', 5 );
function blankslate_skip_link() {
echo '<a href="#content" class="skip-link screen-reader-text">' . esc_html__( 'Skip to the content', 'blankslate' ) . '</a>';
}
add_filter( 'the_content_more_link', 'blankslate_read_more_link' );
function blankslate_read_more_link() {
if ( !is_admin() ) {
return ' <a href="' . esc_url( get_permalink() ) . '" class="more-link">' . sprintf( __( '...%s', 'blankslate' ), '<span class="screen-reader-text">  ' . esc_html( get_the_title() ) . '</span>' ) . '</a>';
}
}
add_filter( 'excerpt_more', 'blankslate_excerpt_read_more_link' );
function blankslate_excerpt_read_more_link( $more ) {
if ( !is_admin() ) {
global $post;
return ' <a href="' . esc_url( get_permalink( $post->ID ) ) . '" class="more-link">' . sprintf( __( '...%s', 'blankslate' ), '<span class="screen-reader-text">  ' . esc_html( get_the_title() ) . '</span>' ) . '</a>';
}
}
add_filter( 'big_image_size_threshold', '__return_false' );
add_filter( 'intermediate_image_sizes_advanced', 'blankslate_image_insert_override' );
function blankslate_image_insert_override( $sizes ) {
unset( $sizes['medium_large'] );
unset( $sizes['1536x1536'] );
unset( $sizes['2048x2048'] );
return $sizes;
}
add_action( 'widgets_init', 'blankslate_widgets_init' );
function blankslate_widgets_init() {
register_sidebar( array(
'name' => esc_html__( 'Sidebar Widget Area', 'blankslate' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => '</li>',
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
add_action( 'wp_head', 'blankslate_pingback_header' );
function blankslate_pingback_header() {
if ( is_singular() && pings_open() ) {
printf( '<link rel="pingback" href="%s" />' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
}
}
add_action( 'comment_form_before', 'blankslate_enqueue_comment_reply_script' );
function blankslate_enqueue_comment_reply_script() {
if ( get_option( 'thread_comments' ) ) {
wp_enqueue_script( 'comment-reply' );
}
}
function blankslate_custom_pings( $comment ) {
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo esc_url( comment_author_link() ); ?></li>
<?php
}
add_filter( 'get_comments_number', 'blankslate_comment_count', 0 );
function blankslate_comment_count( $count ) {
if ( !is_admin() ) {
global $id;
$get_comments = get_comments( 'status=approve&post_id=' . $id );
$comments_by_type = separate_comments( $get_comments );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}
add_action('get_header', 'my_filter_head');

  function my_filter_head() {
    remove_action('wp_head', '_admin_bar_bump_cb');
  }



add_action('acf/init', 'my_acf_init');
function my_acf_init() {
	$GLOBALS['texts'] = get_field('text_spaces','options');
	// check function exists
	if( function_exists('acf_register_block') ) {
		
		
		acf_register_block(array(
			'name'				=> 'mod-hero',
			'title'				=> __('Content: Page hero'),
			'description'		=> __('Bloque de destacado principal de una página'),
			'render_callback'	=> 'render_block_acf',
			'category'			=> 'design',
			'icon'				=> 'media-spreadsheet',
			'keywords'			=> array( 'subproyectos', 'sub', 'proyectos' ),
		));
		acf_register_block(array(
			'name'				=> 'mod-hero-contents',
			'title'				=> __('Content: Page hero + contents'),
			'description'		=> __('Page hero that includes text contents'),
			'render_callback'	=> 'render_block_acf',
			'category'			=> 'design',
			'icon'				=> 'media-spreadsheet',
			'keywords'			=> array( 'subproyectos', 'sub', 'proyectos' ),
		));
		acf_register_block(array(
			'name'				=> 'mod-hero-contents-b',
			'title'				=> __('Content: Featured + contents'),
			'description'		=> __('Page hero that includes text contents'),
			'render_callback'	=> 'render_block_acf',
			'category'			=> 'design',
			'icon'				=> 'media-spreadsheet',
			'keywords'			=> array( 'subproyectos', 'sub', 'proyectos' ),
		));
		
		acf_register_block(array(
			'name'				=> 'mod-four',
			'title'				=> __('Content: Four images'),
			'description'		=> __('Bloque de cuatro imagenes con contenido'),
			'render_callback'	=> 'render_block_acf',
			'category'			=> 'design',
			'icon'				=> 'media-spreadsheet',
			'keywords'			=> array( 'subproyectos', 'sub', 'proyectos' ),
		));
		acf_register_block(array(
			'name'				=> 'mod-biorreactor',
			'title'				=> __('Content: Biorreactor'),
			'description'		=> __('Biorreactor graph block'),
			'render_callback'	=> 'render_block_acf',
			'category'			=> 'design',
			'icon'				=> 'media-spreadsheet',
			'keywords'			=> array( 'subproyectos', 'sub', 'proyectos' ),
		));
		acf_register_block(array(
			'name'				=> 'mod-uno',
			'title'				=> __('Content: Text + Media'),
			'description'		=> __('Bloque de contenidos texto y multimedia'),
			'render_callback'	=> 'render_block_acf',
			'category'			=> 'design',
			'icon'				=> 'media-spreadsheet',
			'keywords'			=> array( 'subproyectos', 'sub', 'proyectos' ),
		));
		acf_register_block(array(
			'name'				=> 'mod-featured-content',
			'title'				=> __('Content: Featured - Text + Media'),
			'description'		=> __('Bloque de contenidos texto y multimedia'),
			'render_callback'	=> 'render_block_acf',
			'category'			=> 'design',
			'icon'				=> 'media-spreadsheet',
			'keywords'			=> array( 'subproyectos', 'sub', 'proyectos' ),
		));
		acf_register_block(array(
			'name'				=> 'mod-dos',
			'title'				=> __('Content: Two columns'),
			'description'		=> __('Bloque de dos columnas con contenidos'),
			'render_callback'	=> 'render_block_acf',
			'category'			=> 'design',
			'icon'				=> 'media-spreadsheet',
			'keywords'			=> array( 'subproyectos', 'sub', 'proyectos' ),
		));
		acf_register_block(array(
			'name'				=> 'mod-phrase',
			'title'				=> __('Content: Featured phrase'),
			'description'		=> __('Bloque de frase destacada'),
			'render_callback'	=> 'render_block_acf',
			'category'			=> 'design',
			'icon'				=> 'media-spreadsheet',
			'keywords'			=> array( 'subproyectos', 'sub', 'proyectos' ),
		));
		acf_register_block(array(
			'name'				=> 'mod-carrousel-back',
			'title'				=> __('Content: Content + carrousel back'),
			'description'		=> __('Bloque de frase destacada'),
			'render_callback'	=> 'render_block_acf',
			'category'			=> 'design',
			'icon'				=> 'media-spreadsheet',
			'keywords'			=> array( 'subproyectos', 'sub', 'proyectos' ),
		));
		acf_register_block(array(
			'name'				=> 'mod-numeros',
			'title'				=> __('Content: Numbers'),
			'description'		=> __('Bloque de números destacados'),
			'render_callback'	=> 'render_block_acf',
			'category'			=> 'design',
			'icon'				=> 'media-spreadsheet',
			'keywords'			=> array( 'subproyectos', 'sub', 'proyectos' ),
		));
		acf_register_block(array(
			'name'				=> 'mod-bloque-grown',
			'title'				=> __('Content: 3 mods - Grown, Wired, Coded'),
			'description'		=> __('Bloque de modelos de desarrollo Stämm'),
			'render_callback'	=> 'render_block_acf',
			'category'			=> 'design',
			'icon'				=> 'media-spreadsheet',
			'keywords'			=> array( 'subproyectos', 'sub', 'proyectos' ),
		));
		acf_register_block(array(
			'name'				=> 'mod-slider-contents',
			'title'				=> __('Content: Slide de contenidos'),
			'description'		=> __('Bloque de slide de contenidos (tecnologías, etc).'),
			'render_callback'	=> 'render_block_acf',
			'category'			=> 'design',
			'icon'				=> 'media-spreadsheet',
			'keywords'			=> array( 'subproyectos', 'sub', 'proyectos' ),
		));
		acf_register_block(array(
			'name'				=> 'mod-employees',
			'title'				=> __('Content: Employees'),
			'description'		=> __('Bloque de empleados separados por área.'),
			'render_callback'	=> 'render_block_acf',
			'category'			=> 'design',
			'icon'				=> 'media-spreadsheet',
			'keywords'			=> array( 'subproyectos', 'sub', 'proyectos' ),
		));
		acf_register_block(array(
			'name'				=> 'mod-big-hero',
			'title'				=> __('Content: Big hero'),
			'description'		=> __('Hero principal de la home'),
			'render_callback'	=> 'render_block_acf',
			'category'			=> 'design',
			'icon'				=> 'media-spreadsheet',
			'keywords'			=> array( 'subproyectos', 'sub', 'proyectos' ),
		));
		acf_register_block(array(
			'name'				=> 'mod-big-hero-b',
			'title'				=> __('Content: Big hero MVP'),
			'description'		=> __('Hero principal de la home'),
			'render_callback'	=> 'render_block_acf',
			'category'			=> 'design',
			'icon'				=> 'media-spreadsheet',
			'keywords'			=> array( 'subproyectos', 'sub', 'proyectos' ),
		));
		acf_register_block(array(
			'name'				=> 'mod-big-hero-slider',
			'title'				=> __('Content: Big hero slider'),
			'description'		=> __('Hero principal de la home'),
			'render_callback'	=> 'render_block_acf',
			'category'			=> 'design',
			'icon'				=> 'media-spreadsheet',
			'keywords'			=> array( 'subproyectos', 'sub', 'proyectos' ),
		));
		acf_register_block(array(
			'name'				=> 'mod-team-search',
			'title'				=> __('Content: Team search'),
			'description'		=> __('Módulo de búsquedas activas'),
			'render_callback'	=> 'render_block_acf',
			'category'			=> 'design',
			'icon'				=> 'media-spreadsheet',
			'keywords'			=> array( 'subproyectos', 'sub', 'proyectos' ),
		));
		acf_register_block(array(
			'name'				=> 'mod-galeria',
			'title'				=> __('Content: Gallery'),
			'description'		=> __('Galería de imágenes'),
			'render_callback'	=> 'render_block_acf',
			'category'			=> 'design',
			'icon'				=> 'media-spreadsheet',
			'keywords'			=> array( 'subproyectos', 'sub', 'proyectos' ),
		));
		acf_register_block(array(
			'name'				=> 'mod-adjunto',
			'title'				=> __('Content: Adjunto'),
			'description'		=> __('Elemento adjunto (White paper, etc)'),
			'render_callback'	=> 'render_block_acf',
			'category'			=> 'design',
			'icon'				=> 'media-spreadsheet',
			'keywords'			=> array( 'adjunto', 'attachment', 'white paper' ),
		));
		acf_register_block(array(
			'name'				=> 'mod-news',
			'title'				=> __('Content: Latest News'),
			'description'		=> __('Latest news module'),
			'render_callback'	=> 'render_block_acf',
			'category'			=> 'design',
			'icon'				=> 'media-spreadsheet',
			'keywords'			=> array( 'adjunto', 'attachment', 'white paper' ),
		));
		acf_register_block(array(
			'name'				=> 'mod-slides',
			'title'				=> __('Content: Slides contents'),
			'description'		=> __('Slides module'),
			'render_callback'	=> 'render_block_acf',
			'category'			=> 'design',
			'icon'				=> 'media-spreadsheet',
			'keywords'			=> array( 'adjunto', 'attachment', 'white paper' ),
		));
		acf_register_block(array(
			'name'				=> 'mod-paragraphs',
			'title'				=> __('Content: Paragraph container'),
			'description'		=> __('A module for paragraphs'),
			'render_callback'	=> 'render_block_acf',
			'category'			=> 'design',
			'icon'				=> 'media-spreadsheet',
			'keywords'			=> array( 'adjunto', 'attachment', 'white paper' ),
		));
		acf_register_block(array(
			'name'				=> 'mod-biorreactor-new',
			'title'				=> __('Content: Bioprocessor module'),
			'description'		=> __(''),
			'render_callback'	=> 'render_block_acf',
			'category'			=> 'design',
			'icon'				=> 'media-spreadsheet',
			'keywords'			=> array( 'adjunto', 'attachment', 'white paper' ),
		));
		acf_register_block(array(
			'name'				=> 'mod-content-image',
			'title'				=> __('Content: Header + Full image'),
			'description'		=> __('A module for paragraphs'),
			'render_callback'	=> 'render_block_acf',
			'category'			=> 'design',
			'icon'				=> 'media-spreadsheet',
			'keywords'			=> array( 'adjunto', 'attachment', 'white paper' ),
		));
		acf_register_block(array(
			'name'				=> 'mod-culture-texts',
			'title'				=> __('Content: Culture - Big texts'),
			'description'		=> __('A module for culture'),
			'render_callback'	=> 'render_block_acf',
			'category'			=> 'design',
			'icon'				=> 'media-spreadsheet',
			'keywords'			=> array( 'adjunto', 'attachment', 'white paper' ),
		));
		acf_register_block(array(
			'name'				=> 'mod-facilities-map',
			'title'				=> __('Content: Facilities map'),
			'description'		=> __('A module for culture'),
			'render_callback'	=> 'render_block_acf',
			'category'			=> 'design',
			'icon'				=> 'media-spreadsheet',
			'keywords'			=> array( 'adjunto', 'attachment', 'white paper' ),
		));
		acf_register_block(array(
			'name'				=> 'mod-timeline',
			'title'				=> __('Content: Timeline'),
			'description'		=> __('A module a timeline'),
			'render_callback'	=> 'render_block_acf',
			'category'			=> 'design',
			'icon'				=> 'media-spreadsheet',
			'keywords'			=> array( 'adjunto', 'attachment', 'white paper' ),
		));
	}
}

function render_block_acf( $block ) {
	
	// convert name ("acf/testimonial") into path friendly slug ("testimonial")
	$slug = str_replace('acf/', '', $block['name']);
	
	// include a template part from within the "template-parts/block" folder
	if( file_exists( get_theme_file_path("/template-parts/block/content-{$slug}.php") ) ) {
		include( get_theme_file_path("/template-parts/block/content-{$slug}.php") );
	}
}
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz-_';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
add_theme_support( 'post-thumbnails' );
add_image_size( 'feed-size', 720, 900, true ); 
add_image_size( 'foto-hq', 1920, 1080, true ); 

function slugify($text, string $divider = '-')
{
  // replace non letter or digits by divider
  $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, $divider);

  // remove duplicate divider
  $text = preg_replace('~-+~', $divider, $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}




/* Display functions */

function getAreaEmployees($area){
	
			$member_group_query = new WP_Query( array(
				'post_type' => 'employee',
				'posts_per_page' => -1,
				'tax_query' => array(
					array(
					'taxonomy' => 'area',
					'field' => 'slug',
					'terms' => array( $area->slug ),
					'operator' => 'IN'
					)
				)
				)
		);
				?>
				<h2 class="tit-uno"><?php echo $area->name; ?></h2>
				<section class="employee-area">
				
				
				<?php
				if ( $member_group_query->have_posts() ) : while ( $member_group_query->have_posts() ) : $member_group_query->the_post(); 
					get_template_part('employee');
					?>
				

				<?php endwhile; endif; ?>
				
			
				</section>
    
    <?php
    // Reset things, for good measure
    $member_group_query = null;
    wp_reset_postdata(); 
}







/**
 * Display a custom taxonomy dropdown in admin
 * @author Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */
add_action('restrict_manage_posts', 'tsm_filter_post_type_by_taxonomy');
function tsm_filter_post_type_by_taxonomy() {
	global $typenow;
	$post_type = 'employee'; // change to your post type
	$taxonomy  = 'area'; // change to your taxonomy
	if ($typenow == $post_type) {
		$selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
		$info_taxonomy = get_taxonomy($taxonomy);
		wp_dropdown_categories(array(
			'show_option_all' => sprintf( __( 'Show all %s', 'textdomain' ), $info_taxonomy->label ),
			'taxonomy'        => $taxonomy,
			'name'            => $taxonomy,
			'orderby'         => 'name',
			'selected'        => $selected,
			'show_count'      => true,
			'hide_empty'      => true,
		));
	};
}
/**
 * Filter posts by taxonomy in admin
 * @author  Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */
add_filter('parse_query', 'tsm_convert_id_to_term_in_query');
function tsm_convert_id_to_term_in_query($query) {
	global $pagenow;
	$post_type = 'employee'; // change to your post type
	$taxonomy  = 'area'; // change to your taxonomy
	$q_vars    = &$query->query_vars;
	if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
		$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
		$q_vars[$taxonomy] = $term->slug;
	}
}

add_filter('the_content', 'add_text_input_classes', 20);
function add_text_input_classes($content)
{
	/* if(get_post_type() == "post"){
	$doc = new DOMDocument(); //Instantiate DOMDocument
	$doc->loadHTML($content); //Load the Post/Page Content as HTML
	$p = $doc->getElementsByTagName('p');
	$h1 = $doc->getElementsByTagName('h1'); //Find all Inputs
	$h2 = $doc->getElementsByTagName('h2');
	$h3 = $doc->getElementsByTagName('h3');
	foreach($p as $par)
	{
		append_attr_to_element($par, 'class', 'texto');
	}
	foreach($h1 as $tit)
	{
		append_attr_to_element($tit, 'class', 'tit-dos');
	}
	foreach($h2 as $tit)
	{
		append_attr_to_element($tit, 'class', 'tit-dos');
	}
	foreach($h3 as $tit)
	{
		append_attr_to_element($tit, 'class', 'tit-tres');
	}
	return $doc->saveHTML();
	}	*/
	return $content;
}
function append_attr_to_element(&$element, $attr, $value)
{
    if($element->hasAttribute($attr)) //If the element has the specified attribute
    {
        $attrs = explode(' ', $element->getAttribute($attr)); //Explode existing values
        if(!in_array($value, $attrs))
            $attrs[] = $value; //Append the new value
        $attrs = array_map('trim', array_filter($attrs)); //Clean existing values
        $element->setAttribute($attr, implode(' ', $attrs)); //Set cleaned attribute
    }
    else
        $element->setAttribute($attr, $value); //Set attribute
}




function getBlockHeader(){
	if(get_field('has_header')):

	?>
	<header class=" block-header " >
		<div class="main-container">
		<h2 class="tit-dos"><?php echo get_field('header_text'); ?></h2>
		<div class="contenido"><?php echo get_field('bajada'); ?></div>
		<?php if(get_field('header_has_link') && get_field('link_type') == 'link'):?>
		<div class="cta-container">
			
			<a href="<?php echo get_field('header_link')['url']; ?>" target="<?php echo get_field('header_link')['target']; ?>" class="boton"><?php echo get_field('header_link')['title'];?></a>
		</div>
		<?php endif;?>
		<?php if(get_field('header_has_link') && get_field('link_type') == 'form'):?>
		<div class="cta-container">
			
			<a onclick="openForm(<?php echo get_field('form')->ID; ?>)"class="boton"><?php echo get_field('button_text');?></a>
		</div>
		<?php endif;?>
		</div>
	</header>
	<?php
	endif;

}
function getCTA($obj){
	
	if($obj['has_link'] && $obj['link_type'] == 'link'):?>
		<div class="cta-container">
			
			<a href="<?php echo $obj['link']['url']; ?>" target="<?php echo $obj['link']['target']; ?>" class="boton"><?php echo $obj['link']['title'];?></a>
		</div>
		<?php endif;
	if($obj['has_link'] && $obj['link_type'] == 'form'):?>
		<div class="cta-container">
			
			<a onclick="openForm(<?php echo $obj['form']->ID; ?>)"class="boton"><?php echo $obj['button_text'];?></a>
		</div>
		<?php endif;

}
function getBlHeader(){
	/*
	if(get_field('has_header')):
	?>
	<header class=" block-header " >
		<h2 class="tit-dos"><?php echo get_field('header_text'); ?></h2>
		<div class="contenido"><?php echo get_field('bajada'); ?></div>
		<?php if(get_field('header_has_link') && get_field('header_link')):?>
		<div class="cta-container">
		
			<a href="<?php echo get_field('header_link')['url']; ?>" target="<?php echo get_field('header_link')['target']; ?>" class="boton"><?php echo get_field('header_link')['title'];?></a>
		</div>
		<?php endif;?>
	</header>
	<?php
	endif;
	*/

}

function enqueue_admin_custom_css(){
	wp_enqueue_style( 'admin-custom', get_stylesheet_directory_uri() . '/dist/css/styles.css' );	
}


add_action( 'admin_enqueue_scripts', 'enqueue_admin_custom_css' );



function fix_media_views_css() {
    echo '<link rel="stylesheet" id="fix-media-views-css" href="'.get_bloginfo('url').'/wp-includes/css/media-views.min.css?ver=5.9.1" media="all">';
}
add_action('admin_footer', 'fix_media_views_css');


function getVideoBackground($video){
	
	?>
	<div class="video-back" data-aspect="<?php echo ($video['width']/$video['height']); ?>">
		<div class="video-container">
			<video loop="loop" autoplay="true" playsinline="true" muted="true" id="mejs_6204682393310839_html5" preload="none" src="<?php echo $video['url']; ?>">
							<source type="video/mp4" src="html5" preload="none" src="<?php echo $video['url']; ?>">
				
						</video>
		</div>
	</div>
	<?php
	
}


function getButton($link,$class=''){
	
	if($link['has_link']):
		if($link['type']=='link'):
			$lk = $link['link'];
	?>
	<a href="<?php echo $lk['url'];?>" target="<?php echo $lk['target']; ?>" class="boton <?php echo $class?>"><?php echo $lk['title']; ?></a>
	<?php
		elseif($link['type']=='form'):
			var_dump($link);
			?>
			<a onclick="alert('open form');" class="boton <?php echo $class?>"><?php echo $link['text']; ?></a>
			<?php
		endif;
	endif;	
}



function getFormPopup($form){

	?>
	<div class="fixed-content " style="display:none" id="form-<?php echo $form->ID; ?>">
	<div class="small-container form-contents">
		<div class="button-container">
				<div class="slick-arrow">
				<a class="boton" onclick="closeForm(<?php echo $form->ID; ?>);">
					<i class="fa-solid fa-close " > </i>
				</a>
				</div>
			</div>
		<div class="form-container overlay-container">
			<header class="form-header">
				<h2 class="tit-uno"><?php 
				echo get_the_title($form);
				?></h2>
			</header>
			<?php echo do_shortcode('[wpforms id="'.$form->ID.'" title="false"]'); ?>			
		</div>
	
	</div>
</div>
	<?php
}

function getTriangleLogo(){
	?>
<svg class="triangle-logo" id="Layer_1" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1000 1000">

  <defs>
    <style>
      .st0 {
        fill: #fff;
      }
    </style>
  </defs>
  <path class="st0" d="M952.82,1000H47.18c-14.99,0-28.91-7.76-36.78-20.5-7.88-12.75-8.59-28.68-1.89-42.08L461.33,31.79c7.33-14.65,22.3-23.9,38.68-23.9s31.35,9.25,38.68,23.9l452.81,905.64c6.7,13.4,5.99,29.32-1.89,42.07-7.88,12.74-21.8,20.5-36.78,20.5ZM139.48,913.52h721.04c10.26,0,16.93-10.8,12.34-19.97L512.35,172.5c-5.09-10.17-19.6-10.17-24.69,0L127.14,893.55c-4.59,9.18,2.08,19.97,12.34,19.97Z"/>
  <circle class="st0" cx="107.33" cy="60.14" r="60.14"/>
  <circle class="st0" cx="892.68" cy="60.14" r="60.14"/>
</svg>
	<?php
}
function getCategoryNav(){
	?>
	<div class="main-container">
		<!--header class="blog-nav">
			<h3 >Categories</h3>
			<?php // wp_nav_menu('Blog menu'); ?>
		</header-->

		<div class="categories-nav">
			
			<?php $tags = get_categories();
		if($tags):?>
		<nav class="categorias small-text">


			<ul>
				<li ><a <?php if(!is_category()):?>class="selected"<?php endif; ?> href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>"><?php echo $GLOBALS['texts']['blog']['all'];?></a></li>
				<?php foreach($tags as $tag):?>
				<li><a <?php if(is_category($tag->term_id)):?>class="selected"<?php endif; ?> href="<?php echo get_term_link($tag); ?>"><?php echo $tag->name; ?></a></li>
				<?php endforeach;?>
			</ul>
		</nav>
		<?php endif;?>
		</div>
	</div>
	<?php
}

function getPostFooter(){
	$bf = get_field('blog_footer','options');
	if($bf && $bf['enabled']):
	?>
	<section class="blog-footer f-verde c-negro" >
	
	<div class="main-container">
		<div class="column-container two" data-anim=true data-scroll-speed=.3>
			<div class="text column">
				<h2 class="tit-uno"><?php echo $bf['title']; ?></h2>
				<?php if($bf['contents']): ?>
				<div class="">

					<?php echo $bf['contents'];?>
				
					
				</div>
			<?php endif; ?>
			</div>
			<div class="column">
				<?php echo do_shortcode('[wpforms id="'.$bf['form']->ID.'" title="false"]'); ?>	
			</div>
			
		
		</div>
		
	</div>
</section> 
	<?php
endif;
}


function getRelatedPosts() {
    global $post;
    // Get the current post's tags
    $tags = wp_get_post_tags( $post->ID );
    $cats = wp_get_post_categories(get_the_ID());
    
    $catIDs = array();
    $tagIDs = array();
    if ( $cats ) {
        // Fill an array with the current post's tag ids
        $tagcount = count( $tags );
        for ( $i = 0; $i < $tagcount; $i++ ) {
            $tagIDs[$i] = $tags[$i]->term_id;
        }

        for($i=0;$i<count($cats);$i++){
        	if(is_numeric($cats[$i])){
        		$catIDs[$i] = $cats[$i];	
        	} else{
        		$catIDs[$i] = $cats[$i]->term_id;	
        	}
        	
        }
        
        // Query options, the magic is with 'tag__in'
        $args = array(
            //'tag__in' => $tagIDs,
            'category__in' => $catIDs,
            'post__not_in' => array( $post->ID ),
            'showposts'=> 3
        );
        $my_query = new WP_Query( $args );
        // If we have related posts, show them
        if ( $my_query->have_posts() ) {
            ?>
            <section class="related-posts">

							
	<div class="main-container" style="padding: 3rem 0">
		<h3><?php echo $GLOBALS['texts']['blog']['related'];?></h3>
		<div class="posts-container column-container three">
	
		
            <?php
            while ( $my_query->have_posts() ) {
                $my_query->the_post();
                get_template_part( 'entry' );
                
            }
            
        }
        ?>
        
        <?php
    }
    else{
    	?>
    	<?php
    }
    wp_reset_query();
    ?>
    </div>
		
	</div>
	
		
</section>
    <?php
}