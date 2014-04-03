<?php

if ( ! isset( $content_width ) ) $content_width = 1080;

function et_setup_theme() {
	global $themename, $shortname, $et_store_options_in_one_row, $default_colorscheme;
	$themename = 'Divi';
	$shortname = 'divi';
	$et_store_options_in_one_row = true;

	$default_colorscheme = "Default";

	$template_directory = get_template_directory();

	require_once( $template_directory . '/epanel/custom_functions.php' );

	require_once( $template_directory . '/includes/functions/comments.php' );

	require_once( $template_directory . '/includes/functions/sidebars.php' );

	load_theme_textdomain( 'Divi', $template_directory . '/lang' );

	require_once( $template_directory . '/epanel/core_functions.php' );

	require_once( $template_directory . '/epanel/post_thumbnails_divi.php' );

	include( $template_directory . '/includes/widgets.php' );

	register_nav_menus( array(
		'primary-menu' => __( 'Primary Menu', 'Divi' ),
	) );

	// don't display the empty title bar if the widget title is not set
	remove_filter( 'widget_title', 'et_widget_force_title' );

	add_action( 'wp_enqueue_scripts', 'et_add_responsive_shortcodes_css', 11 );

	add_theme_support( 'woocommerce' );

	remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

	remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
	add_action( 'woocommerce_before_main_content', 'et_divi_output_content_wrapper', 10 );

	remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
	add_action( 'woocommerce_after_main_content', 'et_divi_output_content_wrapper_end', 10 );

	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

	// deactivate page templates and custom import functions
	remove_action( 'init', 'et_activate_features' );
}
add_action( 'after_setup_theme', 'et_setup_theme' );

if ( ! function_exists( 'et_divi_fonts_url' ) ) :
function et_divi_fonts_url() {
	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	 * supported by Open Sans, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$open_sans = _x( 'on', 'Open Sans font: on or off', 'Divi' );

	/* Translators: If there are characters in your language that are not
	 * supported by Raleway, translate this to 'off'. Do not translate into your
	 * own language.
	 */
	$raleway = _x( 'on', 'Raleway font: on or off', 'Divi' );

	if ( 'off' !== $open_sans || 'off' !== $raleway ) {
		$font_families = array();

		if ( 'off' !== $open_sans )
			$font_families[] = 'Open+Sans:300italic,400italic,700italic,800italic,400,300,700,800';

		if ( 'off' !== $raleway )
			$font_families[] = 'Raleway:400,200,100,500,700,800,900';

		$protocol = is_ssl() ? 'https' : 'http';
		$query_args = array(
			'family' => implode( '|', $font_families ),
			'subset' => 'latin,latin-ext',
		);
		$fonts_url = add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" );
	}

	return $fonts_url;
}
endif;

function et_divi_load_fonts() {
	$fonts_url = et_divi_fonts_url();
	if ( ! empty( $fonts_url ) )
		wp_enqueue_style( 'divi-fonts', esc_url_raw( $fonts_url ), array(), null );
}
add_action( 'wp_enqueue_scripts', 'et_divi_load_fonts' );

function et_add_home_link( $args ) {
	// add Home link to the custom menu WP-Admin page
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'et_add_home_link' );

function et_divi_load_scripts_styles(){
	global $wp_styles;

	$template_dir = get_template_directory_uri();

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	wp_enqueue_script( 'divi-fitvids', $template_dir . '/js/jquery.fitvids.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'waypoints', $template_dir . '/js/waypoints.min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'divi-custom-script', $template_dir . '/js/custom.js', array( 'jquery' ), '1.0', true );
	wp_localize_script( 'divi-custom-script', 'et_custom', array(
		'ajaxurl'             => admin_url( 'admin-ajax.php' ),
		'et_load_nonce'       => wp_create_nonce( 'et_load_nonce' ),
		'subscription_failed' => __( 'Please, check the fields below to make sure you entered the correct information.', 'Divi' ),
		'fill'                => esc_html__( 'Fill', 'Divi' ),
		'field'               => esc_html__( 'field', 'Divi' ),
		'invalid'             => esc_html__( 'Invalid email', 'Divi' ),
		'captcha'             => esc_html__( 'Captcha', 'Divi' ),
	) );

	$et_gf_enqueue_fonts = array();
	$et_gf_heading_font = sanitize_text_field( et_get_option( 'heading_font', 'none' ) );
	$et_gf_body_font = sanitize_text_field( et_get_option( 'body_font', 'none' ) );

	if ( 'none' != $et_gf_heading_font ) $et_gf_enqueue_fonts[] = $et_gf_heading_font;
	if ( 'none' != $et_gf_body_font ) $et_gf_enqueue_fonts[] = $et_gf_body_font;

	if ( ! empty( $et_gf_enqueue_fonts ) ) et_gf_enqueue_fonts( $et_gf_enqueue_fonts );

	/*
	 * Loads the main stylesheet.
	 */
	wp_enqueue_style( 'divi-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'et_divi_load_scripts_styles' );

function et_add_mobile_navigation(){
	echo '<div id="et_mobile_nav_menu">' . '<a href="#" class="mobile_nav closed">' . '<span class="mobile_menu_bar"></span>' . '</a>' . '</div>';
}
add_action( 'et_header_top', 'et_add_mobile_navigation' );

function et_add_viewport_meta(){
	echo '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />';
}
add_action( 'wp_head', 'et_add_viewport_meta' );

function et_remove_additional_stylesheet( $stylesheet ){
	global $default_colorscheme;
	return $default_colorscheme;
}
add_filter( 'et_get_additional_color_scheme', 'et_remove_additional_stylesheet' );

if ( ! function_exists( 'et_list_pings' ) ) :
function et_list_pings($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?> - <?php comment_excerpt(); ?>
<?php }
endif;

if ( ! function_exists( 'et_get_the_author_posts_link' ) ) :
function et_get_the_author_posts_link(){
	global $authordata, $themename;

	$link = sprintf(
		'<a href="%1$s" title="%2$s" rel="author">%3$s</a>',
		esc_url( get_author_posts_url( $authordata->ID, $authordata->user_nicename ) ),
		esc_attr( sprintf( __( 'Posts by %s', $themename ), get_the_author() ) ),
		get_the_author()
	);
	return apply_filters( 'the_author_posts_link', $link );
}
endif;

if ( ! function_exists( 'et_get_comments_popup_link' ) ) :
function et_get_comments_popup_link( $zero = false, $one = false, $more = false ){
	global $themename;

	$id = get_the_ID();
	$number = get_comments_number( $id );

	if ( 0 == $number && !comments_open() && !pings_open() ) return;

	if ( $number > 1 )
		$output = str_replace('%', number_format_i18n($number), ( false === $more ) ? __('% Comments', $themename) : $more);
	elseif ( $number == 0 )
		$output = ( false === $zero ) ? __('No Comments',$themename) : $zero;
	else // must be one
		$output = ( false === $one ) ? __('1 Comment', $themename) : $one;

	return '<span class="comments-number">' . '<a href="' . esc_url( get_permalink() . '#respond' ) . '">' . apply_filters('comments_number', $output, $number) . '</a>' . '</span>';
}
endif;

if ( ! function_exists( 'et_postinfo_meta' ) ) :
function et_postinfo_meta( $postinfo, $date_format, $comment_zero, $comment_one, $comment_more ){
	global $themename;

	$postinfo_meta = '';

	if ( in_array( 'author', $postinfo ) )
		$postinfo_meta .= ' ' . esc_html__('by',$themename) . ' ' . et_get_the_author_posts_link() . ' | ';

	if ( in_array( 'date', $postinfo ) )
		$postinfo_meta .= get_the_time( $date_format ) . ' | ';

	if ( in_array( 'categories', $postinfo ) )
		$postinfo_meta .= get_the_category_list(', ')  . ' | ';

	if ( in_array( 'comments', $postinfo ) )
		$postinfo_meta .= et_get_comments_popup_link( $comment_zero, $comment_one, $comment_more );

	echo $postinfo_meta;
}
endif;

function et_add_post_meta_box() {
	add_meta_box( 'et_settings_meta_box', __( 'ET Settings', 'Divi' ), 'et_single_settings_meta_box', 'page', 'side', 'high' );
	add_meta_box( 'et_settings_meta_box', __( 'ET Settings', 'Divi' ), 'et_single_settings_meta_box', 'post', 'side', 'high' );
	add_meta_box( 'et_settings_meta_box', __( 'ET Settings', 'Divi' ), 'et_single_settings_meta_box', 'product', 'side', 'high' );
	add_meta_box( 'et_settings_meta_box', __( 'ET Settings', 'Divi' ), 'et_single_settings_meta_box', 'project', 'side', 'high' );
}
add_action( 'add_meta_boxes', 'et_add_post_meta_box' );

function et_pb_register_posttypes() {
	$labels = array(
		'name'               => _x( 'Projects', 'project type general name', 'Divi' ),
		'singular_name'      => _x( 'Project', 'project type singular name', 'Divi' ),
		'add_new'            => _x( 'Add New', 'project item', 'Divi' ),
		'add_new_item'       => __( 'Add New Project', 'Divi' ),
		'edit_item'          => __( 'Edit Project', 'Divi' ),
		'new_item'           => __( 'New Project', 'Divi' ),
		'all_items'          => __( 'All Projects', 'Divi' ),
		'view_item'          => __( 'View Project', 'Divi' ),
		'search_items'       => __( 'Search Projects', 'Divi' ),
		'not_found'          => __( 'Nothing found', 'Divi' ),
		'not_found_in_trash' => __( 'Nothing found in Trash', 'Divi' ),
		'parent_item_colon'  => '',
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'can_export'         => true,
		'show_in_nav_menus'  => true,
		'query_var'          => true,
		'has_archive'        => true,
		'rewrite'            => apply_filters( 'et_project_posttype_rewrite_args', array(
			'feeds'      => true,
			'slug'       => 'project',
			'with_front' => false,
		) ),
		'capability_type'    => 'post',
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'revisions', 'custom-fields' ),
	);

	register_post_type( 'project', apply_filters( 'et_project_posttype_args', $args ) );

	$labels = array(
		'name'              => _x( 'Categories', 'Project category name', 'Divi' ),
		'singular_name'     => _x( 'Category', 'Project category singular name', 'Divi' ),
		'search_items'      => __( 'Search Categories', 'Divi' ),
		'all_items'         => __( 'All Categories', 'Divi' ),
		'parent_item'       => __( 'Parent Category', 'Divi' ),
		'parent_item_colon' => __( 'Parent Category:', 'Divi' ),
		'edit_item'         => __( 'Edit Category', 'Divi' ),
		'update_item'       => __( 'Update Category', 'Divi' ),
		'add_new_item'      => __( 'Add New Category', 'Divi' ),
		'new_item_name'     => __( 'New Category Name', 'Divi' ),
		'menu_name'         => __( 'Categories', 'Divi' ),
	);

	register_taxonomy( 'project_category', array( 'project' ), array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
	) );

	$labels = array(
		'name'              => _x( 'Tags', 'Project Tag name', 'Divi' ),
		'singular_name'     => _x( 'Tag', 'Project tag singular name', 'Divi' ),
		'search_items'      => __( 'Search Tags', 'Divi' ),
		'all_items'         => __( 'All Tags', 'Divi' ),
		'parent_item'       => __( 'Parent Tag', 'Divi' ),
		'parent_item_colon' => __( 'Parent Tag:', 'Divi' ),
		'edit_item'         => __( 'Edit Tag', 'Divi' ),
		'update_item'       => __( 'Update Tag', 'Divi' ),
		'add_new_item'      => __( 'Add New Tag', 'Divi' ),
		'new_item_name'     => __( 'New Tag Name', 'Divi' ),
		'menu_name'         => __( 'Tags', 'Divi' ),
	);

	register_taxonomy( 'project_tag', array( 'project' ), array(
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
	) );


	$labels = array(
		'name'               => _x( 'Layouts', 'Layout type general name', 'Divi' ),
		'singular_name'      => _x( 'Layout', 'Layout type singular name', 'Divi' ),
		'add_new'            => _x( 'Add New', 'Layout item', 'Divi' ),
		'add_new_item'       => __( 'Add New Layout', 'Divi' ),
		'edit_item'          => __( 'Edit Layout', 'Divi' ),
		'new_item'           => __( 'New Layout', 'Divi' ),
		'all_items'          => __( 'All Layouts', 'Divi' ),
		'view_item'          => __( 'View Layout', 'Divi' ),
		'search_items'       => __( 'Search Layouts', 'Divi' ),
		'not_found'          => __( 'Nothing found', 'Divi' ),
		'not_found_in_trash' => __( 'Nothing found in Trash', 'Divi' ),
		'parent_item_colon'  => '',
	);

	$args = array(
		'labels'             => $labels,
		'public'             => false,
		'can_export'         => true,
		'query_var'          => false,
		'has_archive'        => false,
		'capability_type'    => 'post',
		'hierarchical'       => false,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'revisions', 'custom-fields' ),
	);

	register_post_type( 'et_pb_layout', apply_filters( 'et_pb_layout_args', $args ) );
}
add_action( 'init', 'et_pb_register_posttypes', 0 );

