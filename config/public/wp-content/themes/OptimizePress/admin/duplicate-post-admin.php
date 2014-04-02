<?php
// Added by WarmStal
if(!is_admin())
return;

/*
 * This function calls the creation of a new copy of the selected post (as a draft)
 * then redirects to the edit post screen
 */
function duplicate_post_save_as_new_post(){
	if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'duplicate_post_save_as_new_post' == $_REQUEST['action'] ) ) ) {
		wp_die(__('No post to duplicate has been supplied!', DUPLICATE_POST_I18N_DOMAIN));
	}

	// Get the original post
	$id = (isset($_GET['post']) ? $_GET['post'] : $_POST['post']);
	$post = duplicate_post_get_post($id);

	// Copy the post and insert it
	if (isset($post) && $post!=null) {
		$new_id = duplicate_post_create_duplicate_from_post($post);

		// If you have written a plugin which uses non-WP database tables to save
		// information about a post you can hook this action to dupe that data.
		do_action( 'dp_duplicate_post', $new_id, $post );

		// Redirect to the edit screen for the new draft post
		wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_id ) );
		exit;
	} else {
		wp_die(__('Post creation failed, could not find original post:', DUPLICATE_POST_I18N_DOMAIN) . ' ' . $id);
	}
}

/*
 * Same as above, for pages
 */
function duplicate_post_save_as_new_page(){
	if (! ( isset( $_GET['post']) || isset( $_POST['post'])  || ( isset($_REQUEST['action']) && 'duplicate_post_save_as_new_page' == $_REQUEST['action'] ) ) ) {
		wp_die(__('No page to duplicate has been supplied!', DUPLICATE_POST_I18N_DOMAIN));
	}

	// Get the original page
	$id = (isset($_GET['post']) ? $_GET['post'] : $_POST['post']);
	$post = duplicate_post_get_page($id);

	// Copy the page and insert it
	if (isset($post) && $post!=null) {
		$new_id = duplicate_post_create_duplicate_from_page($post);

		// If you have written a plugin which uses non-WP database tables to save
		// information about a page you can hook this action to dupe that data.
		do_action( 'dp_duplicate_page', $new_id, $post );

		// Redirect to the edit screen for the new draft page
		wp_redirect( admin_url( 'post.php?action=edit&post=' . $new_id ) );
		exit;
	} else {
		wp_die(__('Post creation failed, could not find original post:', DUPLICATE_POST_I18N_DOMAIN) . ' ' . $id);
	}
}

// Version of the plugin
define('DUPLICATE_POST_CURRENT_VERSION', '1.1' );
define('DUPLICATE_POST_COLUMN', 'control_duplicate_post');

// i18n plugin domain
define('DUPLICATE_POST_I18N_DOMAIN', 'duplicate-post');

/**
 * Initialise the internationalisation domain
 */
load_plugin_textdomain(DUPLICATE_POST_I18N_DOMAIN,
			'wp-content/plugins/duplicate-post/languages','duplicate-post/languages');

/**
 * Plugin activation
 */
if( !get_option( 'duplicate_post_copy_user_level' ) ) {
		add_option(
		'duplicate_post_copy_user_level',
			'5',
			'Default user level to copy posts' );
} else {
}

add_action('activate_duplicate-post/duplicate-post.php','duplicate_post_plugin_activation');

function duplicate_post_plugin_activation() {
	$installed_version = duplicate_post_get_installed_version();

	if ( $installed_version==duplicate_post_get_current_version() ) {
		// do nothing
	} else {
		// delete old, obsolete options
		delete_option('duplicate_post_admin_user_level');
		delete_option('duplicate_post_create_user_level');
		delete_option('duplicate_post_view_user_level');
		// Add all options, nothing already installed
		add_option(
		'duplicate_post_copy_user_level',
			'5',
			'Default user level to copy posts' );
	}
	// Update version number
	update_option( 'duplicate_post_version', duplicate_post_get_current_version() );
}

/**
 * Check if WP version < 2.8: if so, post_row_actions does not exist, so we must add a custom column (the old way)
 */
