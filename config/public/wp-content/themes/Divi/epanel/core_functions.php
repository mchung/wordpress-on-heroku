<?php


/********* ePanel v.3.2 ************/


/* Adds jquery script */
add_action( 'wp_print_scripts', 'et_jquery_script', 8 );
function et_jquery_script(){
	wp_enqueue_script('jquery');
}


/* Admin scripts + ajax jquery code */
if ( ! function_exists( 'et_epanel_admin_js' ) ){
	function et_epanel_admin_js(){
		global $themename;

		$epanel_jsfolder = get_template_directory_uri() . '/epanel/js';
		wp_enqueue_script('jquery-ui-tabs');
		wp_enqueue_script('jquery-form');
		wp_enqueue_script('epanel_checkbox',$epanel_jsfolder . '/checkbox.js');
		wp_enqueue_script('epanel_functions_init',$epanel_jsfolder . '/functions-init.js');
		wp_localize_script( 'epanel_functions_init', 'ePanelSettings', array(
			'clearpath' => get_template_directory_uri() . '/epanel/images/empty.png',
			'et_saving_text' => esc_html__( 'Saving...', $themename ),
			'et_options_saved_text' => esc_html__( 'Options Saved.', $themename ),
			'epanel_nonce' => wp_create_nonce('epanel_nonce')
		));
		wp_enqueue_script('epanel_colorpicker',$epanel_jsfolder . '/colorpicker.js');
		wp_enqueue_script('epanel_eye',$epanel_jsfolder . '/eye.js');
	}
}
/* --------------------------------------------- */

/* Adds additional ePanel css */
if ( ! function_exists( 'et_epanel_css_admin' ) ){
	function et_epanel_css_admin() { ?>
		<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() . '/epanel/css/panel.css' ); ?>" type="text/css" />
		<style type="text/css">
			.lightboxclose { background: url("<?php echo esc_url( get_template_directory_uri() . '/epanel/images/description-close.png' ); ?>") no-repeat; width: 19px; height: 20px; }
		</style>
		<!--[if IE 7]>
		<style type="text/css">
			#epanel-save, #epanel-reset { font-size: 0px; display:block; line-height: 0px; bottom: 18px;}
			.box-desc { width: 414px; }
			.box-desc-content { width: 340px; }
			.box-desc-bottom { height: 26px; }
			#epanel-content .epanel-box input, #epanel-content .epanel-box select, .epanel-box textarea {  width: 395px; }
			#epanel-content .epanel-box select { width:434px !important;}
			#epanel-content .epanel-box .box-content { padding: 8px 17px 15px 16px; }
		</style>
		<![endif]-->
		<!--[if IE 8]>
		<style type="text/css">
			#epanel-save, #epanel-reset { font-size: 0px; display:block; line-height: 0px; bottom: 18px;}
		</style>
		<![endif]-->
	<?php }
}
/* --------------------------------------------- */

/* Save/Reset actions | Adds theme options to WP-Admin menu */
add_action('admin_menu', 'et_add_epanel');
function et_add_epanel() {
    global $themename, $shortname, $options;
	$epanel = basename(__FILE__);

	if ( isset( $_GET['page'] ) && $_GET['page'] == $epanel && isset( $_POST['action'] ) ) {
		epanel_save_data( 'js_disabled' ); //saves data when javascript is disabled
	}

    $core_page = add_theme_page( $themename . ' ' . esc_html__( 'Options', $themename ), $themename . ' ' . esc_html__( 'Theme Options', $themename ), 'switch_themes', basename(__FILE__), 'et_build_epanel' );

	add_action( "admin_print_scripts-{$core_page}", 'et_epanel_admin_js' );
	add_action("admin_head-{$core_page}", 'et_epanel_css_admin');
}
/* --------------------------------------------- */