if ( ! function_exists( 'et_pb_portfolio_meta_box' ) ) :
function et_pb_portfolio_meta_box() { ?>
	<div class="et_project_meta">
		<strong class="et_project_meta_title"><?php echo esc_html__( 'Skills', 'Divi' ); ?></strong>
		<p><?php echo get_the_term_list( get_the_ID(), 'project_tag', '', ', ' ); ?></p>

		<strong class="et_project_meta_title"><?php echo esc_html__( 'Posted on', 'Divi' ); ?></strong>
		<p><?php echo get_the_date(); ?></p>
	</div>
<?php }
endif;

if ( ! function_exists( 'et_single_settings_meta_box' ) ) :
function et_single_settings_meta_box( $post ) {
	$post_id = get_the_ID();

	wp_nonce_field( basename( __FILE__ ), 'et_settings_nonce' );

	$page_layout = get_post_meta( $post_id, '_et_pb_page_layout', true );

	$page_layouts = array(
		'et_right_sidebar'   => __( 'Right Sidebar', 'Divi' ),
   		'et_left_sidebar'    => __( 'Left Sidebar', 'Divi' ),
   		'et_full_width_page' => __( 'Full Width', 'Divi' ),
	);
?>
	<p class="et_pb_page_settings et_pb_page_layout_settings">
		<label for="et_pb_page_layout" style="display: block; font-weight: bold; margin-bottom: 5px;"><?php esc_html_e( 'Page Layout', 'Divi' ); ?>: </label>

		<select id="et_pb_page_layout" name="et_pb_page_layout">
		<?php
		foreach ( $page_layouts as $layout_value => $layout_name ) {
			printf( '<option value="%2$s"%3$s>%1$s</option>',
				esc_html( $layout_name ),
				esc_attr( $layout_value ),
				selected( $layout_value, $page_layout )
			);
		} ?>
		</select>
	</p>
<?php if ( in_array( $post->post_type, array( 'page', 'project' ) ) ) : ?>
	<p class="et_pb_page_settings" style="display: none;">
		<input type="hidden" id="et_pb_use_builder" name="et_pb_use_builder" value="<?php echo esc_attr( get_post_meta( $post_id, '_et_pb_use_builder', true ) ); ?>" />
		<textarea id="et_pb_old_content" name="et_pb_old_content"><?php echo esc_attr( get_post_meta( $post_id, '_et_pb_old_content', true ) ); ?></textarea>
	</p>
<?php endif; ?>
<?php
}
endif;

function et_metabox_settings_save_details( $post_id, $post ){
	global $pagenow;

	if ( 'post.php' != $pagenow ) return $post_id;

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return $post_id;

	$post_type = get_post_type_object( $post->post_type );
	if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) )
		return $post_id;

	if ( ! isset( $_POST['et_settings_nonce'] ) || ! wp_verify_nonce( $_POST['et_settings_nonce'], basename( __FILE__ ) ) )
		return $post_id;

	if ( isset( $_POST['et_pb_page_layout'] ) ) {
		update_post_meta( $post_id, '_et_pb_page_layout', sanitize_text_field( $_POST['et_pb_page_layout'] ) );
	} else {
		delete_post_meta( $post_id, '_et_pb_page_layout' );
	}

	if ( isset( $_POST['et_pb_use_builder'] ) ) {
		update_post_meta( $post_id, '_et_pb_use_builder', sanitize_text_field( $_POST['et_pb_use_builder'] ) );
	} else {
		delete_post_meta( $post_id, '_et_pb_use_builder' );
	}

	if ( isset( $_POST['et_pb_old_content'] ) ) {
		update_post_meta( $post_id, '_et_pb_old_content', $_POST['et_pb_old_content'] );
	} else {
		delete_post_meta( $post_id, '_et_pb_old_content' );
	}
}
add_action( 'save_post', 'et_metabox_settings_save_details', 10, 2 );

function et_divi_customize_register( $wp_customize ) {
	$google_fonts = et_get_google_fonts();

	$font_choices = array();
	$font_choices['none'] = 'Default Theme Font';
	foreach ( $google_fonts as $google_font_name => $google_font_properties ) {
		$font_choices[ $google_font_name ] = $google_font_name;
	}

	$wp_customize->remove_section( 'title_tagline' );
	$wp_customize->remove_section( 'background_image' );
	$wp_customize->remove_control( 'background_color' );

	$wp_customize->add_section( 'et_google_fonts' , array(
		'title'		=> __( 'Fonts', 'Divi' ),
		'priority'	=> 50,
	) );

	$wp_customize->add_section( 'et_color_schemes' , array(
		'title'       => __( 'Schemes', 'Divi' ),
		'priority'    => 60,
		'description' => __( 'Note: Color settings set above should be applied to the Default color scheme.', 'Divi' ),
	) );

	$wp_customize->add_setting( 'et_divi[link_color]', array(
		'default'		=> '#7EBEC5',
		'type'			=> 'option',
		'capability'	=> 'edit_theme_options',
		'transport'		=> 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'et_divi[link_color]', array(
		'label'		=> __( 'Link Color', 'Divi' ),
		'section'	=> 'colors',
		'settings'	=> 'et_divi[link_color]',
	) ) );

	$wp_customize->add_setting( 'et_divi[font_color]', array(
		'default'		=> '#666666',
		'type'			=> 'option',
		'capability'	=> 'edit_theme_options',
		'transport'		=> 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'et_divi[font_color]', array(
		'label'		=> __( 'Main Font Color', 'Divi' ),
		'section'	=> 'colors',
		'settings'	=> 'et_divi[font_color]',
	) ) );

	$wp_customize->add_setting( 'et_divi[accent_color]', array(
		'default'		=> '#7EBEC5',
		'type'			=> 'option',
		'capability'	=> 'edit_theme_options',
		'transport'		=> 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'et_divi[accent_color]', array(
		'label'		=> __( 'Accent Color', 'Divi' ),
		'section'	=> 'colors',
		'settings'	=> 'et_divi[accent_color]',
	) ) );

	$wp_customize->add_setting( 'et_divi[footer_bg]', array(
		'default'		=> '#2e2e2e',
		'type'			=> 'option',
		'capability'	=> 'edit_theme_options',
		'transport'		=> 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'et_divi[footer_bg]', array(
		'label'		=> __( 'Footer Background Color', 'Divi' ),
		'section'	=> 'colors',
		'settings'	=> 'et_divi[footer_bg]',
	) ) );

	$wp_customize->add_setting( 'et_divi[menu_link]', array(
		'default'		=> '#666666',
		'type'			=> 'option',
		'capability'	=> 'edit_theme_options',
		'transport'		=> 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'et_divi[menu_link]', array(
		'label'		=> __( 'Menu Links Color', 'Divi' ),
		'section'	=> 'colors',
		'settings'	=> 'et_divi[menu_link]',
	) ) );

	$wp_customize->add_setting( 'et_divi[menu_link_active]', array(
		'default'		=> '#7CBEC6',
		'type'			=> 'option',
		'capability'	=> 'edit_theme_options',
		'transport'		=> 'postMessage'
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'et_divi[menu_link_active]', array(
		'label'		=> __( 'Active Menu Link Color', 'Divi' ),
		'section'	=> 'colors',
		'settings'	=> 'et_divi[menu_link_active]',
	) ) );

	$wp_customize->add_setting( 'et_divi[heading_font]', array(
		'default'		=> 'none',
		'type'			=> 'option',
		'capability'	=> 'edit_theme_options'
	) );

	$wp_customize->add_control( 'et_divi[heading_font]', array(
		'label'		=> __( 'Header Font', 'Divi' ),
		'section'	=> 'et_google_fonts',
		'settings'	=> 'et_divi[heading_font]',
		'type'		=> 'select',
		'choices'	=> $font_choices
	) );

	$wp_customize->add_setting( 'et_divi[body_font]', array(
		'default'		=> 'none',
		'type'			=> 'option',
		'capability'	=> 'edit_theme_options'
	) );

	$wp_customize->add_control( 'et_divi[body_font]', array(
		'label'		=> __( 'Body Font', 'Divi' ),
		'section'	=> 'et_google_fonts',
		'settings'	=> 'et_divi[body_font]',
		'type'		=> 'select',
		'choices'	=> $font_choices
	) );

	$wp_customize->add_setting( 'et_divi[color_schemes]', array(
		'default'		=> 'none',
		'type'			=> 'option',
		'capability'	=> 'edit_theme_options',
		'transport'		=> 'postMessage'
	) );

	$wp_customize->add_control( 'et_divi[color_schemes]', array(
		'label'		=> __( 'Color Schemes', 'Divi' ),
		'section'	=> 'et_color_schemes',
		'settings'	=> 'et_divi[color_schemes]',
		'type'		=> 'select',
		'choices'	=> array(
			'none'   => __( 'Default', 'Divi' ),
			'green'  => __( 'Green', 'Divi' ),
			'orange' => __( 'Orange', 'Divi' ),
			'pink'   => __( 'Pink', 'Divi' ),
			'red'    => __( 'Red', 'Divi' ),
		),
	) );
}
add_action( 'customize_register', 'et_divi_customize_register' );

