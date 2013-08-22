<?php
/**
** A base module for the following types of tags:
** 	[date] and [date*]		# Date
**/

/* Shortcode handler */

add_action( 'init', 'wpcf7_add_shortcode_date', 5 );

function wpcf7_add_shortcode_date() {
	wpcf7_add_shortcode( array( 'date', 'date*' ),
		'wpcf7_date_shortcode_handler', true );
}

function wpcf7_date_shortcode_handler( $tag ) {
	$tag = new WPCF7_Shortcode( $tag );

	if ( empty( $tag->name ) )
		return '';

	$validation_error = wpcf7_get_validation_error( $tag->name );

	$class = wpcf7_form_controls_class( $tag->type );

	$class .= ' wpcf7-validates-as-date';

	if ( $validation_error )
		$class .= ' wpcf7-not-valid';

	$atts = array();

	$atts['class'] = $tag->get_class_option( $class );
	$atts['id'] = $tag->get_option( 'id', 'id', true );
	$atts['tabindex'] = $tag->get_option( 'tabindex', 'int', true );
	$atts['min'] = $tag->get_option( 'min', 'date', true );
	$atts['max'] = $tag->get_option( 'max', 'date', true );
	$atts['step'] = $tag->get_option( 'step', 'int', true );

	if ( $tag->has_option( 'readonly' ) )
		$atts['readonly'] = 'readonly';

	if ( $tag->is_required() )
		$atts['aria-required'] = 'true';

	$value = (string) reset( $tag->values );

	if ( $tag->has_option( 'placeholder' ) || $tag->has_option( 'watermark' ) ) {
		$atts['placeholder'] = $value;
		$value = '';
	}

	if ( wpcf7_is_posted() && isset( $_POST[$tag->name] ) )
		$value = stripslashes_deep( $_POST[$tag->name] );

	$atts['value'] = $value;

	if ( wpcf7_support_html5() ) {
		$atts['type'] = $tag->basetype;
	} else {
		$atts['type'] = 'text';
	}

	$atts['name'] = $tag->name;

	$atts = wpcf7_format_atts( $atts );

	$html = sprintf(
		'<span class="wpcf7-form-control-wrap %1$s"><input %2$s />%3$s</span>',
		$tag->name, $atts, $validation_error );

	return $html;
}


/* Validation filter */

add_filter( 'wpcf7_validate_date', 'wpcf7_date_validation_filter', 10, 2 );
add_filter( 'wpcf7_validate_date*', 'wpcf7_date_validation_filter', 10, 2 );

function wpcf7_date_validation_filter( $result, $tag ) {
	$tag = new WPCF7_Shortcode( $tag );

	$name = $tag->name;

	$min = $tag->get_option( 'min', 'date', true );
	$max = $tag->get_option( 'max', 'date', true );

	$value = isset( $_POST[$name] )
		? trim( strtr( (string) $_POST[$name], "\n", " " ) )
		: '';

	if ( $tag->is_required() && '' == $value ) {
		$result['valid'] = false;
		$result['reason'][$name] = wpcf7_get_message( 'invalid_required' );
	} elseif ( '' != $value && ! wpcf7_is_date( $value ) ) {
		$result['valid'] = false;
		$result['reason'][$name] = wpcf7_get_message( 'invalid_date' );
	} elseif ( '' != $value && ! empty( $min ) && $value < $min ) {
		$result['valid'] = false;
		$result['reason'][$name] = wpcf7_get_message( 'date_too_early' );
	} elseif ( '' != $value && ! empty( $max ) && $max < $value ) {
		$result['valid'] = false;
		$result['reason'][$name] = wpcf7_get_message( 'date_too_late' );
	}

	return $result;
}


/* Messages */

add_filter( 'wpcf7_messages', 'wpcf7_date_messages' );

function wpcf7_date_messages( $messages ) {
	return array_merge( $messages, array(
		'invalid_date' => array(
			'description' => __( "Date format that the sender entered is invalid", 'wpcf7' ),
			'default' => __( 'Date format seems invalid.', 'wpcf7' )
		),

		'date_too_early' => array(
			'description' => __( "Date is earlier than minimum limit", 'wpcf7' ),
			'default' => __( 'This date is too early.', 'wpcf7' )
		),

		'date_too_late' => array(
			'description' => __( "Date is later than maximum limit", 'wpcf7' ),
			'default' => __( 'This date is too late.', 'wpcf7' )
		) ) );
}


/* Tag generator */

add_action( 'admin_init', 'wpcf7_add_tag_generator_date', 19 );

function wpcf7_add_tag_generator_date() {
	if ( ! function_exists( 'wpcf7_add_tag_generator' ) )
		return;

	wpcf7_add_tag_generator( 'date', __( 'Date', 'wpcf7' ),
		'wpcf7-tg-pane-date', 'wpcf7_tg_pane_date' );
}

function wpcf7_tg_pane_date( &$contact_form ) {
	wpcf7_tg_pane_date_and_relatives( 'date' );
}

function wpcf7_tg_pane_date_and_relatives( $type = 'date' ) {
	if ( ! in_array( $type, array() ) )
		$type = 'date';

?>
<div id="wpcf7-tg-pane-<?php echo $type; ?>" class="hidden">
<form action="">
<table>
<tr><td><input type="checkbox" name="required" />&nbsp;<?php echo esc_html( __( 'Required field?', 'wpcf7' ) ); ?></td></tr>
<tr><td><?php echo esc_html( __( 'Name', 'wpcf7' ) ); ?><br /><input type="text" name="name" class="tg-name oneline" /></td><td></td></tr>
</table>

<table>
<tr>
<td><code>id</code> (<?php echo esc_html( __( 'optional', 'wpcf7' ) ); ?>)<br />
<input type="text" name="id" class="idvalue oneline option" /></td>

<td><code>class</code> (<?php echo esc_html( __( 'optional', 'wpcf7' ) ); ?>)<br />
<input type="text" name="class" class="classvalue oneline option" /></td>
</tr>

<tr>
<td><code>min</code> (<?php echo esc_html( __( 'optional', 'wpcf7' ) ); ?>)<br />
<input type="date" name="min" class="date oneline option" /></td>

<td><code>max</code> (<?php echo esc_html( __( 'optional', 'wpcf7' ) ); ?>)<br />
<input type="date" name="max" class="date oneline option" /></td>
</tr>

<tr>
<td><code>step</code> (<?php echo esc_html( __( 'optional', 'wpcf7' ) ); ?>)<br />
<input type="number" name="step" class="numeric oneline option" min="1" /></td>
</tr>

<tr>
<td><?php echo esc_html( __( 'Default value', 'wpcf7' ) ); ?> (<?php echo esc_html( __( 'optional', 'wpcf7' ) ); ?>)<br /><input type="text" name="values" class="oneline" /></td>

<td>
<br /><input type="checkbox" name="placeholder" class="option" />&nbsp;<?php echo esc_html( __( 'Use this text as placeholder?', 'wpcf7' ) ); ?>
</td>
</tr>
</table>

<div class="tg-tag"><?php echo esc_html( __( "Copy this code and paste it into the form left.", 'wpcf7' ) ); ?><br /><input type="text" name="<?php echo $type; ?>" class="tag" readonly="readonly" onfocus="this.select()" /></div>

<div class="tg-mail-tag"><?php echo esc_html( __( "And, put this code into the Mail fields below.", 'wpcf7' ) ); ?><br /><span class="arrow">&#11015;</span>&nbsp;<input type="text" class="mail-tag" readonly="readonly" onfocus="this.select()" /></div>
</form>
</div>
<?php
}

?>