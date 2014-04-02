<?php 
/**
 * Stylesheets/JavaScripts In WP-Admin
 */
function optpress_admin_enqueue_scripts($hook) {
	global $page_handle;
	
	if ( ($hook == 'post.php') || ($hook == 'post-new.php') || ($hook == 'page.php') || ($hook == 'page-new.php') || ($_GET['page'] == $page_handle) ) {

	wp_enqueue_style( 'optpress-tabs', OPTPRESS_ADMIN_CSS .'/jquery.ui.tabs.css', false, '1.0.0', 'screen' );
	wp_enqueue_style( 'optpress-admin', OPTPRESS_ADMIN_CSS .'/admin.css', false, '1.0.0', 'screen' );
	wp_register_script('tablednd', OPTPRESS_ADMIN_JS .'/jquery.tablednd.js', array('jquery'), '0.5');
	wp_register_script('optpress-admin', OPTPRESS_ADMIN_JS .'/admin.js', array('jquery'), '1.0.0');
	wp_enqueue_script('optpress-wpms', OPTPRESS_ADMIN_JS .'/wp-menu-order.js', array('jquery'), '1.0.0');
	wp_enqueue_script('jquery-json', OPTPRESS_ADMIN_JS . '/jquery.json-2.2.min.js', array('jquery'), '2.2');
	wp_enqueue_script( 'jquery-ui-tabs' );
	wp_enqueue_script( 'jquery-ui-sortable' ); 
	wp_enqueue_script( 'jquery-ui-droppable' );
	wp_enqueue_script( 'jquery-ui-draggable' );
	}
}

function optpress_admin_css() {
	global $page_handle;	
	wp_enqueue_style( 'optpress-admin', OPTPRESS_ADMIN_CSS .'/styles_admin.css', false, '1.0.0', 'screen' );
}
add_action('admin_enqueue_scripts', 'optpress_admin_css');

function optpress_admin_print_scripts($hook) {
	global $page_handle;
	$nonce = wp_create_nonce( 'sidebar_rm' );
		
	echo '<script type="text/javascript">
	//<![CDATA[
	var $rmSidebarAjaxUrl = "' .admin_url('admin-ajax.php'). '";
	var $ajaxNonce = "' .$nonce. '";
	//]]></script>';
	
	wp_print_scripts( 'tablednd' );
	wp_print_scripts( 'optpress-admin' );
}

function optpress_admin_scripts_hook() {
	global $page_handle;

	$svr_uri = $_SERVER['REQUEST_URI'];
	if ( strstr($svr_uri, 'post.php') || strstr($svr_uri, 'post-new.php') || strstr($svr_uri, 'page.php') || strstr($svr_uri, 'page-new.php') || strstr($svr_uri, $page_handle) ) { 
		return true; 
	}			
}

add_action('admin_enqueue_scripts', 'optpress_admin_enqueue_scripts');
if(optpress_admin_scripts_hook()) {
add_action('admin_print_scripts', 'optpress_admin_print_scripts');
}

// force a line break in wordpress
function nickce_init() {
	global $wp_scripts;
	$queue = $wp_scripts->queue;
		wp_enqueue_script( 'tadv_replace', get_template_directory_uri() . '/js/tadv_replace.js', array('editor'), '' ); 
}
add_action( 'admin_enqueue_scripts', 'nickce_init' );

?>