function et_divi_customize_preview_js() {
	wp_enqueue_script( 'divi-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), false, true );
}
add_action( 'customize_preview_init', 'et_divi_customize_preview_js' );

function et_divi_add_customizer_css(){ ?>
	<style>
		a { color: <?php echo esc_html( et_get_option( 'link_color', '#7EBEC5' ) ); ?>; }

		body { color: <?php echo esc_html( et_get_option( 'font_color', '#666666' ) ); ?>; }

		.et_pb_counter_amount, .et_pb_featured_table .et_pb_pricing_heading, .et_pb_pricing_table_button, .comment-reply-link, .form-submit input { background-color: <?php echo esc_html( et_get_option( 'accent_color', '#7EBEC5' ) ); ?>; }

		.woocommerce a.button.alt, .woocommerce-page a.button.alt, .woocommerce button.button.alt, .woocommerce-page button.button.alt, .woocommerce input.button.alt, .woocommerce-page input.button.alt, .woocommerce #respond input#submit.alt, .woocommerce-page #respond input#submit.alt, .woocommerce #content input.button.alt, .woocommerce-page #content input.button.alt, .woocommerce a.button, .woocommerce-page a.button, .woocommerce button.button, .woocommerce-page button.button, .woocommerce input.button, .woocommerce-page input.button, .woocommerce #respond input#submit, .woocommerce-page #respond input#submit, .woocommerce #content input.button, .woocommerce-page #content input.button, .woocommerce-message, .woocommerce-error, .woocommerce-info { background: <?php echo esc_html( et_get_option( 'accent_color', '#7EBEC5' ) ); ?> !important; }

		#et_search_icon:hover, .mobile_menu_bar:before, .footer-widget h4, .et-social-icon a:hover, .et_pb_sum, .et_pb_pricing li a, .et_overlay:before, .entry-summary p.price ins, .woocommerce div.product span.price, .woocommerce-page div.product span.price, .woocommerce #content div.product span.price, .woocommerce-page #content div.product span.price, .woocommerce div.product p.price, .woocommerce-page div.product p.price, .woocommerce #content div.product p.price, .woocommerce-page #content div.product p.price { color: <?php echo esc_html( et_get_option( 'accent_color', '#7EBEC5' ) ); ?> !important; }

		.woocommerce .star-rating span:before, .woocommerce-page .star-rating span:before { color: <?php echo esc_html( et_get_option( 'accent_color', '#7EBEC5' ) ); ?> !important; }

		.et-search-form, .nav li ul, .et_mobile_menu, .footer-widget li:before, .et_pb_pricing li:before { border-color: <?php echo esc_html( et_get_option( 'accent_color', '#7EBEC5' ) ); ?>; }

		#main-footer { background-color: <?php echo esc_html( et_get_option( 'footer_bg', '#2e2e2e' ) ); ?>; }

		#top-menu a { color: <?php echo esc_html( et_get_option( 'menu_link', '#666666' ) ); ?>; }

		#top-menu li.current-menu-ancestor > a, #top-menu li.current-menu-item > a { color: <?php echo esc_html( et_get_option( 'menu_link_active', '#7CBEC6' ) ); ?>; }

	<?php
		$et_gf_heading_font = sanitize_text_field( et_get_option( 'heading_font', 'none' ) );
		$et_gf_body_font = sanitize_text_field( et_get_option( 'body_font', 'none' ) );

		if ( 'none' != $et_gf_heading_font || 'none' != $et_gf_body_font ) :

			if ( 'none' != $et_gf_heading_font )
				et_gf_attach_font( $et_gf_heading_font, 'h1, h2, h3, h4, h5, h6' );

			if ( 'none' != $et_gf_body_font )
				et_gf_attach_font( $et_gf_body_font, 'body, input, textarea, select' );

		endif;
	?>
	</style>
<?php }
add_action( 'wp_head', 'et_divi_add_customizer_css' );
add_action( 'customize_controls_print_styles', 'et_divi_add_customizer_css' );

/*
 * Adds color scheme class to the body tag
 */
function et_customizer_color_scheme_class( $body_class ) {
	$color_scheme        = et_get_option( 'color_schemes', 'none' );
	$color_scheme_prefix = 'et_color_scheme_';

	if ( 'none' !== $color_scheme ) $body_class[] = $color_scheme_prefix . $color_scheme;

	return $body_class;
}
add_filter( 'body_class', 'et_customizer_color_scheme_class' );

function et_load_google_fonts_scripts() {
	wp_enqueue_script( 'et_google_fonts', get_template_directory_uri() . '/epanel/google-fonts/et_google_fonts.js', array( 'jquery' ), '1.0', true );
}
add_action( 'customize_controls_print_footer_scripts', 'et_load_google_fonts_scripts' );

function et_load_google_fonts_styles() {
	wp_enqueue_style( 'et_google_fonts_style', get_template_directory_uri() . '/epanel/google-fonts/et_google_fonts.css', array(), null );
}
add_action( 'customize_controls_print_styles', 'et_load_google_fonts_styles' );

if ( ! function_exists( 'et_divi_post_meta' ) ) :
function et_divi_post_meta() {
	$postinfo = is_single() ? et_get_option( 'divi_postinfo2' ) : et_get_option( 'divi_postinfo1' );

	if ( $postinfo ) :
		echo '<p class="post-meta">';
		et_postinfo_meta( $postinfo, et_get_option( 'divi_date_format', 'M j, Y' ), esc_html__( '0 comments', 'Divi' ), esc_html__( '1 comment', 'Divi' ), '% ' . esc_html__( 'comments', 'Divi' ) );
		echo '</p>';
	endif;
}
endif;

function et_add_wp_version( $classes ) {
	global $wp_version;

	// add 'et-wp-pre-3_8' class if the current WordPress version is less than 3.8
	if ( version_compare( $wp_version, '3.7.2', '<=' ) ) {
		if ( 'body_class' === current_filter() )
			$classes[] = 'et-wp-pre-3_8';
		else
			$classes = 'et-wp-pre-3_8';
	} else {
		if ( 'admin_body_class' === current_filter() )
			$classes = 'et-wp-after-3_8';
	}

	return $classes;
}
add_filter( 'body_class', 'et_add_wp_version' );
add_filter( 'admin_body_class', 'et_add_wp_version' );

function et_fixed_nav_class( $classes ) {
	if ( 'on' === et_get_option( 'divi_fixed_nav', 'on' ) ) {
		$classes[] = 'et_fixed_nav';
	}

	return $classes;
}
add_filter( 'body_class', 'et_fixed_nav_class' );

function et_divi_activate_features(){
	/* activate shortcodes */
	require_once( get_template_directory() . '/epanel/shortcodes/shortcodes.php' );
}
add_action( 'init', 'et_divi_activate_features' );

require_once( get_template_directory() . '/et-pagebuilder/et-pagebuilder.php' );

function et_divi_sidebar_class( $classes ) {
	if ( ( is_page() || is_singular( 'project' ) ) && et_pb_is_pagebuilder_used( get_the_ID() ) )
		$classes[] = 'et_pb_pagebuilder_layout';

	if ( is_single() || is_page() || ( class_exists( 'woocommerce' ) && is_product() ) )
		$page_layout = '' !== ( $layout = get_post_meta( get_the_ID(), '_et_pb_page_layout', true ) )
			? $layout
			: 'et_right_sidebar';

	if ( class_exists( 'woocommerce' ) && ( is_shop() || is_product() ) ) {
		if ( is_shop() )
			$classes[] = et_get_option( 'divi_shop_page_sidebar', 'et_right_sidebar' );
		if ( is_product() )
			$classes[] = $page_layout;
	}

	else if ( class_exists( 'woocommerce' ) && ( is_product_category() || is_product_tag() ) )
		$classes[] = 'et_full_width_page';

	else if ( is_archive() || is_home() || is_search() || is_404() ) {
		$classes[] = 'et_right_sidebar';
	}

	else if ( is_singular( 'project' ) ) {
		if ( 'et_full_width_page' === $page_layout )
			$page_layout = 'et_right_sidebar et_full_width_portfolio_page';

		$classes[] = $page_layout;
	}

	else if ( is_single() || is_page() ) {
		$classes[] = $page_layout;
	}

	return $classes;
}
add_filter( 'body_class', 'et_divi_sidebar_class' );

function et_modify_shop_page_columns_num( $columns_num ) {
	if ( class_exists( 'woocommerce' ) && is_shop() ) {
		$columns_num = 'et_full_width_page' !== et_get_option( 'divi_shop_page_sidebar', 'et_right_sidebar' )
			? 3
			: 4;
	}

	return $columns_num;
}
add_filter( 'loop_shop_columns', 'et_modify_shop_page_columns_num' );

// WooCommerce

global $pagenow;
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' )
	add_action( 'init', 'et_divi_woocommerce_image_dimensions', 1 );

/**
 * Default values for WooCommerce images changed in version 1.3
 * Checks if WooCommerce image dimensions have been updated already.
 */
function et_divi_check_woocommerce_images() {
	if ( 'checked' === et_get_option( 'divi_1_3_images' ) ) return;

	et_divi_woocommerce_image_dimensions();
	et_update_option( 'divi_1_3_images', 'checked' );
}
add_action( 'admin_init', 'et_divi_check_woocommerce_images' );

function et_divi_woocommerce_image_dimensions() {
  	$catalog = array(
		'width' 	=> '400',
		'height'	=> '400',
		'crop'		=> 1,
	);

	$single = array(
		'width' 	=> '510',
		'height'	=> '9999',
		'crop'		=> 0,
	);

	$thumbnail = array(
		'width' 	=> '157',
		'height'	=> '157',
		'crop'		=> 1,
	);

	update_option( 'shop_catalog_image_size', $catalog );
	update_option( 'shop_single_image_size', $single );
	update_option( 'shop_thumbnail_image_size', $thumbnail );
}

function woocommerce_template_loop_product_thumbnail() {
	printf( '<span class="et_shop_image">%1$s<span class="et_overlay"></span></span>',
		woocommerce_get_product_thumbnail()
	);
}

function et_review_gravatar_size( $size ) {
	return '80';
}
add_filter( 'woocommerce_review_gravatar_size', 'et_review_gravatar_size' );


function et_divi_output_content_wrapper() {
	echo '
		<div id="main-content">
			<div class="container">
				<div id="content-area" class="clearfix">
					<div id="left-area">';
}

function et_divi_output_content_wrapper_end() {
	echo '</div> <!-- #left-area -->';

	if (
		( is_product() && 'et_full_width_page' !== get_post_meta( get_the_ID(), '_et_pb_page_layout', true ) )
		||
		( is_shop() && 'et_full_width_page' !== et_get_option( 'divi_shop_page_sidebar', 'et_right_sidebar' ) )
	)

		woocommerce_get_sidebar();

	echo '
				</div> <!-- #content-area -->
			</div> <!-- .container -->
		</div> <!-- #main-content -->';
}


// Shortcodes

if ( ! function_exists( 'et_pb_fix_shortcodes' ) ){
	function et_pb_fix_shortcodes( $content ){
		$replace_tags_from_to = array (
			'<p>[' => '[',
			']</p>' => ']',
			']<br />' => ']',
			"<br />\n[" => '[',
		);

		return strtr( $content, $replace_tags_from_to );
	}
}

add_shortcode( 'et_pb_slider', 'et_pb_slider' );
add_shortcode( 'et_pb_fullwidth_slider', 'et_pb_slider' );
function et_pb_slider( $atts, $content = '', $function_name ) {
	extract( shortcode_atts( array(
			'module_id' => '',
			'module_class' => '',
			'show_arrows' => 'on',
			'show_pagination' => 'on',
			'parallax' => 'off',
			'auto' => 'off',
			'auto_speed' => '7000',
		), $atts
	) );

	global $et_pb_slider_has_video;

	$et_pb_slider_has_video = false;

	$fullwidth = 'et_pb_fullwidth_slider' === $function_name ? 'on' : 'off';

	$class  = '';
	$class .= 'off' === $fullwidth ? ' et_pb_slider_fullwidth_off' : '';
	$class .= 'off' === $show_arrows ? ' et_pb_slider_no_arrows' : '';
	$class .= 'off' === $show_pagination ? ' et_pb_slider_no_pagination' : '';
	$class .= 'on' === $parallax ? ' et_pb_slider_parallax' : '';
	$class .= 'on' === $auto ? ' et_slider_auto et_slider_speed_' . esc_attr( $auto_speed ) : '';

	$content = do_shortcode( et_pb_fix_shortcodes( $content ) );

	$output = sprintf(
		'<div%4$s class="et_pb_slider%1$s%3$s%5$s">
			<div class="et_pb_slides">
				%2$s
			</div> <!-- .et_pb_slides -->
		</div> <!-- .et_pb_slider -->
		',
		$class,
		$content,
		( $et_pb_slider_has_video ? ' et_pb_preload' : '' ),
		( '' !== $module_id ? sprintf( ' id="%1$s"', esc_attr( $module_id ) ) : '' ),
		( '' !== $module_class ? sprintf( ' %1$s', esc_attr( $module_class ) ) : '' )
	);

	return $output;
}

add_shortcode( 'et_pb_slide', 'et_pb_slide' );
function et_pb_slide( $atts, $content = '' ) {
	extract( shortcode_atts( array(
			'alignment' => 'center',
			'heading' => '',
			'button_text' => '',
			'button_link' => '#',
			'background_color' => '',
			'background_image' => '',
			'image' => '',
			'image_alt' => '',
			'background_layout' => 'dark',
			'video_bg_webm' => '',
			'video_bg_mp4' => '',
			'video_bg_width' => '',
			'video_bg_height' => '',
			'video_url' => '',
		), $atts
	) );

	global $et_pb_slider_has_video;

	$background_video = '';

	$first_video = false;

	if ( '' !== $video_bg_mp4 || '' !== $video_bg_webm ) {
		if ( ! $et_pb_slider_has_video )
			$first_video = true;

		$background_video = sprintf(
			'<div class="et_pb_section_video_bg%2$s">
				%1$s
			</div>',
			do_shortcode( sprintf( '
				<video loop="loop" autoplay="autoplay"%3$s%4$s>
					%1$s
					%2$s
				</video>',
				( '' !== $video_bg_mp4 ? sprintf( '<source type="video/mp4" src="%s" />', esc_attr( $video_bg_mp4 ) ) : '' ),
				( '' !== $video_bg_webm ? sprintf( '<source type="video/webm" src="%s" />', esc_attr( $video_bg_webm ) ) : '' ),
				( '' !== $video_bg_width ? sprintf( ' width="%s"', esc_attr( $video_bg_width ) ) : '' ),
				( '' !== $video_bg_height ? sprintf( ' height="%s"', esc_attr( $video_bg_height ) ) : '' ),
				( '' !== $background_image ? sprintf( ' poster="%s"', esc_attr( $background_image ) ) : '' )
			) ),
			( $first_video ? ' et_pb_first_video' : '' )
		);

		$et_pb_slider_has_video = true;

		wp_enqueue_style( 'wp-mediaelement' );
		wp_enqueue_script( 'wp-mediaelement' );
	}

	if ( '' !== $heading ) {
		if ( '#' !== $button_link ) {
			$heading = sprintf( '<a href="%1$s">%2$s</a>',
				esc_url( $button_link ),
				$heading
			);
		}

		$heading = '<h2>' . $heading . '</h2>';
	}

	$button = '';
	if ( '' !== $button_text )
		$button = sprintf( '<a href="%1$s" class="et_pb_more_button">%2$s</a>',
			esc_attr( $button_link ),
			esc_html( $button_text )
		);

	$style = $class = '';

	if ( '' !== $background_color )
		$style .= sprintf( 'background-color:%s;',
			esc_attr( $background_color )
		);

	if ( '' !== $background_image )
		$style .= sprintf( 'background-image:url(%s);',
			esc_attr( $background_image )
		);

	$style = '' !== $style ? " style='{$style}'" : '';

	$image = '' !== $image
		? sprintf( '<div class="et_pb_slide_image"><img src="%1$s" alt="%2$s" /></div>',
			esc_attr( $image ),
			esc_attr( $image_alt )
		)
		: '';

	if ( '' !== $video_url ) {
		global $wp_embed;

		$video_embed = apply_filters( 'the_content', $wp_embed->shortcode( '', esc_url( $video_url ) ) );

		$video_embed = preg_replace('/<embed /','<embed wmode="transparent" ',$video_embed);
		$video_embed = preg_replace('/<\/object>/','<param name="wmode" value="transparent" /></object>',$video_embed);

		$image = sprintf( '<div class="et_pb_slide_video">%1$s</div>',
			$video_embed
		);
	}

	if ( '' !== $image ) $class = ' et_pb_slide_with_image';

	if ( '' !== $video_url ) $class .= ' et_pb_slide_with_video';

	$class .= " et_pb_bg_layout_{$background_layout}";

	if ( 'bottom' !== $alignment ) {
		$class .= " et_pb_media_alignment_{$alignment}";
	}

	$output = sprintf(
		'<div class="et_pb_slide%6$s"%4$s>
			<div class="et_pb_container clearfix">
				%5$s
				<div class="et_pb_slide_description">
					%1$s
					<div class="et_pb_slide_content">%2$s</div>
					%3$s
				</div> <!-- .et_pb_slide_description -->
			</div> <!-- .et_pb_container -->
			%7$s
		</div> <!-- .et_pb_slide -->
		',
		$heading,
		do_shortcode( et_pb_fix_shortcodes( $content ) ),
		$button,
		$style,
		$image,
		esc_attr( $class ),
		( '' !== $background_video ? $background_video : '' )
	);

	return $output;
}

add_shortcode( 'et_pb_section', 'et_pb_section' );
function et_pb_section( $atts, $content = '' ) {
	extract( shortcode_atts( array(
			'module_id' => '',
			'module_class' => '',
			'background_image' => '',
			'background_color' => '',
			'background_video_mp4' => '',
			'background_video_webm' => '',
			'background_video_width' => '',
			'background_video_height' => '',
			'inner_shadow' => 'off',
			'parallax' => 'off',
			'fullwidth' => 'off',
		), $atts
	) );

	$style = $background_video = '';

	if ( '' !== $background_video_mp4 || '' !== $background_video_webm ) {
		$background_video = sprintf(
			'<div class="et_pb_section_video_bg">
				%1$s
			</div>',
			do_shortcode( sprintf( '
				<video loop="loop" autoplay="autoplay"%3$s%4$s>
					%1$s
					%2$s
				</video>',
				( '' !== $background_video_mp4 ? sprintf( '<source type="video/mp4" src="%s" />', esc_attr( $background_video_mp4 ) ) : '' ),
				( '' !== $background_video_webm ? sprintf( '<source type="video/webm" src="%s" />', esc_attr( $background_video_webm ) ) : '' ),
				( '' !== $background_video_width ? sprintf( ' width="%s"', esc_attr( $background_video_width ) ) : '' ),
				( '' !== $background_video_height ? sprintf( ' height="%s"', esc_attr( $background_video_height ) ) : '' )
			) )
		);

		wp_enqueue_style( 'wp-mediaelement' );
		wp_enqueue_script( 'wp-mediaelement' );
	}

	if ( '' !== $background_color )
		$style .= sprintf( 'background-color:%s;',
			esc_attr( $background_color )
		);

	if ( '' !== $background_image )
		$style .= sprintf( 'background-image:url(%s);',
			esc_attr( $background_image )
		);

	$style = '' !== $style ? " style='{$style}'" : '';

	$output = sprintf(
		'<div%8$s class="et_pb_section%4$s%5$s%6$s%7$s%9$s"%2$s>
			%3$s
			%1$s
		</div> <!-- .et_pb_section -->',
		do_shortcode( et_pb_fix_shortcodes( $content ) ),
		$style,
		$background_video,
		( '' !== $background_video ? ' et_pb_section_video et_pb_preload' : '' ),
		( 'off' !== $inner_shadow ? ' et_pb_inner_shadow' : '' ),
		( 'on' === $parallax ? ' et_pb_section_parallax' : '' ),
		( 'off' !== $fullwidth ? ' et_pb_fullwidth_section' : '' ),
		( '' !== $module_id ? sprintf( ' id="%1$s"', esc_attr( $module_id ) ) : '' ),
		( '' !== $module_class ? sprintf( ' %1$s', esc_attr( $module_class ) ) : '' )
	);

	return $output;
}

add_shortcode( 'et_pb_row', 'et_pb_row' );
function et_pb_row( $atts, $content = '' ) {
	extract( shortcode_atts( array(
			'margin' => '',
		), $atts
	) );

	$output = sprintf(
		'<div class="et_pb_row">
			%1$s
		</div> <!-- .et_pb_row -->',
		do_shortcode( et_pb_fix_shortcodes( $content ) )
	);

	return $output;
}

add_shortcode( 'et_pb_column', 'et_pb_column' );
function et_pb_column( $atts, $content = '' ) {
	extract( shortcode_atts( array(
			'type' => '4_4',
		), $atts
	) );

	$type = 'et_pb_column_' . $type;

	$output = sprintf(
		'<div class="et_pb_column %1$s">
			%2$s
		</div> <!-- .et_pb_column -->',
		esc_html( $type ),
		do_shortcode( et_pb_fix_shortcodes( $content ) )
	);

	return $output;
}

add_shortcode( 'et_pb_image', 'et_pb_image' );
function et_pb_image( $atts ) {
	extract( shortcode_atts( array(
			'module_id' => '',
			'module_class' => '',
			'src' => '',
			'alt' => '',
			'animation' => 'left',
			'url' => '',
			'url_new_window' => 'off',
		), $atts
	) );

	$output = sprintf(
		'<img%4$s src="%1$s" alt="%2$s" class="et-waypoint et_pb_image%3$s%5$s" />',
		esc_attr( $src ),
		esc_attr( $alt ),
		esc_attr( " et_pb_animation_{$animation}" ),
		( '' !== $module_id ? sprintf( ' id="%1$s"', esc_attr( $module_id ) ) : '' ),
		( '' !== $module_class ? sprintf( ' %1$s', esc_attr( $module_class ) ) : '' )
	);

	if ( '' !== $url )
		$output = sprintf( '<a href="%1$s"%3$s>%2$s</a>',
			esc_url( $url ),
			$output,
			( 'on' === $url_new_window ? ' target="_blank"' : '' )
		);

	return $output;
}

add_shortcode( 'et_pb_testimonial', 'et_pb_testimonial' );
function et_pb_testimonial( $atts, $content = '' ) {
	extract( shortcode_atts( array(
			'module_id' => '',
			'module_class' => '',
			'author' => '',
			'url' => '',
			'url_new_window' => 'off',
		), $atts
	) );

	if ( '' !== $author && '' !== $url )
		$author = sprintf( '<a href="%1$s"%3$s>%2$s</a>',
			esc_url( $url ),
			esc_html( $author ),
			( 'on' === $url_new_window ? ' target="_blank"' : '' )
		);

	$output = sprintf(
		'<div%3$s class="et_pb_testimonial%4$s">
			%1$s
			<p class="et_pb_testimonial_author">—%2$s</p>
		</div> <!-- .et_pb_testimonial -->',
		do_shortcode( et_pb_fix_shortcodes( $content ) ),
		$author,
		( '' !== $module_id ? sprintf( ' id="%1$s"', esc_attr( $module_id ) ) : '' ),
		( '' !== $module_class ? sprintf( ' %1$s', esc_attr( $module_class ) ) : '' )
	);

	return $output;
}

add_shortcode( 'et_pb_blurb', 'et_pb_blurb' );
function et_pb_blurb( $atts, $content = '' ) {
	extract( shortcode_atts( array(
			'module_id' => '',
			'module_class' => '',
			'title' => '',
			'url' => '',
			'image' => '',
			'url_new_window' => 'off',
			'alt' => '',
			'background_layout' => 'light',
			'text_orientation' => 'center',
			'animation' => 'top',
		), $atts
	) );

	if ( '' !== $title && '' !== $url )
		$title = sprintf( '<a href="%1$s"%3$s>%2$s</a>',
			esc_url( $url ),
			esc_html( $title ),
			( 'on' === $url_new_window ? ' target="_blank"' : '' )
		);

	if ( '' !== $title )
		$title = "<h4>{$title}</h4>";

	if ( '' !== $image ) {
		$image = sprintf(
			'<img src="%1$s" alt="%2$s" class="et-waypoint%3$s" />',
			esc_attr( $image ),
			esc_attr( $alt ),
			esc_attr( " et_pb_animation_{$animation}" )
		);

		$image = sprintf(
			'<div class="et_pb_main_blurb_image">%1$s</div>',
			( '' !== $url
				? sprintf(
					'<a href="%1$s"%3$s>%2$s</a>',
					esc_url( $url ),
					$image,
					( 'on' === $url_new_window ? ' target="_blank"' : '' )
				)
				: $image
			)
		);
	}

	$class = " et_pb_bg_layout_{$background_layout} et_pb_text_align_{$text_orientation}";

	$output = sprintf(
		'<div%5$s class="et_pb_blurb%4$s%6$s">
			<div class="et_pb_blurb_content">
				%2$s
				%3$s
				%1$s
			</div> <!-- .et_pb_blurb_content -->
		</div> <!-- .et_pb_blurb -->',
		do_shortcode( et_pb_fix_shortcodes( $content ) ),
		$image,
		$title,
		esc_attr( $class ),
		( '' !== $module_id ? sprintf( ' id="%1$s"', esc_attr( $module_id ) ) : '' ),
		( '' !== $module_class ? sprintf( ' %1$s', esc_attr( $module_class ) ) : '' )
	);

	return $output;
}

add_shortcode( 'et_pb_text', 'et_pb_text' );
function et_pb_text( $atts, $content = '' ) {
	extract( shortcode_atts( array(
			'module_id' => '',
			'module_class' => '',
			'background_layout' => 'light',
			'text_orientation' => 'left',
		), $atts
	) );

	$class = " et_pb_bg_layout_{$background_layout} et_pb_text_align_{$text_orientation}";

	$output = sprintf(
		'<div%3$s class="et_pb_text%2$s%4$s">
			%1$s
		</div> <!-- .et_pb_text -->',
		do_shortcode( et_pb_fix_shortcodes( $content ) ),
		esc_attr( $class ),
		( '' !== $module_id ? sprintf( ' id="%1$s"', esc_attr( $module_id ) ) : '' ),
		( '' !== $module_class ? sprintf( ' %1$s', esc_attr( $module_class ) ) : '' )
	);

	return $output;
}

add_shortcode( 'et_pb_tabs', 'et_pb_tabs' );
function et_pb_tabs( $atts, $content = '' ) {
	extract( shortcode_atts( array(
			'module_id' => '',
			'module_class' => '',
		), $atts
	) );

	global $et_pb_tab_titles;

	$et_pb_tab_titles = array();
	$tabs = '';
	$all_tabs_content = do_shortcode( et_pb_fix_shortcodes( $content ) );

	$i = 0;
	foreach ( $et_pb_tab_titles as $tab_title ){
		++$i;
		$tabs .= sprintf( '<li%1$s><a href="#">%2$s</a></li>',
			( 1 == $i ? ' class="et_pb_tab_active"' : '' ),
			esc_html( $tab_title )
		);
	}

	$output = sprintf(
		'<div%3$s class="et_pb_tabs%4$s">
			<ul class="et_pb_tabs_controls clearfix">
				%1$s
			</ul>
			<div class="et_pb_all_tabs">
				%2$s
			</div> <!-- .et_pb_all_tabs -->
		</div> <!-- .et_pb_tabs -->',
		$tabs,
		$all_tabs_content,
		( '' !== $module_id ? sprintf( ' id="%1$s"', esc_attr( $module_id ) ) : '' ),
		( '' !== $module_class ? sprintf( ' %1$s', esc_attr( $module_class ) ) : '' )
	);

	return $output;
}

add_shortcode( 'et_pb_tab', 'et_pb_tab' );
function et_pb_tab( $atts, $content = null ) {
	global $et_pb_tab_titles;

	extract( shortcode_atts( array(
			'title' => '',
		), $atts
	) );

	$et_pb_tab_titles[] = '' !== $title ? $title : __( 'Tab', 'Divi' );

	$output = sprintf(
		'<div class="et_pb_tab clearfix%2$s">
			%1$s
		</div> <!-- .et_pb_tab -->',
		do_shortcode( et_pb_fix_shortcodes( $content ) ),
		( 1 === count( $et_pb_tab_titles ) ? ' et_pb_active_content' : '' )
	);

	return $output;
}

add_shortcode( 'et_pb_toggle', 'et_pb_toggle' );
function et_pb_toggle( $atts, $content = null ) {
	extract( shortcode_atts( array(
			'module_id' => '',
			'module_class' => '',
			'title' => '',
			'open' => 'off',
		), $atts
	) );

	$output = sprintf(
		'<div%4$s class="et_pb_toggle %2$s%5$s">
			<h5 class="et_pb_toggle_title">%1$s</h5>
			<div class="et_pb_toggle_content clearfix">
				%3$s
			</div> <!-- .et_pb_toggle_content -->
		</div> <!-- .et_pb_toggle -->',
		esc_html( $title ),
		( 'on' === $open ? 'et_pb_toggle_open' : 'et_pb_toggle_close' ),
		do_shortcode( et_pb_fix_shortcodes( $content ) ),
		( '' !== $module_id ? sprintf( ' id="%1$s"', esc_attr( $module_id ) ) : '' ),
		( '' !== $module_class ? sprintf( ' %1$s', esc_attr( $module_class ) ) : '' )
	);

	return $output;
}

add_shortcode( 'et_pb_counters', 'et_pb_counters' );
function et_pb_counters( $atts, $content = null ) {
	global $et_pb_counters_colors;

	extract( shortcode_atts( array(
			'module_id' => '',
			'module_class' => '',
			'background_layout' => 'light',
			'background_color' => '#ddd',
			'bar_bg_color' => et_get_option( 'accent_color', '#7EBEC5' ),
		), $atts
	) );

	$et_pb_counters_colors = array(
		'background_color' => $background_color,
		'bar_bg_color' => $bar_bg_color,
	);

	$class = " et_pb_bg_layout_{$background_layout}";

	$output = sprintf(
		'<ul%3$s class="et_pb_counters et-waypoint%2$s%4$s">
			%1$s
		</ul> <!-- .et_pb_counters -->',
		do_shortcode( et_pb_fix_shortcodes( $content ) ),
		esc_attr( $class ),
		( '' !== $module_id ? sprintf( ' id="%1$s"', esc_attr( $module_id ) ) : '' ),
		( '' !== $module_class ? sprintf( ' %1$s', esc_attr( $module_class ) ) : '' )
	);

	return $output;
}

add_shortcode( 'et_pb_counter', 'et_pb_counter' );
function et_pb_counter( $atts, $content = null ) {
	global $et_pb_counters_colors;

	extract( shortcode_atts( array(
			'percent' => '0',
		), $atts
	) );

	$percent .= '%';

	$background_color_style = $bar_bg_color_style = '';

	if ( isset( $et_pb_counters_colors['background_color'] ) && '' !== $et_pb_counters_colors['background_color'] )
		$background_color_style = sprintf( ' style="background-color: %1$s;"', esc_attr( $et_pb_counters_colors['background_color'] ) );

	if ( isset( $et_pb_counters_colors['bar_bg_color'] ) && '' !== $et_pb_counters_colors['bar_bg_color'] )
		$bar_bg_color_style = sprintf( ' background-color: %1$s;', esc_attr( $et_pb_counters_colors['bar_bg_color'] ) );

	$output = sprintf(
		'<li>
			<span class="et_pb_counter_title">%1$s</span>
			<span class="et_pb_counter_container"%4$s>
				<span class="et_pb_counter_amount" style="width: %3$s;%5$s">%2$s</span>
			</span>
		</li>',
		sanitize_text_field( $content ),
		esc_html( $percent ),
		esc_attr( $percent ),
		$background_color_style,
		$bar_bg_color_style
	);

	return $output;
}

add_shortcode( 'et_pb_cta', 'et_pb_cta' );
function et_pb_cta( $atts, $content = null ) {
	extract( shortcode_atts( array(
			'module_id' => '',
			'module_class' => '',
			'title' => '',
			'button_url' => '',
			'button_text' => '',
			'background_color' => et_get_option( 'accent_color', '#7EBEC5' ),
			'background_layout' => 'dark',
			'text_orientation' => 'center',
			'use_background_color' => 'on',
		), $atts
	) );

	$class = " et_pb_bg_layout_{$background_layout} et_pb_text_align_{$text_orientation}";

	$output = sprintf(
		'<div%6$s class="et_pb_promo%4$s%7$s"%5$s>
			<div class="et_pb_promo_description">
				%1$s
				%2$s
			</div>
			%3$s
		</div>',
		( '' !== $title ? '<h2>' . esc_html( $title ) . '</h2>' : '' ),
		do_shortcode( et_pb_fix_shortcodes( $content ) ),
		(
			'' !== $button_url && '' !== $button_text
				? sprintf( '<a class="et_pb_promo_button" href="%1$s">%2$s</a>',
					esc_url( $button_url ),
					esc_html( $button_text )
				)
				: ''
		),
		esc_attr( $class ),
		( 'on' === $use_background_color
			? sprintf( ' style="background-color: %1$s;"', esc_attr( $background_color ) )
			: ''
		),
		( '' !== $module_id ? sprintf( ' id="%1$s"', esc_attr( $module_id ) ) : '' ),
		( '' !== $module_class ? sprintf( ' %1$s', esc_attr( $module_class ) ) : '' )
	);

	return $output;
}

if ( ! function_exists( 'et_pb_get_mailchimp_lists' ) ) :
function et_pb_get_mailchimp_lists() {
	$lists = array();

	if ( 'on' === et_get_option( 'divi_regenerate_mailchimp_lists', 'false' ) || false === ( $et_pb_mailchimp_lists = get_transient( 'et_pb_mailchimp_lists' ) ) ) {
		if ( ! class_exists( 'MCAPI' ) )
			require_once( get_template_directory() . '/includes/subscription/mailchimp/MCAPI.class.php' );

		$mailchimp_api_key = et_get_option( 'divi_mailchimp_api_key' );

		if ( '' === $mailchimp_api_key ) return false;

		$api = new MCAPI( $mailchimp_api_key );

		$retval = $api->lists();

		if ( ! $api->errorCode ) {
			foreach ( $retval['data'] as $list )
				$lists[$list['id']] = $list['name'];
		}

		set_transient( 'et_pb_mailchimp_lists', $lists, 60*60*24 );
	} else {
		$lists = $et_pb_mailchimp_lists;
	}

	return $lists;
}
endif;

function et_pb_submit_subscribe_form(  ) {
	if ( ! wp_verify_nonce( $_POST['et_load_nonce'], 'et_load_nonce' ) ) die(-1);

	$list_id = sanitize_text_field( $_POST['et_list_id'] );

	$email = sanitize_email( $_POST['et_email'] );

	$firstname = sanitize_text_field( $_POST['et_firstname'] );

	$lastname = sanitize_text_field( $_POST['et_lastname'] );

	if ( '' === $firstname ) die( -1 );

	if ( ! is_email( $email ) ) die( -1 );

	if ( '' == $list_id ) die( -1 );

	if ( ! class_exists( 'MCAPI' ) )
		require_once( get_template_directory() . '/includes/subscription/mailchimp/MCAPI.class.php' );

	$mailchimp_api_key = et_get_option( 'divi_mailchimp_api_key' );

	if ( '' === $mailchimp_api_key ) die( -1 );

	$api = new MCAPI( $mailchimp_api_key );

	$merge_vars = array(
		'FNAME' => $firstname,
		'LNAME' => $lastname,
	);

	$retval = $api->listSubscribe( $list_id, $email, $merge_vars );

	if ( ! $api->errorCode )
		echo __( '<h2 class="et_pb_subscribed">Subscribed - look for the confirmation email!</h2>', 'Divi' );

	die();
}
add_action( 'wp_ajax_et_pb_submit_subscribe_form', 'et_pb_submit_subscribe_form' );
add_action( 'wp_ajax_nopriv_et_pb_submit_subscribe_form', 'et_pb_submit_subscribe_form' );

add_shortcode( 'et_pb_signup', 'et_pb_signup' );
function et_pb_signup( $atts, $content = null ) {
	extract( shortcode_atts( array(
			'module_id' => '',
			'module_class' => '',
			'title' => '',
			'button_text' => __( 'Subscribe', 'Divi' ),
			'background_color' => et_get_option( 'accent_color', '#7EBEC5' ),
			'background_layout' => 'dark',
			'mailchimp_list' => '',
			'text_orientation' => 'left',
			'use_background_color' => 'on',
		), $atts
	) );

	$class = " et_pb_bg_layout_{$background_layout} et_pb_text_align_{$text_orientation}";

	$form = '';

	$firstname     = __( 'First Name', 'Divi' );
	$lastname      = __( 'Last Name', 'Divi' );
	$email_address = __( 'Email Address', 'Divi' );

	if ( ! in_array( $mailchimp_list, array( '', 'none' ) ) ) {
		$form = sprintf( '
			<div class="et_pb_newsletter_form">
				<div class="et_pb_newsletter_result"></div>
				<p>
					<label class="et_pb_contact_form_label" for="et_pb_signup_firstname" style="display: none;">%3$s</label>
					<input id="et_pb_signup_firstname" class="input" type="text" value="%4$s" name="et_pb_signup_firstname">
				</p>
				<p>
					<label class="et_pb_contact_form_label" for="et_pb_signup_lastname" style="display: none;">%5$s</label>
					<input id="et_pb_signup_lastname" class="input" type="text" value="%6$s" name="et_pb_signup_lastname">
				</p>
				<p>
					<label class="et_pb_contact_form_label" for="et_pb_signup_email" style="display: none;">%7$s</label>
					<input id="et_pb_signup_email" class="input" type="text" value="%8$s" name="et_pb_signup_email">
				</p>
				<p><a class="et_pb_newsletter_button" href="#">%1$s</a></p>
				<input type="hidden" value="%2$s" name="et_pb_signup_list_id" />
			</div>',
			esc_html( $button_text ),
			( ! in_array( $mailchimp_list, array( '', 'none' ) ) ? esc_attr( $mailchimp_list ) : '' ),
			esc_html( $firstname ),
			esc_attr( $firstname ),
			esc_html( $lastname ),
			esc_attr( $lastname ),
			esc_html( $email_address ),
			esc_attr( $email_address )
		);
	}

	$output = sprintf(
		'<div%6$s class="et_pb_newsletter clearfix%4$s%7$s"%5$s>
			<div class="et_pb_newsletter_description">
				%1$s
				%2$s
			</div>
			%3$s
		</div>',
		( '' !== $title ? '<h2>' . esc_html( $title ) . '</h2>' : '' ),
		do_shortcode( et_pb_fix_shortcodes( $content ) ),
		$form,
		esc_attr( $class ),
		( 'on' === $use_background_color
			? sprintf( ' style="background-color: %1$s;"', esc_attr( $background_color ) )
			: ''
		),
		( '' !== $module_id ? sprintf( ' id="%1$s"', esc_attr( $module_id ) ) : '' ),
		( '' !== $module_class ? sprintf( ' %1$s', esc_attr( $module_class ) ) : '' )
	);

	return $output;
}

add_shortcode( 'et_pb_sidebar', 'et_pb_sidebar' );
function et_pb_sidebar( $atts ) {
	extract( shortcode_atts( array(
			'module_id' => '',
			'module_class' => '',
			'orientation' => 'left',
			'area' => '',
			'background_layout' => 'light',
		), $atts
	) );

	$widgets = '';

	ob_start();

	if ( is_active_sidebar( $area ) )
		dynamic_sidebar( $area );

	$widgets = ob_get_contents();

	ob_end_clean();

	$class = " et_pb_bg_layout_{$background_layout}";

	$output = sprintf(
		'<div%4$s class="et_pb_widget_area %2$s clearfix%3$s%5$s">
			%1$s
		</div> <!-- .et_pb_widget_area -->',
		$widgets,
		esc_attr( "et_pb_widget_area_{$orientation}" ),
		esc_attr( $class ),
		( '' !== $module_id ? sprintf( ' id="%1$s"', esc_attr( $module_id ) ) : '' ),
		( '' !== $module_class ? sprintf( ' %1$s', esc_attr( $module_class ) ) : '' )
	);

	return $output;
}

add_shortcode( 'et_pb_blog', 'et_pb_blog' );
function et_pb_blog( $atts ) {
	extract( shortcode_atts( array(
			'module_id' => '',
			'module_class' => '',
			'fullwidth' => 'on',
			'posts_number' => 10,
			'include_categories' => '',
			'meta_date' => 'M j, Y',
			'show_thumbnail' => 'on',
			'show_content' => 'off',
			'show_author' => 'on',
			'show_date' => 'on',
			'show_categories' => 'on',
			'show_pagination' => 'on',
			'background_layout' => 'light',
		), $atts
	) );

	global $paged;

	$container_is_closed = false;

	if ( 'on' !== $fullwidth )
		wp_enqueue_script( 'jquery-masonry' );

	$args = array( 'posts_per_page' => (int) $posts_number );

	$et_paged = is_front_page() ? get_query_var( 'page' ) : get_query_var( 'paged' );

	if ( is_front_page() ) {
		$paged = $et_paged;
	}

	if ( '' !== $include_categories )
		$args['cat'] = $include_categories;

	if ( ! is_search() ) {
		$args['paged'] = $et_paged;
	}

	ob_start();

	query_posts( $args );

	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'et_pb_post' ); ?>>

		<?php
			$thumb = '';

			$width = 'on' === $fullwidth ? 1080 : 400;
			$width = (int) apply_filters( 'et_pb_blog_image_width', $width );

			$height = 'on' === $fullwidth ? 675 : 250;
			$height = (int) apply_filters( 'et_pb_blog_image_height', $height );
			$classtext = 'on' === $fullwidth ? 'et_pb_post_main_image' : '';
			$titletext = get_the_title();
			$thumbnail = get_thumbnail( $width, $height, $classtext, $titletext, $titletext, false, 'Blogimage' );
			$thumb = $thumbnail["thumb"];

			if ( '' !== $thumb && 'on' === $show_thumbnail ) :
				if ( 'on' !== $fullwidth ) echo '<div class="et_pb_image_container">'; ?>
				<a href="<?php the_permalink(); ?>">
					<?php print_thumbnail( $thumb, $thumbnail["use_timthumb"], $titletext, $width, $height ); ?>
				</a>
		<?php
				if ( 'on' !== $fullwidth ) echo '</div> <!-- .et_pb_image_container -->';
			endif;
		?>

				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

			<?php
				if ( 'on' === $show_author || 'on' === $show_date || 'on' === $show_tags ) {
					printf( '<p class="post-meta">%1$s %2$s %3$s</p>',
						(
							'on' === $show_author
								? sprintf( __( 'by %s |', 'Divi' ), et_get_the_author_posts_link() )
								: ''
						),
						(
							'on' === $show_date
								? sprintf( __( '%s |', 'Divi' ), get_the_date( $meta_date ) )
								: ''
						),
						(
							'on' === $show_categories
								? get_the_category_list(', ')
								: ''
						)
					);
				}

				if ( 'on' === $show_content ) {
					global $more;
					$more = null;

					the_content( __( 'read more...', 'Divi' ) );
				} else {
					the_excerpt();
				}
			?>

			</article> <!-- .et_pb_post -->
<?php	}

		if ( 'on' === $show_pagination && ! is_search() ) {
			echo '</div> <!-- .et_pb_posts -->';

			$container_is_closed = true;

			if ( function_exists( 'wp_pagenavi' ) )
				wp_pagenavi();
			else
				get_template_part( 'includes/navigation', 'index' );
		}

		wp_reset_query();
	} else {
		get_template_part( 'includes/no-results', 'index' );
	}

	$posts = ob_get_contents();

	ob_end_clean();

	$class = " et_pb_bg_layout_{$background_layout}";

	$output = sprintf(
		'<div%5$s class="%1$s%3$s%6$s">
			%2$s
		%4$s',
		( 'on' === $fullwidth ? 'et_pb_posts' : 'et_pb_blog_grid clearfix' ),
		$posts,
		esc_attr( $class ),
		( ! $container_is_closed ? '</div> <!-- .et_pb_posts -->' : '' ),
		( '' !== $module_id ? sprintf( ' id="%1$s"', esc_attr( $module_id ) ) : '' ),
		( '' !== $module_class ? sprintf( ' %1$s', esc_attr( $module_class ) ) : '' )
	);

	if ( 'on' !== $fullwidth )
		$output = sprintf( '<div class="et_pb_blog_grid_wrapper">%1$s</div>', $output );

	return $output;
}