global $wp_version;
if (strncmp($wp_version, "2.7",3) == 0 ){
	add_filter('manage_posts_columns', 'duplicate_post_add_duplicate_post_column');
	// Added by WarmStal
	add_filter('manage_pages_columns', 'duplicate_post_add_duplicate_post_column');
	add_action('manage_posts_custom_column', 'duplicate_post_make_duplicate_link', 10, 2);
	// Added by WarmStal
	add_action('manage_pages_custom_column', 'duplicate_page_make_duplicate_link', 10, 2);
} else {
	/**
	 * Add to the links shown when the mouse gets over a post title in 'Edit Posts' or 'Edit Pages' screen
	 */
	add_filter('post_row_actions', 'duplicate_post_make_duplicate_link_row',10,2);
	add_filter('page_row_actions', 'duplicate_page_make_duplicate_link_row',10,2);
}

/**
 * WP version < 2.8: add a custom column
 */
function duplicate_post_add_duplicate_post_column($columns) {
	if (duplicate_post_is_current_user_allowed_to_copy()) {
		$columns[DUPLICATE_POST_COLUMN] = '';
	}
	return $columns;
}

/**
 * WP version < 2.8: add link to custom column for posts
 */
function duplicate_post_make_duplicate_link($column_name, $id) {
	if (duplicate_post_is_current_user_allowed_to_copy()) {
		if ($column_name == DUPLICATE_POST_COLUMN) {
			echo "<a href='admin.php?action=duplicate_post_save_as_new_post&amp;post=" . $id
			. "' title='" . __("Make a duplicate from this post", DUPLICATE_POST_I18N_DOMAIN)
			. "' class='edit'>" . __("Duplicate", DUPLICATE_POST_I18N_DOMAIN) . "</a>";
		}
	}
}

/**
 * WP version < 2.8: add link to custom column for pages
 */
// Added by WarmStal
function duplicate_page_make_duplicate_link($column_name, $id) {
	if (duplicate_post_is_current_user_allowed_to_copy()) {
		if ($column_name == DUPLICATE_POST_COLUMN) {
			echo "<a href='admin.php?action=duplicate_post_save_as_new_page&amp;post=" . $id
			. "' title='" . __("Make a duplicate from this page", DUPLICATE_POST_I18N_DOMAIN)
			. "' class='edit'>" . __("Duplicate", DUPLICATE_POST_I18N_DOMAIN) . "</a>";
		}
	}
}

/**
 * Connect actions to functions
 */
add_action('admin_action_duplicate_post_save_as_new_post', 'duplicate_post_save_as_new_post');
add_action('admin_action_duplicate_post_save_as_new_page', 'duplicate_post_save_as_new_page');

/**
 * Add the link to action list for post_row_actions
 */
function duplicate_post_make_duplicate_link_row($actions, $post) {
	if (duplicate_post_is_current_user_allowed_to_copy()) {
		$actions['duplicate'] = '<a href="admin.php?action=duplicate_post_save_as_new_post&amp;post=' . $post->ID . '" title="' . __("Make a duplicate from this post", DUPLICATE_POST_I18N_DOMAIN)
		. '" rel="permalink">' .  __("Duplicate", DUPLICATE_POST_I18N_DOMAIN) . '</a>';
	}
	return $actions;
}

/**
 * Add the link to action list for page_row_actions
 */
function duplicate_page_make_duplicate_link_row($actions, $page) {
	if (duplicate_post_is_current_user_allowed_to_copy()) {
		$actions['duplicate'] = '<a href="admin.php?action=duplicate_post_save_as_new_page&amp;post=' . $page->ID . '" title="' . __("Make a duplicate from this page", DUPLICATE_POST_I18N_DOMAIN)
		. '" rel="permalink">' .  __("Duplicate", DUPLICATE_POST_I18N_DOMAIN) . '</a>';
	}
	return $actions;
}

/**
 * Add a button in the post/page edit screen to create a clone
 */
add_action( 'post_submitbox_start', 'duplicate_post_add_duplicate_post_button' );

