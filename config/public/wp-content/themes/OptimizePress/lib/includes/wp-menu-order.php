<?php
/*
Plugin Name: WordPress Menu Sorting
Plugin URI: http://www.lifeatistudio.com/web-development/wordpress-plugin-release-menu-order/
Description: A plugin that will simplify the process of maintaining a WordPress powered site's navigation structure.
Version: 1.02
Author: Mike Badgley, iStudio
Author URI: http://www.lifeatistudio.com

Copyright 2009  Mike Badgley, iStudio  (mbadgley@istudio.ca)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

//add_action('admin_init', 'wpms_admin_init');
//add_action('admin_menu', 'wpms_admin_menu');
add_action('wp_ajax_update_page_order', 'update_page_order' );
add_action('wp_ajax_flush_permalinks', 'flush_permalinks' );


function wpms_admin_init(){
	if(preg_match("/(edit-pages\.php)$/", $_SERVER['PHP_SELF']) && $_GET['page'] == "wp-menu-order") {
		wp_enqueue_script('google-jqueryui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js', array('jquery'), '1.7.2');
		wp_enqueue_script('wpms', get_bloginfo('url') . '/wp-content/plugins/wordpress-menu-order/_scripts/wp-menu-order.js', array('google-jqueryui'), '1.0');
		wp_enqueue_script('jquery-json', get_bloginfo('url') . '/wp-content/plugins/wordpress-menu-order/_scripts/jquery.json-2.2.min.js', array('jquery'), '2.2');
		wp_enqueue_style('wpms', get_bloginfo('url') . '/wp-content/plugins/wordpress-menu-order/_styles/wp-menu-order.css');
	}
}


function wpms_admin_menu() {
	if (function_exists('add_submenu_page')) {
        $page = add_submenu_page('edit-pages.php', __('WordPress Menu Order', 'wpms'), __('WordPress Menu Order', 'wpms'), 5, "wp-menu-order", 'wpms_menu_order');
    }
}


function wpms_menu_order() {
?>
	<div class="wrap">
		<!-- <h2><?php _e('WordPress Menu Order', 'wpms'); ?></h2> -->

<?php
		global $wpdb;
		$pgSitemap = array();

		/* Query the database for a list of _all_ pages. */
		$results = $wpdb->get_results("
			SELECT		ID, post_title, post_parent
			FROM 		$wpdb->posts
			WHERE 		post_type = 'page'
			ORDER BY	post_parent ASC, menu_order ASC
		");

		if($results && count($results) > 0) {
			foreach($results as $page) {
				$pgSitemap[$page->post_parent][] = $page;
			}
		}
?>
		<ul id="wpms-sitemap">
		<?php sort_sitemap($pgSitemap); ?>
		</ul>

		<?php $nonce = wp_create_nonce('wp-menu-order'); ?>
		<input type="hidden" name="wp-nonce" value="<?php echo $nonce; ?>" />
		<input type="hidden" name="wp-admin-ajax" value="<?php echo admin_url('admin-ajax.php'); ?>" />
	</div>
<?php
}


// The permalinks needs to be flushed after sort
function flush_permalinks() { 
	global $wp_rewrite;
	
	$wp_rewrite->flush_rules();
}


function update_page_order() {
	if (!check_ajax_referer('wp-menu-order')) die("Security check");

	global $wpdb;

	$pageParent = (isset($_POST['page_parent'])) ? json_decode(stripslashes($_POST['page_parent'])) : NULL;
	$pageOrder = (isset($_POST['page_order'])) ? json_decode(stripslashes($_POST['page_order'])) : NULL;

	if(!is_null($pageParent)) {
		$sql = "UPDATE 	$wpdb->posts
				SET		post_parent = " . $pageParent->parentID . "
				WHERE	ID = " . $pageParent->pageID;
		$result = $wpdb->query($sql);

		if($result === FALSE) {
			die(json_encode(array(
				'success' => false,
				'message' => __($result, 'wpms')
			)));
		}
	}

	if(!is_null($pageOrder)) {
		foreach($pageOrder as $page) {
			$sql = "UPDATE	$wpdb->posts
					SET		menu_order = " . $page->menuOrder . "
					WHERE	ID = " . $page->pageID;
			$result = $wpdb->query($sql);

			if($result === FALSE) {
				die(json_encode(array(
					'success' => false,
					'message' => __('Error writing to the database.', 'wpms')
				)));
			}
		}
	}

	die(json_encode(array(
		'success' => true,
		'message' => __('Page navigation updated.', 'wpms')
	)));
}


function sort_sitemap($pages, $parent_node = 0, $count = 0) {
	foreach ($pages[$parent_node] as $page) {
		if(isset($pages[$page->ID])) {
			echo '<li class="sm2_liOpen">';
		} else {
			echo '<li>';
		}
?>
		<div class="dropzone">
			<input type="hidden" name="wpms_page_id_<?php echo $page->ID; ?>" rel="wpms_page_id" value="<?php echo $page->ID; ?>" />
			<input type="hidden" name="wpms_parent_id_<?php echo $page->ID; ?>" rel="wpms_parent_id" value="<?php echo $page->post_parent; ?>" />
		</div>

		<dl>
			<a class="sm2_expander" href="#">Expand/Collapse</a>
			<dt><a href="#"><?php echo $page->post_title; ?></a></dt>
			<dd>
				<input type="hidden" name="wpms_page_id_<?php echo $page->ID; ?>" rel="wpms_page_id" value="<?php echo $page->ID; ?>" />
				<input type="hidden" name="wpms_parent_id_<?php echo $page->ID; ?>" rel="wpms_parent_id" value="<?php echo $page->post_parent; ?>" />
				<input type="hidden" name="wpms_is_parent" value="true" />
			</dd>
		</dl>

		<?php if(isset($pages[$page->ID])) {
			echo '<ul>';
			sort_sitemap($pages, $page->ID);
			echo '</ul>';
		}

		echo '</li>';
	}
}

?>