add_shortcode( 'et_pb_portfolio', 'et_pb_portfolio' );
function et_pb_portfolio( $atts ) {
	extract( shortcode_atts( array(
			'module_id' => '',
			'module_class' => '',
			'fullwidth' => 'on',
			'posts_number' => 10,
			'include_categories' => '',
			'show_title' => 'on',
			'show_categories' => 'on',
			'show_pagination' => 'on',
			'background_layout' => 'light',
		), $atts
	) );

	global $paged;

	$container_is_closed = false;

	$args = array(
		'posts_per_page' => (int) $posts_number,
		'post_type'      => 'project',
	);

	$et_paged = is_front_page() ? get_query_var( 'page' ) : get_query_var( 'paged' );

	if ( is_front_page() ) {
		$paged = $et_paged;
	}

	if ( '' !== $include_categories )
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'project_category',
				'field' => 'id',
				'terms' => explode( ',', $include_categories ),
				'operator' => 'IN',
			)
		);

	if ( ! is_search() ) {
		$args['paged'] = $et_paged;
	}

	ob_start();

	query_posts( $args );

	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post(); ?>

			<div id="post-<?php the_ID(); ?>" <?php post_class( 'et_pb_portfolio_item' ); ?>>

		<?php
			$thumb = '';

			$width = 'on' === $fullwidth ?  1080 : 400;
			$width = (int) apply_filters( 'et_pb_portfolio_image_width', $width );

			$height = 'on' === $fullwidth ?  9999 : 284;
			$height = (int) apply_filters( 'et_pb_portfolio_image_height', $height );
			$classtext = 'on' === $fullwidth ? 'et_pb_post_main_image' : '';
			$titletext = get_the_title();
			$thumbnail = get_thumbnail( $width, $height, $classtext, $titletext, $titletext, false, 'Blogimage' );
			$thumb = $thumbnail["thumb"];

			if ( '' !== $thumb ) : ?>
				<a href="<?php the_permalink(); ?>">
				<?php if ( 'on' !== $fullwidth ) : ?>
					<span class="et_portfolio_image">
				<?php endif; ?>
						<?php print_thumbnail( $thumb, $thumbnail["use_timthumb"], $titletext, $width, $height ); ?>
				<?php if ( 'on' !== $fullwidth ) : ?>
						<span class="et_overlay"></span>
					</span>
				<?php endif; ?>
				</a>
		<?php
			endif;
		?>

			<?php if ( 'on' === $show_title ) : ?>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php endif; ?>

			<?php if ( 'on' === $show_categories ) : ?>
				<p class="post-meta"><?php echo get_the_term_list( get_the_ID(), 'project_category', '', ', ' ); ?></p>
			<?php endif; ?>

			</div> <!-- .et_pb_portfolio_item -->
