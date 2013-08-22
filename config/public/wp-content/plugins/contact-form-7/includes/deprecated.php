<?php
/*
 * Deprecated functions come here to die.
 */

function wpcf7_admin_url( $args = array() ) {
	wpcf7_deprecated_function( __FUNCTION__, '3.2', 'admin_url()' );

	$defaults = array( 'page' => 'wpcf7' );
	$args = wp_parse_args( $args, $defaults );

	$url = menu_page_url( $args['page'], false );
	unset( $args['page'] );

	$url = add_query_arg( $args, $url );

	return esc_url_raw( $url );
}

function wpcf7_contact_form_default_pack( $locale = null ) {
	wpcf7_deprecated_function( __FUNCTION__, '3.0', 'wpcf7_get_contact_form_default_pack()' );

	return wpcf7_get_contact_form_default_pack( array( 'locale' => $locale ) );
}

?>