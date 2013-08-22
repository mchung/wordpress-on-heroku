<?php
/**
** A base module for [file] and [file*]
**/

/* Shortcode handler */

add_action( 'init', 'wpcf7_add_shortcode_file', 5 );

function wpcf7_add_shortcode_file() {
	wpcf7_add_shortcode( array( 'file', 'file*' ),
		'wpcf7_file_shortcode_handler', true );
}

function wpcf7_file_shortcode_handler( $tag ) {
	$tag = new WPCF7_Shortcode( $tag );

	if ( empty( $tag->name ) )
		return '';

	$validation_error = wpcf7_get_validation_error( $tag->name );

	$class = wpcf7_form_controls_class( $tag->type );

	if ( $validation_error )
		$class .= ' wpcf7-not-valid';

	$atts = array();

	$atts['size'] = $tag->get_size_option( '40' );
	$atts['class'] = $tag->get_class_option( $class );
	$atts['id'] = $tag->get_option( 'id', 'id', true );
	$atts['tabindex'] = $tag->get_option( 'tabindex', 'int', true );

	if ( $tag->is_required() )
		$atts['aria-required'] = 'true';

	$atts['type'] = 'file';
	$atts['name'] = $tag->name;
	$atts['value'] = '1';

	$atts = wpcf7_format_atts( $atts );

	$html = sprintf(
		'<span class="wpcf7-form-control-wrap %1$s"><input %2$s />%3$s</span>',
		$tag->name, $atts, $validation_error );

	return $html;
}


/* Encode type filter */

add_filter( 'wpcf7_form_enctype', 'wpcf7_file_form_enctype_filter' );

function wpcf7_file_form_enctype_filter( $enctype ) {
	$multipart = (bool) wpcf7_scan_shortcode( array( 'type' => array( 'file', 'file*' ) ) );

	if ( $multipart )
		$enctype = ' enctype="multipart/form-data"';

	return $enctype;
}


/* Validation + upload handling filter */

add_filter( 'wpcf7_validate_file', 'wpcf7_file_validation_filter', 10, 2 );
add_filter( 'wpcf7_validate_file*', 'wpcf7_file_validation_filter', 10, 2 );