<?php	}

		if ( 'on' === $show_pagination && ! is_search() ) {
			echo '</div> <!-- .et_pb_portfolio -->';

			$container_is_closed = true;

			if ( function_exists( 'wp_pagenavi' ) )
				wp_pagenavi();
			else
				get_template_part( 'includes/navigation', 'index' );
		}

		wp_reset_query();
	} else {
		get_template_part( 'includes/no-results', 'index' );
	}

	$posts = ob_get_contents();

	ob_end_clean();

	$class = " et_pb_bg_layout_{$background_layout}";

	$output = sprintf(
		'<div%5$s class="%1$s%3$s%6$s">
			%2$s
		%4$s',
		( 'on' === $fullwidth ? 'et_pb_portfolio' : 'et_pb_portfolio_grid clearfix' ),
		$posts,
		esc_attr( $class ),
		( ! $container_is_closed ? '</div> <!-- .et_pb_portfolio -->' : '' ),
		( '' !== $module_id ? sprintf( ' id="%1$s"', esc_attr( $module_id ) ) : '' ),
		( '' !== $module_class ? sprintf( ' %1$s', esc_attr( $module_class ) ) : '' )
	);

	return $output;
}

add_shortcode( 'et_pb_pricing_tables', 'et_pb_pricing_tables' );
function et_pb_pricing_tables( $atts, $content = null ) {
	extract( shortcode_atts( array(
			'module_id' => '',
			'module_class' => '',
		), $atts
	) );

	global $et_pb_pricing_tables_num;

	$et_pb_pricing_tables_num = 0;

	$content = do_shortcode( et_pb_fix_shortcodes( $content ) );

	$output = sprintf(
		'<div%3$s class="et_pb_pricing clearfix%2$s%4$s">
			%1$s
		</div>',
		$content,
		esc_attr( " et_pb_pricing_{$et_pb_pricing_tables_num}" ),
		( '' !== $module_id ? sprintf( ' id="%1$s"', esc_attr( $module_id ) ) : '' ),
		( '' !== $module_class ? sprintf( ' %1$s', esc_attr( $module_class ) ) : '' )
	);

	return $output;
}

