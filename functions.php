<?php
/**
 * @package WordPress
 * @subpackage Clean-Wordpress-Reset-Theme
 * @since Clean Wordpress Reset 1.0
 */


function cleanwordpress_setup() {
	load_theme_textdomain( 'cleanwordpress' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	register_nav_menu( 'primary', __( 'Navigation Menu', 'cleanwordpress' ) );
	add_theme_support( 'post-thumbnails' );
	//add_editor_style( array( '_/css/editor-style.css', twentysixteen_fonts_url() ) );
}
add_action( 'after_setup_theme', 'cleanwordpress_setup' );


function cleanwordpress_scripts_styles() {

	// Theme stylesheet.
	wp_enqueue_style( 'cleanwordpress-style', get_stylesheet_uri() . "/_/css/styles.php" );
	wp_enqueue_script( 'cleanwordpress-script', get_template_directory_uri() . '/_/js/functions.js', array( 'jquery' ), '20161001', true );


}
add_action( 'wp_enqueue_scripts', 'cleanwordpress_scripts_styles' );


//RESPONSIVE EMBEDS
function my_embed_oembed_html($html, $url, $attr, $post_id) {
	return '<div class="video-container">' . $html . '</div>';
}
add_filter('embed_oembed_html', 'my_embed_oembed_html', 99, 4);


// Clean up the <head>
	function removeHeadLinks() {
   	remove_action('wp_head', 'rsd_link');
   	remove_action('wp_head', 'wlwmanifest_link');
}
add_action('init', 'removeHeadLinks');


// Navigation - update coming from twentythirteen
function post_navigation() {
	echo '<div class="navigation">';
	echo '	<div class="next-posts">'.get_next_posts_link('&laquo; Older Entries').'</div>';
	echo '	<div class="prev-posts">'.get_previous_posts_link('Newer Entries &raquo;').'</div>';
	echo '</div>';
}


// Posted On
function posted_on() {
	printf( __( '<span class="sep">Posted </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a> by <span class="byline author vcard">%5$s</span>', '' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_author() )
	);
}

// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

//REMOVE RESPONSIVE IMAGES
remove_filter('the_content','wp_make_content_images_responsive'); 

//REMOVE WIDTH & HEIGHT FROM IMAGES
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}


?>
