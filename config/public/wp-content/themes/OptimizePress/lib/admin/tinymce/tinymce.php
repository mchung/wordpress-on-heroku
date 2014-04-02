<?php
class add_optpress_button {
	
	var $pluginname = 'optpress_shortcode';
	var $path = '';
	var $internalVersion = 100;
	
	function add_optpress_button()  {
		
		// Set path to editor_plugin.js
		$this->path = get_template_directory_uri() . '/lib/admin/tinymce/';	
		
		// Modify the version when tinyMCE plugins are changed.
		add_filter('tiny_mce_version', array (&$this, 'change_tinymce_version') );

		// init process for button control
		add_action('init', array (&$this, 'addbuttons') );
	}
	
	function addbuttons() {
		global $page_handle;
	
		// Don't bother doing this stuff if the current user lacks permissions
		if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) 
			return;
		
		// Add only in Rich Editor mode
		if ( get_user_option('rich_editing') == 'true') {
		 
			$svr_uri = $_SERVER['REQUEST_URI'];
			if ( strstr($svr_uri, 'post.php') || strstr($svr_uri, 'post-new.php') || strstr($svr_uri, 'page.php') || strstr($svr_uri, 'page-new.php') || strstr($svr_uri, $page_handle) ) {
				add_filter("mce_external_plugins", array (&$this, 'add_tinymce_plugin' ), 5);
				add_filter('mce_buttons', array (&$this, 'register_button' ), 5);
				add_filter('mce_external_languages', array (&$this, 'add_tinymce_langs_path'));	
			}
		}
	}
	
	function register_button($buttons) {
	
		array_push($buttons, 'separator', $this->pluginname, 'ActionButtons', 'CustomCodes' );
	
		return $buttons;
	}
	
	function add_tinymce_plugin($plugin_array) {
		$svr_uri = $_SERVER['REQUEST_URI'];
		if ( strstr($svr_uri, 'post.php') || strstr($svr_uri, 'post-new.php')) {
			$plugin_array['ActionButtons'] =  $this->path . 'plugins/buttons/editor_plugin_src.js';
			$plugin_array['CustomCodes'] =  $this->path . 'plugins/custom/editor_plugin_src.js';
		}
		if ( strstr($svr_uri, 'page.php') || strstr($svr_uri, 'page-new.php')) {
			$plugin_array['ActionButtons'] =  $this->path . 'plugins/buttons/editor_plugin_src.js';
			$plugin_array['CustomCodes'] =  $this->path . 'plugins/custom/editor_plugin_src.js';
		}
		
		return $plugin_array;
	}
	
	
	function add_tinymce_langs_path($plugin_array) {
		// Load the TinyMCE language file	
		$plugin_array[$this->pluginname] = OPTPRESS_ADMIN . '/tinymce/langs.php';
		return $plugin_array;
	}
	
	function change_tinymce_version($version) {
			$version = $version + $this->internalVersion;
		return $version;
	}
	
}

$tinymce_button = new add_optpress_button ();

?>