add_shortcode( 'et_pb_pricing_table', 'et_pb_pricing_table' );
function et_pb_pricing_table( $atts, $content = null ) {
	global $et_pb_pricing_tables_num;

	extract( shortcode_atts( array(
			'featured' => 'off',
			'title' => '',
			'subtitle' => '',
			'currency' => '',
			'per' => '',
			'sum' => '',
			'button_url' => '',
			'button_text' => '',
		), $atts
	) );

	$et_pb_pricing_tables_num++;

	if ( '' !== $button_url && '' !== $button_text )
		$button_text = sprintf( '<a class="et_pb_pricing_table_button" href="%1$s">%2$s</a>',
			esc_url( $button_url ),
			esc_html( $button_text )
		);

	$output = sprintf(
		'<div class="et_pb_pricing_table%1$s">
			<div class="et_pb_pricing_heading">
				%2$s
				%3$s
			</div> <!-- .et_pb_pricing_heading -->
			<div class="et_pb_pricing_content_top">
				<span class="et_pb_et_price">%6$s%7$s%8$s</span>
			</div> <!-- .et_pb_pricing_content_top -->
			<div class="et_pb_pricing_content">
				<ul class="et_pb_pricing">
					%4$s
				</ul>
			</div> <!-- .et_pb_pricing_content -->
			%5$s
		</div>',
		( 'off' !== $featured ? ' et_pb_featured_table' : '' ),
		( '' !== $title ? sprintf( '<h2 class="et_pb_pricing_title">%1$s</h2>', esc_html( $title ) ) : '' ),
		( '' !== $subtitle ? sprintf( '<span class="et_pb_best_value">%1$s</span>', esc_html( $subtitle ) ) : '' ),
		do_shortcode( et_pb_fix_shortcodes( et_pb_extract_items( $content ) ) ),
		$button_text,
		( '' !== $currency ? sprintf( '<span class="et_pb_dollar_sign">%1$s</span>', esc_html( $currency ) ) : '' ),
		( '' !== $sum ? sprintf( '<span class="et_pb_sum">%1$s</span>', esc_html( $sum ) ) : '' ),
		( '' !== $per ? sprintf( '/%1$s', esc_html( $per ) ) : '' )
	);

	return $output;
}