/* Displays ePanel */
if ( ! function_exists( 'et_build_epanel' ) ){
	function et_build_epanel() {

		global $themename, $shortname, $options, $et_disabled_jquery;

		// load theme settings array
		et_load_core_options();

		if ( isset($_GET['saved']) ) {
			if ( $_GET['saved'] ) echo '<div id="message" class="updated fade"><p><strong>' . esc_html( $themename ) . ' ' . esc_html__( 'settings saved.', $themename ) . '</strong></p></div>';
		}
		if ( isset($_GET['reset']) ) {
			if ( $_GET['reset'] ) echo '<div id="message" class="updated fade"><p><strong>' . esc_html( $themename ) . ' ' . esc_html__( 'settings reset.', $themename ) . '</strong></p></div>';
		}
	?>

		<div id="wrapper">
		  <div id="panel-wrap">
			<form method="post" id="main_options_form" enctype="multipart/form-data">
				<div id="epanel-wrapper">
					<div id="epanel">
						<div id="epanel-content-wrap">
							<div id="epanel-content">
								<img src="<?php echo get_template_directory_uri() ?>/epanel/images/logo.png" alt="ePanel" class="pngfix" id="epanel-logo" />
								<?php
									global $epanelMainTabs;
									$epanelMainTabs = apply_filters( 'epanel_page_maintabs', $epanelMainTabs );
								?>
								<ul id="epanel-mainmenu">
									<?php if(in_array('general',$epanelMainTabs)) { ?>
										<li><a href="#wrap-general"><img src="<?php echo get_template_directory_uri() ?>/epanel/images/general-icon.png" class="pngfix" alt="" /><?php esc_html_e( 'General Settings', $themename ); ?></a></li>
									<?php }; ?>
									<?php if(in_array('navigation',$epanelMainTabs)) { ?>
										<li><a href="#wrap-navigation"><img src="<?php echo get_template_directory_uri() ?>/epanel/images/navigation-icon.png" class="pngfix" alt="" /><?php esc_html_e( 'Navigation', $themename ); ?></a></li>
									<?php }; ?>
									<?php if(in_array('layout',$epanelMainTabs)) { ?>
										<li><a href="#wrap-layout"><img src="<?php echo get_template_directory_uri() ?>/epanel/images/layout-icon.png" class="pngfix" alt="" /><?php esc_html_e( 'Layout Settings', $themename ); ?></a></li>
									<?php }; ?>
									<?php if(in_array('ad',$epanelMainTabs)) { ?>
										<li><a href="#wrap-advertisements"><img src="<?php echo get_template_directory_uri() ?>/epanel/images/ad-icon.png" class="pngfix" alt="" /><?php esc_html_e( 'Ad Management', $themename ); ?></a></li>
									<?php }; ?>
									<?php if(in_array('colorization',$epanelMainTabs)) { ?>
										<li><a href="#wrap-colorization"><img src="<?php echo get_template_directory_uri() ?>/epanel/images/colorization-icon.png" class="pngfix" alt="" /><?php esc_html_e( 'Colorization', $themename ); ?></a></li>
									<?php }; ?>
									<?php if(in_array('seo',$epanelMainTabs)) { ?>
										<li><a href="#wrap-seo"><img src="<?php echo get_template_directory_uri() ?>/epanel/images/seo-icon.png" class="pngfix" alt="" /><?php esc_html_e( 'SEO', $themename ); ?></a></li>
									<?php }; ?>
									<?php if(in_array('integration',$epanelMainTabs)) { ?>
										<li><a href="#wrap-integration"><img src="<?php echo get_template_directory_uri() ?>/epanel/images/integration-icon.png" class="pngfix" alt="" /><?php esc_html_e( 'Integration', $themename ); ?></a></li>
									<?php }; ?>
									<?php if(in_array('support',$epanelMainTabs)) { ?>
										<li><a href="#wrap-support"><img src="<?php echo get_template_directory_uri() ?>/epanel/images/support-icon.png" class="pngfix" alt="" /><?php esc_html_e( 'Support Docs', $themename ); ?></a></li>
									<?php }; ?>
									<?php do_action( 'epanel_render_maintabs',$epanelMainTabs ); ?>
								</ul><!-- end epanel mainmenu -->

		<?php
			foreach ($options as $value) {
				if ( in_array( $value['type'], array( 'text', 'textlimit', 'textarea', 'select', 'checkboxes', 'different_checkboxes', 'colorpicker', 'textcolorpopup', 'upload' ) ) ) { ?>
					<div class="epanel-box">
						<div class="box-title">
							<h3><?php echo esc_html( $value['name'] ); ?></h3>
							<img src="<?php echo get_template_directory_uri() ?>/epanel/images/help-image.png" alt="description" class="box-description" />
							<div class="box-descr">
								<p><?php echo wp_kses( $value['desc'],  array( 'a' => array(
										'href' => array(),
										'title' => array(),
										'target' => array()
									)
								) ); ?></p>
							</div> <!-- end box-desc-content div -->
						</div> <!-- end div box-title -->

						<div class="box-content">

							<?php if ( 'text' == $value['type'] ) { ?>

								<?php
									$et_input_value = '';
									$et_input_value = ( '' != et_get_option( $value['id'] ) ) ? et_get_option( $value['id'] ) : $value['std'];
									$et_input_value = stripslashes( $et_input_value );
								?>

								<input name="<?php echo esc_attr( $value['id'] ); ?>" id="<?php echo esc_attr( $value['id'] ); ?>" type="<?php echo esc_attr( $value['type'] ); ?>" value="<?php echo esc_attr( $et_input_value ); ?>" />

							<?php } elseif ( 'textlimit' == $value['type'] ) { ?>

								<?php
									$et_input_value = '';
									$et_input_value = ( '' != et_get_option( $value['id'] ) ) ? et_get_option( $value['id'] ) : $value['std'];
									$et_input_value = stripslashes( $et_input_value );
								?>

								<input name="<?php echo esc_attr( $value['id'] ); ?>" id="<?php echo esc_attr( $value['id'] ); ?>" type="text" maxlength="<?php echo esc_attr( $value['max'] ); ?>" size="<?php echo esc_attr( $value['max'] ); ?>" value="<?php echo esc_attr( $et_input_value ); ?>" />

							<?php } elseif ( 'colorpicker' == $value['type'] ) { ?>

								<div id="colorpickerHolder"></div>

							<?php } elseif ( 'textcolorpopup' == $value['type'] ) { ?>

								<?php
									$et_input_value = '';
									$et_input_value = ( '' != et_get_option( $value['id'] ) ) ? et_get_option( $value['id'] ) : $value['std'];
								?>

								<input name="<?php echo esc_attr( $value['id'] ); ?>" id="<?php echo esc_attr( $value['id'] ); ?>" class="colorpopup" type="text" value="<?php echo esc_attr( $et_input_value ); ?>" />

							<?php } elseif ( 'textarea' == $value['type'] ) { ?>

								<?php
									$et_textarea_value = '';
									$et_textarea_value = ( '' != et_get_option( $value['id'] ) ) ? et_get_option( $value['id'] ) : $value['std'];
									$et_textarea_value = stripslashes( $et_textarea_value );
								?>

								<textarea name="<?php echo esc_attr( $value['id'] ); ?>" id="<?php echo esc_attr( $value['id'] ); ?>"><?php echo esc_textarea( $et_textarea_value ); ?></textarea>

							<?php } elseif ( 'upload' == $value['type'] ) { ?>

								<input id="<?php echo esc_attr( $value['id'] ); ?>" class="uploadfield" type="text" size="90" name="<?php echo esc_attr( $value['id'] ); ?>" value="<?php echo esc_url( et_get_option($value['id']) ); ?>" />
								<div class="upload_buttons">
									<span class="upload_image_reset"><?php esc_html_e( 'Reset', $themename ); ?></span>
									<input class="upload_image_button" type="button" value="<?php esc_attr_e( 'Upload Image', $themename ); ?>" />
								</div>

								<div class="clear"></div>

							<?php } elseif ( 'select' == $value['type'] ) { ?>

								<select name="<?php echo esc_attr( $value['id'] ); ?>" id="<?php echo esc_attr( $value['id'] ); ?>">
									<?php foreach ( $value['options'] as $option_key=>$option ) { ?>
										<?php
											$et_select_active = '';
											$et_use_option_values =
											( isset( $value['et_array_for'] ) && in_array( $value['et_array_for'], array( 'pages', 'categories' ) ) ) ||
											( isset( $value['et_save_values'] ) && $value['et_save_values'] ) ? true : false;

											$et_option_db_value = et_get_option($value['id']);

											if ( ( $et_use_option_values && ( $et_option_db_value == $option_key ) ) || ( stripslashes( $et_option_db_value ) == trim( stripslashes( $option ) ) ) || ( ! $et_option_db_value && isset( $value['std'] ) && stripslashes( $option ) == stripslashes( $value['std'] ) ) )
												$et_select_active = ' selected="selected"';
										?>
										<option<?php if ( $et_use_option_values ) echo ' value="' . esc_attr( $option_key ) . '"'; ?> <?php echo $et_select_active; ?>><?php echo esc_html( trim( $option ) ); ?></option>
									<?php } ?>
								</select>

							<?php } elseif ( 'checkboxes' == $value['type'] ) {

								if ( empty( $value['options'] ) ) {
									esc_html_e( "You don't have pages", $themename );
								} else {
									$i = 1;
									$className = 'inputs';
									if ( isset( $value['excludeDefault'] ) && $value['excludeDefault'] == 'true' ) $className .= ' different';

									foreach ( $value['options'] as $option ){
										$checked = "";
										$class_name_last = 0 == $i % 3 ? ' last' : '';

										if ( et_get_option( $value['id'] ) ) {
											if ( in_array( $option, et_get_option( $value['id'] ) ) ) $checked = "checked=\"checked\"";
										}

										$et_checkboxes_label = $value['id'] . '-' . $option;
										if ( 'custom' == $value['usefor'] ) {
											$et_helper = (array) $value['helper'];
											$et_checkboxes_value = $et_helper[$option];
										} else {
											if ( 'taxonomy_terms' == $value['usefor'] && isset( $value['taxonomy_name'] ) ) {
												$et_checkboxes_term = get_term_by( 'id', $option, $value['taxonomy_name'] );
												$et_checkboxes_value = sanitize_text_field( $et_checkboxes_term->name );
											} else {
												$et_checkboxes_value = ( 'pages' == $value['usefor'] ) ? get_pagename( $option ) : get_categname( $option );
											}
										}
										?>

										<p class="<?php echo esc_attr( $className . $class_name_last ); ?>">
											<input type="checkbox" class="usual-checkbox" name="<?php echo esc_attr( $value['id'] ); ?>[]" id="<?php echo esc_attr( $et_checkboxes_label ); ?>" value="<?php echo esc_attr( $option ); ?>" <?php echo esc_html( $checked ); ?> />

											<label for="<?php echo esc_attr( $et_checkboxes_label ); ?>"><?php echo esc_html( $et_checkboxes_value ); ?></label>
										</p>

										<?php if ( $i%3 == 0 ) echo('<br class="clearfix"/>'); ?>
										<?php $i++;
									}
								} ?>
								<br class="clearfix"/>

							<?php } elseif ( 'different_checkboxes' == $value['type'] ){

								foreach ( $value['options'] as $option ){
									$checked = '';
									if ( et_get_option( $value['id']) !== false ) {
										if ( in_array( $option, et_get_option( $value['id'] ) ) ) $checked = "checked=\"checked\"";
									} elseif ( isset( $value['std'] ) ) {
										if ( in_array($option, $value['std']) ) $checked = "checked=\"checked\"";
									} ?>

									<p class="<?php echo esc_attr( 'postinfo-' . $option ); ?>">
										<input type="checkbox" class="usual-checkbox" name="<?php echo esc_attr( $value['id'] ); ?>[]" id="<?php echo esc_attr( $value['id'] . '-' . $option ); ?>" value="<?php echo esc_attr( $option ); ?>" <?php echo esc_html( $checked ); ?> />
									</p>
								<?php } ?>
								<br class="clearfix"/>

							<?php } ?>

						</div> <!-- end box-content div -->
					</div> <!-- end epanel-box div -->

				<?php } elseif ( 'checkbox' == $value['type'] || 'checkbox2' == $value['type'] ) { ?>
					<?php
						$et_box_class = 'checkbox' == $value['type'] ? 'epanel-box-small-1' : 'epanel-box-small-2';
					?>
					<div class="<?php echo esc_attr( 'epanel-box ' . $et_box_class ); ?>">
						<div class="box-title"><h3><?php echo esc_html( $value['name'] ); ?></h3>
							<img src="<?php echo esc_url( get_template_directory_uri() . '/epanel/images/help-image.png' ); ?>" alt="description" class="box-description" />
							<div class="box-descr">
								<p><?php echo wp_kses( $value['desc'],  array( 'a' => array(
										'href' => array(),
										'title' => array(),
										'target' => array()
									)
								) ); ?></p>
							</div> <!-- end box-desc-content div -->
						</div> <!-- end div box-title -->
						<div class="box-content">
							<?php
								$checked = '';
								if ( '' != et_get_option( $value['id'] ) ) {
									if ( 'on' == et_get_option( $value['id'] ) ) { $checked = 'checked="checked"'; }
									else { $checked = ''; }
								}
								elseif ( 'on' == $value['std'] ) { $checked = 'checked="checked"'; }
							?>
							<input type="checkbox" class="checkbox" name="<?php echo esc_attr( $value['id'] ); ?>" id="<?php echo esc_attr( $value['id'] );?>" <?php echo $checked; ?> />
						</div> <!-- end box-content div -->
					</div> <!-- end epanel-box-small div -->

				<?php } elseif ( 'support' == $value['type'] ) { ?>

					<div class="inner-content">
						<?php include( TEMPLATEPATH . "/includes/functions/" . $value['name'] . ".php" ); ?>
					</div>

				<?php } elseif ( 'contenttab-wrapstart' == $value['type'] || 'subcontent-start' == $value['type'] ) { ?>

					<?php $et_contenttab_class = 'contenttab-wrapstart' == $value['type'] ? 'content-div' : 'tab-content'; ?>

					<div id="<?php echo esc_attr( $value['name'] ); ?>" class="<?php echo esc_attr( $et_contenttab_class ); ?>">

				<?php } elseif ( 'contenttab-wrapend' == $value['type'] || 'subcontent-end' == $value['type'] ) { ?>

					</div> <!-- end <?php echo esc_html( $value['name'] ); ?> div -->

				<?php } elseif ( 'subnavtab-start' == $value['type'] ) { ?>

					<ul class="idTabs">

				<?php } elseif ( 'subnavtab-end' == $value['type'] ) { ?>

					</ul>

				<?php } elseif ( 'subnav-tab' == $value['type'] ) { ?>

					<li><a href="#<?php echo esc_attr( $value['name'] ); ?>"><span class="pngfix"><?php echo esc_html( $value['desc'] ); ?></span></a></li>

				<?php } elseif ($value['type'] == "clearfix") { ?>

					<div class="clearfix"></div>

				<?php } ?>

			<?php } //end foreach ($options as $value) ?>

							</div> <!-- end epanel-content div -->
						</div> <!-- end epanel-content-wrap div -->
					</div> <!-- end epanel div -->
				</div> <!-- end epanel-wrapper div -->

				<div id="epanel-bottom">
					<?php wp_nonce_field( 'epanel_nonce' ); ?>
					<input name="save" type="submit" value="<?php esc_html_e( 'Save changes', $themename ); ?>" id="epanel-save" />
					<input type="hidden" name="action" value="save_epanel" />

					<img src="<?php echo esc_url( get_template_directory_uri() . '/epanel/images/defaults.png' ); ?>" class="defaults-button" alt="no" />
				</div><!-- end epanel-bottom div -->

			</form>

			<div style="clear: both;"></div>
			<div style="position: relative;">
				<div class="defaults-hover">
					<?php _e( 'This will return all of the settings throughout the options page to their default values. <strong>Are you sure you want to do this?</strong>', $themename ); ?>
					<div class="clearfix"></div>
					<form method="post">
						<?php wp_nonce_field( 'et-nojs-reset_epanel', '_wpnonce_reset' ); ?>
						<input name="reset" type="submit" value="<?php esc_html_e( 'Reset', $themename ); ?>" id="epanel-reset" />
						<input type="hidden" name="action" value="reset" />
					</form>
					<img src="<?php echo esc_url( get_template_directory_uri() . '/epanel/images/no.gif' ); ?>" class="no" alt="no" />
				</div>
			</div>

			</div> <!-- end panel-wrap div -->
		</div> <!-- end wrapper div -->

		<div id="epanel-ajax-saving">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/epanel/images/saver.gif' ); ?>" alt="loading" id="loading" />
			<span><?php esc_html_e( 'Saving...', $themename ); ?></span>
		</div>

	<?php
	}
}
/* --------------------------------------------- */

