<?php

function wpcf7_plugin_path( $path = '' ) {
	return path_join( WPCF7_PLUGIN_DIR, trim( $path, '/' ) );
}

function wpcf7_plugin_url( $path = '' ) {
	$url = untrailingslashit( WPCF7_PLUGIN_URL );

	if ( ! empty( $path ) && is_string( $path ) && false === strpos( $path, '..' ) )
		$url .= '/' . ltrim( $path, '/' );

	return $url;
}

function wpcf7_deprecated_function( $function, $version, $replacement = null ) {
	do_action( 'wpcf7_deprecated_function_run', $function, $replacement, $version );

	if ( WP_DEBUG && apply_filters( 'wpcf7_deprecated_function_trigger_error', true ) ) {
		if ( ! is_null( $replacement ) )
			trigger_error( sprintf( __( '%1$s is <strong>deprecated</strong> since Contact Form 7 version %2$s! Use %3$s instead.', 'wpcf7' ), $function, $version, $replacement ) );
		else
			trigger_error( sprintf( __( '%1$s is <strong>deprecated</strong> since Contact Form 7 version %2$s with no alternative available.', 'wpcf7' ), $function, $version ) );
	}
}

function wpcf7_messages() {
	$messages = array(
		'mail_sent_ok' => array(
			'description' => __( "Sender's message was sent successfully", 'wpcf7' ),
			'default' => __( 'Your message was sent successfully. Thanks.', 'wpcf7' )
		),

		'mail_sent_ng' => array(
			'description' => __( "Sender's message was failed to send", 'wpcf7' ),
			'default' => __( 'Failed to send your message. Please try later or contact the administrator by another method.', 'wpcf7' )
		),

		'validation_error' => array(
			'description' => __( "Validation errors occurred", 'wpcf7' ),
			'default' => __( 'Validation errors occurred. Please confirm the fields and submit it again.', 'wpcf7' )
		),

		'spam' => array(
			'description' => __( "Submission was referred to as spam", 'wpcf7' ),
			'default' => __( 'Failed to send your message. Please try later or contact the administrator by another method.', 'wpcf7' )
		),

		'accept_terms' => array(
			'description' => __( "There are terms that the sender must accept", 'wpcf7' ),
			'default' => __( 'Please accept the terms to proceed.', 'wpcf7' )
		),

		'invalid_required' => array(
			'description' => __( "There is a field that the sender must fill in", 'wpcf7' ),
			'default' => __( 'Please fill the required field.', 'wpcf7' )
		)
	);

	return apply_filters( 'wpcf7_messages', $messages );
}

function wpcf7_get_default_template( $prop = 'form' ) {
	if ( 'form' == $prop )
		$template = wpcf7_default_form_template();
	elseif ( 'mail' == $prop )
		$template = wpcf7_default_mail_template();
	elseif ( 'mail_2' == $prop )
		$template = wpcf7_default_mail_2_template();
	elseif ( 'messages' == $prop )
		$template = wpcf7_default_messages_template();
	else
		$template = null;

	return apply_filters( 'wpcf7_default_template', $template, $prop );
}

function wpcf7_default_form_template() {
	$template =
		'<p>' . __( 'Your Name', 'wpcf7' ) . ' ' . __( '(required)', 'wpcf7' ) . '<br />' . "\n"
		. '    [text* your-name] </p>' . "\n\n"
		. '<p>' . __( 'Your Email', 'wpcf7' ) . ' ' . __( '(required)', 'wpcf7' ) . '<br />' . "\n"
		. '    [email* your-email] </p>' . "\n\n"
		. '<p>' . __( 'Subject', 'wpcf7' ) . '<br />' . "\n"
		. '    [text your-subject] </p>' . "\n\n"
		. '<p>' . __( 'Your Message', 'wpcf7' ) . '<br />' . "\n"
		. '    [textarea your-message] </p>' . "\n\n"
		. '<p>[submit "' . __( 'Send', 'wpcf7' ) . '"]</p>';

	return $template;
}

function wpcf7_default_mail_template() {
	$subject = '[your-subject]';
	$sender = '[your-name] <[your-email]>';
	$body = sprintf( __( 'From: %s', 'wpcf7' ), '[your-name] <[your-email]>' ) . "\n"
		. sprintf( __( 'Subject: %s', 'wpcf7' ), '[your-subject]' ) . "\n\n"
		. __( 'Message Body:', 'wpcf7' ) . "\n" . '[your-message]' . "\n\n" . '--' . "\n"
		. sprintf( __( 'This e-mail was sent from a contact form on %1$s (%2$s)', 'wpcf7' ),
			get_bloginfo( 'name' ), get_bloginfo( 'url' ) );
	$recipient = get_option( 'admin_email' );
	$additional_headers = '';
	$attachments = '';
	$use_html = 0;
	return compact( 'subject', 'sender', 'body', 'recipient', 'additional_headers', 'attachments', 'use_html' );
}

