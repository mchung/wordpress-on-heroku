<?php

if ( ! function_exists( '_apply_template' ) ) {
	function _apply_template( $tpl_file, $vars = array(), $include_globals = true ) {
		extract( $vars );

		if ( $include_globals )
			extract( $GLOBALS, EXTR_SKIP );

		ob_start();

		require( $tpl_file );
		return ob_get_clean();
	}
}


require_once( __DIR__ . '/includes/common.php' );
require_once( __DIR__ . '/includes/admin.php' );
require_once( __DIR__ . '/includes/rewrite.php' );
require_once( __DIR__ . '/includes/shortcodes.php' );
require_once( __DIR__ . '/includes/affiliate.php' );

SamuraiPress_Admin::init();
SamuraiPress_Rewrite::init();
SamuraiPress_ShortCodes::init();
SamuraiPress_Affiliate::init();

/** Insert home link in header */
add_filter( 'wp_nav_menu', '__samuraipress_home_link' );
function __samuraipress_home_link( $nav_menu ) {
	$nav_menu = preg_replace( '/<div[^>]*>/', '$0<a class="home-link" href="' . esc_attr( home_url() ) . '"></a>', $nav_menu, 1 );
	return $nav_menu;
}