function et_pb_extract_items( $content ) {
	$output = $first_character = '';

	$lines = explode( "\n", str_replace( array( '<p>', '</p>', '<br />' ), '', $content ) );

	foreach ( $lines as $line ) {
		$line = trim( $line );

		if ( '' === $line ) continue;

		$first_character = $line[0];

		if ( in_array( $first_character, array( '-', '+' ) ) )
			$line = trim( substr( $line, 1 ) );

		$output .= sprintf( '[et_pb_pricing_item available="%2$s"]%1$s[/et_pb_pricing_item]',
			$line,
			( '-' === $first_character ? 'off' : 'on' )
		);
	}

	return $output;
}

add_shortcode( 'et_pb_pricing_item', 'et_pb_pricing_item' );
function et_pb_pricing_item( $atts, $content = null ) {
	extract( shortcode_atts( array(
			'available' => 'on',
		), $atts
	) );

	$output = sprintf( '<li%2$s>%1$s</li>',
		do_shortcode( et_pb_fix_shortcodes( $content ) ),
		( 'on' !== $available ? ' class="et_pb_not_available"' : '' )
	);

	return $output;
}

add_shortcode( 'et_pb_contact_form', 'et_pb_contact_form' );
function et_pb_contact_form( $atts, $content = null ) {
	global $et_pb_contact_form_num;

	extract( shortcode_atts( array(
			'module_id' => '',
			'module_class' => '',
			'captcha' => 'on',
			'email' => '',
			'title' => '',
		), $atts
	) );

	$et_error_message = '';
	$et_contact_error = false;

	if ( isset( $_POST['et_pb_contactform_submit'] ) ) {
		if ( 'on' === $captcha && ( ! isset( $_POST['et_pb_contact_captcha'] ) || empty( $_POST['et_pb_contact_captcha'] ) ) ) {
			$et_error_message .= sprintf( '<p>%1$s</p>', esc_html__( 'Make sure you entered the captcha.', 'Divi' ) );
			$et_contact_error = true;
		} else if ( 'on' === $captcha && ( $_POST['et_pb_contact_captcha'] <> ( $_SESSION['et_pb_first_digit'] + $_SESSION['et_pb_second_digit'] ) ) ) {
			$et_error_message .= sprintf( '<p>%1$s</p>', esc_html__( 'You entered the wrong number in captcha.', 'Divi' ) );

			unset( $_SESSION['et_pb_first_digit'] );
			unset( $_SESSION['et_pb_second_digit'] );

			$et_contact_error = true;
		} else if ( empty( $_POST['et_pb_contact_name'] ) || empty( $_POST['et_pb_contact_email'] ) || empty( $_POST['et_pb_contact_message'] ) ) {
			$et_error_message .= sprintf( '<p>%1$s</p>', esc_html__( 'Make sure you fill all fields.', 'Divi' ) );
			$et_contact_error = true;
		}

		if ( ! is_email( $_POST['et_pb_contact_email'] ) ) {
			$et_error_message .= sprintf( '<p>%1$s</p>', esc_html__( 'Invalid Email.', 'Divi' ) );
			$et_contact_error = true;
		}
	} else {
		$et_contact_error = true;
		if ( isset( $_SESSION['et_pb_first_digit'] ) )
			unset( $_SESSION['et_pb_first_digit'] );
		if ( isset( $_SESSION['et_pb_second_digit'] ) )
			unset( $_SESSION['et_pb_second_digit'] );
	}

	if ( ! isset( $_SESSION['et_pb_first_digit'] ) )
		$_SESSION['et_pb_first_digit'] = $et_pb_first_digit = rand(1, 15);
	else
		$et_pb_first_digit = $_SESSION['et_pb_first_digit'];

	if ( ! isset( $_SESSION['et_pb_second_digit'] ) )
		$_SESSION['et_pb_second_digit'] = $et_pb_second_digit = rand(1, 15);
	else
		$et_pb_second_digit = $_SESSION['et_pb_second_digit'];

	if ( ! $et_contact_error && isset( $_POST['_wpnonce-et-pb-contact-form-submitted'] ) && wp_verify_nonce( $_POST['_wpnonce-et-pb-contact-form-submitted'], 'et-pb-contact-form-submit' ) ) {
		$et_email_to = '' !== $email
			? $email
			: get_site_option( 'admin_email' );

		$et_site_name = get_option( 'blogname' );

		$contact_name 	= stripslashes( sanitize_text_field( $_POST['et_pb_contact_name'] ) );
		$contact_email 	= sanitize_email( $_POST['et_pb_contact_email'] );

		$headers  = 'From: ' . $contact_name . ' <' . $contact_email . '>' . "\r\n";
		$headers .= 'Reply-To: ' . $contact_name . ' <' . $contact_email . '>';

		wp_mail( apply_filters( 'et_contact_page_email_to', $et_email_to ),
			sprintf( __( 'New Message From %1$s%2$s', 'Divi' ),
				sanitize_text_field( $et_site_name ),
				( '' !== $title ? sprintf( _x( ' - %s', 'contact form title separator', 'Divi' ), sanitize_text_field( $title ) ) : '' )
			), stripslashes( wp_strip_all_tags( $_POST['et_pb_contact_message'] ) ), apply_filters( 'et_contact_page_headers', $headers, $contact_name, $contact_email ) );

		$et_error_message = sprintf( '<p>%1$s</p>', esc_html__( 'Thanks for contacting us', 'Divi' ) );
	}

	$form = '';

	$name_label = __( 'Name', 'Divi' );
	$email_label = __( 'Email Address', 'Divi' );
	$message_label = __( 'Message', 'Divi' );

	$et_pb_contact_form_num = ! isset( $et_pb_contact_form_num ) ? 1 : $et_pb_contact_form_num++;

	$et_pb_captcha = sprintf( '
		<div class="et_pb_contact_right">
			<p class="clearfix">
				%1$s = <input type="text" size="2" class="input et_pb_contact_captcha" value="" name="et_pb_contact_captcha">
			</p>
		</div> <!-- .et_pb_contact_right -->',
		sprintf( '%1$s + %2$s', esc_html( $et_pb_first_digit ), esc_html( $et_pb_second_digit ) )
	);

	if ( $et_contact_error )
		$form = sprintf( '
			<div class="et_pb_contact">
				<div class="et-pb-contact-message">%12$s</div>

				<form class="et_pb_contact_form clearfix" method="post" action="%1$s">
					<div class="et_pb_contact_left">
						<p class="clearfix">
							<label class="et_pb_contact_form_label">%2$s</label>
							<input type="text" class="input et_pb_contact_name" value="%3$s" name="et_pb_contact_name">
						</p>
						<p class="clearfix">
							<label class="et_pb_contact_form_label">%4$s</label>
							<input type="text" class="input et_pb_contact_email" value="%5$s" name="et_pb_contact_email">
						</p>
					</div> <!-- .et_pb_contact_left -->

					%6$s

					<div class="clear"></div>
					<p class="clearfix">
						<label class="et_pb_contact_form_label">%7$s</label>
						<textarea name="et_pb_contact_message" class="et_pb_contact_message input">%8$s</textarea>
					</p>

					<input type="hidden" value="et_contact_proccess" name="et_pb_contactform_submit">

					<input type="submit" value="%9$s" class="et_pb_contact_submit">
					<input type="reset" value="%10$s" class="et_pb_contact_reset">

					%11$s
				</form>
			</div> <!-- .et_pb_contact -->',
			esc_url( get_permalink( get_the_ID() ) ),
			$name_label,
			( isset( $_POST['et_pb_contact_name'] ) ? esc_attr( $_POST['et_pb_contact_name'] ) : $name_label ),
			$email_label,
			( isset( $_POST['et_pb_contact_email'] ) ? esc_attr( $_POST['et_pb_contact_email'] ) : $email_label ),
			(  'on' === $captcha ? $et_pb_captcha : '' ),
			$message_label,
			( isset( $_POST['et_pb_contact_message'] ) ? esc_attr( $_POST['et_pb_contact_message'] ) : $message_label ),
			__( 'Submit', 'Divi' ),
			__( 'Reset', 'Divi' ),
			wp_nonce_field( 'et-pb-contact-form-submit', '_wpnonce-et-pb-contact-form-submitted', true, false ),
			$et_error_message
		);

	$output = sprintf( '
		<div id="%4$s" class="et_pb_contact_form_container clearfix%5$s">
			%1$s
			%2$s
			%3$s
		</div> <!-- .et_pb_contact_form_container -->
		',
		( '' !== $title ? sprintf( '<h1 class="et_pb_contact_main_title">%1$s</h1>', esc_html( $title ) ) : '' ),
		( '' !== $et_error_message ? sprintf( '<div class="et-pb-contact-message">%1$s</div>', $et_error_message ) : '' ),
		$form,
		( '' !== $module_id
			? esc_attr( $module_id )
			: esc_attr( 'et_pb_contact_form_' . $et_pb_contact_form_num )
		),
		( '' !== $module_class ? sprintf( ' %1$s', esc_attr( $module_class ) ) : '' )
	);

	return $output;
}