function duplicate_post_add_duplicate_post_button() {
	if ( isset( $_GET['post'] ) && duplicate_post_is_current_user_allowed_to_copy()) {
		$act = "admin.php?action=duplicate_post_save_as_new_post";
		global $post;
		if ($post->post_type == "page") $act = "admin.php?action=duplicate_post_save_as_new_page";
		$notifyUrl = $act."&post=" . $_GET['post'];
		?>
<div id="duplicate-action"><a class="submitduplicate duplication"
	href="<?php echo $notifyUrl; ?>"><?php _e('Copy to a new draft', DUPLICATE_POST_I18N_DOMAIN); ?></a>
</div>
		<?php
	}
}

/**
 * Wrapper for the option 'duplicate_post_create_user_level'
 */
function duplicate_post_get_copy_user_level() {
	return get_option( 'duplicate_post_copy_user_level' );
}

/**
 * Wrapper for the option 'duplicate_post_create_user_level'
 */
function duplicate_post_set_copy_user_level($new_level) {
	return update_option( 'duplicate_post_copy_user_level', $new_level );
}

/**
 * Wrapper for the option 'duplicate_post_version'
 */
function duplicate_post_get_installed_version() {
	return get_option( 'duplicate_post_version' );
}

/**
 * Wrapper for the defined constant DUPLICATE_POST_CURRENT_VERSION
 */
function duplicate_post_get_current_version() {
	return DUPLICATE_POST_CURRENT_VERSION;
}

/**
 * Test if the user is allowed to create templates
 */
function duplicate_post_is_current_user_allowed_to_copy() {
	return current_user_can("level_" . duplicate_post_get_copy_user_level());
}

/**
 * Get a level given a role
 */
function duplicate_post_get_level_from_role($role) {
	switch ($role) {
		case 0:		// subscribers		0
			return 0;
		case 1:		// contributors		1
			return 1;
		case 2:		// authors			2..4
			return 2;
		case 3:		// editors			5..7
			return 5;
		case 4:		// administrators		8..10
			return 8;
		default:	// error
			return 0;
	}
}

/**
 * Get a role given a level
 */
function duplicate_post_get_role_from_level($level) {
	if ($level<=0) {
		// subscribers		0
		return 0;
	} else if ($level==1) {
		// contributors		1
		return 1;
	} else if ($level>=2 && $level<=4) {
		// authors			2..4
		return 2;
	} else if ($level>=5 && $level<=7) {
		// editors			5..7
		return 3;
	} else if ($level>=8) {
		// admins			8..10
		return 4;
	}
	return 0;
}

/**
 * Get the currently registered user
 */
function duplicate_post_get_current_user() {
	if (function_exists('wp_get_current_user')) {
		return wp_get_current_user();
	} else if (function_exists('get_currentuserinfo')) {
		global $userdata;
		get_currentuserinfo();
		return $userdata;
	} else {
		$user_login = $_COOKIE[USER_COOKIE];
		$current_user = $wpdb->get_results("SELECT * FROM $wpdb->users WHERE user_login='$user_login'");
		return $current_user;
	}
}

/**
 * Escape single quotes, specialchar double quotes, and fix line endings.
 */
function duplicate_post_js_escape($text) {
	if (function_exists('js_escape')) {
		return js_escape($text);
	} else {
		$safe_text = str_replace('&&', '&#038;&', $text);
		$safe_text = str_replace('&&', '&#038;&', $safe_text);
		$safe_text = preg_replace('/&(?:$|([^#])(?![a-z1-4]{1,8};))/', '&#038;$1', $safe_text);
		$safe_text = str_replace('<', '&lt;', $safe_text);
		$safe_text = str_replace('>', '&gt;', $safe_text);
		$safe_text = str_replace('"', '&quot;', $safe_text);
		$safe_text = str_replace('&#039;', "'", $safe_text);
		$safe_text = preg_replace("/\r?\n/", "\\n", addslashes($safe_text));
		return safe_text;
	}
}

/**
 * Get a page from the database
 */
