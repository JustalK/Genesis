<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Genesis Sample Theme' );
define( 'CHILD_THEME_URL', 'http://www.studiopress.com/' );
define( 'CHILD_THEME_VERSION', '2.2.2' );

//* Enqueue Google Fonts
add_action( 'wp_enqueue_scripts', 'genesis_sample_google_fonts' );
function genesis_sample_google_fonts() {

	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lato:300,400,700', array(), CHILD_THEME_VERSION );

}

function include_header_path() {
    require(CHILD_DIR.'/header_path.php');
}
add_action( 'genesis_after_header', 'include_header_path' );

add_filter( 'genesis_seo_title', 'child_header_title', 10, 3 );
function child_header_title( $title, $inside, $wrap ) {
	return sprintf( '<%1$s class="site-title">%2$s</%1$s>', $wrap, "Ceci est un filtre title avec un new liens" );
}

/**
 * remove the description
 */
remove_action( 'genesis_site_description', 'genesis_seo_site_description' );

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

//* Add Accessibility support
add_theme_support( 'genesis-accessibility', array( 'headings', 'drop-down-menu',  'search-form', 'skip-links', 'rems' ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 1 );

add_theme_support( 'genesis-structural-wraps', array(
		'header',
		'nav',
		'subnav',
		'site-inner',
		'footer-widgets',
		'footer'
) );


/**
 * Enleve le header et le remplace par ce que l'on souhaite
 */
remove_action('genesis_header','genesis_do_header');
function genesis_new_header(){ 
	?>
	<div class="title-area">
	<h1 class="title-area"><?php echo strtoupper(get_bloginfo('name')); ?></h1>
	<p><?php echo get_bloginfo('description'); ?></p>
	</div>
	<?php 
}
add_action('genesis_header','genesis_new_header');