function wpcf7_default_mail_2_template() {
	$active = false;
	$subject = '[your-subject]';
	$sender = '[your-name] <[your-email]>';
	$body = __( 'Message Body:', 'wpcf7' ) . "\n" . '[your-message]' . "\n\n" . '--' . "\n"
		. sprintf( __( 'This e-mail was sent from a contact form on %1$s (%2$s)', 'wpcf7' ),
			get_bloginfo( 'name' ), get_bloginfo( 'url' ) );
	$recipient = '[your-email]';
	$additional_headers = '';
	$attachments = '';
	$use_html = 0;
	return compact( 'active', 'subject', 'sender', 'body', 'recipient', 'additional_headers', 'attachments', 'use_html' );
}

function wpcf7_default_messages_template() {
	$messages = array();

	foreach ( wpcf7_messages() as $key => $arr ) {
		$messages[$key] = $arr['default'];
	}

	return $messages;
}

function wpcf7_upload_dir( $type = false ) {
	$uploads = wp_upload_dir();

	$uploads = apply_filters( 'wpcf7_upload_dir', array(
		'dir' => $uploads['basedir'],
		'url' => $uploads['baseurl'] ) );

	if ( 'dir' == $type )
		return $uploads['dir'];
	if ( 'url' == $type )
		return $uploads['url'];

	return $uploads;
}

if ( ! function_exists( 'wp_is_writable' ) ) {
/*
 * wp_is_writable exists in WordPress 3.6+
 * http://core.trac.wordpress.org/browser/tags/3.6/wp-includes/functions.php#L1437
 * We will be able to remove this function definition
 * after moving required WordPress version up to 3.6.
 */
function wp_is_writable( $path ) {
	if ( 'WIN' === strtoupper( substr( PHP_OS, 0, 3 ) ) )
		return win_is_writable( $path );
	else
		return @is_writable( $path );
}
}

function wpcf7_l10n() {
	$l10n = array(
		'af' => __( 'Afrikaans', 'wpcf7' ),
		'sq' => __( 'Albanian', 'wpcf7' ),
		'ar' => __( 'Arabic', 'wpcf7' ),
		'hy_AM' => __( 'Armenian', 'wpcf7' ),
		'az_AZ' => __( 'Azerbaijani', 'wpcf7' ),
		'bn_BD' => __( 'Bangla', 'wpcf7' ),
		'eu' => __( 'Basque', 'wpcf7' ),
		'be_BY' => __( 'Belarusian', 'wpcf7' ),
		'bs' => __( 'Bosnian', 'wpcf7' ),
		'pt_BR' => __( 'Brazilian Portuguese', 'wpcf7' ),
		'bg_BG' => __( 'Bulgarian', 'wpcf7' ),
		'ca' => __( 'Catalan', 'wpcf7' ),
		'ckb' => __( 'Central Kurdish', 'wpcf7' ),
		'zh_CN' => __( 'Chinese (Simplified)', 'wpcf7' ),
		'zh_TW' => __( 'Chinese (Traditional)', 'wpcf7' ),
		'hr' => __( 'Croatian', 'wpcf7' ),
		'cs_CZ' => __( 'Czech', 'wpcf7' ),
		'da_DK' => __( 'Danish', 'wpcf7' ),
		'nl_NL' => __( 'Dutch', 'wpcf7' ),
		'en_US' => __( 'English', 'wpcf7' ),
		'eo_EO' => __( 'Esperanto', 'wpcf7' ),
		'et' => __( 'Estonian', 'wpcf7' ),
		'fi' => __( 'Finnish', 'wpcf7' ),
		'fr_FR' => __( 'French', 'wpcf7' ),
		'gl_ES' => __( 'Galician', 'wpcf7' ),
		'gu_IN' => __( 'Gujarati', 'wpcf7' ),
		'ka_GE' => __( 'Georgian', 'wpcf7' ),
		'de_DE' => __( 'German', 'wpcf7' ),
		'el' => __( 'Greek', 'wpcf7' ),
		'he_IL' => __( 'Hebrew', 'wpcf7' ),
		'hi_IN' => __( 'Hindi', 'wpcf7' ),
		'hu_HU' => __( 'Hungarian', 'wpcf7' ),
		'bn_IN' => __( 'Indian Bengali', 'wpcf7' ),
		'id_ID' => __( 'Indonesian', 'wpcf7' ),
		'ga_IE' => __( 'Irish', 'wpcf7' ),
		'it_IT' => __( 'Italian', 'wpcf7' ),
		'ja' => __( 'Japanese', 'wpcf7' ),
		'ko_KR' => __( 'Korean', 'wpcf7' ),
		'lv' => __( 'Latvian', 'wpcf7' ),
		'lt_LT' => __( 'Lithuanian', 'wpcf7' ),
		'mk_MK' => __( 'Macedonian', 'wpcf7' ),
		'ms_MY' => __( 'Malay', 'wpcf7' ),
		'ml_IN' => __( 'Malayalam', 'wpcf7' ),
		'mt_MT' => __( 'Maltese', 'wpcf7' ),
		'nb_NO' => __( 'Norwegian', 'wpcf7' ),
		'fa_IR' => __( 'Persian', 'wpcf7' ),
		'pl_PL' => __( 'Polish', 'wpcf7' ),
		'pt_PT' => __( 'Portuguese', 'wpcf7' ),
		'ru_RU' => __( 'Russian', 'wpcf7' ),
		'ro_RO' => __( 'Romanian', 'wpcf7' ),
		'sr_RS' => __( 'Serbian', 'wpcf7' ),
		'si_LK' => __( 'Sinhala', 'wpcf7' ),
		'sk_SK' => __( 'Slovak', 'wpcf7' ),
		'sl_SI' => __( 'Slovene', 'wpcf7' ),
		'es_ES' => __( 'Spanish', 'wpcf7' ),
		'sv_SE' => __( 'Swedish', 'wpcf7' ),
		'ta' => __( 'Tamil', 'wpcf7' ),
		'th' => __( 'Thai', 'wpcf7' ),
		'tl' => __( 'Tagalog', 'wpcf7' ),
		'tr_TR' => __( 'Turkish', 'wpcf7' ),
		'uk' => __( 'Ukrainian', 'wpcf7' ),
		'vi' => __( 'Vietnamese', 'wpcf7' )
	);

	return $l10n;
}

