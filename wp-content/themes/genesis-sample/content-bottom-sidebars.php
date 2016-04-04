<?php

add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );
//* Append custom sidebars after the .entry container
add_action( 'genesis_after_entry', 'do_content_bottom_sidebars', 99 );

function do_content_bottom_sidebars() {
	if ( is_active_sidebar( 'content-bottom-left' ) || is_active_sidebar( 'content-bottom-left' ) ) {
		echo '<div class="content-bottom-sidebars"><div class="wrap">';
		genesis_widget_area( 'content-bottom-left', array(
				'before' => '<div class="content-bottom-left one-half first widget-area">',
				'after'  => '</div>',
		) );
		genesis_widget_area( 'content-bottom-right', array(
				'before' => '<div class="content-bottom-right one-half widget-area">',
				'after'  => '</div>',
		) );
		echo '</div></div>';
	}
}
genesis();

?>