add_action('wp_ajax_save_epanel', 'et_epanel_save_callback');
function et_epanel_save_callback() {
    check_ajax_referer( 'epanel_nonce' );
	epanel_save_data( 'ajax' );

	die();
}

if ( ! function_exists( 'epanel_save_data' ) ){
	function epanel_save_data( $source ){
		global $options, $shortname;

		if ( !current_user_can('switch_themes') )
			die('-1');

		// load theme settings array
		et_load_core_options();

		$epanel = basename(__FILE__);

		if ( isset($_POST['action']) ) {
			do_action( 'et_epanel_changing_options' );

			if ( 'save_epanel' == $_POST['action'] ) {
				if ( 'ajax' != $source ) check_admin_referer( 'epanel_nonce' );

				foreach ( $options as $value ) {
					if ( isset( $value['id'] ) ) {
						if ( isset( $_POST[ $value['id'] ] ) ) {
							if ( in_array( $value['type'], array( 'text', 'textlimit' ) ) ) {

								if ( isset( $value['validation_type'] ) ) {
									// saves the value as integer
									if ( 'number' == $value['validation_type'] )
										et_update_option( $value['id'], intval( stripslashes( $_POST[$value['id']] ) ) );

									// makes sure the option is a url
									if ( 'url' == $value['validation_type'] )
										et_update_option( $value['id'], esc_url_raw( stripslashes( $_POST[$value['id']] ) ) );

									/*
									 * html is not allowed
									 * wp_strip_all_tags can't be used here, because it returns trimmed text, some options need spaces ( e.g 'character to separate BlogName and Post title' option )
									 */
									if ( 'nohtml' == $value['validation_type'] )
										et_update_option( $value['id'], stripslashes( wp_filter_nohtml_kses( $_POST[$value['id']] ) ) );
								} else {
									// use html allowed for posts if the validation type isn't provided
									et_update_option( $value['id'], wp_kses_post( stripslashes( $_POST[$value['id']] ) ) );
								}

							} elseif ( 'select' == $value['type'] ) {

								// select boxes that list pages / categories should save page/category ID ( as integer )
								if ( isset( $value['et_array_for'] ) && in_array( $value['et_array_for'], array( 'pages', 'categories' ) ) )
									et_update_option( $value['id'], intval( stripslashes( $_POST[$value['id']] ) ) );
								else // html is not allowed in select boxes
									et_update_option( $value['id'], sanitize_text_field( stripslashes( $_POST[$value['id']] ) ) );

							} elseif ( in_array( $value['type'], array( 'checkbox', 'checkbox2' ) ) ) {

								// saves 'on' value to the database, if the option is enabled
								et_update_option( $value['id'], 'on' );

							} elseif ( 'upload' == $value['type'] ) {

								// makes sure the option is a url
								et_update_option( $value['id'], esc_url_raw( stripslashes( $_POST[$value['id']] ) ) );

							} elseif ( 'textcolorpopup' == $value['type'] ) {

								// the color value
								et_update_option( $value['id'], sanitize_text_field( stripslashes( $_POST[$value['id']] ) ) );

							} elseif ( 'textarea' == $value['type'] ) {

								if ( isset( $value['validation_type'] ) ) {
									// html is not allowed
									if ( 'nohtml' == $value['validation_type'] ) {
										if ( $value['id'] === ( $shortname . '_custom_css' ) ) {
											// don't strip slashes from custom css, it should be possible to use \ for icon fonts
											et_update_option( $value['id'], wp_strip_all_tags( $_POST[$value['id']] ) );
										} else {
											et_update_option( $value['id'], wp_strip_all_tags( stripslashes( $_POST[$value['id']] ) ) );
										}
									}
								} else {
									if ( current_user_can( 'unfiltered_html' ) )
										et_update_option( $value['id'], stripslashes( $_POST[$value['id']] ) );
									else
										et_update_option( $value['id'], stripslashes( wp_filter_post_kses( addslashes( $_POST[$value['id']] ) ) ) ); // wp_filter_post_kses() expects slashed
								}

							} elseif ( 'checkboxes' == $value['type'] ) {

								// saves categories / pages IDs,
								et_update_option( $value['id'], array_map( 'intval', stripslashes_deep( $_POST[$value['id']] ) ) );

							} elseif ( 'different_checkboxes' == $value['type'] ) {

								// saves 'author/date/categories/comments' options
								et_update_option( $value['id'], array_map( 'wp_strip_all_tags', stripslashes_deep( $_POST[$value['id']] ) ) );

							}
						} else {
							if ( in_array( $value['type'], array( 'checkbox', 'checkbox2' ) ) )
								et_update_option( $value['id'] , 'false' );
							elseif ( 'different_checkboxes' == $value['type'] )
								et_update_option( $value['id'] , array() );
							else
								et_delete_option( $value['id'] );
						}
					}
				}

				if ( 'js_disabled' == $source ) header("Location: themes.php?page=$epanel&saved=true");
				die('1');

			} else if( 'reset' == $_POST['action'] ) {
				check_admin_referer( 'et-nojs-reset_epanel', '_wpnonce_reset' );

				foreach ($options as $value) {
					if ( isset($value['id']) ) {
						et_delete_option( $value['id'] );
						if ( isset($value['std']) ) et_update_option( $value['id'], $value['std'] );
					}
				}

				header("Location: themes.php?page=$epanel&reset=true");
				die('1');
			}
		}
	}
}

function et_epanel_media_upload_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_register_script('my-upload', get_template_directory_uri().'/epanel/js/custom_uploader.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('my-upload');
}

function et_epanel_media_upload_styles() {
	wp_enqueue_style('thickbox');
}

global $pagenow;
if ( 'themes.php' == $pagenow && isset( $_GET['page'] ) && ( $_GET['page'] == basename(__FILE__) ) ) {
	add_action('admin_print_scripts', 'et_epanel_media_upload_scripts');
	add_action('admin_print_styles', 'et_epanel_media_upload_styles');
} ?>