function wpcf7_file_validation_filter( $result, $tag ) {
	$tag = new WPCF7_Shortcode( $tag );

	$name = $tag->name;

	$file = isset( $_FILES[$name] ) ? $_FILES[$name] : null;

	if ( $file['error'] && UPLOAD_ERR_NO_FILE != $file['error'] ) {
		$result['valid'] = false;
		$result['reason'][$name] = wpcf7_get_message( 'upload_failed_php_error' );
		return $result;
	}

	if ( empty( $file['tmp_name'] ) && $tag->is_required() ) {
		$result['valid'] = false;
		$result['reason'][$name] = wpcf7_get_message( 'invalid_required' );
		return $result;
	}

	if ( ! is_uploaded_file( $file['tmp_name'] ) )
		return $result;

	$allowed_file_types = array();

	if ( $file_types_a = $tag->get_option( 'filetypes' ) ) {
		foreach ( $file_types_a as $file_types ) {
			$file_types = explode( '|', $file_types );

			foreach ( $file_types as $file_type ) {
				$file_type = trim( $file_type, '.' );
				$file_type = str_replace( array( '.', '+', '*', '?' ),
					array( '\.', '\+', '\*', '\?' ), $file_type );
				$allowed_file_types[] = $file_type;
			}
		}
	}

	$allowed_file_types = array_unique( $allowed_file_types );
	$file_type_pattern = implode( '|', $allowed_file_types );

	$allowed_size = 1048576; // default size 1 MB

	if ( $file_size_a = $tag->get_option( 'limit' ) ) {
		$limit_pattern = '/^([1-9][0-9]*)([kKmM]?[bB])?$/';

		foreach ( $file_size_a as $file_size ) {
			if ( preg_match( $limit_pattern, $file_size, $matches ) ) {
				$allowed_size = (int) $matches[1];

				if ( ! empty( $matches[2] ) ) {
					$kbmb = strtolower( $matches[2] );

					if ( 'kb' == $kbmb )
						$allowed_size *= 1024;
					elseif ( 'mb' == $kbmb )
						$allowed_size *= 1024 * 1024;
				}

				break;
			}
		}
	}

	/* File type validation */

	// Default file-type restriction
	if ( '' == $file_type_pattern )
		$file_type_pattern = 'jpg|jpeg|png|gif|pdf|doc|docx|ppt|pptx|odt|avi|ogg|m4a|mov|mp3|mp4|mpg|wav|wmv';

	$file_type_pattern = trim( $file_type_pattern, '|' );
	$file_type_pattern = '(' . $file_type_pattern . ')';
	$file_type_pattern = '/\.' . $file_type_pattern . '$/i';

	if ( ! preg_match( $file_type_pattern, $file['name'] ) ) {
		$result['valid'] = false;
		$result['reason'][$name] = wpcf7_get_message( 'upload_file_type_invalid' );
		return $result;
	}

	/* File size validation */

	if ( $file['size'] > $allowed_size ) {
		$result['valid'] = false;
		$result['reason'][$name] = wpcf7_get_message( 'upload_file_too_large' );
		return $result;
	}

	$uploads_dir = wpcf7_upload_tmp_dir();
	wpcf7_init_uploads(); // Confirm upload dir

	$filename = $file['name'];

	// If you get script file, it's a danger. Make it TXT file.
	if ( preg_match( '/\.(php|pl|py|rb|cgi)\d?$/', $filename ) )
		$filename .= '.txt';

	$filename = wp_unique_filename( $uploads_dir, $filename );

	$new_file = trailingslashit( $uploads_dir ) . $filename;

	if ( false === @move_uploaded_file( $file['tmp_name'], $new_file ) ) {
		$result['valid'] = false;
		$result['reason'][$name] = wpcf7_get_message( 'upload_failed' );
		return $result;
	}

	// Make sure the uploaded file is only readable for the owner process
	@chmod( $new_file, 0400 );

	if ( $contact_form = wpcf7_get_current_contact_form() ) {
		$contact_form->uploaded_files[$name] = $new_file;

		if ( empty( $contact_form->posted_data[$name] ) )
			$contact_form->posted_data[$name] = $filename;
	}

	return $result;
}


/* Messages */

add_filter( 'wpcf7_messages', 'wpcf7_file_messages' );

function wpcf7_file_messages( $messages ) {
	return array_merge( $messages, array(
		'upload_failed' => array(
			'description' => __( "Uploading a file fails for any reason", 'wpcf7' ),
			'default' => __( 'Failed to upload file.', 'wpcf7' )
		),

		'upload_file_type_invalid' => array(
			'description' => __( "Uploaded file is not allowed file type", 'wpcf7' ),
			'default' => __( 'This file type is not allowed.', 'wpcf7' )
		),

		'upload_file_too_large' => array(
			'description' => __( "Uploaded file is too large", 'wpcf7' ),
			'default' => __( 'This file is too large.', 'wpcf7' )
		),

		'upload_failed_php_error' => array(
			'description' => __( "Uploading a file fails for PHP error", 'wpcf7' ),
			'default' => __( 'Failed to upload file. Error occurred.', 'wpcf7' )
		)
	) );
}


/* Tag generator */

add_action( 'admin_init', 'wpcf7_add_tag_generator_file', 50 );

function wpcf7_add_tag_generator_file() {
	if ( ! function_exists( 'wpcf7_add_tag_generator' ) )
		return;

	wpcf7_add_tag_generator( 'file', __( 'File upload', 'wpcf7' ),
		'wpcf7-tg-pane-file', 'wpcf7_tg_pane_file' );
}