function duplicate_post_get_page($id) {
	global $wpdb;
	$post = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE ID=$id");
	if ($post->post_type == "revision"){
		$id = $post->post_parent;
		$post = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE ID=$id");
	}
	return $post[0];
}

/**
 * Get a post from the database
 */
function duplicate_post_get_post($id) {
	global $wpdb;
	$post = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE ID=$id");
	if ($post->post_type == "revision"){
		$id = $post->post_parent;
		$post = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE ID=$id");
	}
	return $post[0];
}

/**
 * Copy the taxonomies of a post to another post
 */
function duplicate_post_copy_post_taxonomies($id, $new_id, $post_type) {
	global $wpdb;
	if (isset($wpdb->terms)) {
		// WordPress 2.3
		$taxonomies = get_object_taxonomies($post_type); //array("category", "post_tag");
		foreach ($taxonomies as $taxonomy) {
			$post_terms = wp_get_object_terms($id, $taxonomy);
			for ($i=0; $i<count($post_terms); $i++) {
				wp_set_object_terms($new_id, $post_terms[$i]->slug, $taxonomy, true);
			}
		}
	}
}

/**
 * Copy the meta information of a post to another post
 */
function duplicate_post_copy_post_meta_info($id, $new_id) {
	global $wpdb;
	$post_meta_infos = $wpdb->get_results("SELECT meta_key, meta_value FROM $wpdb->postmeta WHERE post_id=$id");

	if (count($post_meta_infos)!=0) {
		$sql_query = "INSERT INTO $wpdb->postmeta (post_id, meta_key, meta_value) ";
		$meta_no_copy = explode(",",get_option('duplicate_post_blacklist'));
		foreach ($post_meta_infos as $meta_info) {
			$meta_key = $meta_info->meta_key;
			$meta_value = addslashes($meta_info->meta_value);
			if (!in_array($meta_key,$meta_no_copy)) {
				$sql_query_sel[]= "SELECT $new_id, '$meta_key', '$meta_value'";
			}
		}
		$sql_query.= implode(" UNION ALL ", $sql_query_sel);
		$wpdb->query($sql_query);
	}
}

/**
 * Create a duplicate from a post
 */