function wpcf7_is_rtl() {
	if ( function_exists( 'is_rtl' ) )
		return is_rtl();

	return false;
}

function wpcf7_ajax_loader() {
	$url = wpcf7_plugin_url( 'images/ajax-loader.gif' );

	if ( is_ssl() && 'http:' == substr( $url, 0, 5 ) )
		$url = 'https:' . substr( $url, 5 );

	return apply_filters( 'wpcf7_ajax_loader', $url );
}

function wpcf7_verify_nonce( $nonce, $action = -1 ) {
	if ( substr( wp_hash( $action, 'nonce' ), -12, 10 ) == $nonce )
		return true;

	return false;
}

function wpcf7_create_nonce( $action = -1 ) {
	return substr( wp_hash( $action, 'nonce' ), -12, 10 );
}

function wpcf7_blacklist_check( $target ) {
	$mod_keys = trim( get_option( 'blacklist_keys' ) );

	if ( empty( $mod_keys ) )
		return false;

	$words = explode( "\n", $mod_keys );

	foreach ( (array) $words as $word ) {
		$word = trim( $word );

		if ( empty( $word ) )
			continue;

		if ( preg_match( '#' . preg_quote( $word, '#' ) . '#', $target ) )
			return true;
	}

	return false;
}

function wpcf7_array_flatten( $input ) {
	if ( ! is_array( $input ) )
		return array( $input );

	$output = array();

	foreach ( $input as $value )
		$output = array_merge( $output, wpcf7_array_flatten( $value ) );

	return $output;
}

function wpcf7_flat_join( $input ) {
	$input = wpcf7_array_flatten( $input );
	$output = array();

	foreach ( (array) $input as $value )
		$output[] = trim( (string) $value );

	return implode( ', ', $output );
}

function wpcf7_support_html5() {
	return (bool) apply_filters( 'wpcf7_support_html5', true );
}

function wpcf7_support_html5_fallback() {
	return (bool) apply_filters( 'wpcf7_support_html5_fallback', false );
}

function wpcf7_format_atts( $atts ) {
	$html = '';

	$prioritized_atts = array( 'type', 'name', 'value' );

	foreach ( $prioritized_atts as $att ) {
		if ( isset( $atts[$att] ) ) {
			$value = trim( $atts[$att] );
			$html .= sprintf( ' %s="%s"', $att, esc_attr( $value ) );
			unset( $atts[$att] );
		}
	}

	foreach ( $atts as $key => $value ) {
		$value = trim( $value );

		if ( '' !== $value )
			$html .= sprintf( ' %s="%s"', $key, esc_attr( $value ) );
	}

	$html = trim( $html );

	return $html;
}

?>