function wpcf7_tg_pane_file( &$contact_form ) {
?>
<div id="wpcf7-tg-pane-file" class="hidden">
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
<td><?php echo esc_html( __( "File size limit", 'wpcf7' ) ); ?> (<?php echo esc_html( __( 'bytes', 'wpcf7' ) ); ?>) (<?php echo esc_html( __( 'optional', 'wpcf7' ) ); ?>)<br />
<input type="text" name="limit" class="filesize oneline option" /></td>

<td><?php echo esc_html( __( "Acceptable file types", 'wpcf7' ) ); ?> (<?php echo esc_html( __( 'optional', 'wpcf7' ) ); ?>)<br />
<input type="text" name="filetypes" class="filetype oneline option" /></td>
</tr>
</table>

<div class="tg-tag"><?php echo esc_html( __( "Copy this code and paste it into the form left.", 'wpcf7' ) ); ?><br /><input type="text" name="file" class="tag" readonly="readonly" onfocus="this.select()" /></div>

<div class="tg-mail-tag"><?php echo esc_html( __( "And, put this code into the File Attachments field below.", 'wpcf7' ) ); ?><br /><span class="arrow">&#11015;</span>&nbsp;<input type="text" class="mail-tag" readonly="readonly" onfocus="this.select()" /></div>
</form>
</div>
<?php
}


/* Warning message */

add_action( 'wpcf7_admin_notices', 'wpcf7_file_display_warning_message' );

function wpcf7_file_display_warning_message() {
	if ( empty( $_GET['post'] ) || ! $contact_form = wpcf7_contact_form( $_GET['post'] ) )
		return;

	$has_tags = (bool) $contact_form->form_scan_shortcode(
		array( 'type' => array( 'file', 'file*' ) ) );

	if ( ! $has_tags )
		return;

	$uploads_dir = wpcf7_upload_tmp_dir();
	wpcf7_init_uploads();

	if ( ! is_dir( $uploads_dir ) || ! wp_is_writable( $uploads_dir ) ) {
		$message = sprintf( __( 'This contact form contains file uploading fields, but the temporary folder for the files (%s) does not exist or is not writable. You can create the folder or change its permission manually.', 'wpcf7' ), $uploads_dir );

		echo '<div class="error"><p><strong>' . esc_html( $message ) . '</strong></p></div>';
	}
}


/* File uploading functions */

function wpcf7_init_uploads() {
	$dir = wpcf7_upload_tmp_dir();
	wp_mkdir_p( trailingslashit( $dir ) );
	@chmod( $dir, 0733 );

	$htaccess_file = trailingslashit( $dir ) . '.htaccess';
	if ( file_exists( $htaccess_file ) )
		return;

	if ( $handle = @fopen( $htaccess_file, 'w' ) ) {
		fwrite( $handle, "Deny from all\n" );
		fclose( $handle );
	}
}

function wpcf7_upload_tmp_dir() {
	if ( defined( 'WPCF7_UPLOADS_TMP_DIR' ) )
		return WPCF7_UPLOADS_TMP_DIR;
	else
		return wpcf7_upload_dir( 'dir' ) . '/wpcf7_uploads';
}

function wpcf7_cleanup_upload_files() {
	$dir = trailingslashit( wpcf7_upload_tmp_dir() );

	if ( ! is_dir( $dir ) )
		return false;
	if ( ! is_readable( $dir ) )
		return false;
	if ( ! wp_is_writable( $dir ) )
		return false;

	if ( $handle = @opendir( $dir ) ) {
		while ( false !== ( $file = readdir( $handle ) ) ) {
			if ( $file == "." || $file == ".." || $file == ".htaccess" )
				continue;

			$stat = stat( $dir . $file );
			if ( $stat['mtime'] + 60 < time() ) // 60 secs
				@unlink( $dir . $file );
		}
		closedir( $handle );
	}
}

if ( ! is_admin() && 'GET' == $_SERVER['REQUEST_METHOD'] )
	wpcf7_cleanup_upload_files();

?>