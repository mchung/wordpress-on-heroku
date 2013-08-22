<?php
/**
** Module for Flamingo plugin.
** http://wordpress.org/extend/plugins/flamingo/
**/

add_action( 'flamingo_init', 'wpcf7_flamingo_init' );

function wpcf7_flamingo_init() {
	if ( ! class_exists( 'Flamingo_Inbound_Message' ) )
		return;

	if ( ! term_exists( 'contact-form-7', Flamingo_Inbound_Message::channel_taxonomy ) ) {
		wp_insert_term( __( 'Contact Form 7', 'wpcf7' ),
			Flamingo_Inbound_Message::channel_taxonomy,
			array( 'slug' => 'contact-form-7' ) );
	}
}

add_action( 'wpcf7_before_send_mail', 'wpcf7_flamingo_before_send_mail' );

function wpcf7_flamingo_before_send_mail( $contactform ) {
	if ( ! ( class_exists( 'Flamingo_Contact' ) && class_exists( 'Flamingo_Inbound_Message' ) ) )
		return;

	if ( empty( $contactform->posted_data ) || ! empty( $contactform->skip_mail ) )
		return;

	$fields_senseless = $contactform->form_scan_shortcode(
		array( 'type' => array( 'captchar', 'quiz', 'acceptance' ) ) );

	$exclude_names = array();

	foreach ( $fields_senseless as $tag )
		$exclude_names[] = $tag['name'];

	$posted_data = $contactform->posted_data;

	foreach ( $posted_data as $key => $value ) {
		if ( '_' == substr( $key, 0, 1 ) || in_array( $key, $exclude_names ) )
			unset( $posted_data[$key] );
	}

	$email = isset( $posted_data['your-email'] ) ? trim( $posted_data['your-email'] ) : '';
	$name = isset( $posted_data['your-name'] ) ? trim( $posted_data['your-name'] ) : '';
	$subject = isset( $posted_data['your-subject'] ) ? trim( $posted_data['your-subject'] ) : '';

	$meta = array();

	$special_mail_tags = array( 'remote_ip', 'user_agent', 'url', 'date', 'time',
		'post_id', 'post_name', 'post_title', 'post_url', 'post_author', 'post_author_email' );

	foreach ( $special_mail_tags as $smt )
		$meta[$smt] = apply_filters( 'wpcf7_special_mail_tags', '', '_' . $smt, false );

	$akismet = isset( $contactform->akismet ) ? (array) $contactform->akismet : null;

	Flamingo_Contact::add( array(
		'email' => $email,
		'name' => $name ) );

	Flamingo_Inbound_Message::add( array(
		'channel' => 'contact-form-7',
		'subject' => $subject,
		'from' => trim( sprintf( '%s <%s>', $name, $email ) ),
		'from_name' => $name,
		'from_email' => $email,
		'fields' => $posted_data,
		'meta' => $meta,
		'akismet' => $akismet ) );
}

?>