add_shortcode( 'et_pb_divider', 'et_pb_divider' );
function et_pb_divider( $atts, $content = null ) {
	extract( shortcode_atts( array(
			'module_id' => '',
			'module_class' => '',
			'color' => '',
			'show_divider' => 'off',
			'height' => '',
		), $atts
	) );

	$style = '';

	if ( '' !== $color && 'on' === $show_divider )
		$style .= sprintf( 'border-color: %s;',
			esc_attr( $color )
		);

	if ( '' !== $height )
		$style .= sprintf( 'height:%spx;',
			esc_attr( $height )
		);

	$style = '' !== $style ? " style='{$style}'" : '';

	$output = sprintf(
		'<hr%3$s class="et_pb_space%1$s%4$s"%2$s />',
		( 'on' === $show_divider ? ' et_pb_divider' : '' ),
		$style,
		( '' !== $module_id ? sprintf( ' id="%1$s"', esc_attr( $module_id ) ) : '' ),
		( '' !== $module_class ? sprintf( ' %1$s', esc_attr( $module_class ) ) : '' )
	);

	return $output;
}

add_shortcode( 'et_pb_shop', 'et_pb_shop' );
function et_pb_shop( $atts, $content = null ) {
	extract( shortcode_atts( array(
			'module_id' => '',
			'module_class' => '',
			'type' => 'recent',
			'posts_number' => '12',
			'orderby' => 'menu_order',
			'columns' => '4',
		), $atts
	) );

	$woocommerce_shortcodes_types = array(
		'recent'       => 'recent_products',
		'featured'     => 'featured_products',
		'sale'         => 'sale_products',
		'best_selling' => 'best_selling_products',
		'top_rated'    => 'top_rated_products',
	);

	$output = sprintf(
		'<div%2$s class="et_pb_shop%3$s">
			%1$s
		</div>',
		do_shortcode(
			sprintf( '[%1$s per_page="%2$s" orderby="%3$s" columns="%4$s"]',
				esc_html( $woocommerce_shortcodes_types[$type] ),
				esc_attr( $posts_number ),
				esc_attr( $orderby ),
				esc_attr( $columns )
			)
		),
		( '' !== $module_id ? sprintf( ' id="%1$s"', esc_attr( $module_id ) ) : '' ),
		( '' !== $module_class ? sprintf( ' %1$s', esc_attr( $module_class ) ) : '' )
	);

	return $output;
}

add_shortcode( 'et_pb_fullwidth_header', 'et_pb_fullwidth_header' );
function et_pb_fullwidth_header( $atts, $content = null ) {
	extract( shortcode_atts( array(
			'module_id'         => '',
			'module_class'      => '',
			'title'             => '',
			'subhead'           => '',
			'background_layout' => 'light',
			'text_orientation'  => 'left',
		), $atts
	) );

	$class = " et_pb_bg_layout_{$background_layout} et_pb_text_align_{$text_orientation}";

	$output = sprintf(
		'<section%4$s class="et_pb_fullwidth_header%3$s%5$s">
			<div class="et_pb_row">
				<h1>%1$s</h1>
				%2$s
			</div>
		</section>',
		$title,
		( $subhead ? sprintf( '<p class="et_pb_fullwidth_header_subhead">%1$s</p>', $subhead ) : '' ),
		esc_attr( $class ),
		( '' !== $module_id ? sprintf( ' id="%1$s"', esc_attr( $module_id ) ) : '' ),
		( '' !== $module_class ? sprintf( ' %1$s', esc_attr( $module_class ) ) : '' )
	);

	return $output;
}