function duplicate_post_create_duplicate_from_post($post) {
	global $wpdb;
	//$new_post_type = 'post';
	$new_post_author = duplicate_post_get_current_user();
	$new_post_date = (get_option('duplicate_post_copydate') == 1)?  $post->post_date : current_time('mysql');
	$new_post_date_gmt = get_gmt_from_date($new_post_date);
	$prefix = get_option('duplicate_post_title_prefix');
	if (!empty($prefix)) $prefix.= " ";

	$new_post_type 	= $post->post_type;
	$post_content    = str_replace("'", "''", $post->post_content);
	$post_content_filtered = str_replace("'", "''", $post->post_content_filtered);
	$post_excerpt    = str_replace("'", "''", $post->post_excerpt);
	$post_title      = $prefix.str_replace("'", "''", $post->post_title);
	$post_status     = str_replace("'", "''", $post->post_status);
	$post_name       = str_replace("'", "''", $post->post_name);
	$comment_status  = str_replace("'", "''", $post->comment_status);
	$ping_status     = str_replace("'", "''", $post->ping_status);

	// Insert the new template in the post table
	$wpdb->query(
			"INSERT INTO $wpdb->posts
			(post_author, post_date, post_date_gmt, post_content, post_content_filtered, post_title, post_excerpt,  post_status, post_type, comment_status, ping_status, post_password, to_ping, pinged, post_modified, post_modified_gmt, post_parent, menu_order, post_mime_type)
			VALUES
			('$new_post_author->ID', '$new_post_date', '$new_post_date_gmt', '$post_content', '$post_content_filtered', '$post_title', '$post_excerpt', 'draft', '$new_post_type', '$comment_status', '$ping_status', '$post->post_password', '$post->to_ping', '$post->pinged', '$new_post_date', '$new_post_date_gmt', '$post->post_parent', '$post->menu_order', '$post->post_mime_type')");

	$new_post_id = $wpdb->insert_id;

	// Copy the taxonomies
	duplicate_post_copy_post_taxonomies($post->ID, $new_post_id, $post->post_type);

	// Copy the meta information
	duplicate_post_copy_post_meta_info($post->ID, $new_post_id);

	return $new_post_id;
}

/**
 * Create a duplicate from a page
 */
function duplicate_post_create_duplicate_from_page($post) {
	global $wpdb;
	//$new_post_type = 'page';
	$new_post_author = duplicate_post_get_current_user();
	$new_post_date = (get_option('duplicate_post_copydate') == 1)?  $post->post_date : current_time('mysql');
	$new_post_date_gmt = get_gmt_from_date($new_post_date);
	$prefix = get_option('duplicate_post_title_prefix');
	if (!empty($prefix)) $prefix.= " ";

	$new_post_type 	= $post->post_type;
	$post_content    = str_replace("'", "''", $post->post_content);
	$post_content_filtered = str_replace("'", "''", $post->post_content_filtered);
	$post_excerpt    = str_replace("'", "''", $post->post_excerpt);
	$post_title      = $prefix.str_replace("'", "''", $post->post_title);
	$post_status     = str_replace("'", "''", $post->post_status);
	$post_name       = str_replace("'", "''", $post->post_name);
	$comment_status  = str_replace("'", "''", $post->comment_status);
	$ping_status     = str_replace("'", "''", $post->ping_status);

	// Insert the new template in the post table
	$wpdb->query(
			"INSERT INTO $wpdb->posts
			(post_author, post_date, post_date_gmt, post_content, post_content_filtered, post_title, post_excerpt,  post_status, post_type, comment_status, ping_status, post_password, post_name, to_ping, pinged, post_modified, post_modified_gmt, post_parent, menu_order, post_mime_type)
			VALUES
			('$new_post_author->ID', '$new_post_date', '$new_post_date_gmt', '$post_content', '$post_content_filtered', '$post_title', '$post_excerpt', 'draft', '$new_post_type', '$comment_status', '$ping_status', '$post->post_password', '$post_name', '$post->to_ping', '$post->pinged', '$new_post_date', '$new_post_date_gmt', '$post->post_parent', '$post->menu_order', '$post->post_mime_type')");

	$new_page_id = $wpdb->insert_id;

	// Copy the taxonomies
	duplicate_post_copy_post_taxonomies($post->ID, $new_page_id, $post->post_type);

	// Copy the meta information
	duplicate_post_copy_post_meta_info($post->ID, $new_page_id);

	return $new_page_id;
}


/**
 * Add an option page where you can specify which meta fields you don't want to copy
 */
if ( is_admin() ){ // admin actions
	add_action('admin_menu', 'duplicate_post_menu');
	add_action( 'admin_init', 'duplicate_post_register_settings');
}

function duplicate_post_register_settings() { // whitelist options
	register_setting( 'duplicate_post_group', 'duplicate_post_copydate');
	register_setting( 'duplicate_post_group', 'duplicate_post_blacklist');
	register_setting( 'duplicate_post_group', 'duplicate_post_title_prefix');
	register_setting( 'duplicate_post_group', 'duplicate_post_copy_user_level');
}


function duplicate_post_menu() {
	add_options_page(__("Duplicate Post Options", DUPLICATE_POST_I18N_DOMAIN), __("Duplicate Post", DUPLICATE_POST_I18N_DOMAIN), 'administrator', 'duplicatepost', 'duplicate_post_options');
}

function duplicate_post_options() {
	?>
<div class="wrap">
<h2><?php _e("Duplicate Post", DUPLICATE_POST_I18N_DOMAIN); ?></h2>

<form method="post" action="options.php"><?php settings_fields('duplicate_post_group'); ?>

<table class="form-table">

	<tr valign="top">
		<th scope="row"><?php _e("Copy post/page date also", DUPLICATE_POST_I18N_DOMAIN); ?></th>
		<td><input type="checkbox" name="duplicate_post_copydate" value="1" <?php  if(get_option('duplicate_post_copydate') == 1) echo 'checked="checked"'; ?>"/>
		<span class="description"><?php _e("Normally, the new draft has publication date set to current time: check the box to copy the original post/page date", DUPLICATE_POST_I18N_DOMAIN); ?></span>
		</td>
	</tr>
	<tr valign="top">
		<th scope="row"><?php _e("Do not copy these fields", DUPLICATE_POST_I18N_DOMAIN); ?></th>
		<td><input type="text" name="duplicate_post_blacklist"
			value="<?php echo get_option('duplicate_post_blacklist'); ?>" /> <span
			class="description"><?php _e("Comma-separated list of meta fields that must not be copied when cloning a post/page", DUPLICATE_POST_I18N_DOMAIN); ?></span>
		</td>
	</tr>
	<tr valign="top">
		<th scope="row"><?php _e("Title prefix", DUPLICATE_POST_I18N_DOMAIN); ?></th>
		<td><input type="text" name="duplicate_post_title_prefix"
			value="<?php echo get_option('duplicate_post_title_prefix'); ?>" /> <span
			class="description"><?php _e("Prefix to be added before the original title when cloning a post/page, e.g. \"Copy of\" (blank for no prefix)", DUPLICATE_POST_I18N_DOMAIN); ?></span>
		</td>
	</tr>
	<tr valign="top">
		<th scope="row"><?php _e("Minimum level to copy posts", DUPLICATE_POST_I18N_DOMAIN); ?></th>
		<td><select name="duplicate_post_copy_user_level">
		<?php global $wp_version;
		if (strncmp($wp_version, "2.7",3) == 0 ){ ?>
			<option value="1"
			<?php if(get_option('duplicate_post_copy_user_level') == 1) echo 'selected="selected"'?>><?php echo _c("Contributor|User role", "default")?></option>
			<option value="2"
			<?php if(get_option('duplicate_post_copy_user_level') == 2) echo 'selected="selected"'?>><?php echo _c("Author|User role", "default")?></option>
			<option value="5"
			<?php if(get_option('duplicate_post_copy_user_level') == 5) echo 'selected="selected"'?>><?php echo _c("Editor|User role", "default")?></option>
			<option value="8"
			<?php if(get_option('duplicate_post_copy_user_level') == 8) echo 'selected="selected"'?>><?php echo _c("Administrator|User role", "default")?></option>

			<?php } else { ?>
			<option value="1"
			<?php if(get_option('duplicate_post_copy_user_level') == 1) echo 'selected="selected"'?>><?php echo _x("Contributor", "User role", "default")?></option>
			<option value="2"
			<?php if(get_option('duplicate_post_copy_user_level') == 2) echo 'selected="selected"'?>><?php echo _x("Author", "User role", "default")?></option>
			<option value="5"
			<?php if(get_option('duplicate_post_copy_user_level') == 5) echo 'selected="selected"'?>><?php echo _x("Editor", "User role", "default")?></option>
			<option value="8"
			<?php if(get_option('duplicate_post_copy_user_level') == 8) echo 'selected="selected"'?>><?php echo _x("Administrator", "User role", "default")?></option>

			<?php };?>
		</select> <span class="description"><?php _e("Warning: users will be able to copy all posts, even those of higher level users", DUPLICATE_POST_I18N_DOMAIN); ?></span>
		</td>
	</tr>

</table>

<p class="submit"><input type="submit" class="button-primary"
	value="<?php _e('Save Changes', DUPLICATE_POST_I18N_DOMAIN) ?>" /></p>

</form>
</div>
			<?php
}

//Add some links on the plugin page
add_filter('plugin_row_meta', 'duplicate_post_add_plugin_links', 10, 2);

function duplicate_post_add_plugin_links($links, $file) {
	if ( $file == plugin_basename(__FILE__) ) {
		$links[] = '<a href="http://www.lopo.it/duplicate-post-plugin">' . __('Donate', DUPLICATE_POST_I18N_DOMAIN) . '</a>';
		$links[] = '<a href="http://www.lopo.it/duplicate-post-plugin">' . __('Translate', DUPLICATE_POST_I18N_DOMAIN) . '</a>';
	}
	return $links;
}
?>