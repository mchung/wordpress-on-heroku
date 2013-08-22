<?php

require_once WPCF7_PLUGIN_DIR . '/includes/functions.php';
require_once WPCF7_PLUGIN_DIR . '/includes/deprecated.php';
require_once WPCF7_PLUGIN_DIR . '/includes/formatting.php';
require_once WPCF7_PLUGIN_DIR . '/includes/pipe.php';
require_once WPCF7_PLUGIN_DIR . '/includes/shortcodes.php';
require_once WPCF7_PLUGIN_DIR . '/includes/capabilities.php';
require_once WPCF7_PLUGIN_DIR . '/includes/classes.php';

if ( is_admin() )
	require_once WPCF7_PLUGIN_DIR . '/admin/admin.php';
else
	require_once WPCF7_PLUGIN_DIR . '/includes/controller.php';

add_action( 'plugins_loaded', 'wpcf7_init_shortcode_manager', 1 );

function wpcf7_init_shortcode_manager() {
	global $wpcf7_shortcode_manager;

	$wpcf7_shortcode_manager = new WPCF7_ShortcodeManager();
}

/* Loading modules */

add_action( 'plugins_loaded', 'wpcf7_load_modules', 1 );

function wpcf7_load_modules() {
	$dir = WPCF7_PLUGIN_MODULES_DIR;

	if ( ! ( is_dir( $dir ) && $dh = opendir( $dir ) ) )
		return false;

	while ( ( $module = readdir( $dh ) ) !== false ) {
		if ( substr( $module, -4 ) == '.php' && substr( $module, 0, 1 ) != '.' )
			include_once $dir . '/' . $module;
	}
}

add_action( 'plugins_loaded', 'wpcf7_set_request_uri', 9 );

function wpcf7_set_request_uri() {
	global $wpcf7_request_uri;

	$wpcf7_request_uri = add_query_arg( array() );
}

function wpcf7_get_request_uri() {
	global $wpcf7_request_uri;

	return (string) $wpcf7_request_uri;
}

add_action( 'init', 'wpcf7_init' );

function wpcf7_init() {
	wpcf7();

	// L10N
	wpcf7_load_plugin_textdomain();

	// Custom Post Type
	wpcf7_register_post_types();

	do_action( 'wpcf7_init' );
}

function wpcf7() {
	global $wpcf7;

	if ( is_object( $wpcf7 ) )
		return;

	$wpcf7 = (object) array(
		'processing_within' => '',
		'widget_count' => 0,
		'unit_count' => 0,
		'global_unit_count' => 0,
		'result' => array() );
}

function wpcf7_load_plugin_textdomain() {
	load_plugin_textdomain( 'wpcf7', false, 'contact-form-7/languages' );
}

function wpcf7_register_post_types() {
	WPCF7_ContactForm::register_post_type();
}

/* Upgrading */

add_action( 'admin_init', 'wpcf7_upgrade' );

function wpcf7_upgrade() {
	$opt = get_option( 'wpcf7' );

	if ( ! is_array( $opt ) )
		$opt = array();

	$old_ver = isset( $opt['version'] ) ? (string) $opt['version'] : '0';
	$new_ver = WPCF7_VERSION;

	if ( $old_ver == $new_ver )
		return;

	do_action( 'wpcf7_upgrade', $new_ver, $old_ver );

	$opt['version'] = $new_ver;

	update_option( 'wpcf7', $opt );
}

add_action( 'wpcf7_upgrade', 'wpcf7_convert_to_cpt', 10, 2 );

function wpcf7_convert_to_cpt( $new_ver, $old_ver ) {
	global $wpdb;

	if ( ! version_compare( $old_ver, '3.0-dev', '<' ) )
		return;

	$old_rows = array();

	$table_name = $wpdb->prefix . "contact_form_7";

	if ( $wpdb->get_var( "SHOW TABLES LIKE '$table_name'" ) ) {
		$old_rows = $wpdb->get_results( "SELECT * FROM $table_name" );
	} elseif ( ( $opt = get_option( 'wpcf7' ) ) && ! empty( $opt['contact_forms'] ) ) {
		foreach ( (array) $opt['contact_forms'] as $key => $value ) {
			$old_rows[] = (object) array_merge( $value, array( 'cf7_unit_id' => $key ) );
		}
	}

	foreach ( (array) $old_rows as $row ) {
		$q = "SELECT post_id FROM $wpdb->postmeta WHERE meta_key = '_old_cf7_unit_id'"
			. $wpdb->prepare( " AND meta_value = %d", $row->cf7_unit_id );

		if ( $wpdb->get_var( $q ) )
			continue;

		$postarr = array(
			'post_type' => 'wpcf7_contact_form',
			'post_status' => 'publish',
			'post_title' => maybe_unserialize( $row->title ) );

		$post_id = wp_insert_post( $postarr );

		if ( $post_id ) {
			update_post_meta( $post_id, '_old_cf7_unit_id', $row->cf7_unit_id );

			$metas = array( 'form', 'mail', 'mail_2', 'messages', 'additional_settings' );

			foreach ( $metas as $meta ) {
				update_post_meta( $post_id, '_' . $meta,
					wpcf7_normalize_newline_deep( maybe_unserialize( $row->{$meta} ) ) );
			}
		}
	}
}

add_action( 'wpcf7_upgrade', 'wpcf7_prepend_underscore', 10, 2 );

function wpcf7_prepend_underscore( $new_ver, $old_ver ) {
	if ( version_compare( $old_ver, '3.0-dev', '<' ) )
		return;

	if ( ! version_compare( $old_ver, '3.3-dev', '<' ) )
		return;

	$posts = WPCF7_ContactForm::find( array(
		'post_status' => 'any',
		'posts_per_page' => -1 ) );

	foreach ( $posts as $post ) {
		$props = $post->get_properties();

		foreach ( $props as $prop => $value ) {
			if ( metadata_exists( 'post', $post->id, '_' . $prop ) )
				continue;

			update_post_meta( $post->id, '_' . $prop, $value );
			delete_post_meta( $post->id, $prop );
		}
	}
}

/* Install and default settings */

add_action( 'activate_' . WPCF7_PLUGIN_BASENAME, 'wpcf7_install' );

function wpcf7_install() {
	if ( $opt = get_option( 'wpcf7' ) )
		return;

	wpcf7_load_plugin_textdomain();
	wpcf7_register_post_types();
	wpcf7_upgrade();

	if ( get_posts( array( 'post_type' => 'wpcf7_contact_form' ) ) )
		return;

	$contact_form = wpcf7_get_contact_form_default_pack(
		array( 'title' => sprintf( __( 'Contact form %d', 'wpcf7' ), 1 ) ) );

	$contact_form->save();
}

?>